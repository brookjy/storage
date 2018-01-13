<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";
    include_once "./model/common.php";
    include_once "./model/member.func.php";
    
    //Check if the user is login
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
?>
<style>
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
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
            <h2><b>采购服务申请</b></h2>
            <p>(我们会在第一时间办理您申请的服务，如果有急事，请打电话 XXX-XXXX-XXXX, 微信有时无法及时回复。)</p>
            <p><b>备注： 公司每周5将进行一次采购，会将您这周申请的购买的食材在送餐的同时送至您的府上。</b></p>
            <br/>
            <p>请选择您的住宿类型：</p>
                <button class="tablinks btn btn-info" onclick="openType(event, 'house')">别墅</button>
                <button class="tablinks btn btn-info" onclick="openType(event, 'apt')">公寓</button>
            

            <div id="house" class="tabcontent" style="width:100%;border-top:1px solid #ccc;">
                <form action="./service_function.php" method="post">
                    <input type="hidden" name="property" value="house">
                    <input type="hidden" name="serviceType" value="采购服务">
                    <div class="form-group"  style="width:250px;">
                        <br/>
                        <label>选择您的住址：</label>
                        <select class="form-control" onchange="run()" name="origin_address" id="origin_address">
                            <option value= "1" >1 - 7706</option>
                            <option value= "2" >2</option>
                            <option value= "3">3</option>
                            <option value= 4 >其他(自己填写)</option>
                        </select>
                        <br/>
                        <input type="hidden" class="form-control" id="option_address" name="option_address" placeholder="201-6151 Westminster Hwy, Richmond">  
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">新鲜大土豆 $5/个</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="potato" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                                <option value= 3 >3</option>
                                                <option value= 4 >4</option>
                                                <option value= 5 >5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">新鲜大番茄 $5/个</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="tomato" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                                <option value= 3 >3</option>
                                                <option value= 4 >4</option>
                                                <option value= 5 >5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">新鲜大米 $5/袋</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="rice" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                                <option value= 3 >3</option>
                                                <option value= 4 >4</option>
                                                <option value= 5 >5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="purchase_service">提交申请</button>
                    </div>
                    
                </form>
            </div>

            <div id="apt" class="tabcontent" style="width:100%;border-top:1px solid #ccc;">
                <form action="./service_function.php" method="post">
                    <input type="hidden" name="property" value="apartment">
                    <input type="hidden" name="serviceType" value="采购服务">
                    <div class="form-group"  style="width:250px;">
                        <br/>
                        <label>选择您的住址：</label>
                        <select class="form-control" onchange="run()" name="origin_address" id="origin_address">
                            <option value= "1" >1 - 7706</option>
                            <option value= "2" >2</option>
                            <option value= "3">3</option>
                            <option value= 4 >其他(自己填写)</option>
                        </select>
                        <br/>
                        <input type="hidden" class="form-control" id="option_address" name="option_address" placeholder="201-6151 Westminster Hwy, Richmond">  
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">新鲜大土豆 $5/个</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="potato" style="display:inline;width:60%;">
                                                <option value= 1 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                                <option value= 3 >3</option>
                                                <option value= 4 >4</option>
                                                <option value= 5 >5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">新鲜大番茄 $5/个</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="tomato" style="display:inline;width:60%;">
                                                <option value= 1 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                                <option value= 3 >3</option>
                                                <option value= 4 >4</option>
                                                <option value= 5 >5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">新鲜大米 $5/袋</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="rice" style="display:inline;width:60%;">
                                                <option value= 1 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                                <option value= 3 >3</option>
                                                <option value= 4 >4</option>
                                                <option value= 5 >5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="purchase_service">提交申请</button>
                    </div>  
                </form>
            </div>
            <br/>
        </div>
        </div>

        <script>
        function openType(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        function run() {
            if(document.getElementById("origin_address").value == 4){
                document.getElementById("option_address").type = 'text';
            }else{
                document.getElementById("option_address").type = 'hidden';
            }
        }
        </script>
        <!-- /.container-fluid-->
        <?php include_once "./component/footer.php"; ?>
        
    </div>
</body>
</html>
