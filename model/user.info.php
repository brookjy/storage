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
                        <input type=\"hidden\" name=\"salt\" value=%s>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">用户名: </label>
                        <label>%s</label>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">电话: </label>
                        <input type=\"text\" name=\"phone\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">email: </label>
                        <input type=\"text\" name=\"email\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">微信: </label>
                        <input type=\"text\" name=\"weChat\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">预产期: </label>
                        <input type=\"date\" name=\"timeDeliver\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">地址: </label>
                        <label style=\"\" for=\"address\">%s </label>
                        </div>
                        <br/>
                        <button type=\"submit\" class=\"btn btn-primary\" name=\"update_user\">确认修改</button>
                </form>", $profile_retrieve['salt'], $profile_retrieve['username'], $profile_retrieve['phone'], $profile_retrieve['email'], $profile_retrieve['weChat'], $profile_retrieve['timeDeliver'], $profile_retrieve['address']);
            /*cookies expire in 7 days*/
			return 1;
		}else{
			return 0;
		}
        $profile_exist->free();
    }

    public function generateAddress(){
        GLOBAL $mysqli;
        $salt =  $_COOKIE['uid'];

        $profile_query = "SELECT * FROM users WHERE salt = '$salt'";
        $profile_exist = $mysqli->query($profile_query);
        if($profile_exist->num_rows > 0){
            $profile_retrieve = $profile_exist->fetch_assoc();
            echo sprintf("
                <input type=\"hidden\" name=\"origin_address\" value=\"%s\">
            ", $profile_retrieve['address']);
        }
    }

    public function checkPurchaseTime(){
        $this->checkTime();
        $this_thursday = date('Y-m-d', strtotime('thursday this week'));
        $dateNow = date("Y-m-d");
        // if ($dateNow > $this_thursday ){
        //     echo "<script type=\"text/javascript\">alert('抱歉, 每周只有周一至周四可以申请采购。下次早点预定吧！如果实在紧急，请致电 778-895-3579');window.history.back();</script>";
        //     exit();
        // }
    }

    public function checkTime(){
        GLOBAL $mysqli;
        $salt =  $_COOKIE['uid'];

        $today_fivePM = date('Y-m-d', strtotime('today')). " 17:00:00";
        $timeNow = date("Y-m-d H:i:s");
        
        if ($timeNow > $today_fivePM ){
            echo "<script type=\"text/javascript\">alert('抱歉, 5点后大家都下班了，不能预定了。下次早点预定吧！如果实在紧急，请致电 778-895-3579');window.history.back();</script>";
            exit();
        }
        $profile_query = "SELECT * FROM users WHERE salt = '$salt'";
        $profile_exist = $mysqli->query($profile_query);
        if($profile_exist->num_rows > 0){
            $profile_retrieve = $profile_exist->fetch_assoc();
            $address = $profile_retrieve['address'];
            if (empty($address)){
                echo "<script type=\"text/javascript\">alert('您需要一个地址.请致电 778-895-3579 联系管理员为您添加地址！');window.history.back();</script>";
                exit();
            }
        }else{
            echo "<script type=\"text/javascript\">alert('您需要一个地址才可以下单，请致电 778-895-3579 联系管理员为您添加地址！');window.history.back();</script>";
            exit();
        }
    }

}
?>