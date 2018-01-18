<?php if(!defined('In_System')) exit("Access Denied");

class Purchase_Service{
    private $origin_address;
    private $serviceType;
    private $property;
    private $potato;
    private $tomato;
    private $rice;

	public function __construct() {
        $this->origin_address = isset($_POST['origin_address']) ? $_POST['origin_address'] : null;
        $this->serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : null;
        $this->property = isset($_POST['property']) ? $_POST['property'] : null;
		$this->potato = isset($_POST['potato']) ? $_POST['potato'] : null;
		$this->tomato = isset($_POST['tomato']) ? $_POST['tomato'] : null;
        $this->rice = isset($_POST['rice']) ? $_POST['rice'] : null;
	}

	public function Purchase_Service(){
		global $mysqli;

        /* Check if the address is empty */
        if(empty($this->origin_address) || empty($this->property)){
            echo "<script type=\"text/javascript\">alert('缺少地址或者房屋类别!');window.history.back();</script>";
        }

        $user_id = $_COOKIE['uid'];
        $format_time = date("Y-m-d H:i:s");
        $serviceToken = rand(10, 100000);

        $purchase_query="INSERT INTO purchase_service (user, serviceToken, date, property, origin_address, potato, tomato, rice) VALUES ('$user_id', '$serviceToken', '$format_time', '$this->property', '$this->origin_address', '$this->potato', '$this->tomato', '$this->rice')";
        if($mysqli->query($purchase_query)){
            echo "<script type=\"text/javascript\">alert('恭喜，您的订单已经下单，查看订单请去历史记录!');window.location.href = 'panel.php' ;</script>";
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
    }
    
}
?>
