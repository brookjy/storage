<?php if(!defined('In_System')) exit("Access Denied");
Class Pickup{
    public $time = "";
    public $date;
    public function todayListing(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE())";
        $this->time = "今天";
        $this->showResult($query);
    }

    public function tomorrowListing(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE()+ INTERVAL 1 DAY)";
        $this->time = "明天";
        $this->showResult($query);
    }

    public function twoDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE()+ INTERVAL 2 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+2 day')->format('m-d');
        $this->showResult($query);
    }

    public function threeDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE()+ INTERVAL 3 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+3 day')->format('m-d');
        $this->showResult($query);
    }

    public function fourDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE()+ INTERVAL 4 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+4 day')->format('m-d');
        $this->showResult($query);
    }

    public function fiveDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE()+ INTERVAL 5 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+5 day')->format('m-d');
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
            <th>时间</th>
            <th>出发地</th>
            <th>目的地</th>
            <th>人数</th>
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
            $total=0;
            foreach($result->data as $Summary){
                $row = "
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\">".$Summary['phone']."</a></td> 
                        <td>".$Summary['time']."</td> 
                        <td>".$Summary['departure']."</td> 
                        <td>".$Summary['destination']."</td> 
                        <td>".$Summary['num_ppl']."</td> 
                        <td>".$Summary['additional']."</td> 
                    </tr>
            ";
            $tableString=$tableString.$row;
            $total++;
            }
            $tableString=$tableString.
            "</tbody>
            </table>
            </div>";
            $pageType = $_GET['pageType'];
             echo sprintf( "<h5>%s一共%d项接送服务</h5>",$this->time, $total);
             $pageString=$Paginator->createLinks($pageType,$links, 'pagination pagination-sm');
            }else{
            $tableString=$tableString."</table></div>";
        }
        echo $tableString;
        echo $pageString;
    }
}?>