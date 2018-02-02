<?php DEFINE('Template_Call', TRUE); 

    include_once "../../component/adminHeader.php";
    
    //Check if the user is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>
 <h3>--地图管理后台--</h3>
 <br/>
<?php 
    include_once "../model/common.php";
    include_once "../model/map_edit.php";
    include_once "../model/check.admin.php";

    $check = new Check_Admin;
    $check->check_admin();

    $user_permission = new User_Permission();
    $user_permission->generatePermission();

    if(isset($_POST['map_delete'])){
		$user_permission->user_modify();
	} 
?>
<br/><br/>
<?php 
    include_once "../../component/adminFooter.php";
?>
</body>
</html>