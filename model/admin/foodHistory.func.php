<?php if(!defined('In_System')) exit("Access Denied");


Class FoodHistory{

    public function historyListing(){
        global $mysqli;

        $histories_query="SELECT users.uid,users.username,users.phone,users.address,food_service.time,food_service.dateToDeliver,food_service.service1,food_service.service2 FROM food_service INNER JOIN users ON users.salt=food_service.user";
        $result = mysqli_fetch_all($mysqli->query($histories_query), MYSQLI_ASSOC);
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
            foreach($result as $history){
                $type = ($history['service1']==1?"月子餐":"").' '.($history['service2']==1?"待产餐":"");
                echo sprintf("
                    <tr>
                        <td>%d</td>
                        <td>%s</td>
                        <td>%d</td> 
                        <td>%s</td> 
                        <td>%s</td> 
                        <td>%s</td> 
                    </tr>
                ", $history['uid'],$history['username'],$history['phone'],$history['address'], $history['time']. " " .$history['dateToDeliver'], $type);
            }
            echo "
                </table>
             ";
		}else{
            echo "
                <table class=\"table table-hover table-info\">
                    <tr>
                        <th>客户</th>
                        <th>预定时间</th>
                        <th>月子餐</th> 
                        <th>待产餐</th>
                        <th>具体时间</th>
                        <th>完成</th>
                    </tr>
                </table>
            ";
		}
    }
}