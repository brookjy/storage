<?php
	include_once "../model/common.php";
	include_once "./admin_food.php";

    $admin_food = new admin_food();

	if(isset($_POST['breakfast'])){
		$admin_food->admin_foodListing("breakfast");
	} elseif(isset($_POST['lunch'])){
		$admin_food->admin_foodListing("lunch");
	}elseif(isset($_POST['dinner'])){
		$admin_food->admin_foodListing("dinner");
	}
?>