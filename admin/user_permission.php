<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/adminHeader.php";
    
    
    //Check if the user is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>

<?php 
    include_once "./model/common.php";
    include_once "./model/user_permission.func.php";

    $user_permission = new User_Permission();
    $user_permission->generatePermission();
?>
<br/><br/>
<?php 
    include_once "../component/adminFooter.php";
?>
</body>
</html>