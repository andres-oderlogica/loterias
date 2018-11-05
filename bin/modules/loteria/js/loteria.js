function verCargas()
{  
    $.ajax({
        url: 'clases/control_listar.php',
        success: function (data)
        {
            $('#ver_cargas').html(data);
           
            $('#myTable').DataTable({
                sPaginationType: "bootstrap", 
                aLengthMenu: [6],
                order:[['0','desc']],
                language: {sProcessing: "Procesando...",
                    sLengthMenu: "Mostrar _MENU_ registros",
                    sZeroRecords: "No se encontraron resultados",
                    sEmptyTable: "Ningún dato disponible en esta tabla",
                    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                    sInfoPostFix: "",
                    sSearch: "Buscar:",
                    sUrl: "",
                    sInfoThousands: ",",
                    sLoadingRecords: "Cargando...",
                    oPaginate: {
                        sFirst: "Primero",
                        sLast: "Último",
                        sNext: "Siguiente",
                        sPrevious: "Anterior"
                    },
                    oAria: {
                        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                        sSortDescending: ": Activar para ordenar la columna de manera descendente"
                    }
                }});
            $('.dataTables_filter label').css('display', 'block !important');
            $('.dataTables_filter label input[type="search"]').addClass('form form-control');
            $('input[name="myTable_length"]').addClass('form form-control');
           // pag_data_table();
        },
         complete: function () {
                //loadingstop();
               
            }
    });
}

$(function ()
{
$('#form_loterias').submit(function (e)
    {
        e.preventDefault();        
        var data = new FormData($("#form_loterias")[0]);
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                if (!data.guardado)
                {
                    bootbox.alert('Se presento un error al regisrar el dato');
                }
                    bootbox.alert("Se Guardo con exito", function(){ 
                                 $('#descripcion_loteria').val("")                     
                                 //$('#id_tiposolicitud').val("-1")
                                
                                })
                
            },
            complete: function () {
                verCargas();
               // $("#mostrar").hide();
               // $('#sub').val(-1);
               // $('#titulo').val("");
               // $('#descripcion').val("");
            }
        });
    });
 });

function eliminar(id){ 
  bootbox.confirm("Desea eliminar el registro?", function(result) {
 if(result){
$.ajax({
              url: "clases/control_crud.php",
              type: "POST",
              dataType: "json",
              data: {opcion:"1",idel:id},
          })
      .done(function() {         
        
    });
      bootbox.alert("Se elimino el registro con exito", function(){ 
                                 verCargas()
                                })
  }
})
}

function editar(id)
{   
    
    $.ajax({  url: "clases/control_crud.php",
              type: "POST",
              dataType: "json",
              data: {opcion:"2",id:id},
          })
      .done(function(data) {
      //console.log(data) 
    $("#descripcion").val(data.descripcion);
    $("#id").val(id);    
            
    });    

     
}


verCargas();

$(document).ready(function() {
$("#mostrar").hide();
$('select#doc').on('change', function(){
   var valor = $(this).val();
   $('#sub').val(valor);
   if(valor == 1)
   {
    $("#mostrar").show();
   }
   else
   {
    $("#mostrar").hide();
   }
              
   });


})


