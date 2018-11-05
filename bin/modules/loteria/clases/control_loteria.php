<?php
extract($_POST);
include_once 'class_loteria.php';
$disc       = new regLoteria();	
//var_dump($_POST['descripcion_loteria']);
try
{
	$disc->reg_loteria($descripcion_loteria);

	echo json_encode(array('guardado' => TRUE));
}
catch (Exception $ex)
{
	 echo json_encode(array('guardado' => FALSE));
}
?>