<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/header.php";
    include_once "../model/common.php";
    include_once "../model/member.func.php";
    include_once "../model/common.php";
    include_once "./admin_paginator.php";
    
    if(!defined('In_System')) exit("Access Denied");

    $foodPage = new Food("summary");
    
    //Check if the admin is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>
<body class="bg-dark">
    <br/>
        <div style="float:right">
            <a href="./admin_panel.php" style="padding-right:10px;font-size:180%;padding-bottom:10px;">返回-></a>
        </div> 
        <div class="container" style="color:black;">
        <h2 style="color:white;">查看今天或明天的订单: </h2>                    
        <button type="button" class="btn btn-primary" onclick="changePageType('thisBreakfast')" style="margin-bottom:20px;font-size:2rem;" name="breakfast">今天早餐</button>
        <button type="button" class="btn btn-primary" onclick="changePageType('thisLunch')" style="margin-bottom:20px;font-size:2rem;" name="lunch">今天午餐</button>
        <button type="button" class="btn btn-primary" onclick="changePageType('thisDinner')" style="margin-bottom:20px;font-size:2rem;" name="dinner">今天晚餐</button>
        <button type="button" class="btn btn-primary" onclick="changePageType('nextBreakfast')" style="margin-bottom:20px;font-size:2rem;" name="breakfast">明天早餐</button>
        <button type="button" class="btn btn-primary" onclick="changePageType('nextLunch')" style="margin-bottom:20px;font-size:2rem;" name="lunch">明天午餐</button>
        <button type="button" class="btn btn-primary" onclick="changePageType('nextDinner')" style="margin-bottom:20px;font-size:2rem;" name="dinner">明天晚餐</button>
        <h2 style="color:white;">订餐服务汇总：</h2>
        <?php if ($_COOKIE['pageType'] == "summary") {
            $foodPage->foodSummaryListing(); 
        } elseif ($_COOKIE['pageType'] == "thisBreakfast") {
            $foodPage->thisBreakfastListing();  
        } elseif ($_COOKIE['pageType'] == "thisLunch") {
            $foodPage->thisLunchListing();  
        }elseif ($_COOKIE['pageType'] == "thisDinner") {
            $foodPage->thisDinnerListing();  
        }elseif ($_COOKIE['pageType'] == "nextBreakfast") {
            $foodPage->nextBreakfastListing();  
        } elseif ($_COOKIE['pageType'] == "nextLunch") {
            $foodPage->nextLunchListing();  
        }elseif ($_COOKIE['pageType'] == "nextDinner") {
            $foodPage->nextDinnerListing();  
        }?>
        </div>
        
    <br/><br/>
    <!-- /.content-wrapper-->
    <footer class="footer" style="color:white;">
        <div class="container">
            <div class="text-center">
                <small>Copyright © 领婴海外孕产 2018</small>
            </div>
        </div>
    </footer>
  </div>
</body>
<style>
button:active {
    border: 2px solid green;
}
</style>
<script>
function changePageType(pageType) {
    document.cookie = "pageType="+ pageType;
    window.location.replace("./admin_food.php");
}
</script>
</html>


<?php 
Class Food{
    public $time = "";

    public function foodSummaryListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user GROUP BY users.uid";
        $query2="SELECT users.uid,food_service.serviceType,food_service.address,food_service.num_ppl FROM food_service INNER JOIN users ON users.salt=food_service.user";
        $this->showResult($query1, $query2);
    }

    public function thisBreakfastListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()) AND DATE(CURDATE()) <= DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()) AND food_service.startTime='早') GROUP BY users.uid";
        $query2="SELECT users.uid, food_service.serviceType, food_service.address, food_service.num_ppl FROM food_service INNER JOIN users ON users.salt = food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()) AND DATE(CURDATE()) <= DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()) AND food_service.startTime='早')";
        $this->time = "今天早上";
        $this->showResult($query1, $query2);
    }

    public function thisLunchListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()) AND DATE(CURDATE()) < DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()) AND (food_service.startTime='早' OR food_service.startTime='中')) OR( DATE(food_service.endDate) = DATE(CURDATE()) AND (food_service.endTime='中' OR food_service.endTime='晚')) GROUP BY users.uid";
        $query2="SELECT users.uid,food_service.serviceType,food_service.address,food_service.num_ppl FROM food_service INNER JOIN users ON users.salt=food_service.user  WHERE ( DATE(food_service.startDate) < DATE(CURDATE()) AND DATE(CURDATE()) < DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()) AND (food_service.startTime='早' OR food_service.startTime='中')) OR( DATE(food_service.endDate) = DATE(CURDATE()) AND (food_service.endTime='中' OR food_service.endTime='晚'))";
        $this->time = "今天中午";
        $this->showResult($query1,$query2);
    }

    public function thisDinnerListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) <= DATE(CURDATE()) AND DATE(CURDATE()) < DATE(food_service.endDate)) OR( DATE(food_service.endDate) = DATE(CURDATE()) AND (food_service.endTime='晚')) GROUP BY users.uid";
        $query2="SELECT users.uid,food_service.serviceType,food_service.address,food_service.num_ppl FROM food_service INNER JOIN users ON users.salt=food_service.user  WHERE ( DATE(food_service.startDate) <= DATE(CURDATE()) AND DATE(CURDATE()) < DATE(food_service.endDate)) OR( DATE(food_service.endDate) = DATE(CURDATE()) AND (food_service.endTime='晚'))";
        $this->time = "今天晚上";
        $this->showResult($query1,$query2);
    }

    public function nextBreakfastListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) <= DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND food_service.startTime='早') GROUP BY users.uid";
        $query2="SELECT users.uid, food_service.serviceType, food_service.address, food_service.num_ppl FROM food_service INNER JOIN users ON users.salt = food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) <= DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND food_service.startTime='早')";
        $this->time = "明天早上";
        $this->showResult($query1, $query2);
    }

    public function nextLunchListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) < DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) < DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.startTime='早' OR food_service.startTime='中')) OR( DATE(food_service.endDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.endTime='中' OR food_service.endTime='晚')) GROUP BY users.uid";
        $query2="SELECT users.uid,food_service.serviceType,food_service.address,food_service.num_ppl FROM food_service INNER JOIN users ON users.salt=food_service.user  WHERE ( DATE(food_service.startDate) < DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) < DATE(food_service.endDate)) OR( DATE(food_service.startDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.startTime='早' OR food_service.startTime='中')) OR( DATE(food_service.endDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.endTime='中' OR food_service.endTime='晚'))";
        $this->time = "明天中午";
        $this->showResult($query1,$query2);
    }

    public function nextDinnerListing(){
        $query1="SELECT users.uid,users.username,users.phone,food_service.serviceType,food_service.num_ppl,food_service.address FROM food_service INNER JOIN users ON users.salt=food_service.user WHERE ( DATE(food_service.startDate) <= DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) < DATE(food_service.endDate)) OR( DATE(food_service.endDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.endTime='晚')) GROUP BY users.uid";
        $query2="SELECT users.uid,food_service.serviceType,food_service.address,food_service.num_ppl FROM food_service INNER JOIN users ON users.salt=food_service.user  WHERE ( DATE(food_service.startDate) <= DATE(CURDATE()+ INTERVAL 1 DAY) AND DATE(CURDATE()+ INTERVAL 1 DAY) < DATE(food_service.endDate)) OR( DATE(food_service.endDate) = DATE(CURDATE()+ INTERVAL 1 DAY) AND (food_service.endTime='晚'))";
        $this->time = "明天晚上";
        $this->showResult($query1,$query2);
    }

    public function showResult($query1,$query2) {
        global $mysqli;
        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 5;
        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
        $Paginator  = new Paginator( $mysqli, $query1 );
        $result    = $Paginator->getData( $limit, $page);
		if(sizeof($result->data) > 0){
            echo "
            <table class=\"table table-hover table-info\">
                <tr>
                    <th>ID</th>
                    <th>客户名</th>
                    <th>电话</th>
                    <th>孕妇地址</th>
                    <th>家属地址</th>
                    <th>月子餐数</th>
                    <th>待产+陪产餐数</th>
                </tr>
            ";
            $type1Total=0;
            $type2Total=0;
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
                $type1Total+=$type1;
                $type2Total+=$type2;
                echo sprintf("
                    <tr>
                        <td>%d</td>
                        <td>%s</td>
                        <td>%d</td> 
                        <td>%s</td> 
                        <td>%s</td> 
                        <td>%d</td> 
                        <td>%d</td> 
                    </tr>
                ", $Summary['uid'],$Summary['username'],$Summary['phone'],$address1, $address2, $type1, $type2);
            }
            echo "
                </table>

             ";
             echo sprintf( "<h2 style='color:white;'>%s一共%d份月子餐，%d份待产+陪产餐</h2>",$this->time, $type1Total,$type2Total);
		}else{
            echo "
                <table class=\"table table-hover table-info\">
                    <tr>
                        <th>ID</th>
                        <th>客户名</th>
                        <th>电话</th>
                        <th>地址</th>
                        <th>月子餐数</th>
                        <th>陪产餐数</th>
                    </tr>
                </table>
            ";
        }
        echo $Paginator->createLinks( $links, 'pagination pagination-sm' );
    }
}




