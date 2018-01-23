<?php if(!defined('In_System')) exit("Access Denied");

class Admin{
    private $username;
	private $password;
	private $permission;

    public function __construct() {
        $this->username = isset($_POST['username']) ? $_POST['username'] : null;
		$this->password = isset($_POST['password']) ? $_POST['password'] : null;
	}

    public function admin_login(){ 
		$check_user = $this->validateAdmin();
		if($check_user){
			echo "<script type=\"text/javascript\">alert('欢 迎 回 来!');window.location.replace(\"../admin/admin_access.php\");</script>";
			setcookie("admin", $this->permission, time()+86400);
			setcookie("isAdminLogin", $this->username, time()+604800);
			/*Set the time to 1 day and check valid in admin.php.*/
		}else{
			echo "<script type=\"text/javascript\">alert('您输入的信息有误. ');window.history.back();</script>";
		}
    }

    public function validateAdmin(){
		global $mysqli;
		$admin_matching_query = "SELECT permission FROM admin WHERE username = '$this->username' AND password = '$this->username'";
		$admin_matching = $mysqli->query($admin_matching_query);
		if($admin_matching->num_rows > 0){
			$this->permission = $admin_matching->fetch_assoc()["permission"];
			return true;
		}else{
			return false;
		}
	}








}