<?php if(!defined('In_System')) exit("Access Denied");
    

class Profile{

    public function generateInfo(){
        GLOBAL $mysqli;
        $salt =  $_COOKIE['uid'];

        $profile_query = "SELECT * FROM users WHERE salt = '$salt'";
		$profile_exist = $mysqli->query($profile_query);
		if($profile_exist->num_rows > 0){
            $profile_retrieve = $profile_exist->fetch_assoc();
            echo sprintf("<form action=\"./form_function.php\" method=\"post\">
                        <input type=\"hidden\" name=\"username\" value=%s>
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
                        <input tyle=\"text\" name=\"address\" value=%s>
                        </div>
                        <br/>
                        <button type=\"submit\" class=\"btn btn-primary\" name=\"update_user\">确认修改</button>
                </form>", $profile_retrieve['username'], $profile_retrieve['username'], $profile_retrieve['phone'], $profile_retrieve['email'], $profile_retrieve['weChat'], $profile_retrieve['timeDeliver'], $profile_retrieve['address']);
            /*cookies expire in 7 days*/
			return 1;
		}else{
			return 0;
		}
        $profile_exist->free();
    }

}
?>