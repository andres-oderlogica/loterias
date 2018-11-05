<?php
include '../../../../core.php';
class comboLoteria
{
	

	function __construct()
	{      
      $this->db = App::$base; 
	}

	function getLoteria()
	{	  
       $sql="select * 
  			from loteria 
  			 ";
		$rs = $this->db->dosql($sql, array()); 
        while (!$rs->EOF) 
           {
	         $data[] = array(
	         	'id_loteria' => $rs->fields['id_loteria'],
	         	'descripcion' => $rs->fields['descripcion']
	         	);	                             
	
	          $rs->MoveNext();	    
            }              
          
       return $data;
	}


	
	}

	?>