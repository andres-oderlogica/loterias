<?php
include_once 'class_loteria.php';
$opcion = $_POST['opcion'];
$id     = $_POST['id'];
$idel     = $_POST['idel'];
$descripcion   = $_POST['descripcion'];

$disc   = new regLoteria();
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
			$disc->editar($id,$descripcion);
			break;
	default:
		# code...
		break;
}

?>