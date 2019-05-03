<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Principal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--Bootstrap-->
<link rel="stylesheet" href="bootstrap\bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="bootstrap\jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="bootstrap\popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="bootstrap\bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--Calendario-->
<link href="calendario\bootstrap.min.css" rel="stylesheet">
<script src="calendario\bootstrap.min.js"></script>
<script type='text/javascript' src='calendario\jquery-1.8.3.js'></script>
<link rel="stylesheet" href="calendario\bootstrap-datepicker3.min.css">
<script type='text/javascript' src="calendario\bootstrap-datepicker.min.js"></script>
<script type='text/javascript'>
$(function(){
$('.input-daterange').datepicker({
    autoclose: true
});
});
</script>
<link href="calendario\bootstrap.css" rel="stylesheet"/>
<link href="calendario\bootstrap-datetimepicker.css" rel="stylesheet"/>
<script src="calendario\jquery.js"></script>
<script src="calendario\moment.min.js"></script>
<script src="calendario\bootstrap.js"></script>
<script src="calendario\bootstrap-datetimepicker.min.js"></script>
<!--Slider 2 valores-->
<link rel="stylesheet" href="slider\ion.rangeSlider2.min.css"/>
<script src="slider\jquery.min.js"></script>
<link rel="stylesheet" href="slider\ion.rangeSlider.min.css"/>
<script src="slider\ion.rangeSlider.min.js"></script>
<!--Boton Responsive-->
<style>
#buscar{
    height: 180px;
    width:270%;
    Margin-left:20px;
}
@media only screen and (max-width: 992px) {
    #buscar {
        width:255%;
    }
}
@media only screen and (max-width: 767px) {
    #buscar {
        width:100%;
        height:60px;
        padding-left:0px;
        padding-right: 0px;
        margin-bottom:45px;
        Margin-left:0px;
        }
    .divbuscar{
    top:0px;
}
}
@media only screen and (max-width: 658px) {
    #UsuarioA{
        display:none;
    }
    #PassA{
        display:none;
    }
    #fi{
        display:none;
    }
    #fr{
        display:none;
    }
}

</style>
<!--Fin Boton Responsive-->
</head>
<!--Color oscuro  style="background-color:#212121"-->
<body style="background-color:#EAE9E9">
<!--Contenedor-->
<div class="container"  style="padding-top:60px">
<!--Cabecera-->
<div style="position:absolute;left:0px;top:0px;z-index:100;background-color: #577284;width: 100%;height:54px;border-radius:0px 0px 30px 30px">




<form action="" method="post">
<a href="#" class="btn btn-info" role="button" style="margin-left:5%;margin-top:10px;margin-bottom:10px;height:32px">Estadísticas</a>




<div style="float:right;margin-right:5%">
<input type="text" id="UsuarioA" placeholder="Usuario" style="margin-top:10px;margin-bottom:10px;height:32px;border-radius:5px 5px 5px 5px">
<input type="password" id="PassA" placeholder="Contraseña" style="margin-top:10px;margin-bottom:10px;height:32px;border-radius:5px 5px 5px 5px">




<a href="#" class="btn btn-warning" role="button" style="margin-top:10px;margin-bottom:10px;height:32px">Administración</a>




</div>
</form>
</div>
<!--Fin Cabecera-->
<!--Formulario-->
<!--Inicio Grupo de formularios-->
<div class="form-group">
<!--Inicio columna de formularios-->
<div class="form-row">
<div class="col-md-9">
<form action="consulta.php" method="post">
<!--Filtro Calendario-->
<span>Fecha del registro</span>
<div class="input-daterange input-group form-group" id="datepicker">
<!--Filtro Calendario1-->
<input type="text" id="datetimepicker1" class="input-sm form-control" name="fecha1" placeholder="Fecha de inicio"/>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
<!--Etiqueta-->
<span class="input-group-addon" style="width:60px">Hasta</span>
<!--Filtro Calendario2-->
<input type="text" id="datetimepicker2" class="input-sm form-control" style="border-radius:0px 3px 3px 0px" name="fecha2" placeholder="Fecha final"/>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datetimepicker();
    });
</script>
</div>
<!--Fin Filtro Calendario-->
<!--Filtro Medida-->
<div class="form-group">
<span>Tipo de medida: </span>
<select class="form-control" type="text" name="UniMed" id="UniMed">




<!--isset($_COOKIE['']) -> selected-->
<option value="0"></option>
<option value="1">ºC</option>
<option value="2">Particulas por pie cúbico</option>
<option value="3">Porcentaje de humedad</option>
<option value="4">Índice de rayos UVA</option>





</select>
</div>
<!--Fin Filtro Medida-->
<!--Inicio seleccionar 2 valores-->
<div class="form-group">




<!-- isset($_COOKIE[''])
min tabla
max tabla
from form
to form
-->
<input type="text" class="js-range-slider" name="rango" value=""
        data-type="double"

        data-min="-200"
        data-max="200"
        data-from="-200"
        data-to="200"

        data-grid="true"
        data-skin="round"
        data-decorate-both="false"
    />
<script>$(".js-range-slider").ionRangeSlider();</script>
</div>
<!--Fin seleccionar 2 valores-->
<!--Boton buscar-->
</div>
<div class="form-group col-md-1" style="position:relative;top:20px;margin-bottom:0px;padding-left: 0px;padding-right: 0px;margin-left: 0px;margin-right: 0px">
<input id="buscar" class="btn btn-primary" type="submit" value="buscar">
</div>
<!--Fin Boton buscar-->
</div>
<!--Fin columna de formularios-->
</div>
<!--Fin Grupo de formularios-->
</form>
<!--Fin formulario-->
<!--Inicio Consulta-->







    <?php
    include("otroprueba.php");
    $objBd=new AdaCnxBd("localhost","estacion","root","");
    $objBd->conectarBD();

    if(isset($_REQUEST['posicion'])){
        $inicio = $_REQUEST['posicion'];
    } else {
        $inicio = 0;
    }
print "<div style='width:100%;height:fit-content'>";
    //Boton de anterior
print "<div id='fi' style='float:left;width:8%;height:8%;margin-top:100px'>";
    if($inicio == 0){
        print "<img src='flecha-i.png' style='width:100%;height:100%'></img>";
    } else {
        $anterior = $inicio-1;
        print "<a href='Principal.php?posicion=$anterior'><img src='flecha-i.png'style='width:100%;height:100%'></img></a>";
    }
print "</div>";




print "<div style='width:83.7%;float:left;margin-left:1px;margin-right:1px'>";
    print "<table class='table' style='width:100%'>";
    print "<thead class='thead-dark'>";
    print "<tr>";
    print "<th scope='col' style='text-align:center'>Fecha - Hora</th>";
    print "<th scope='col' style='text-align:center;border-left: 1px solid grey'>Tipo</th>";
    print "<th scope='col' style='text-align:center;border-left: 1px solid grey'>Valor</th>";
    print "<th scope='col' style='text-align:center;border-left: 1px solid grey'>Sensor utilizado</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";



    $limite = $inicio*6;
        if(isset($_REQUEST['posicion'])){
            $inicio = $_REQUEST['posicion'];
        } else {
            $inicio = 0;
        }
        //function/($inicio,fechaini,fechafin,tipo,valormin,valormax)
        
        $objBd->consultarBD("");



        $contador = 0;

        while($row=$objBd->obtenerResultado()){



            if ($row["Variables_Id"] == 1){
                $variable='ºC';
                $cvariable='table-danger';
                $fvariable='Temperatura';
            } else if($row["Variables_Id"] == 2){
                $variable='p/ft³';
                $cvariable='table-success';
                $fvariable='Particulas';
            } else if($row["Variables_Id"] == 3){
                $variable='%';
                $cvariable='table-primary';
                $fvariable='Humedad';
            } else if($row["Variables_Id"] == 4){
                $variable='Índice';
                $cvariable='table-warning';
                $fvariable='Rayos UVA';
            }
            print "<tr class='$cvariable'>";
            print "<td style='text-align:center'>".$row["Fecha_Hora"]."</td>";
            print "<td style='text-align:center;border-left: 1px solid grey'>".$fvariable."</td>";
            print "<td style='text-align:center;border-left: 1px solid grey'>".$row["Valor"].' '.$variable."</td>";
            print "<td style='text-align:center;border-left: 1px solid grey'>".$row["modelo"]."</td>";
            print "</tr>";
            $contador++;
            }
    print "</table>";
print "</div>";
        //Boton de siguiente
print "<div id='fr' style='float:right;width:8%;height:8%;margin-top:100px'>";
        if(($contador+$limite) > mysqli_num_rows($registro) && mysqli_num_rows($registro) > 0){
        print "<img src='flecha-d.png' style='width:100%;height:100%'></img>";
        }else{
        $siguiente = $inicio+1;
        print "<a href='Principal.php?posicion=$siguiente'><img src='flecha-d.png' style='width:100%;height:100%'></a>";
        }
print "</div>";
print "</div>";
//Fin Consulta


$objBd->terminarConsulta();
$objBD->desconectarBD();


//Inicio Refrescar pagina
if (
    (isset($_REQUEST['rango']))
    ||
    (isset($_REQUEST['fecha1']))
    ||
    (isset($_REQUEST['fecha2']))
    ||
    (isset($_REQUEST['UniMed'])))
    {
        list($rango1, $rango2)= explode(";",$_REQUEST['rango']);
    if(
    (!empty($_REQUEST['fecha1']))
    ||
    (!empty($_REQUEST['fecha2']))
    ||
    ($_REQUEST['UniMed'] != "0")
    ||
    ($rango1 != -200)
    ||
    ($rango2 != 200)
    ){
print "<div>";
print "<form action=''>";
print "<p><input style='width:100%;margin-top:20px' class='btn btn-primary' type='submit' value='Reestablecer'></p>";
print "</form>";
print "</div>";
}
}
?>
<!--Fin Refrescar pagina-->
</div>
<!--Fin Contenedor-->
</body>
</html>