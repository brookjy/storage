<?php
    include_once "./model/common.php";
	include_once "./model/user_permission.func.php";
    include_once "./model/admin_login.func.php";
    
    $user_permission = new User_Permission();
    $admin = new Admin();
    
    if(isset($_POST['update_user'])){
        $user_permission->update_user();
    }elseif(isset($_POST['admin_login'])){
		$admin->admin_login();
	}elseif(isset($_POST['delete_user'])){
		$user_permission->delete_user();
	}
?>