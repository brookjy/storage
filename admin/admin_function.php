<?php
    include_once "./model/common.php";
	include_once "./model/user_permission.func.php";

    $user_permission = new User_Permission();
    
    if(isset($_POST['update_user'])){
        $user_permission->update_user();
    } 
?>