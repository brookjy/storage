<?php if(!defined('In_System')) exit("Access Denied");
Class Purchase{
    public $time = "";
    public $date;
    public $itemList = ["doujiang","tiandoujiang"];
    public $table = "purchase_service INNER JOIN users ON users.salt=purchase_service.user";
    public $rawStates = "users.uid,users.username,users.phone,purchase_service.date,purchase_service.property,purchase_service.origin_address";
    public $completeStates = "";
    public function generateState() {
        $size = sizeof($this->itemList);
        $this->completeStates . $this->rawStates;
        while ($size>0){
            $this->completeStates . ",purchase_service." . $this->itemList[$size];
            $size--;
        }
    }
    public function totalQuery($condition) {
        return "select sum(potato), sum(tomato), sum(rice) from ".$this->table. " where ".$condition;
    }
    public function thisWeekListing(){
        $condition = "(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')+2))<=DATE(purchase_service.date) and DATE(purchase_service.date)<=(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-4))";
        $query="SELECT ". $this->stats." from ".$this->table. " where ".$condition;
        $this->time = "上周五到这周四";    
        $this->showResult($query, $this -> totalQuery($condition));
    }

    public function nextWeekListing(){
        $condition = "(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-5))<=DATE(purchase_service.date) and DATE(purchase_service.date)<=(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-11))";
        $query="SELECT ". $this->stats." FROM ".$this->table. " WHERE ".$condition;
        $this->time = "这周五到下周四";
        $this->showResult($query, $this -> totalQuery($condition));
    }

    public function twoWeekLater(){
        $condition = "(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-12))<=DATE(purchase_service.date) and DATE(purchase_service.date)<=(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-18))";
        $query="SELECT ". $this->stats." FROM ".$this->table. " WHERE ".$condition;
        $this->time = "下周五到下下周四";
        $this->showResult($query, $this -> totalQuery($condition));
    }

    public function showResult($query,$totalQuery) {
        $pageString="";
        $tableString ="<br/>
        <div class=\"table-responsive\">
        <table class=\"table table-bordered\">
        <thead> 
        <tr>
            <th>#</th>
            <th>客户名</th>
            <th>电话</th>
            <th>土豆</th>
            <th>番茄</th>
            <th>大米</th>
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
        $totalPotato=$row['sum(potato)'];
        $totalTomato=$row['sum(tomato)'];
        $totalRice=$row['sum(rice)'];
		if(sizeof($result->data) > 0){
            foreach($result->data as $Summary){
                $row = "
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\">".$Summary['phone']."</a></td> 
                        <td>".$Summary['potato']."</td> 
                        <td>".$Summary['tomato']."</td> 
                        <td>".$Summary['rice']."</td> 
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
             echo sprintf( "<br/><h5>%s一共%d个土豆，%d个番茄，%d袋大米</h5>",$this->time, $totalPotato,$totalTomato,$totalRice);
             $pageString=$Paginator->createLinks($pageType,$links, 'pagination pagination-sm');
            }else{
            $tableString=$tableString."</table></div>";
        }
        echo $tableString;
        echo $pageString;
    }
}?>