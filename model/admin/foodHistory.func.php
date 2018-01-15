<?php if(!defined('In_System')) exit("Access Denied");


Class FoodHistory{

    public function historyListing(){
        global $mysqli;
        $histories_query="SELECT * FROM food_service";
        $result = mysqli_fetch_all($mysqli->query($histories_query), MYSQLI_ASSOC);
		if(sizeof($result) > 0){
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
            ";
            foreach($result as $history){
                echo sprintf("
                    <tr>
                        <td>%s</td>
                        <td>%s</td> 
                        <td>%d</td> 
                        <td>%d</td> 
                        <td>%s</td> 
                        <td>%d</td> 
                    </tr>
                ", $history['user'], $history['time'], $history['service1'], $history['service2'], $history['dateToDeliver'] , $history['finish']    );
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