
<?php if(!defined('In_System')) exit("Access Denied");

include_once "paginator.php";

Class FoodSummary{

    public function foodSummaryListing(){
        global $mysqli;
        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
        $query="SELECT users.uid,users.username,users.phone,users.address,food_service.time,food_service.dateToDeliver,food_service.service1,food_service.service2 FROM food_service INNER JOIN users ON users.salt=food_service.user";
        $Paginator  = new Paginator( $mysqli, $query );
        $result    = $Paginator->getData( $limit, $page);
        //$result = mysqli_fetch_all($mysqli->query($query), MYSQLI_ASSOC);
		if(sizeof($result->data) > 0){
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
            foreach($result->data as $Summary){
                $type = ($Summary['service1']==1?"月子餐":"").' '.($Summary['service2']==1?"待产餐":"");
                echo sprintf("
                    <tr>
                        <td>%d</td>
                        <td>%s</td>
                        <td>%d</td> 
                        <td>%s</td> 
                        <td>%s</td> 
                        <td>%s</td> 
                    </tr>
                ", $Summary['uid'],$Summary['username'],$Summary['phone'],$Summary['address'], $Summary['time']. " " .$Summary['dateToDeliver'], $type);
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
        echo $Paginator->createLinks( $links, 'pagination' );
    }
}



