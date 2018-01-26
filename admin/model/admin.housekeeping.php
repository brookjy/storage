<?php if(!defined('In_System')) exit("Access Denied");
Class Housekeeping{
    public $time = "";
    public $date;
    public function thisMonthListing(){
        $query="SELECT users.uid,users.username,users.phone,housekeeping_service.time,housekeeping_service.accompany,housekeeping_service.maid,housekeeping_service.additionalNote FROM housekeeping_service INNER JOIN users ON users.salt=housekeeping_service.user WHERE MONTH(housekeeping_service.time) = MONTH(CURDATE())";
        $this->time = "本月";
        $this->showResult($query);
    }

    public function nextMonthListing(){
        $query="SELECT users.uid,users.username,users.phone,housekeeping_service.time,housekeeping_service.accompany,housekeeping_service.maid,housekeeping_service.additionalNote FROM housekeeping_service INNER JOIN users ON users.salt=housekeeping_service.user WHERE MONTH(housekeeping_service.time) = MONTH(CURDATE()+ INTERVAL 1 MONTH)";
        $this->time = "下月";
        $this->showResult($query);
    }

    public function twoMonthLater(){
        $query="SELECT users.uid,users.username,users.phone,housekeeping_service.time,housekeeping_service.accompany,housekeeping_service.maid,housekeeping_service.additionalNote FROM housekeeping_service INNER JOIN users ON users.salt=housekeeping_service.user WHERE MONTH(housekeeping_service.time) = MONTH(CURDATE()+ INTERVAL 2 MONTH)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+2 month')->format('m-Y');
        $this->showResult($query);
    }

    public function showResult($query) {
        $pageString="";
        $tableString ="<br/>
        <div class=\"table-responsive\">
        <table class=\"table table-bordered\">
        <thead> 
        <tr>
            <th>#</th>
            <th>客户名</th>
            <th>电话</th>
            <th>时间</th>
            <th>陪产</th>
            <th>月嫂</th>
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
            $totalAccompany=0;
            $totalMaid=0;
            foreach($result->data as $Summary){
                $row = "
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\">".$Summary['phone']."</a></td> 
                        <td>".$Summary['time']."</td> 
                        <td>".$Summary['accompany']."</td> 
                        <td>".$Summary['maid']."</td> 
                        <td>".$Summary['additionalNote']."</td> 
                    </tr>
            ";
            $tableString=$tableString.$row;
            $totalAccompany+=$Summary['accompany'];
            $totalMaid+=$Summary['maid'];
            }
            $tableString=$tableString.
            "</tbody>
            </table>
            </div>";
            $pageType = $_GET['pageType'];
             echo sprintf( "<br/><h5>%s一共%d项陪产，%d项月嫂服务</h5>",$this->time, $totalAccompany,$totalMaid);
             $pageString=$Paginator->createLinks($pageType,$links, 'pagination pagination-sm');
            }else{
            $tableString=$tableString."</table></div>";
        }
        echo $tableString;
        echo $pageString;
    }
}?>