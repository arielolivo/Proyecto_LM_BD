<!--Index-->
<head>
<!--Bootstrap-->
<link rel="stylesheet" href="../recursos/bootstrap/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="../recursos/bootstrap/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../recursos/bootstrap/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="../recursos/bootstrap/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--Fin Bootstrap-->
<!--Calendario-->
<link href="../recursos/calendario/bootstrap.min.css" rel="stylesheet">
<script src="../recursos/calendario/bootstrap.min.js"></script>
<script type='text/javascript' src='../recursos/calendario/jquery-1.8.3.js'></script>
<link rel="stylesheet" href="../recursos/calendario/bootstrap-datepicker3.min.css">
<script type='text/javascript' src="../recursos/calendario/bootstrap-datepicker.min.js"></script>
<script type='text/javascript'>
$(function(){
$('.input-daterange').datepicker({
    autoclose: true
});
});
</script>
<link href="../recursos/calendario/bootstrap.css" rel="stylesheet"/>
<link href="../recursos/calendario/bootstrap-datetimepicker.css" rel="stylesheet"/>
<script src="../recursos/calendario/jquery.js"></script>
<script src="../recursos/calendario/moment.min.js"></script>
<script src="../recursos/calendario/bootstrap.js"></script>
<script src="../recursos/calendario/bootstrap-datetimepicker.min.js"></script>
<!--Fin Calendario-->
<!--Slider 2 valores-->
<link rel="stylesheet" href="../recursos/slider/ion.rangeSlider2.min.css"/>
<link rel="stylesheet" href="../recursos/slider/ion.rangeSlider.min.css"/>
<script src="../recursos/slider/ion.rangeSlider.min.js"></script>
<!--<script src="../recursos/slider/jquery.min.js"></script>-->
<!--Fin Slider 2 valores-->
<link rel="stylesheet" href="main.css">
</head>
<!--Color oscuro  style="background-color:#212121"-->
<body>
<!--Contenedor-->
<div class="container">
    <!--Cabecera-->
    <div id="cabecera">
        <a href="modificar/admin.html" class="btn btn-warning" role="button">Administración</a>
        <a href="Grafica/index.php" class="btn btn-info" role="button">Estadísticas</a>
    </div>
    <!--Fin Cabecera-->    
    <!--Formulario-->
    <form action="Index.php" method="post">
        <!--Formulario G-->
        <div class="form-group">
            <!--Formulario R-->
            <div class="form-row">
                <!--Formulario C-->
                <div class="col-md-9">
                    <!--Filtro Calendario-->
                    <span>Fecha del registro</span>
                    <div class="input-daterange input-group form-group" id="datepicker">
                        <!--Filtro Calendario1-->
                        <input type="text" id="datetimepicker1" class="input-sm form-control" name="fecha1" placeholder="Fecha de inicio" value="<?php $_REQUEST['fecha1']; ?>"/>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker1').datetimepicker();
                            });
                        </script>
                        <!--Fin Filtro Calendario1-->
                        <!--Etiqueta-->
                        <span class="input-group-addon">Hasta</span>
                        <!--Fin Etiqueta-->
                        <!--Filtro Calendario2-->
                        <input type="text" id="datetimepicker2" class="input-sm form-control" name="fecha2" placeholder="Fecha final"/>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker2').datetimepicker();
                            });
                        </script>
                        <!--Fin Filtro Calendario2-->
                    </div>
                    <!--Fin Filtro Calendario-->
                    <!--Filtro Medida-->
                    <div class="form-group">
                        <span>Tipo de medida: </span>
                        <select class="form-control" type="text" name="UniMed" id="UniMed" value="">
                            <option value="0" <?php if($_REQUEST['UniMed'] == 0){print "selected";}?>></option>
                            <option value="ºC" <?php if($_REQUEST['UniMed'] == "ºC"){print "selected";}?>>ºC</option>
                            <option value="p/ft³" <?php if($_REQUEST['UniMed'] == "p/ft³"){print "selected";}?>>Particulas por pie cúbico</option>
                            <option value="Humedad" <?php if($_REQUEST['UniMed'] == "Humedad"){print "selected";}?>>Porcentaje de humedad</option>
                            <option value="UVA" <?php if($_REQUEST['UniMed'] == "UVA"){print "selected";}?>>Índice de rayos UVA</option>
                        </select>
                    </div>
                    <!--Fin Filtro Medida-->
                    <!--Seleccionar 2 valores-->
                    <?php
                    list($rango1, $rango2)= explode(";",$_REQUEST['rango']);
                    ($rango1 != -200)
                    ($rango2 != 200)
                    ?>
                    <div class="form-group">
                        <input type="text" class="js-range-slider" name="rango" value=""
                            data-type="double"
                            data-min="-200"
                            data-max="200"
                            data-from="-200"
                            data-to="200"
                            data-grid="true"
                            data-skin="round"
                        />
                        <script>$(".js-range-slider").ionRangeSlider();</script>
                    </div>
                    <!--Fin Seleccionar 2 valores-->
                </div>
                <!--FinFormulario C-->
                <!--Boton buscar-->
                <div id="boton" class="form-group col-md-1">
                    <input id="buscar" class="btn btn-primary" type="submit" value="buscar">
                </div>
                <!--Fin Boton buscar-->
            </div>
            <!--Fin Formulario R-->
        </div>
        <!--Fin Formulario G-->
    </form>
    <!--Fin Formulario-->
    <!--Consulta-->
    <?php
    //consulta
    $conexion=mysqli_connect("localhost", "root", "", "estacion") or die("Problemas de conexión.");
    $count = mysqli_query($conexion, "SELECT Valor FROM medidas");
    $count = mysqli_num_rows($count);
    $cuenta = ceil($count/6);
        //Posicion para el limit de la tabla
        if(isset($_REQUEST['posicion'])){
            if ($_REQUEST['posicion'] >= 0 && $_REQUEST['posicion'] < $cuenta){
                $inicio = $_REQUEST['posicion'];
            } else if ($_REQUEST['posicion'] >= $cuenta) {
                $inicio = ($cuenta-1);
            } else {
                $inicio = 0;
            }
        } else {
            $inicio = 0;
        }
        $limite = $inicio*6;
        $registros = mysqli_query($conexion, "SELECT m.Fecha_Hora,s.modelo,m.Valor,s.id,m.Sensores_id,m.Variables_Id FROM medidas m inner join sensores s on m.Sensores_id = s.id ORDER BY Fecha_Hora LIMIT $limite,6") or die("Problemas en el select ".mysqli_error($conexion));
        //Fin Posicion
        //Tabla
        print "<div id='divt'>";
            //Boton de anterior
            print "<div id='fi'>";
                if($inicio == 0){
                    print "<img src='../recursos/flecha-i.png'></img>";
                } else {
                    $anterior = $inicio-1;
                    print "<a href='Index.php?posicion=$anterior'><img src='../recursos/flecha-i.png'></img></a>";
                }
            print "</div>";
            //Fin Boton de anterior
            print "<div id='tabla'>";
                print "<table class='table'>";
                    print "<thead class='thead-dark'>";
                        print "<tr>";
                            print "<th scope='col'>Fecha - Hora</th>";
                            print "<th scope='col'>Tipo</th>";
                            print "<th scope='col'>Valor</th>";
                            print "<th scope='col'>Sensor utilizado</th>";
                        print "</tr>";
                    print "</thead>";
                    print "<tbody>";
                        $contador = 0;
                        while($reg=mysqli_fetch_array($registros)){
                            if ($reg['Variables_Id'] == 1){
                                $variable='ºC';
                                $cvariable='table-danger';
                                $fvariable='Temperatura';
                            } else if($reg['Variables_Id'] == 2){
                                $variable='p/ft³';
                                $cvariable='table-success';
                                $fvariable='Particulas';
                            } else if($reg['Variables_Id'] == 3){
                                $variable='%';
                                $cvariable='table-primary';
                                $fvariable='Humedad';
                            } else if($reg['Variables_Id'] == 4){
                                $variable='Índice';
                                $cvariable='table-warning';
                                $fvariable='Rayos UVA';
                            }
                            print "<tr class='$cvariable'>";
                                print "<td>".$reg['Fecha_Hora']."</td>";
                                print "<td>".$fvariable."</td>";
                                print "<td>".$reg['Valor'].' '.$variable."</td>";
                                print "<td>".$reg['modelo']."</td>";
                            print "</tr>";
                            $contador++;
                        }
                print "</table>";
            print "</div>";
            //Fin Tabla
            //Boton de anterior responsive
            print "<div id='fif'>";
                if($inicio == 0){
                    print "<img src='../recursos/flecha-i.png'></img>";
                } else {
                    $anterior = $inicio-1;
                    print "<a href='Index.php?posicion=$anterior'><img src='../recursos/flecha-i.png'></img></a>";
                }
            print "</div>";
            //Fin Boton de anterior responsive
            //Boton de siguiente
            print "<div id='fr'>";
                if((6*$inicio) >= $count-6){
                    print "<img src='../recursos/flecha-d.png'></img>";
                }else{
                    $siguiente = $inicio+1;
                    print "<a href='Index.php?posicion=$siguiente'><img src='../recursos/flecha-d.png'></a>";
                }
            print "</div>";
            //Fin Boton de siguiente
        print "</div>";
        //Fin Consulta
        //Refrescar pagina
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
                        print "<div id='refrescar'>";
                        print "<form action=''>";
                        print "<p><input class='btn btn-primary' type='submit' value='Reestablecer'></p>";
                        print "</form>";
                        print "</div>";
                    }
            }
    //Fin Refrescar pagina
    ?>
</div>
<!--Fin Contenedor-->
</body>
</html>
