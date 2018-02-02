<?php if(!defined('In_System')) exit("Access Denied");

class User_Permission{
    private $aid;
    private $address;
    private $type;
    private $lat;
    private $lng;
    private $update_at;

    public function __construct() {
        $this->aid = isset($_POST['aid']) ? $_POST['aid'] : null;
        $this->address = isset($_POST['address']) ? $_POST['address'] : null;
        $this->type = isset($_POST['type']) ? $_POST['type'] : null;
        $this->lat = isset($_POST['lat']) ? $_POST['lat'] : null;
        $this->lng = isset($_POST['lng']) ? $_POST['lng'] : null;
        $this->update_at = isset($_POST['update_at']) ? $_POST['update_at'] : null;
    }
    
    public function generatePermission(){
        GLOBAL $mysqli;

        $map_query = "SELECT * FROM address";
        $results = mysqli_fetch_all($mysqli->query($map_query), MYSQLI_ASSOC);
		if(sizeof($results) > 0){
            echo sprintf(" 
            <div class=\"table-responsive\">
                <table class=\"table table-bordered\">
                <thead> 
                    <tr> 
                        <th>addressID</th>  
                        <th>地址</th>
                        <th>类别</th> 
                        <th>纬度</th> 
                        <th>经度</th> 
                        <th>删掉</th>
                    </tr> 
                </thead> 
                <tbody> 
            ");
            foreach( $results as $result){
                echo sprintf(" 
                            <form action=\"./edit.php\" method=\"post\">
                            <tr>
                            <th scope=row><input type=\"hidden\" name= \"aid\" value= %d>%d</th>
                                <td>%s</td> 
                                <td>%s</td> 
                                <td>%s</td> 
                                <td>%s</td> 
                                <td><button tyle=\"submit\" class=\"btn btn-info\" name=\"map_delete\">删除</button></td> 
                            </tr> 
                            </form>
                ", $result['aid'],$result['aid'], $result['address'],  $result['type'], $result['lat'], $result['lng']);
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

        $map_query = "SELECT * FROM address WHERE aid = '$this->aid'";
		$profile_exist = $mysqli->query($map_query);
		if($profile_exist->num_rows > 0){
            $profile_retrieve = $profile_exist->fetch_assoc();
            echo sprintf("<form action=\"./admin_function.php\" method=\"post\">

                        <input type=\"hidden\" name=\"salt\" value=%s>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">用户名: </label>
                        <label>%s</label>
                        </div>
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
                        <label style=\"width:80px;\">剩余出行: </label>
                        <input tyle=\"text\" name=\"type\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">出行总数: </label>
                        <input tyle=\"text\" name=\"lat\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">剩余医疗: </label>
                        <input tyle=\"text\" name=\"lng\" value=%d>
                        </div>
                        <br/>
                        <button type=\"submit\" class=\"btn btn-primary\" name=\"update_user\">确认修改</button>
                        <button type=\"submit\" class=\"btn btn-danger\" name=\"delete_user\">删除用户</button>
                </form>", $profile_retrieve['aid'], $profile_retrieve['address'], $profile_retrieve['type'], $profile_retrieve['lat'], $profile_retrieve['lng']);
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
        $update_query = "UPDATE users SET phone='$this->phone', email='$this->email', weChat='$this->weChat', timeDeliver='$this->timeDeliver', address='$this->address', type ='$this->type', lat ='$this->lat', lng='$this->lng', update_at ='$this->update_at', isActive='$this->isActive' WHERE salt = '$this->salt' ";
        if($mysqli->query($update_query)){
            echo "<script type=\"text/javascript\">alert('您已成功修改信息！');window.location.replace('/admin/user_permission.php');</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

    }

    public function delete_user(){
        GLOBAL $mysqli;
        
        /* Delete DB if the user change or junk*/
        $Delete_query = "DELETE FROM users WHERE salt = '$this->salt' ";
        if($mysqli->query($Delete_query)){
            echo "<script type=\"text/javascript\">alert('您已成功修改信息！');window.location.replace('/admin/user_permission.php');</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

    }
}   
?>