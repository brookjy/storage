<?php if(!defined('In_System')) exit("Access Denied");
Class Repair{
    public $time = "";
    public $date;
    public function totalQuery($time) {
        return "select sum(water), sum(gas), sum(electric), sum(other) from repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(".$time.")";
    }
    public function todayListing(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE())";
        $this->time = "今天";
        $this->showResult($query, $this -> totalQuery("CURDATE()"));
    }

    public function tomorrowListing(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 1 DAY)";
        $this->time = "明天";
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 1 DAY"));
    }

    public function twoDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 2 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+2 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 2 DAY"));
    }

    public function threeDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 3 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+3 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 3 DAY"));
    }

    public function fourDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 4 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+4 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 4 DAY"));
    }

    public function fiveDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,repair_service.water,repair_service.gas,repair_service.electric,repair_service.other,repair_service.additionalNote FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 5 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+5 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 5 DAY"));
    }

    public function showResult($query,$totalQuery) {
        $pageString="";
        $tableString ="
        <div class=\"table-responsive\">
        <table class=\"table table-bordered\">
        <thead> 
        <tr>
            <th>#</th>
            <th>姓名</th>
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
        $rs = $mysqli->query( $totalQuery );
        $row = $rs->fetch_assoc();
        $water=$row['sum(water)'];
        $gas=$row['sum(gas)'];
        $electric=$row['sum(electric)'];
        $other=$row['sum(other)'];
        if(sizeof($result->data) > 0){
            foreach($result->data as $Summary){
                $row = "
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\">".$Summary['phone']."</a></td> 
                        <td>".$Summary['water']."</td> 
                        <td>".$Summary['gas']."</td> 
                        <td>".$Summary['electric']."</td> 
                        <td>".$Summary['other']."</td> 
                        <td>".$Summary['additionalNote']."</td> 
                    </tr>
            ";
            $tableString=$tableString.$row;
            }
            $tableString=$tableString.
            "</tbody>
            </table>
            </div>";
            $pageType = $_GET['pageType'];
            if (!isset($pageType)) {
                printf("undefined pageType");
                exit();
            }
             echo sprintf( "<h5>%s一共%d项水、%d项气、%d项电、%d项其他维修</h5>",$this->time, $water,$gas,$electric,$other);
             $pageString=$Paginator->createLinks($pageType,$links, 'pagination pagination-sm');
            }else{
            $tableString=$tableString."</table></div>";
        }
        echo $tableString;
        echo $pageString;
    }
}?>