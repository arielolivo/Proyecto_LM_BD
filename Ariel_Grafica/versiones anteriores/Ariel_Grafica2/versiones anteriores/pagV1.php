<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grafica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="librerias/main.css">
    <script src="main.js"></script>
    <!---grafica de clima--->
    <script src="librerias/highcharts.js"></script>
    <script src="librerias/series-label.js"></script>
    <script src="librerias/exporting.js"></script>
    <script src="librerias/export-data.js"></script>
    <!--fin de grafica-->

    <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
   
    

</head>
<body id='body' >
<div class="tipo">
      <a href="/proyecto/Proyecto/Principal.php" class="btn w-M br-4 stl-1-black" >Principal</a>
      <button id='tema' class="btn w-M br-4 stl-1-black">CAMBIAR TEMA</button>
</div>


    


<div id="container" style="min-width: 310px; height: 450px; margin-top:20px">
<script>
Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Grafica'
    },
    subtitle: {
        text: 'by: El mejor Grupo'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Temperature'
        },
        labels: {
            formatter: function () {
                return this.value + '°';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#915A4E',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Temperatura',
        marker: {
            symbol: 'square'
        },
        data: [1.5, 2.9, 3.5, 4.5, 8.2, 9.5, 10.2, {
            y: 26.5,
            marker: {
                symbol: ''
            }
        }, 13.3, 16.3, 17.9, 8.6]
    }, {
        name: 'Particulas',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
            marker: {
                symbol: ''
            }
        }, 20.2, 30, 6.6, 15.8,10, 20, 30, 25, 20, 18]
     
    }, {
        name: 'Humedad',
        marker: {
            symbol: 'circle'
        },
        data: [{
            y: 5.9,
            marker: {
                symbol: ''
            }
        }, 4.2,  17.0, 16.6, 14.2, 4.8]
     
    }, {
        name: 'Indice UV',
        marker: {
            symbol: 'triangle'
        },
        data: [{
            y: 16.9,
            marker: {
                symbol: ''
            }
        }, 10.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 8.2, 12.3, 16.6, 10.8]
     
    }]
});
</script>
</div>

</body>
<script src="librerias/sistema-de-tema.js" type="text/javascript" charset="utf-8"></script>
<!--
colores para las lineas    
warning : #FEEBB5
succes: #BAE4C6
danger: #F5BDC5
primary: #B1D7FD

-->
</html>