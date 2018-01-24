<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/adminHeader.php";
    include_once "./model/common.php";
    include_once "./admin_paginator.php";
    include_once "./model/admin.housekeeping.php";
    
    if(!defined('In_System')) exit("Access Denied");

    $housekeepingPage = new Housekeeping();
    
    //Check if the admin is login
    if (!isset($_COOKIE['isAdminLogin'])) { 
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
    $date = new DateTime('today');

?>
<body>
        <div>
        <div>  
        <button type="button" class="btn btn-info" onclick="location.href='?pageType=thisMonth'" >今个月</button>
        <button type="button" class="btn btn-info" onclick="location.href='?pageType=nextMonth'">下个月</button>
        <button type="button" class="btn btn-info" onclick="location.href='?pageType=twoMonthLater'"><?php $date->modify('+2 month'); echo $date->format('m-Y')?></button>
        </div>
        <?php if ($_GET['pageType'] == "thisMonth") {
            $housekeepingPage->thisMonthListing(); 
        } elseif ($_GET['pageType'] == "nextMonth") {
            $housekeepingPage->nextMonthListing();  
        } elseif ($_GET['pageType'] == "twoMonthLater") {
            $housekeepingPage->twoMonthLater();  
        }?>
        </div>
        
    <br/><br/>
  </div>
</body>
<style>
button:active {
    border: 2px solid green;
}
</style>
</html>

<?php 
    include_once "../component/adminFooter.php";
?>