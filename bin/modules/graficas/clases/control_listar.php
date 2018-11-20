<?php
include_once 'reporte.php';

$reporte   = new Reporte();


switch ($_POST['opcion']) {
	
	case 'numeros':
	echo json_encode($reporte->getDetalleNumeros($_POST['fecha_ini'],$_POST['fecha_fin']));
	break;

	
	
	
}

?>