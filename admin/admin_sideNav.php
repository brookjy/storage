<?php
$food_admin = $_COOKIE['admin'] == "food_service" ? true:false;
$drive_admin = $_COOKIE['admin'] == "drive_service" ? true:false;
$repair_admin = $_COOKIE['admin'] == "repair_service" ? true:false;
$housekeeping_admin = $_COOKIE['admin'] == "housekeeping_service" ? true:false;

?>


<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="./">领婴海外孕产</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <?php 
        if ($drive_admin) { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="medical_service.php">
            <i class="fa fa-fw fa-ambulance"></i>
            <span class="nav-link-text">医疗接送</span>
          </a>
        </li>
        <?php } 
        if ($food_admin) { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin_foodSummary.php">
            <i class="fa fa-fw fa-coffee"></i>
            <span class="nav-link-text">订餐服务</span>
          </a>
        </li>
        <?php } 
        if ($drive_admin) { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="purchase_service.php">
            <i class="fa fa-fw fa-edit"></i>
            <span class="nav-link-text">采购服务</span>
          </a>
        </li>
        <?php } 
        if ($repair_admin) { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="repair_service.php">
            <i class="fa fa-fw fa-thumbs-o-up"></i>
            <span class="nav-link-text">住房维修</span>
          </a>
        </li>
        <?php } 
        if ($drive_admin) { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="pickup_service.php">
            <i class="fa fa-fw fa-automobile"></i>
            <span class="nav-link-text">出行接送</span>
          </a>
        </li>
        <?php } 
        if ($housekeeping_admin) { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="housekeeping_service.php">
            <i class="fa fa-fw fa-group"></i>
            <span class="nav-link-text">孕产服务</span>
          </a>
        </li>
        <?php } ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
       
        <li class="nav-item">
        <form action="../form_function.php" method="post">
            <button class="btn" style="color:#007bff;cursor: pointer; margin-right:20px;" type="submit" name="logout">登出</button>
        </form>
        </li>
      </ul>
    </div>
</nav>