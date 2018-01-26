<?php


class AccessAd{

    public function accessAdmin(){
        global $mysqli;
        $isAdminLogin =  $_COOKIE['isAdminLogin'];
		$check_query = "SELECT * FROM admin WHERE password = '$isAdminLogin'";
        $result = $mysqli->query($check_query);
		if($result->num_rows > 0){
            $result_retrieve = $result->fetch_assoc();
            $permissions =  explode( '/',$result_retrieve['permission']);
            foreach($permissions as $permission){
                /* Check for permission: 
                    1.用户管理
                    2.医疗接送
                    3.订餐服务
                    4.采购服务
                    5.住房维修
                    6.出行服务
                    7.孕产服务
                */
                if($permission === "1"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./user_permission.php\">用户管理</a><br/>   
                    ");
                }
                if($permission === "2"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./\">医疗接送</a><br/>  
                    ");
                }
                if($permission === "3"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_food.php?pageType=summary\">订餐服务</a><br/>   
                    ");
                }
                if($permission === "4"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./\">采购服务</a><br/>   
                    ");
                }
                if($permission === "5"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_repair.php?pageType=today\">住房维修</a><br/>   
                    ");
                }
                if($permission === "6"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_pickup.php?pageType=today\">出行服务</a><br/>   
                    ");
                }
                if($permission === "7"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_housekeeping.php?pageType=thisMonth\">孕产服务</a><br/>   
                    ");
                }
            }

        }else{
			echo "<script type=\"text/javascript\">alert('您的账户有问题，请联系管理员！ '); ;</script>";
		}
    }
}

?>