<?php if(!defined('In_System')) exit("Access Denied");

class User_Permission{
    private $salt;

    private $username;
    private $phone;
    private $email;
    private $password;
    private $weChat;
    private $timeDeliver;
    private $address;
    private $pickup;
    private $medicals;
    private $isActive;

    public function __construct() {
        $this->salt = isset($_POST['salt']) ? $_POST['salt'] : null;
        $this->username = isset($_POST['username']) ? $_POST['username'] : null;
		$this->phone = isset($_POST['phone']) ? $_POST['phone'] : null;
		$this->email = isset($_POST['email']) ? $_POST['email'] : null;
		$this->password = isset($_POST['password']) ? $_POST['password'] : null;
		$this->weChat = isset($_POST['weChat']) ? $_POST['weChat'] : null;
		$this->timeDeliver = isset($_POST['timeDeliver']) ? $_POST['timeDeliver'] : null;
        $this->address = isset($_POST['address']) ? $_POST['address'] : null;
        $this->pickup = isset($_POST['pickup']) ? $_POST['pickup'] : null;
        $this->medicals = isset($_POST['medicals']) ? $_POST['medicals'] : null;
        $this->isActive = isset($_POST['isActive']) ? $_POST['isActive'] : null;
    }
    
    public function generatePermission(){
        GLOBAL $mysqli;

        $profile_query = "SELECT * FROM users";
        $results = mysqli_fetch_all($mysqli->query($profile_query), MYSQLI_ASSOC);
		if(sizeof($results) > 0){
            echo sprintf(" 
            <div class=\"table-responsive\">
                <table class=\"table table-bordered\">
                <thead> 
                    <tr> 
                        <th>#</th> 
                        <th>姓名</th> 
                        <th>电话</th> 
                        <th>Email</th> 
                        <th>微信</th> 
                        <th>预产期</th> 
                        <th>出行接送</th> 
                        <th>医疗接送</th> 
                        <th>激活</th>
                        <th>修改</th>
                    </tr> 
                </thead> 
                <tbody> 
            ");
            foreach( $results as $result){
                echo sprintf(" 
                            <form action=\"./user_permission_detail.php\" method=\"post\">
                            <tr>
                                <th scope=row><input type=\"hidden\" name= \"salt\" value= %s>%d</th> 
                                <td>%s</td> 
                                <td>%d</td> 
                                <td>%s</td> 
                                <td>%s</td> 
                                <td>%s</td> 
                                <td>%d</td> 
                                <td>%d</td> 
                                <td>%d</td> 
                                <td><button tyle=\"submit\" class=\"btn btn-info\" name=\"user_modify\">修改</button></td> 
                            </tr> 
                            </form>
                ", $result['salt'], $result['uid'], $result['username'], $result['phone'], $result['email'], $result['weChat'], $result['timeDeliver'], $result['pickup'], $result['medicals'], $result['isActive']);
            }
            echo sprintf(" 
                    </tbody> 
                    </table>
                </div>");
			return 1;
		}else{
			return 0;
		}
        $results->free();
    }

    public function user_modify(){
        GLOBAL $mysqli;

        echo "<script type=\"text/javascript\">alert('$this->salt, haha');</script>";
        $profile_query = "SELECT * FROM users WHERE salt = '$this->salt'";
		$profile_exist = $mysqli->query($profile_query);
		if($profile_exist->num_rows > 0){
            $profile_retrieve = $profile_exist->fetch_assoc();
            echo sprintf("<form action=\"./admin_function.php\" method=\"post\">
                        <input type=\"hidden\" name=\"salt\" value=%s>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">用户名: </label>
                        <label>%s</label>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">电话: </label>
                        <input tyle=\"text\" name=\"phone\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">email: </label>
                        <input tyle=\"text\" name=\"email\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">微信: </label>
                        <input tyle=\"text\" name=\"weChat\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">预产期: </label>
                        <input tyle=\"text\" name=\"timeDeliver\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">地址: </label>
                        <select name=\"address\">
                            <option value=\"volvo\">Volvo</option>
                            <option value=\"saab\">Saab</option>
                            <option value=\"opel\">Opel</option>
                            <option value=\"audi\">Audi</option>
                        </select>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">出行接送: </label>
                        <input tyle=\"text\" name=\"pickup\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">医疗接送: </label>
                        <input tyle=\"text\" name=\"medicals\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">激活: </label>
                        <input tyle=\"text\" name=\"isActive\" value=%d>
                        </div>
                        <br/>
                        <button type=\"submit\" class=\"btn btn-primary\" name=\"update_user\">确认修改</button>
                </form>", $profile_retrieve['salt'], $profile_retrieve['username'], $profile_retrieve['phone'], $profile_retrieve['email'], $profile_retrieve['weChat'], $profile_retrieve['timeDeliver'], $profile_retrieve['pickup'], $profile_retrieve['medicals'], $profile_retrieve['isActive']);
            /*cookies expire in 7 days*/
			return 1;
		}else{
			return 0;
		}
        $profile_exist->free();
    }

    public function update_user(){
        GLOBAL $mysqli;

        /* UPdate DB if the user change the user info data */
        $update_query = "UPDATE users SET phone='$this->phone', email='$this->email', weChat='$this->weChat', timeDeliver='$this->timeDeliver', address='$this->address', pickup ='$this->pickup', medicals='$this->medicals', isActive='$this->isActive' WHERE salt = '$this->salt' ";
        if($mysqli->query($update_query)){
            echo "<script type=\"text/javascript\">alert('您已成功修改信息！');window.location.replace('/admin/user_permission.php');</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

    }
}   
?>