<?php if(!defined('In_System')) exit("Access Denied");

class Service{
    private $serviceType;
    private $time;
    private $dateToDeliver;
    private $service1;
    private $service2;
    private $additional;

	public function __construct() {
        $this->serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : null;
		$this->time = isset($_POST['time']) ? $_POST['time'] : null;
		$this->dateToDeliver = isset($_POST['dateToDeliver']) ? $_POST['dateToDeliver'] : null;
		$this->service1 = isset($_POST['service1']) ? $_POST['service1'] : 0;
        $this->service2 = isset($_POST['service2']) ? $_POST['service2'] : 0;
        $this->additional = isset($_POST['additional']) ? $_POST['additional'] : null;
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

    public function medical_service(){
		echo "<script type=\"text/javascript\">alert('$this->serviceType, $this->time, $this->addtional');</script>";
        global $mysqli;
        if($this->check_medical_date()){
            $medical_service_query = "INSERT INTO medical_service (serviceType, time,additional) VALUES ('$this->serviceType', '$this->time', '$this->additional')";
            $medical_service_retrieve = $mysqli->query($medical_service_query);
        }else{
            echo "<script type=\"text/javascript\">alert('请至少提前1天预定! ');window.history.back();</script>";
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

    public function check_medical_date(){
        
        return true;
    }

	public function genSalt($length = 6){
		$char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charLength = strlen($char);
		$salt = '';
		for($i = 0; $i < $length; $i++){
			$salt .= $char[rand(0, $charLength - 1)];
		}
		return $salt;
	}

	public function login(){
        GLOBAL $settings;

        //Check whethre the user is inside th system. 
		$valid = $this->validation();
		if($valid){
			/*cookies expire in 7 days*/
			echo "<script type=\"text/javascript\">window.location.replace(\"$this->currentpage\");</script>";
		}else{
			echo "<script type=\"text/javascript\">alert('您的账户不在系统内。\\n 请先注册我们的会员账户！');window.history.back();</script>";
		}
    }
    
    public function logout(){
        GLOBAL $settings;
        setcookie("islogin", "");
        setcookie("uid", "");
        echo "<script type=\"text/javascript\">window.location.replace(\"./\");</script>";
    }

	public function password_encrypt($salt){
		$password = hash('sha256', $this->password);
		$password .= $salt;
		return hash('sha256', $password);
	}

	public function register(){
        global $mysqli;

        /* Check if the user exist */
		if(empty($this->email) || empty($this->password) || empty($this->username) || empty($this->phone) || empty($this->weChat) || empty($this->timeDeliver)){
			echo "<script type=\"text/javascript\">alert('信息不全!');window.location.replace(\"$this->currentpage\");</script>";
		}else{
            // Check for duplicate users
            if(!$this->check_duplicate()){
                // Validate email and phone format
                if($this->email_validation() == TRUE && $this->phone_validation() == FALSE){
                    $time_now = time();
                    $format_time = date("Y-m-d",$time_now);
                    $salt = $this->genSalt();
                    $password = $this->password_encrypt($salt);
                    $new_member_query = "INSERT INTO users (username, phone, email, password, weChat, timeDeliver, create_time, role, salt) VALUES ('$this->username', '$this->phone', '$this->email', '$password', '$this->weChat', '$this->timeDeliver', '$format_time', 1,'$salt')";
                    if($mysqli->query($new_member_query)){
                        setcookie("uid", $salt, time()+86400);
                        setcookie("islogin", $salt, time()+86400);
                        echo "<script type=\"text/javascript\">alert('欢迎，您已注册成功!');window.location.replace(\"$this->currentpage\");</script>";
                    }else{
                        printf("Registration failure: %s\n", $mysqli->error);
                           exit();
                    }
                }else{
                    echo "<script type=\"text/javascript\">alert('您的Email或是电话格式不正确!');window.history.back();</script>";
                }
            }else{
                echo "<script type=\"text/javascript\">alert('用户已存在！');;window.history.back();</script>";
            }
		}
    }
    
    public function update_user(){
        global $mysqli;
        
        /* UPdate DB if the user change the user info data */
        $update_query = "UPDATE users SET phone='$this->phone', email='$this->email', weChat='$this->weChat', timeDeliver='$this->timeDeliver', address='$this->address' WHERE username = '$this->username' ";
        if($mysqli->query($update_query)){
            echo "<script type=\"text/javascript\">alert('您已成功修改信息！');window.location.replace(\"./\");</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }
    }

    /* Check the salt in DB */
	public function retrieve_salt(){
		global $mysqli;
		$salt_query = "SELECT salt FROM users WHERE username = '$this->username'";
        $salt_retrieve = $mysqli->query($salt_query);
		if($salt_retrieve->num_rows > 0){				
			$salt_result = $salt_retrieve->fetch_assoc();
			$salt = $salt_result['salt'];
		}else{
			return 'User not found';
        }
		return $salt;
    }
    
    /* Check if the record already exist in the databse */
    public function check_duplicate(){
        global $mysqli;
        $check_query = "SELECT * FROM users WHERE username = '$this->username'";
        $check_retrieve = $mysqli->query($check_query);
		if($check_retrieve->num_rows > 0){				
			$check_result = $check_retrieve->fetch_assoc();
            $typed_phone = $check_result['phone'];
            $typed_email = $check_result['email'];
            $typed_weChat = $check_result['weChat'];
            if ($typed_phone === $this->phone){
                return true;
            }
            if($typed_email === $this->email){
                return true;
            }
            if($typed_weChat === $this->weChat){
                return true;
            }
		}else{
			return false;
        }
		return false;
    }

	public function validation(){
		global $mysqli;
		$salt = $this->retrieve_salt();
		if(strcmp($salt, "User not found") == 0)
            return 0;
        
        // Check username and password match
		$request = $this->password_encrypt($salt, $this->password);
		$member_matching_query = "SELECT uid, salt FROM users WHERE username = '$this->username' AND password = '$request'";
		$member_matching = $mysqli->query($member_matching_query);
		if($member_matching->num_rows > 0){
            $member_retrieve = $member_matching->fetch_assoc();

            //update cookie
            setcookie("uid", $member_retrieve['salt'], time()+604800);
            setcookie("islogin", $member_retrieve['salt'], time()+604800);

            /*cookies expire in 7 days*/
			return $member_retrieve['uid'];
		}else{
			return 0;
		}
	}
	
	public function permission($check_user){
		global $mysqli;
		GLOBAL $settings;
		$member_matching_querys = "SELECT uid FROM `member_permission` WHERE `uid` = '$check_user' AND `allow_access_admin_page` = '1'";
		$member_matchings = $mysqli->query($member_matching_querys);
		if($member_matchings->num_rows > 0){
			echo "<script type=\"text/javascript\">alert('欢 迎 回 来!');window.location.replace(\"./admin.php\");</script>";
			setcookie("admin", $settings['true_value'], time()+86400);
			/*Set the time to 1 day and check valid in admin.php.*/
		}else{
			echo "<script type=\"text/javascript\">alert('您不是管理账户. ');window.history.back();</script>";
		}
	}

	public function admin_login(){
		global $mysqli;
		$check_user = $this->validation();
		$check_permission = $this->permission($check_user);
	}

}
?>
