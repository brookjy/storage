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
            <a href="panel.php">申请其他服务</a>
            </li>
            <li class="breadcrumb-item active">服务页面</li>
        </ol>
        <br/>
        <div class="row" style="padding-left:20px;padding-right:20px;">
            <h2><b>医疗接送申请</b></h2>
            <p>(我们会在第一时间办理您申请的服务，如果有急事，请打电话 XXX-XXXX-XXXX, 微信有时无法及时回复。)</p>

            <form action="./service_function.php" method="post">
                <fieldset>
                    <div class="form-group" style="width:250px;">
                        <label>选择时间：<span style="color:red;">*预约时间请提前一天</span></label>
                        <div class="col-xs-5 date">
                            <div class="input-group input-append date" id="datePicker">
                                <input type="date" class="form-control" name="date" />
                                <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group"  style="width:250px;">
                            <label>选择医疗服务：</label>
                            <select class="form-control" name="dateToDeliver">
                                <option value="morning">早</option>
                                <option value="noon">中</option>
                                <option value="night">晚</option>
                            </select>
                        </div>


                    <label name="serviceType">选择医疗服务：</label>
                        <table class="table table-striped">
                        <tr>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check uncheck">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
                                        看医生
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
                                        住院
                                    </label>
                                </div>
                            </td> 
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
                                        化验
                                    </label>
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
                                        出院
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
                                        B超
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
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
                <button type="submit" class="btn btn-primary" style="margin-bottom:20px;">提交申请</button>
                <br/>
                </fieldset>
            </form>
            <br/>
        </div>
        </div>
        <!-- /.container-fluid-->
        <?php include_once "./component/footer.php"; ?>
    </div>
</body>
</html>
