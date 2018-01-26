<?php if(!defined('In_System')) exit("Access Denied");
Class Food{
    public $time = "";
    public function totalQuery($condition1,$condition2) {
        //月子餐是type1,待产餐是type2
        $type1Pregnant = "select count(*) from food_service WHERE (food_service.serviceType='宝妈月子餐' and ".$condition1.") OR (food_service.serviceType='宝妈月子餐'".$condition2.")";
        $type2Pregnant = "select count(*) from food_service WHERE (food_service.serviceType='宝妈待产餐' and ".$condition1.") OR (food_service.serviceType='宝妈月子餐'".$condition2.")";
        $type2Family = "select sum(num_ppl) from food_service WHERE (".$condition1.") OR (food_service.serviceType='待产餐'".$condition2.")";
        $totalQuerys = [$type1Pregnant, $type2Pregnant, $type2Family];
        return $totalQuerys;
    }
    public function foodSummaryListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) <= DATE(CURDATE()) AND DATE(CURDATE()) <= DATE(food_service.endDate)) GROUP BY users.uid";
        $query2="SELECT users.uid,food_service.serviceType,food_service.address,food_service.num_ppl FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) <= DATE(CURDATE()) AND DATE(CURDATE()) <= DATE(food_service.endDate))";
        $this->time = "今天";
        $totalQuery = $this->totalQuery("( DATE(food_service.startDate) <= DATE(CURDATE()) AND DATE(CURDATE()) <= DATE(food_service.endDate))"," and( DATE(food_service.startDate) <= DATE(CURDATE()) AND DATE(CURDATE()) <= DATE(food_service.endDate))");
        $this->showResult($query1,$query2, $totalQuery);
    }

    public function thisBreakfastListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()) AND DATE(CURDATE()) <= DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()) AND food_service.startTime='早') GROUP BY users.uid";
        $query2="SELECT users.uid, food_service.serviceType, food_service.address, food_service.num_ppl FROM food_service INNER JOIN users ON users.salt = food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()) AND DATE(CURDATE()) <= DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()) AND food_service.startTime='早')";
        $this->time = "今天早上";
        $totalQuery = $this->totalQuery("( DATE(food_service.startDate) < DATE(CURDATE()) AND DATE(CURDATE()) <= DATE(food_service.endDate))", "and ( DATE(food_service.startDate) = DATE(CURDATE()) AND food_service.startTime='早')");
        $this->showResult($query1,$query2, $totalQuery);
    }

    public function thisLunchListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()) AND DATE(CURDATE()) < DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()) AND (food_service.startTime='早' OR food_service.startTime='中')) OR( DATE(food_service.endDate) = DATE(CURDATE()) AND (food_service.endTime='中' OR food_service.endTime='晚')) GROUP BY users.uid";
        $query2="SELECT users.uid,food_service.serviceType,food_service.address,food_service.num_ppl FROM food_service INNER JOIN users ON users.salt=food_service.user  WHERE ( DATE(food_service.startDate) < DATE(CURDATE()) AND DATE(CURDATE()) < DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()) AND (food_service.startTime='早' OR food_service.startTime='中')) OR( DATE(food_service.endDate) = DATE(CURDATE()) AND (food_service.endTime='中' OR food_service.endTime='晚'))";
        $this->time = "今天中午";
        $totalQuery = $this->totalQuery("( DATE(food_service.startDate) < DATE(CURDATE()) AND DATE(CURDATE()) < DATE(food_service.endDate))", "and ( DATE(food_service.startDate) = DATE(CURDATE()) AND (food_service.startTime='早' OR food_service.startTime='中')) OR( DATE(food_service.endDate) = DATE(CURDATE()) AND (food_service.endTime='中' OR food_service.endTime='晚'))");
        $this->showResult($query1,$query2, $totalQuery);    
    }

    public function thisDinnerListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) <= DATE(CURDATE()) AND DATE(CURDATE()) < DATE(food_service.endDate)) OR( DATE(food_service.endDate) = DATE(CURDATE()) AND (food_service.endTime='晚')) GROUP BY users.uid";
        $query2="SELECT users.uid,food_service.serviceType,food_service.address,food_service.num_ppl FROM food_service INNER JOIN users ON users.salt=food_service.user  WHERE ( DATE(food_service.startDate) <= DATE(CURDATE()) AND DATE(CURDATE()) < DATE(food_service.endDate)) OR( DATE(food_service.endDate) = DATE(CURDATE()) AND (food_service.endTime='晚'))";
        $this->time = "今天晚上";
        $totalQuery = $this->totalQuery("( DATE(food_service.startDate) <= DATE(CURDATE()) AND DATE(CURDATE()) < DATE(food_service.endDate))", "and( DATE(food_service.endDate) = DATE(CURDATE()) AND (food_service.endTime='晚'))");
        $this->showResult($query1,$query2, $totalQuery);   
    }

    public function nextBreakfastListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) <= DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND food_service.startTime='早') GROUP BY users.uid";
        $query2="SELECT users.uid, food_service.serviceType, food_service.address, food_service.num_ppl FROM food_service INNER JOIN users ON users.salt = food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) <= DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND food_service.startTime='早')";
        $this->time = "明天早上";
        $totalQuery = $this->totalQuery("( DATE(food_service.startDate) < DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) <= DATE(food_service.endDate))", "and( DATE(food_service.startDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND food_service.startTime='早')");
        $this->showResult($query1,$query2, $totalQuery);    
    }

    public function nextLunchListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) < DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.startTime='早' OR food_service.startTime='中')) OR( DATE(food_service.endDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.endTime='中' OR food_service.endTime='晚')) GROUP BY users.uid";
        $query2="SELECT users.uid,food_service.serviceType,food_service.address,food_service.num_ppl FROM food_service INNER JOIN users ON users.salt=food_service.user  WHERE ( DATE(food_service.startDate) < DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) < DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.startTime='早' OR food_service.startTime='中')) OR( DATE(food_service.endDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.endTime='中' OR food_service.endTime='晚'))";
        $this->time = "明天中午";
        $totalQuery = $this->totalQuery("( DATE(food_service.startDate) < DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) < DATE(food_service.endDate))", "and( DATE(food_service.startDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.startTime='早' OR food_service.startTime='中')) OR( DATE(food_service.endDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.endTime='中' OR food_service.endTime='晚'))");
        $this->showResult($query1,$query2, $totalQuery);
    }

    public function nextDinnerListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) <= DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) < DATE(food_service.endDate)) OR( DATE(food_service.endDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.endTime='晚')) GROUP BY users.uid";
        $query2="SELECT users.uid,food_service.serviceType,food_service.address,food_service.num_ppl FROM food_service INNER JOIN users ON users.salt=food_service.user  WHERE ( DATE(food_service.startDate) <= DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) < DATE(food_service.endDate)) OR( DATE(food_service.endDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.endTime='晚'))";
        $this->time = "明天晚上";
        $totalQuery = $this->totalQuery("( DATE(food_service.startDate) <= DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) < DATE(food_service.endDate))", "and( DATE(food_service.endDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.endTime='晚'))");
        $this->showResult($query1,$query2, $totalQuery);
    }

    public function showResult($query1,$query2,$totalQuery) {

        $tableString ="
        <div class=\"table-responsive\">
        <table class=\"table table-bordered\">
        <thead> 
        <tr>
            <th>#</th>
            <th>姓名</th>
            <th>电话</th>
            <th>孕妇地址</th>
            <th>家属地址</th>
            <th>月子餐数</th>
            <th>待产+陪产餐数</th>
        </tr>
        </thead> 
        <tbody> 
        ";

        global $mysqli;
        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
        $Paginator  = new Paginator( $mysqli, $query1 );
        $result    = $Paginator->getData( $limit, $page);
        $rs0 = $mysqli->query( $totalQuery[0] )->fetch_assoc();
        $rs1 = $mysqli->query( $totalQuery[1] )->fetch_assoc();
        $rs2 = $mysqli->query( $totalQuery[2] )->fetch_assoc();
        $type1Total=$rs0['count(*)'];
        $type2Total=$rs1['count(*)'] + $rs2['sum(num_ppl)'];
        if(sizeof($result->data) > 0){
            foreach($result->data as $Summary){
                //月子餐是type1,待产餐是type2，孕妇地址是address1,家属地址是address2
                $type1 = 0;
                $type2 = 0;
                $address1 = "";
                $address2 = "";
                $result2 = mysqli_fetch_all($mysqli->query($query2), MYSQLI_ASSOC);
                foreach($result2 as $history){
                   if ($history["uid"] == $Summary["uid"]) {
                        if ($history['serviceType'] == "宝妈月子餐"){
                            $type1 ++;
                            $address1 = $history["address"];
                        } elseif ($history['serviceType'] == "宝妈待产餐") {
                            $type2 ++;
                            $address1 = $history["address"];
                        } elseif ($history['serviceType'] == "待产餐") {
                            $type2 += $history['num_ppl'];
                            $address2 = $history["address"];
                        }
                   }
                }       
                $row = "
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\">".$Summary['phone']."</a></td> 
                        <td>".$address1."</td> 
                        <td>".$address2."</td> 
                        <td>".$type1."</td> 
                        <td>".$type2."</td> 
                    </tr>
            ";
            $tableString=$tableString.$row;
            }
            $tableString=$tableString.
            "</tbody>
            </table>
            </div>";
             echo sprintf( "<h5>%s一共%d份月子餐，%d份待产+陪产餐</h5>",$this->time, $type1Total,$type2Total);
		}else{
            $tableString=$tableString."</table></div>";
        }
        echo $tableString;
        $pageType = $_GET['pageType'];
        if (!isset($pageType)) {
            printf("undefined pageType");
            exit();
        }
        else{
            echo $Paginator->createLinks( $pageType,$links, 'pagination pagination-sm' );
        }
        
    }
}?>