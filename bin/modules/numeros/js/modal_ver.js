$(document).ready(function() {


$("#btn_save").click(function(){
  var estado1 = $('input:radio[name=estado]:checked').val();
  $.ajax({
    url: "clases/control_crud.php",
    type: "POST",
    dataType: "json",
    data: {opcion:"3",
    id:$('#id').val(),
    descripcion:$('#descripcion').val()
    },
          })
      .done(function() {     
      $('#id').val(""),
      $('#descripcion').val("")     
             })
      .always(function(){
        $('#myModal').modal('toggle');
      parent.verCargas(); 

      })
      
    });



})