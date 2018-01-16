<?php
    include_once "./model/common.php";
	include_once "./model/service.food.php";
	include_once "./model/service.purchase.php";
    include_once "./model/service.medical.php";
    include_once "./model/service.repair.php";
    include_once "./model/service.housekeeping.php";

    $food_service = new Food_Service();
	$purchase_service = new Purchase_Service();
    $medical_service = new Medical_Service();
    $repair_service = new Repair_Service();
    $housekeeping_service = new Housekeeping_Service();
    
	if(isset($_POST['food_service'])){
		$food_service->food_service();
	} else if(isset($_POST['purchase_service'])){
        $purchase_service->purchase_service();
    } else if(isset($_POST['medical_service'])){
		$medical_service->medical_service();
	} else if(isset($_POST['repair_service'])){
		$repair_service->repair_service();
	} else if(isset($_POST['housekeeping_service'])){
		$housekeeping_service->housekeeping_service();
	}
?>