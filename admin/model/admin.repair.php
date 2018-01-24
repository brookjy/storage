<?php if(!defined('In_System')) exit("Access Denied");
Class Repair{
    public $time = "";
    public function todayListing(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE())";
        $this->time = "今天";
        $this->showResult($query);
    }

    public function tomorrowListing(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 1 DAY)";
        $this->time = "明天";
        $this->showResult($query);
    }

    public function twoDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 2 DAY)";
        $this->time = "今天中午";
        $this->showResult($query);
    }

    public function threeDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 3 DAY)";
        $this->time = "今天晚上";
        $this->showResult($query);
    }

    public function fourDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 4 DAY)";
        $this->time = "明天早上";
        $this->showResult($query);
    }

    public function fiveDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 5 DAY)";
        $this->time = "明天中午";
        $this->showResult($query);
    }

    public function showResult($query) {
        $pageString="";
        $tableString ="
        <div class=\"table-responsive\">
        <table class=\"table table-bordered\">
        <thead> 
        <tr>
            <th>UID</th>
            <th>客户名</th>
            <th>电话</th>
            <th>水</th>
            <th>气</th>
            <th>电</th>
            <th>其他</th>
            <th>备注</th>
        </tr>
        </thead> 
        <tbody> 
        ";

        global $mysqli;
        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
        $Paginator  = new Paginator( $mysqli, $query);
        $result    = $Paginator->getData( $limit, $page);
		if(sizeof($result->data) > 0){
            $water=0;
            $gas=0;
            $electric=0;
            $other=0;
            foreach($result->data as $Summary){
                $row = "
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\"></a></td> 
                        <td>".$Summary['water']."</td> 
                        <td>".$Summary['gas']."</td> 
                        <td>".$Summary['electric']."</td> 
                        <td>".$Summary['other']."</td> 
                        <td>".$Summary['additionalNote']."</td> 
                    </tr>
            ";
            $tableString=$tableString.$row;
            $water+=$Summary['water'];
            $gas+=$Summary['gas'];
            $electric+=$Summary['electric'];
            $other+=$Summary['other'];
            }
            $tableString=$tableString.
            "</tbody>
            </table>
            </div>";
            $pageType = $_GET['pageType'];
             echo sprintf( "<h5>%s一共%d项水、%d项气、%d项电、%d项其他维修</h5>",$this->time, $water,$gas,$electric,$other);
             $pageString=$Paginator->createLinks($pageType,$links, 'pagination pagination-sm');
            }else{
            $tableString=$tableString."</table></div>";
        }
        echo $tableString;
        echo $pageString;
    }
}?>