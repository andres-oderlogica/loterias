<?php
extract($_POST);
include_once 'class_numeros.php';
$disc       = new regNumeros();	
//var_dump($_POST['descripcion_loteria']);
try
{
	$disc->reg_numeros($id_loteria,$numero, $fecha);

	echo json_encode(array('guardado' => TRUE));
}
catch (Exception $ex)
{
	 echo json_encode(array('guardado' => FALSE));
}
?>