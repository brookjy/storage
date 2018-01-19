<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/header.php";
    include_once "../model/common.php";
    include_once "./admin_sideNav.php";
    include_once "../component/footer.php";    
    
    //Check if the user is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
    $food_admin = $_COOKIE['admin'] == "food_service" ? true:false;
    $drive_admin = $_COOKIE['admin'] == "drive_service" ? true:false;
    $repair_admin = $_COOKIE['admin'] == "repair_service" ? true:false;
    $housekeeping_admin = $_COOKIE['admin'] == "housekeeping_service" ? true:false;
    setcookie("pageType", "summary");
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <div class="content-wrapper">
        <div class="container">
        <div class="row" style="padding-left:20px;padding-right:20px;">
                <?php if ($drive_admin) { ?>
                <div class="col-md-3 col-sm-6 col-xsx-6">
                        <div class="serviceBox green">
                            <div class="service-icon">
                                <span><i class="fa fa-ambulance"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">医疗接送</h3>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a href="medical_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="Read More"></a>
                            </div>
                        </div>
                    </div>
                    <?php } if ($food_admin) { ?>
                    <div class="col-md-3 col-sm-6 col-xsx-6">
                        <div class="serviceBox">
                            <div class="service-icon">
                                <span><i class="fa fa-coffee"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">订餐服务</h3>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                <a href="admin_foodSummary.php" class="read-more fa fa-plus" data-toggle="tooltip" title="Read More"></a>
                            </div>
                        </div>
                    </div>
                    <?php } if ($drive_admin) { ?>
                    <div class="col-md-3 col-sm-6 col-xsx-6">
                        <div class="serviceBox orange">
                            <div class="service-icon">
                                <span><i class="fa fa-edit"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">采购服务</h3>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                <a href="purchase_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="Read More"></a>
                            </div>
                        </div>
                    </div>
                    <?php } if ($repair_admin) { ?>
                    <div class="col-md-3 col-sm-6 col-xsx-6">
                        <div class="serviceBox blue">
                            <div class="service-icon">
                                <span><i class="fa fa-thumbs-o-up"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">住房维修</h3>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                <a href="repair_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="Read More"></a>
                            </div>
                        </div>
                    </div>
                    <?php } if ($drive_admin) { ?>
            <div class="col-md-3 col-sm-6 col-xsx-6">
                <div class="serviceBox green">
                    <div class="service-icon">
                        <span><i class="fa fa-automobile"></i></span>
                    </div>
                    <div class="service-content">
                        <h3 class="title">出行接送</h3>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="pickup_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="Read More"></a>
                    </div>
                </div>
            </div>
            <?php } if ($housekeeping_admin) { ?>
            <div class="col-md-3 col-sm-6 col-xsx-6">
                <div class="serviceBox">
                    <div class="service-icon">
                        <span><i class="fa fa-group"></i></span>
                    </div>
                    <div class="service-content">
                        <h3 class="title">孕产服务</h3>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="housekeeping_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="Read More"></a>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
        <!-- /.container-fluid-->
    </div>
</body>

</html>
