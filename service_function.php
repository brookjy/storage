<?php
    include_once "./model/common.php";
	include_once "./model/service.func.php";

	$service = new Service();
	// $history = new History();
	if(isset($_POST['food_service'])){
		$service->food_service();
	} else if(isset($_POST['medical_service'])){
		$service->medical_service();
	}
?>