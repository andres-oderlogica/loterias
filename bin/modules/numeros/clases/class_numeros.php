<?php
session_start();
include '../../../../core.php';
include_once Config::$home_bin.Config::$ds.'db'.Config::$ds.'active_table.php'; 
 class Numero extends ADOdb_Active_Record{}

class regNumeros
{
 

public function reg_numeros($id_loteria,$numero, $fecha)
    {
       
        $reg              = new Numero('numeros_loteria');
        $reg->id_loteria     = $id_loteria; 
        $reg->numero     = $numero; 
        $reg->fecha     = $fecha;
        $reg->Save();
        
    } 



public function listNumero()
{
	$con = App::$base;
              $sql = "SELECT 
              `numeros_loteria`.`id_numeros`,
            `loteria`.`descripcion`,
            `numeros_loteria`.`id_loteria`,
            `numeros_loteria`.`numero`,
            `numeros_loteria`.`fecha`,        
               \"
              <button type=\'button\' class=\'btn btn-info btn-sm btn_edit\' data-title=\'Edit\' data-toggle=\'modal\' data-target=\'#myModal\' >
               <span class=\'glyphicon glyphicon-edit\'></span></button>
               </div>
                \" 
               as editar,

                \"
              <button type=\'button\' class=\'btn btn-danger btn-sm btn_delete\' data-title=\'Del\' data-toggle=\'modal\' data-target=\'#myModal1\' >
               <span class=\'glyphicon glyphicon-trash\'></span></button>
               </div>
                \" 
               as eliminar                    
              FROM
                `loteria`
              INNER JOIN `numeros_loteria` ON (`loteria`.`id_loteria` = `numeros_loteria`.`id_loteria`)";

		$rs = $con->dosql($sql, array());
        $tabla = '<table id="myTable" class="table table-hover table-striped table-bordered table-condensed" cellpadding="0" cellspacing="0" border="1" class="display" >
                        <thead>
                        <tr>
                        <th id="yw9_c0">#</th>
                        <th id="yw9_c1">Loteria</th>
                        <th id="yw9_c2">Numero</th>
                        <th id="yw9_c3">Fecha</th>
                        <th id="yw9_c4" align="center">Editar</th>
                        <th id="yw9_c5" align="center">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>';
		          while (!$rs->EOF) 
                   {
                    
                   	$tabla.='<tr >  
                            <td>                            
                                '.utf8_encode($rs->fields['id_numeros']).'
                            </td>
                            <td>                            
                                '.utf8_encode($rs->fields['descripcion']).'
                            </td> 
                            <td>                            
                                '.utf8_encode($rs->fields['numero']).'
                            </td> 
                            <td>                            
                                '.utf8_encode($rs->fields['fecha']).'
                            </td>                                                     
                            <td align = "center" width= "80" onclick="editar('.$rs->fields['id_numeros'].')">                            
                                '.utf8_encode($rs->fields['editar']).'
                            </td>
                            <td align = "center" width= "80" onclick="eliminar('.$rs->fields['id_numeros'].')">                            
                                '.utf8_encode($rs->fields['eliminar']).'
                            </td>

                            ' ;                                                                               
                            
            $tabla.= '</tr>';                                     
	
	               $rs->MoveNext();	    
                   }  
            
        $tabla.="</tbody></table>";
        return $tabla;

}


public function eliminar($id)
{
    $reg              = new Loteria('loteria');
    $reg->load("id_loteria = {$id}");
    $reg->Delete();
}


  public function editar($id,$desc)
    {
        $reg              = new Loteria('loteria');
        $reg->load("id_loteria = {$id}");
        $reg->descripcion      = $desc;
        $reg->Save();
        //return $reg->id_grado;
    }

  public function buscar($id)
  {
    $db = App::$base;
        $sql = "SELECT 
                  id_loteria,
                  descripcion
                FROM
                  `loteria`
                WHERE id_loteria = ?";
                    $rs = $db->dosql($sql, array($id));

    while (!$rs->EOF) 
                   {

                    $res = array( 
                      "id_loteria" => $rs->fields['id_loteria'],
                     "descripcion" => $rs->fields['descripcion']
                      );

                    $rs->MoveNext();      
                   } 
                   return $res;

  }

}

?>