

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
