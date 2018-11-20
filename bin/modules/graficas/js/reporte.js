$(document).ready(function() {

  $("#datos_numeros").on( "click", function() {
    $.ajax({    url: "clases/control_listar.php",
              type: "POST",
              dataType: "json",
              data: {opcion:"numeros",fecha_ini:$("#fecha_inicial").val(),fecha_fin:$("#fecha_final").val()},
        success: function (datos)
        { 
          if(datos!=null)
          {
             data=[]
             for (var i = 0; i < datos.length; i++) {
             porcentaje=(datos[i].cantidad*100)/datos[i].total
             data.push({"name":datos[i].numero.toString(),"y":porcentaje})
             
             }
             
          }
             
             crear_grafica(data)
        }
          }) 

  })

  function crear_grafica(data) {
// Create the chart
var identificador=''
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Posibilidad del Numero'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'respuestas'
    },
    yAxis: {
        title: {
            text: 'Porcentaje de Caidas en el criterio de busqueda'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
    },

    "series": [
        {
            "name": "Numero",
            "colorByPoint": true,
            "data": data
        }
    ]
});
}
    

})