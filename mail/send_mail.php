<form id="frmEmail" name="frmEmail" action="/mail/sendemailPHPMail.php" method="post">
                        <div class="col-md-6 text-box">
                            <input name="name" type="text" value="test" />
                            <input name="address" type="text" value="479428597@qq.com" />
                            <input name="kind" type="text" value="manager" />
                        </div>
                        <div class="col-md-6 textarea">
                            <textarea name="content" >内容</textarea>
                        </div>
                        <div class="clearfix"> </div><br />
                        <input class="btn btn-primary btn-red-lg" type="submit" onClick="myFunc()" value="提交" />
                    </form>

<?php
include_once "../model/common.php";

GLOBAL $mysqli;
$check_query="SELECT * FROM food_service";
$result = $mysqli->query($check_query);
if ($result->num_rows > 0){
    $check_retrieve = $result->fetch_assoc();

    //echo "<script type=\"text/javascript\">alert('预定失败！您在".$check_retrieve['serviceType']."已经预定过接送服务! ');</script>";

    return true;
}else{
    return true;
}
 ?>

                    <script>
                            function myFunc() {
                                alert('预定失败！您在".$check_retrieve['serviceType']."已经预定过接送服务!');
                            document.getElementById("frmEmail").submit();

                            }
                    </script>
