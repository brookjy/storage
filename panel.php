<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";
    include_once "./model/common.php";
    include_once "./model/member.func.php";
    
    //Check if the user is login
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    
    <?php include_once "./component/sideNav.php"; ?>

    <div class="content-wrapper">
        <div class="container">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="panel.php">申请服务</a>
            </li>
            <li class="breadcrumb-item active">服务页面</li>
        </ol>
        <br/>
        <div class="row" style="padding-left:20px;padding-right:20px;">
            <h1>请选择你想要的服务</h1>
            <br/>
            <p>我们会在第一时间办理您申请的服务，如果有急事，请打电话 XXX-XXXX-XXXX 微信有时无法及时回复。</p>
            <div class="row">
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
            
                    <div class="col-md-3 col-sm-6 col-xsx-6">
                        <div class="serviceBox">
                            <div class="service-icon">
                                <span><i class="fa fa-coffee"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">订餐服务</h3>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                <a href="food_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="Read More"></a>
                            </div>
                        </div>
                    </div>

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

                </div>
            </div>
            <div class="row">
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

                <div class="col-md-3 col-sm-6 col-xsx-6">
                    <div class="serviceBox">
                        <div class="service-icon">
                            <span><i class="fa fa-group"></i></span>
                        </div>
                        <div class="service-content">
                            <h3 class="title">找月嫂</h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <a href="housekeeping_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="Read More"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <?php include_once "./component/footer.php"; ?>
    </div>
</body>

</html>
