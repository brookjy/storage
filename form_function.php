<?php
    include_once "./model/common.php";
	include_once "./model/member.func.php";

	$member = new Member();
	// $history = new History();
	if(isset($_POST['login'])){
		$member->login();
	}elseif(isset($_POST['register'])){
		$member->register();
	}elseif(isset($_POST['admin-login'])){
		$member->admin_login();
	}elseif(isset($_POST['history'])){ 
		$history->history_list();
	}elseif(isset($_POST['logout'])){
        $member->logout();
    }elseif(isset($_POST['getUser'])){
        $member->getUser();
    }elseif(isset($_POST['update_user'])){
        $member->update_user();
    }
?>