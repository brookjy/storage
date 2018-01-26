<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/adminHeader.php";
    include_once "./model/common.php";
    include_once "./model/admin_paginator.php";
    include_once "./model/admin.food.php";
    
    if(!defined('In_System')) exit("Access Denied");

    $foodPage = new Food();
    
    //Check if the admin is login
    if (!isset($_COOKIE['isAdminLogin'])) { 
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>
<body>
        <div>
        <button type="button" class="btn btn-info" style="margin-right:15px;margin-left:15px; margin-bottom:8px" onclick="location.href='?pageType=thisBreakfast'" >今天早餐</button>
        <button type="button" class="btn btn-info" style="margin-right:15px;margin-left:15px; margin-bottom:8px" onclick="location.href='?pageType=thisLunch'">今天午餐</button>
        <button type="button" class="btn btn-info" style="margin-right:15px;margin-left:15px;margin-bottom:8px" onclick="location.href='?pageType=thisDinner'">今天晚餐</button>
        <button type="button" class="btn btn-info" style="margin-right:15px;margin-left:15px;margin-bottom:8px" onclick="location.href='?pageType=nextBreakfast'">明天早餐</button>
        <button type="button" class="btn btn-info" style="margin-right:15px;margin-left:15px;margin-bottom:8px" onclick="location.href='?pageType=nextLunch'">明天午餐</button>
        <button type="button" class="btn btn-info" style="margin-right:15px;margin-left:15px;margin-bottom:8px" onclick="location.href='?pageType=nextDinner'">明天晚餐</button>

        <?php 
        if (!isset($_GET['pageType'])) {
            printf("undefined pageType");
            exit();
        }
        if ($_GET['pageType'] == "summary") {
            $foodPage->foodSummaryListing(); 
        } elseif ($_GET['pageType'] == "thisBreakfast") {
            $foodPage->thisBreakfastListing();  
        } elseif ($_GET['pageType'] == "thisLunch") {
            $foodPage->thisLunchListing();  
        }elseif ($_GET['pageType'] == "thisDinner") {
            $foodPage->thisDinnerListing();  
        }elseif ($_GET['pageType'] == "nextBreakfast") {
            $foodPage->nextBreakfastListing();  
        } elseif ($_GET['pageType'] == "nextLunch") {
            $foodPage->nextLunchListing();  
        }elseif ($_GET['pageType'] == "nextDinner") {
            $foodPage->nextDinnerListing();  
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




