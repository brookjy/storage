<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";
    include_once "./model/common.php";
    include_once "./model/member.func.php";
    include_once "./model/check.activate.php";

    //Check if the user is login
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

    $checked_activate = new Check_Activate;
    $checked_activate -> check_activate();
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
        <div class="row" style="padding-left:20px;padding-right:20px;">
            <h2><b>住房维修申请</b></h2>
            <p>(我们会在第一时间办理您申请的服务，如果有急事，请打电话 XXX-XXXX-XXXX, 微信有时无法及时回复。)</p>

            <form action="./service_function.php" method="post">
                <fieldset>
                    <div class="form-group" style="width:250px;">
                        <label>选择时间：<span style="color:red;">*预约时间请提前一天</span></label>
                        <div class="col-xs-5 date">
                            <div class="input-group input-append date" >
                                <input type="text" id="datepicker" name="time"/>
                                <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <label>选择维修服务：</label>
                        <table class="table table-striped">
                        <tr>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check uncheck">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="water" type="checkbox" value="1">
                                        水
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="gas" type="checkbox" value="1">
                                        煤气
                                    </label>
                                </div>
                            </td> 
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="electric" type="checkbox" value="1">
                                        电
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="other" type="checkbox" value="1">
                                        其他
                                    </label>
                                </div>
                            </td>
                        </tr>
                        </table>  
                    </fieldset>
                    <div class="form-group">
                        <label for="exampleTextarea">备注信息：</label>
                        <textarea class="form-control" name="additionalNote" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="repair_service">提交申请</button>
                    
                </fieldset>
            </form>
            <br/>
        </div>
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
            });
        </script>   
    </div>
</body>
</html>
