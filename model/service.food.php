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
		echo "<script type=\"text/javascript\">alert('$this->serviceType, $this->time, $this->dateToDeliver, $this->service1, $this->service2');</script>";
        global $mysqli;
        if($this->check_dateToDelivery()){
            $food_service_query = "INSERT INTO food_service (serviceType, time, service1, service2, dateToDeliver) VALUES ('$this->serviceType', '$this->time', '$this->service1', '$$this->service2', '$this->dateToDeliver')";
            $food_service_retrieve = $mysqli->query($food_service_query);
        }else{
            echo "<script type=\"text/javascript\">alert('请提前5个小时预定套餐! ');window.history.back();</script>";
        }
    }
    
    public function check_dateToDelivery(){
        $date = $this->time;
        $d = new DateTime();
        $current = $d->format('Y/m/d');
        if($date == $current){
            // Check which type of order customer can get
            if(date('H')+5 >= 8 && $this->dateToDeliver == 'morning'){
                return false;
            }else if(date('H')+5 >= 12 && $this->dateToDeliver == 'noon'){
                return false;
            }else if(date('H')+5 >= 21 && $this->dateToDeliver == 'night'){
                return false;
            }
        }
        return true;
    }
}
?>
