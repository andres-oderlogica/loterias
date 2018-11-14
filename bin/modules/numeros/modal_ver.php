

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"> 
 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Numeros</h4>
<br>
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">   
     <div class="form-group ">
      <label for="descripcion_estado">Numero</label>
          <input class="form-control" type ="text" id="mod_numero" name="mod_numero"><br>   
          <input type="hidden" id="id">                       
     </div>

     <div class="form-group ">
      <label for="descripcion_estado">Fecha</label>
          <input class="form-control" type ="date" id="mod_fecha" name="mod_fecha"><br>   
                                
     </div>

        <div class="modal-footer">         
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary " id= "btn_save" name="save" type="submit">Guardar Cambios</button>
        </div>
      </div>
</div>

  </div>
