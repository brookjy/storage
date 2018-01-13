<?php
    include_once "./model/common.php";
	include_once "./model/service.food.php";
    include_once "./model/service.purchase.php";

    $food_service = new Food_Service();
    $purchase_service = new Purchase_Service();
	// $history = new History();
	if(isset($_POST['food_service'])){
		$service->food_service();
	} else if(isset($_POST['medical_service'])){
		$service->medical_service();
	}  else if(isset($_POST['purchase_service'])){
        $purchase_service->purchase_service();
    }
?>