<?php if(!defined('In_System')) exit("Access Denied");

class Medical_Service{
    private $serviceType;
    private $time;
    private $additional;

	public function __construct() {
        $this->serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : null;
		$this->time = isset($_POST['time']) ? $_POST['time'] : null;
		$this->additional = isset($_POST['additional']) ? $_POST['additional'] : null;
	}

	public function medical_service(){
		echo "<script type=\"text/javascript\">alert('$this->serviceType, $this->time, $this->additional');</script>";
        global $mysqli;
        if($this->check_dateToDelivery()){
            $medical_service_query = "INSERT INTO medical_service (serviceType, time, additional) VALUES ('$this->serviceType', '$this->time', '$this->additional')";
            $medical_service_retrieve = $mysqli->query($medical_service_query);
        }else{
            echo "<script type=\"text/javascript\">alert('请至少提前1天预定! ');window.history.back();</script>";
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