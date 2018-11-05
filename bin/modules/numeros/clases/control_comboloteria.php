<?php
include '../../../../core.php';
include 'combo_loteria.php';

       $com = new comboLoteria();
       $rst=$com->getLoteria();
	   
       if($rst==null)
            {
            $res=json_encode(0);		 
            }
        else
		    {
         $res=json_encode($rst);		 
        }		

  echo $res;  

	?>