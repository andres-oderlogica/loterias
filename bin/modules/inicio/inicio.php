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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include("../../../plantilla/head.php");?>
     <script src="../../../lib/js/jquery.js?v=<?php echo str_replace('.', '', microtime(true)); ?>"></script>
    <script src="../../../lib/jquery-ui.min.js?v=<?php echo str_replace('.', '', microtime(true)); ?>"></script>  
     <script src="../../../lib/jquery/jquery-2.2.3.min.js"></script> 
    
  </head>
  <body>
  <?php
  include("../../../plantilla/navbar.php");
  ?> 

 <div class="col-md-12">
      <div class="panel panel-primary">
          <div class="panel-heading"><h4>Inicio</h4></div>
              <div class="panel-body">
<center><h1><strong>Sistema LOTERIAS</strong></h1></center>
                   
                    </div>
                </div>
            </div>


<?php
  include '../../../plantilla/footer1.php';
  ?>


</body>
</html>


