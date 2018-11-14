<?php
include_once 'class_numeros.php';
$opcion = $_POST['opcion'];
$id     = $_POST['id'];
$idel     = $_POST['idel'];
$numero   = $_POST['numero'];
$fecha	=$_POST['fecha'];

$disc   = new regNumeros();
//var_dump($estado);
switch ($opcion) {
	case '1':
			$disc->eliminar($idel);
		break;
	case '2':	
		$res = $disc->buscar($id);
		echo json_encode($res);		
		break;
		case '3':
			$disc->editar($id,$numero,$fecha);
			break;
	default:
		# code...
		break;
}

?>