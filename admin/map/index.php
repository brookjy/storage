<?php DEFINE('Template_Call', TRUE); 
    
    //Check if the user is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>领婴后台管理</title>
    <!-- Bootstrap core CSS-->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
        .header{
            margin-top: 50px;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-dark">
  <div class="container">
        <div class="header">
            <div id="map"></div>
        </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script>
      function initMap() {
        var richmond = {lat: 49.16319, lng: -123.13775};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: richmond
        });

        <?php 
            include_once "../model/common.php";
            include_once "../model/access.func.php";

            $makerfunc = new AccessAd;
            $makerfunc-> generateMarker();
        ?>
        var marker = new google.maps.Marker({
          position: richmond,
          map: map
        });
        
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAX84TTeE_DvhLEAU5A3VwADL5Ryvjz3c&callback=initMap">
    </script>
</body>

</html>