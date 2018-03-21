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
            <h1>以人为本，服务至上, 品质第一</h1>
            <p>我们会在第一时间办理您申请的服务，如果有急事，请打电话 778-895-3579 微信有时无法及时回复。</p>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xsx-6">
                    <a href="medical_service.php">
                        <div class="serviceBox green">
                            <div class="service-icon">
                                <span><i class="fa fa-ambulance"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">专业会诊</h3>
                                <p class="description">超二十年著名专科医生</p>
                                <a href="medical_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="点击申请"></a>
                            </div>
                        </div>
                    </a>
                </div>
            
                <div class="col-md-3 col-sm-6 col-xsx-6">
                    <a href="food_service.php">
                        <div class="serviceBox">
                            <div class="service-icon">
                                <span><i class="fa fa-coffee"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">营养膳食（订宝妈餐）</h3>
                                <p class="description">星级大厨，现场烹饪</p>
                                <a href="food_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="点击申请"></a>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xsx-6">
                    <a href="foodcpy_service.php">
                        <div class="serviceBox orange">
                            <div class="service-icon">
                                <span><i class="fa fa-coffee"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">营养膳食（订家属餐）</h3>
                                <p class="description">星级大厨，现场烹饪</p>
                                <a href="foodcpy_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="点击申请"></a>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xsx-6">
                    <a href="purchase_service.php">
                        <div class="serviceBox blue">
                            <div class="service-icon">
                                <span><i class="fa fa-edit"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">采购服务</h3>
                                <p class="description">帮您买东西，送货上门</p>
                                <a href="purchase_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="点击申请"></a>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xsx-6">
                    <a href="repair_service.php">
                        <div class="serviceBox green">
                            <div class="service-icon">
                                <span><i class="fa fa-thumbs-o-up"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">物业管理/维修</h3>
                                <p class="description">酒店公寓，豪华别墅</p>
                                <a href="repair_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="点击申请"></a>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xsx-6">
                    <a href="pickup_service.php">
                        <div class="serviceBox">
                            <div class="service-icon">
                                <span><i class="fa fa-automobile"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">安全出行</h3>
                                <p class="description">商务用车，千万保障</p>
                                <a href="pickup_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="点击申请"></a>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xsx-6">
                    <a href="housekeeping_service.php">  
                        <div class="serviceBox orange">
                            <div class="service-icon">
                                <span><i class="fa fa-group"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">星级月嫂</h3>
                                <p class="description">超10年持牌月嫂</p>
                                <a href="housekeeping_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="点击申请"></a>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xsx-6">
                    <a href="flight_service.php">  
                        <div class="serviceBox orange">
                            <div class="service-icon">
                                <span><i class="fa fa-fighter-jet"></i></span>
                            </div>
                            <div class="service-content">
                                <h3 class="title">接机送机</h3>
                                <p class="description">商务用车，千万保障</p>
                                <a href="flight_service.php" class="read-more fa fa-plus" data-toggle="tooltip" title="点击申请"></a>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div><!--End row-->
        </div><!--End container-->
        <!-- /.container-fluid-->
        <?php include_once "./component/footer.php"; ?>
    </div>
</body>

</html>
