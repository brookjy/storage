<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/header.php";
    include_once "../model/common.php";
    include_once "../model/member.func.php";
    
    //Check if the admin is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
?>
<body class="bg-dark">
    <br/>
        <div style="float:right">
            <a href="./" style="padding-right:10px;font-size:180%;padding-bottom:10px;">返回-></a>
        </div> 
        <br/>
        <?php 
            include_once "../model/common.php";
            include_once "../model/admin/foodSummary.func.php";

            $foodSummary = new foodSummary();
             ?>
        <br/>
        <div class="container" style="color:black;">
            <?php 
            if ($_COOKIE['admin'] == "food_service"){?>
                <form action="./adminService.func.php" method="post">
                    <h2 style="color:white;">查看今天的订单: </h2>                    
                    <button type="submit" class="btn btn-primary" style="margin-bottom:20px;font-size:2rem;" name="breakfast">今天早餐</button>
                    <button type="submit" class="btn btn-primary" style="margin-bottom:20px;font-size:2rem;" name="lunch">今天午餐</button>
                    <button type="submit" class="btn btn-primary" style="margin-bottom:20px;font-size:2rem;" name="dinner">今天晚餐</button>
                </form>
                <h2 style="color:white;">订餐服务汇总：</h2>
            <?php
                $foodSummary->foodSummaryListing();
            }
            ?>
        </div>
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

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </div>
</body>

</html>