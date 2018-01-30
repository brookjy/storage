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
                            <option value=\"RIVA 517-7008 River Rd\">RIVA 517-7008 River Rd</option>
                            <option value=\"Mandarin 767-6288 No.3 Rd\">Mandarin 767-6288 No.3 Rd</option>
                            <option value=\"Ora 1003-6200 River Rd\">Ora 1003-6200 River Rd</option>
                            <option value=\"Ora 602-6200 River Rd\">Ora 602-6200 River Rd</option>
                            <option value=\"Ora 910-6200 River Rd\">Ora 910-6200 River Rd</option>
                            <option value=\"Ora 603-6971 River Rd\">Ora 603-6971 River Rd</option>
                            <option value=\"Ora 305-6971 Hollybridge Way\">Ora 305-6971 Hollybridge Way</option>
                            <option value=\"Ora 603-6971 Hollybridge Way\">Ora 603-6971 Hollybridge Way</option>
                            <option value=\"Ora 1502-6971 Hollybridge Way\">Ora 1502-6971 Hollybridge Way</option>
                            <option value=\"Ora 1503-6971 Hollybridge Way\">Ora 1503-6971 Hollybridge Way</option>
                            <option value=\"Ora 703-6971 Hollybridge Way\">Ora 703-6971 Hollybridge Way</option>
                            <option value=\"Ora 702-6951 Hollybridge Way\">Ora 702-6951 Hollybridge Way</option>
                            <option value=\"Ora 703-6951 Hollybridge Way\">Ora 703-6951 Hollybridge Way</option>
                            <option value=\"Ora 506-6951 Hollybridge Way\">Ora 506-6951 Hollybridge Way</option>
                            <option value=\"Ora 1103-6951 Hollybridge Way\">Ora 1103-6951 Hollybridge Way</option>
                            <option value=\"Ora 507-6951 Hollybridge Way\">Ora 507-6951 Hollybridge Way</option>
                            <option value=\"Ora 1202-6951 Hollybridge Way\">Ora 1202-6951 Hollybridge Way</option>
                            <option value=\"Ora 5007-5511 Hollybridge Way\">Ora 5007-5511 Hollybridge Way</option>
                            <option value=\"River Pard 1310-5233 Gilbert Rd\">River Pard 1310-5233 Gilbert Rd</option>
                            <option value=\"Quintet 1003-7788 Ackroyd Rd\">Quintet 1003-7788 Ackroyd Rd</option>
                            <option value=\"Quintet 1201-7788 Ackroyd Rd\">Quintet 1201-7788 Ackroyd Rd</option>
                            <option value=\"Quintet 1501-7788 Ackroyd Rd\">Quintet 1501-7788 Ackroyd Rd</option>
                            <option value=\"Quintet 311-7988 Ackroyd Rd\">Quintet 311-7988 Ackroyd Rd</option>
                            <option value=\"Quintet 712-7988 Ackroyd Rd\">Quintet 712-7988 Ackroyd Rd</option>
                            <option value=\"Quintet 719-7988 Ackroyd Rd\">Quintet 719-7988 Ackroyd Rd</option>
                            <option value=\"Quintet 1215-7988 Ackroyd Rd\">Quintet 1215-7988 Ackroyd Rd</option>
                            <option value=\"Cadence 810-7468 Lansdowne Rd\">Cadence 810-7468 Lansdowne Rd</option>
                            <option value=\"Cadence 1002-7488 Lansdowne Rd\">Cadence 1002-7488 Lansdowne Rd</option>
                            <option value=\"9320 Gormond Rd Richmond V7E1N5\">9320 Gormond Rd Richmond V7E1N5</option>
                            <option value=\"3400 Raymond Ave Richmond V7E1A9\">3400 Raymond Ave Richmond V7E1A9</option>
                            <option value=\"3331 Bourmond Ave Richmond V7E1A1\">3331 Bourmond Ave Richmond V7E1A1</option>
                            <option value=\"5620 Lancing Rd Richmond V7C3A6\">5620 Lancing Rd Richmond V7C3A6</option>

                        </select>
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

    public function checkLocker(){
        GLOBAL $mysqli;
        $salt =  $_COOKIE['uid'];

        $profile_query = "SELECT * FROM users WHERE salt = '$salt'";
        $profile_exist = $mysqli->query($profile_query);
        if($profile_exist->num_rows > 0){
            $profile_retrieve = $profile_exist->fetch_assoc();
            $address = $profile_retrieve['address'];
            if (empty($address)){
                echo "<script type=\"text/javascript\">alert('您需要一个地址.任何问题请联系管理员！');window.history.back();</script>";
                exit();
            }
            $purchase_query = "SELECT * FROM purchase_service WHERE origin_address = '$address'";
            $purchase_exist = $mysqli->query($purchase_query);
            if($purchase_exist->num_rows > 0){
                echo "<script type=\"text/javascript\">alert('您的房屋已经预定了.任何问题请联系管理员！');window.history.back();</script>";
                exit();
            }
        }else{
            echo "<script type=\"text/javascript\">alert('您需要一个地址以便下单.');window.history.back();</script>";
            exit();
        }
    }

}
?>