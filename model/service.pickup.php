<?php if(!defined('In_System')) exit("Access Denied");

class Pickup_Service{
    private $date;
    private $time;
    private $departure;
    private $destination;
    private $num_ppl;
    private $additional;

	public function __construct() {
        $this->date = isset($_POST['date']) ? $_POST['date'] : null;
        $this->time = isset($_POST['time']) ? $_POST['time'] : null;
		$this->departure = isset($_POST['departure']) ? $_POST['departure'] : null;
        $this->destination = isset($_POST['destination']) ? $_POST['destination'] : null;
        $this->num_ppl = isset($_POST['num_ppl']) ? $_POST['num_ppl'] : null;
        $this->additional = isset($_POST['additional']) ? $_POST['additional'] : null;
	}

	public function pickup_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $serviceToken = rand(10, 100000);
        $time_now = time();
        $format_time = date("Y-m-d",$time_now);
        
        if(empty($this->time) || empty($this->num_ppl)){
            echo "<script type=\"text/javascript\">alert('请选择您想要的服务时间和人数! ');window.history.back();</script>"; 
        } else{
            if($this->check_dateToDelivery()){
                $pickup_service_query = "INSERT INTO pickup_service (user, serviceToken, date, time, departure, destination, num_ppl, additional) 
                VALUES ('$user_id', '$serviceToken ', '$this->date', '$this->time', '$this->departure', '$this->destination', '$this->num_ppl', '$this->additional')";
                if($mysqli->query($pickup_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了接送服务, 谢谢.');window.location.href = 'panel.php' ;</script>";
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }

                $history_query="INSERT INTO history (token, serviceType, user_id, time) 
                VALUES ('$serviceToken', '接送服务', '$user_id', '$format_time')";
                if($mysqli->query($history_query)){
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }

                $update_pickup_query = "UPDATE users SET pickup = pickup -1 WHERE salt = '$user_id'";
                if($mysqli->query($update_pickup_query)){
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }
            }else{
                echo "<script type=\"text/javascript\">alert('请提前一天预定接送服务! ');window.history.back();</script>";
            }
        }
    }
    
    public function check_dateToDelivery() {
        $date = $this->date;
        
        $d = new DateTime('tomorrow');
        $current = $d->format('Y-m-d');
        if ($date >= $current){
            return true;
        }
        return false;
    }
}
?>