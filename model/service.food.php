<?php if(!defined('In_System')) exit("Access Denied");

class Food_Service{
    private $serviceType;
    private $startDate;
    private $endDate;
    private $startTime;
    private $endTime;
    private $address;
    private $token;
    private $ppl;

	public function __construct() {
        $this->serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : null;
		$this->startDate = isset($_POST['startDate']) ? $_POST['startDate'] : null;
		$this->endDate = isset($_POST['endDate']) ? $_POST['endDate'] : null;
		$this->startTime = isset($_POST['startTime']) ? $_POST['startTime'] : null;
        $this->endTime = isset($_POST['endTime']) ? $_POST['endTime'] : null;
		$this->address = isset($_POST['address']) ? $_POST['address'] : null;
        $this->token = isset($_POST['token']) ? $_POST['token'] : null;
        $this->ppl = isset($_POST['ppl']) ? $_POST['ppl'] : 1;
	}

	public function food_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $time_now = time();
        $format_time = date("Y-m-d",$time_now);
        $serviceToken = rand(10, 100000);

        if(empty($this->serviceType) || empty($this->startDate) || empty($this->endDate) || empty($this->startTime) || empty($this->endTime) || empty($this->address) ){
            echo "<script type=\"text/javascript\">alert('您没有填写相应信息! ');window.history.back();</script>"; 
            exit();
        }else{
            if($this->check_dateToDelivery()){
                $food_service_query = "INSERT INTO food_service (user, serviceToken, serviceType, startDate, startTime, endDate, endTime, address) VALUES ('$user_id', '$serviceToken ', '$this->serviceType', '$this->startDate', '$this->startTime', '$this->endDate', '$this->endTime', '$this->address')";
                if($mysqli->query($food_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了套餐, 谢谢.');window.location.replace(\"./panel.php\");</script>";
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
        $sDate = $this->startDate;
        $eDate = $this->endDate;
        $d = new DateTime();
        $current = date("Y/m/d");
        if($sDate == $current){
            // Check which type of order customer can get
            if(date('H')+5 >= 8 && $this->startTime == '早'){
                return false;
            }else if(date('H')+5 >= 12 && $this->startTime == '中'){
                return false;
            }else if(date('H')+5 >= 18 && $this->startTime == '晚'){
                return false;
            }
        }
        if($eDate < $sDate){
            echo "<script type=\"text/javascript\">alert('开始时间，结束时间不对。');window.history.back();</script>";
            exit();
        }
        return true;
    }

    public function food_delete(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $delete_query = "DELETE FROM food_service WHERE serviceToken = '$this->token'";
        if($mysqli->query($delete_query)){
            echo "<script type=\"text/javascript\">alert('您已经成功修改, 谢谢.');window.location.replace(\"./panel.php\");</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

        $history_delete_query = "DELETE FROM history WHERE token = '$this->token'";
        if($mysqli->query($delete_query)){
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

    }

    public function foodcpy_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $time_now = time();
        $format_time = date("Y-m-d",$time_now);
        $serviceToken = rand(10, 100000);

        if(empty($this->ppl) || empty($this->startDate) || empty($this->endDate) || empty($this->startTime) || empty($this->endTime) || empty($this->address) ){
            echo "<script type=\"text/javascript\">alert('您没有填写相应信息! ');window.history.back();</script>"; 
            exit();
        }else{
            if($this->check_dateToDelivery()){
                $food_service_query = "INSERT INTO food_service (user, serviceToken, serviceType, startDate, startTime, endDate, endTime, address, num_ppl) VALUES ('$user_id', '$serviceToken ', '待产餐', '$this->startDate', '$this->startTime', '$this->endDate', '$this->endTime', '$this->address', '$this->ppl' )";
                if($mysqli->query($food_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了套餐, 谢谢.');window.location.replace(\"./panel.php\");</script>";
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
}
?>
