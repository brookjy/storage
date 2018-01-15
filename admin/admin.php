<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/header.php";
    include_once "../model/common.php";
    include_once "../model/member.func.php";
    
    //Check if the user is login
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
            include_once "../model/admin/foodHistory.func.php";

            $foodHistory = new FoodHistory(); ?>
        <br/>
        <div class="container" style="color:black;">
            <?php 
            if ($_COOKIE['admin'] == "food_service"){?>
                <h2 style="display:inline;color:white;">订餐服务汇总：</h2>
            <?php
                $foodHistory->historyListing();
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