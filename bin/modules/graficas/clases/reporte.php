<?php
session_start();
include '../../../../core.php';

class Reporte
{
	public function getDetalleNumeros($fecha_ini,$fecha_fin)
{
    $con = App::$base;
    $sql = "SELECT 
    DISTINCT numero
FROM
    numeros_loteria
where DATE(fecha) >=? and DATE(fecha) <=?";

        $rs = $con->dosql($sql,array($fecha_ini,$fecha_fin));
        //var_dump($rs);
         while (!$rs->EOF) 
                   {
                    $cantidad= $this->cantidadApariciones($rs->fields['numero'],$fecha_ini,$fecha_fin);
                    $total=$this->getCantidadDeNumeros($fecha_ini,$fecha_fin);
                    $res[]= array('numero' => $rs->fields['numero'],
                                              'cantidad'=>$cantidad,
                                              'total'=>$total
                                              );                  
                   $rs->MoveNext();     
                   }  
            
       
        return $res;

}

public function cantidadApariciones($numero,$fecha_ini,$fecha_fin)
{
    $con = App::$base;
    $sql = "select count(id_numeros) as cantidad from numeros_loteria where numero=? and DATE(fecha) >=? and DATE(fecha) <=?";

    $rs = $con->dosql($sql,array($numero,$fecha_ini,$fecha_fin));

    return $rs->fields['cantidad'];
     
}

public function getCantidadDeNumeros($fecha_ini,$fecha_fin)
{
    $con = App::$base;
    $sql = "SELECT 
    COUNT(id_numeros) AS cantidad
FROM
    numeros_loteria
where DATE(fecha) >=? and DATE(fecha) <=?";

  $rs = $con->dosql($sql,array($fecha_ini,$fecha_fin));
  
  return $rs->fields['cantidad'];

}

}

?>