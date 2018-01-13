<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php"
?>

<body class="bg-dark">
    <div class="well">
    <div id="datetimepicker1" class="input-append date">
    <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
    <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
        </i>
    </span>
    </div>
    </div>
<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({
            language: 'pt-BR'
        });
    });
</script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
<!-- date picker scripts for all pages-->
<script src="js/bootstrap-datetimepicker.min.js"></script>
  </div>
</body>

</html>

