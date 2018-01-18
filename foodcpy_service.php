<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";
    include_once "./model/common.php";
    include_once "./model/member.func.php";
    
    //Check if the user is login
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
?>
<head>
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/ui-lightness/jquery-ui.css" />
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    
    <?php include_once "./component/sideNav.php"; ?>

    <div class="content-wrapper">
        <div class="container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="panel.php">申请其他服务</a>
                </li>
                <li class="breadcrumb-item active">服务页面</li>
            </ol>
            <br/>
            <div style="padding-left:20px;padding-right:20px;">
                <?php 
                    include_once "./model/common.php";
                    include_once "./model/check.foodcpy.php";

                    $check_foodcpys = new Check_Foodcpy();
                    if($check_foodcpys->check_foodcpys()){
                ?>
                <h2><b>家属订餐申请</b></h2>
                <p>(我们会在第一时间办理您申请的服务，如果有急事，请打电话 XXX-XXXX-XXXX, 微信有时无法及时回复。)</p>
                <form action="./service_function.php" method="post">
                    <div class="container">
                        <div class="form-group">
                            <label>选择人数：</label>
                            <select name="ppl">
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" style="width:250px;">
                                    <label>选择开始时间：<span style="color:red;">*预约请提前5小时<span></label>
                                    <div class="col-xs-5 date">
                                        <div class="input-group input-append date" >
                                            <input type="text" id="datepicker" name="startDate"/>
                                            <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"  style="width:250px;">
                                    <label>选择种类: </label>
                                    <select class="form-control" name="startTime">
                                        <option value="早">早</option>
                                        <option value="中">中</option>
                                        <option value="晚">晚</option>
                                    </select>
                                </div>
                                <br/>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="width:250px;">
                                    <label>选择结束时间: </label>
                                    <div class="col-xs-5 date">
                                        <div class="input-group input-append date" >
                                            <input type="text" id="datepicker1" name="endDate"/>
                                            <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"  style="width:250px;">
                                    <label>选择种类：</label>
                                    <select class="form-control" name="endTime">
                                        <option value="早">早</option>
                                        <option value="中">中</option>
                                        <option value="晚">晚</option>
                                    </select>
                                </div>
                                <br/>
                            </div>
                        </div> <!-- /.row -->
                        
                        <div class="form-group"  style="width:250px;">
                            <label>选择地址：</label>
                            <select class="form-control" name="address">
                                <option value="医院">医院</option>
                                <option value="家">家</option>
                            </select>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="foodcpy_service">提交申请</button>
                    </div><!-- /.container -->
                </form>

                <?php }else{?> <!-- second condition start -->

                    <br/>
                
                <?php }?>

            </div><!-- /.container -->
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
            <small>Copyright © 领世海外孕产 2018</small>
            </div>
        </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/i18n/jquery-ui-i18n.min.js"></script>
        <script>
            var tomorrow = new Date();
            tomorrow.setHours(tomorrow.getHours() + 5);
            $(function() {
                $( "#datepicker" ).datepicker({
                    showButtonPanel: true,
                    minDate: tomorrow
                });
                $( "#datepicker1" ).datepicker({
                    showButtonPanel: true,
                    minDate: tomorrow
                });
            });
        </script>   
    </div>
</body>
</html>
