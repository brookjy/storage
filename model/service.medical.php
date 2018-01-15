<?php if(!defined('In_System')) exit("Access Denied");

class Medical_Service{
    private $serviceType;
    private $medicalServiceType;
    private $time;
    private $additional;

	public function __construct() {
        $this->serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : null;
        $this->medicalServiceType = isset($_POST['medicalServiceType']) ? $_POST['medicalServiceType'] : null;
		$this->time = isset($_POST['time']) ? $_POST['time'] : null;
		$this->additional = isset($_POST['additional']) ? $_POST['additional'] : null;
	}

	public function medical_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $serviceToken = rand(10, 100000);
        $time_now = time();
        $format_time = date("Y-m-d",$time_now);
        
        if(empty($this->serviceType)){
            echo "<script type=\"text/javascript\">alert('请选择您想要的服务类型! ');window.history.back();</script>"; 
            exit();
        }

        if(empty($this->time)){
            echo "<script type=\"text/javascript\">alert('请选择您想要的服务时间! ');window.history.back();</script>"; 
        } else{
            if($this->check_dateToDelivery()){
                $medical_service_query = "INSERT INTO medical_service (user, serviceToken, medicalServiceType, time, additional) 
                VALUES ('$user_id', '$serviceToken ', '$this->medicalServiceType', '$this->time', '$this->additional')";
                if($mysqli->query($medical_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了医疗接送, 谢谢.');window.history.back();</script>";
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }

                $history_query="INSERT INTO history (token, serviceType, user_id, time) 
                VALUES ('$serviceToken', '$this->serviceType', '$user_id', '$format_time')";
                if($mysqli->query($history_query)){
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }
            }else{
                echo "<script type=\"text/javascript\">alert('请提前一天预定医疗接送服务! ');window.history.back();</script>";
            }
        }
    }
    
    public function check_dateToDelivery() {
        $date = $this->time;
        $d = new DateTime();
        $current = $d->format('Y-m-d');
        if ($date > $current){
            return true;
        }
        else return false;
    }
}
?>