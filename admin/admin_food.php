<?php     //Check if the admin is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }


Class admin_food{

    public function admin_foodListing($input){
        global $mysqli;
        $food_query="";
        if($input == "breakfast"){
            $food_query="SELECT users.uid,users.username,users.phone,users.address,food_service.time,food_service.dateToDeliver,food_service.service1,food_service.service2 FROM food_service INNER JOIN users ON users.salt=food_service.user";
        } elseif($input == "lunch"){
            $food_query="SELECT users.uid,users.username,users.phone,users.address,food_service.time,food_service.dateToDeliver,food_service.service1,food_service.service2 FROM food_service INNER JOIN users ON users.salt=food_service.user";
        } elseif($input == "dinner"){
            $food_query="SELECT users.uid,users.username,users.phone,users.address,food_service.time,food_service.dateToDeliver,food_service.service1,food_service.service2 FROM food_service INNER JOIN users ON users.salt=food_service.user";
        } 
        $result = mysqli_fetch_all($mysqli->query($food_query), MYSQLI_ASSOC);
		if(sizeof($result) > 0){
            echo "
            <table class=\"table table-hover table-info\">
                <tr>
                    <th>ID</th>
                    <th>客户名</th>
                    <th>电话</th>
                    <th>地址</th>
                    <th>预定时间</th>
                    <th>种类</th> 
                </tr>
            ";
            foreach($result as $Detail){
                $type = ($Detail['service1']==1?"月子餐":"").' '.($Detail['service2']==1?"待产餐":"");
                echo sprintf("
                    <tr>
                        <td>%d</td>
                        <td>%s</td>
                        <td>%d</td> 
                        <td>%s</td> 
                        <td>%s</td> 
                        <td>%s</td> 
                    </tr>
                ", $Detail['uid'],$Detail['username'],$Detail['phone'],$Detail['address'], $Detail['time']. " " .$Detail['dateToDeliver'], $type);
            }
            echo "
                </table>
             ";
		}else{
            echo "
                <table class=\"table table-hover table-info\">
                    <tr>
                        <th>ID</th>
                        <th>客户名</th>
                        <th>电话</th>
                        <th>地址</th>
                        <th>预定时间</th>
                        <th>种类</th> 
                    </tr>
                </table>
            ";
		}
    }
}