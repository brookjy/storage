<?php if(!defined('In_System')) exit("Access Denied");

class Food_Service{
    private $serviceType;
    private $time;
    private $dateToDeliver;
    private $service1;
    private $service2;

	public function __construct() {
        $this->serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : null;
		$this->time = isset($_POST['time']) ? $_POST['time'] : null;
		$this->dateToDeliver = isset($_POST['dateToDeliver']) ? $_POST['dateToDeliver'] : null;
		$this->service1 = isset($_POST['service1']) ? $_POST['service1'] : 0;
		$this->service2 = isset($_POST['service2']) ? $_POST['service2'] : 0;
	}

	public function food_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $time_now = time();
        $format_time = date("Y-m-d",$time_now);
        $serviceToken = rand(10, 100000);

        if(empty($this->service1) && empty($this->service2)){
            echo "<script type=\"text/javascript\">alert('请选择您想要的服务类型! ');window.history.back();</script>"; 
            exit();
        }

        if(empty($this->serviceType) || empty($this->time) || empty($this->dateToDeliver)){
            echo "<script type=\"text/javascript\">alert('您没有填写相应信息! ');window.history.back();</script>"; 
        }else{
            if($this->check_dateToDelivery()){
                $food_service_query = "INSERT INTO food_service (user, serviceToken, time, service1, service2, dateToDeliver) VALUES ('$user_id', '$serviceToken ', '$this->time', '$this->service1', '$this->service2', '$this->dateToDeliver')";
                if($mysqli->query($food_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了套餐, 谢谢.');window.history.back();</script>";
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }

                $history_query="INSERT INTO history (token, serviceType, user_id, time) VALUES ('$serviceToken', '$this->serviceType', '$user_id', '$format_time')";
                if($mysqli->query($history_query)){
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }
            }else{
                echo "<script type=\"text/javascript\">alert('请提前5个小时预定套餐! ');window.history.back();</script>";
            }
        }
    }
    
    public function check_dateToDelivery(){
        $date = $this->time;
        $d = new DateTime();
        $current = date("Y/m/d");
        if($date == $current){
            // Check which type of order customer can get
            if(date('H')+5 >= 8 && $this->dateToDeliver == '早'){
                return false;
            }else if(date('H')+5 >= 12 && $this->dateToDeliver == '中'){
                return false;
            }else if(date('H')+5 >= 18 && $this->dateToDeliver == '晚'){
                return false;
            }
        }
        return true;
    }
}
?>
