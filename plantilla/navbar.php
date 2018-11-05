	<?php
  session_start();
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <?php
        if($_SESSION['perfil'] == 'Administrador')
        {
        ?>
       	<li class="<?php echo $active_clientes;?>"><a href="../loteria/loteria.php"> Registra Loteria</a></li>
    		<li class="<?php echo $active_usuarios;?>"><a href="../numeros/numeros.php">Registrar Numeros</a></li>

        <?php
        }
        if($_SESSION['perfil'] == 'Gerente')
        {
        ?>   
         <li class=""><a href="../sistema/sistema.php"></i> Configuracion</a></li>
        <li class="<?php echo $active_new;?>"><a href="nueva_factura.php"> Nueva Factura <span class="sr-only">(current)</span></a></li>
        <li class="<?php echo $active_facturas;?>"><a href="facturas.php"></i> Admin Facturas</a></li>
         <li class=""><a href="../cuadre/cuadre.php"></i> Reporte Ventas</a></li>
        

        <?php
        }
        if($_SESSION['perfil'] == 'Empleado')
        {
        ?>
        <li class="<?php echo $active_facturas;?>"><a href="facturas.php"></i> Admin Facturas</a></li>
        <?php
        }
        ?>


        <li><a href="../../../login.php?logout"><i class='glyphicon glyphicon-off'></i> Cerrar Sesion</a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">
        
		<!--<li><a href="../../../login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>-->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>