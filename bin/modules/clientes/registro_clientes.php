<?php
session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../../login.php");
    exit;
        }
     
  $active_new="active";
  $active_solicitud="";
  $active_clientes="";
  $active_usuarios="";  
  $title="Inicio";
  
?>
<!DOCTYPE html>
<html>
<head><title>Registra Loterias</title>
  <meta charset="utf-8" />
 
	 <?php include("../../../plantilla/head.php");?>
     <script src="../../../lib/js/jquery.js?v=<?php echo str_replace('.', '', microtime(true)); ?>"></script>
    <script src="../../../lib/jquery-ui.min.js?v=<?php echo str_replace('.', '', microtime(true)); ?>"></script>  
     <script src="../../../lib/jquery/jquery-2.2.3.min.js"></script> 
  <script src='js/clientes.js'></script>
  <script src='js/tabla.js'></script>
  <script src='js/modalEditarClientes.js'></script>
  <script src='js/validar.js'></script>
  <script src="../../../lib/bootbox.min.js"></script>
  <script src="../../../lib/bootstrap.min.js" data-semver="3.1.1" data-require="bootstrap"></script>
<link type="text/css" href="../../../lib/datatable/css/jquery.dataTables.min.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="../../../lib/datatable/js/jquery.dataTables.js"></script>


</head>
<body>
<?php
include '../../../plantilla/navbar.php';
?> 



<div class="col-md-12">
      <div class="panel panel-primary">
          <div class="panel-heading"><h4>Registrar Loterias</h4></div>
              <div class="panel-body">
  

      </div>
      </div>
     </div>
 
 
  </div>
 </div>
</div>
</div>

<div class="col-md-12">
      <div class="panel panel-primary">
          <div class="panel-heading"><h4>Inicio</h4></div>
              <div class="panel-body">
           
                    </div>
                </div>
        </div>


<div id="contenido"></div>
</div>


<?php
include '../../../plantilla/footer1.php';
?>
<?php
include 'modal_editarClientes.php';
?>

</body>
</html>


