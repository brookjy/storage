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
            <h2><b>出行接送申请</b></h2>
            <p>(我们会在第一时间办理您申请的服务，如果有急事，请打电话 XXX-XXXX-XXXX, 微信有时无法及时回复。)</p>

            <form>
                <fieldset>
                    <div class="form-group" style="width:300px;">
                        <label>选择出行时间：<span style="color:red;">*预约时间请提前一天</span></label>
                        <p>(只支持9点-17点的预约)</p>
                        <div class="col-xs-5 date">
                            <div class="input-group input-append date" id="datePicker">
                                <input type="date" class="form-control" name="date" />
                                <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"  style="width:250px;">
                        <label>出发地：</label>
                        <select class="form-control" id="DocSelect">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group"  style="width:250px;">
                        <label>目的地：</label>
                        <select class="form-control" id="DocSelect">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group"  style="width:250px;">
                        <label>人数:</label>
                        <input type="text" class="form-control" name="numbers" />
                    </div>

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
