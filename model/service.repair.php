<?php if(!defined('In_System')) exit("Access Denied");

class Repair_Service{
    private $time;
    private $water;
    private $gas;
    private $electric;
    private $other;
    private $additionalNote;

	public function __construct() {
		$this->time = isset($_POST['time']) ? $_POST['time'] : null;
        $this->water = isset($_POST['water']) ? $_POST['water'] : 0;
        $this->gas = isset($_POST['gas']) ? $_POST['gas'] : 0;
        $this->electric = isset($_POST['electric']) ? $_POST['electric'] : 0;
        $this->other = isset($_POST['other']) ? $_POST['other'] : 0;
        $this->additionalNote = isset($_POST['additionalNote']) ? $_POST['additionalNote'] : null;
	}

	public function repair_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $serviceToken = rand(10, 100000);
        $time_now = time();
        $format_time = date("Y-m-d",$time_now);
        
        if(empty($this->water) && empty($this->gas) && empty($this->electric) && empty($this->other) ){
            echo "<script type=\"text/javascript\">alert('请选择您想要的服务类型! ');window.history.back();</script>"; 
            exit();
        }

        if(empty($this->time)){
            echo "<script type=\"text/javascript\">alert('请选择您想要的服务时间! ');window.history.back();</script>"; 
        } else{
            // echo "<script type=\"text/javascript\">alert('$this->time, $this->water,$this->gas,$this->electric,$this->other,$this->additionalNote! ');window.history.back();</script>"; 
            if($this->check_dateToDelivery()){
                $medical_service_query = "INSERT INTO repair_service (user, serviceToken, time, water, gas, electric, other, additionalNote) 
                VALUES ('$user_id', '$serviceToken', '$this->time', '$this->water', '$this->gas', '$this->electric', '$this->other', '$this->additionalNote')";
                if($mysqli->query($medical_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了住房维修。谢谢.');window.history.back();</script>";
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }

                $history_query="INSERT INTO history (token, serviceType, user_id, time) 
                VALUES ('$serviceToken', '住房维修', '$user_id', '$format_time')";
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