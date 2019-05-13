<head>
<!--Bootstrap-->
<script src="..\recursos\bootstrap\jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="..\recursos\bootstrap\popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="..\recursos\bootstrap\bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="..\recursos\bootstrap\bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="..\recursos\calendario\bootstrap.css" rel="stylesheet"/>
<!--Fin Bootstrap-->
<!--Slider 2 valores-->
<link rel="stylesheet" href="..\recursos\slider\ion.rangeSlider2.min.css"/>
<link rel="stylesheet" href="..\recursos\slider\ion.rangeSlider.min.css"/>
<script src="..\recursos\slider\ion.rangeSlider.min.js"></script>
<!--<script src="..\recursos\slider\jquery.min.js"></script>-->
<!--Fin Slider 2 valores-->
<link rel="stylesheet" href="main.css">
</head>
<!--Color oscuro  style="background-color:#212121"-->
<body>
<?php if(isset($_REQUEST['rango'])){list($rango1, $rango2)= explode(";",$_REQUEST['rango']);}?>
<!--Contenedor-->
<div class="container">
    <!--Cabecera-->
    <div id="cabecera">
        <a href="m_data.html" class="btn btn-warning" role="button">Administración</a>
        <a href="grafica.html" class="btn btn-info" role="button">Gráfica</a>
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
                    <span>Fecha del registro:</span>
                    <div class="input-daterange input-group form-group" id="datepicker">
                        <!--Filtro Calendario1-->
                        <input type="datetime-local" id="datetimepicker1" class="input-sm form-control" name="fecha1" value="<?php if(isset($_REQUEST['fecha1'])){print $_REQUEST['fecha1'];}?>"/>
                        <!--Fin Filtro Calendario1-->
                        <!--Etiqueta-->
                        <span class="input-group-addon">Hasta</span>
                        <!--Fin Etiqueta-->
                        <!--Filtro Calendario2-->
                        <input type="datetime-local" id="datetimepicker2" class="input-sm form-control" name="fecha2" value="<?php if(isset($_REQUEST['fecha1'])){print $_REQUEST['fecha2'];}?>"/>
                        <!--Fin Filtro Calendario2-->
                    </div>
                    <!--Fin Filtro Calendario-->
                    <!--Filtro Medida-->
                    <div class="form-group">
                        <span>Tipo de medida: </span>
                        <select class="form-control" type="text" name="UniMed" id="UniMed">
                            <option value="0" <?php if(isset($_REQUEST['UniMed']) && $_REQUEST['UniMed'] == 0){print "selected";}?>></option>
                            <option value="1" <?php if(isset($_REQUEST['UniMed']) && $_REQUEST['UniMed'] == 1){print "selected";}?>>ºC</option>
                            <option value="2" <?php if(isset($_REQUEST['UniMed']) && $_REQUEST['UniMed'] == 2){print "selected";}?>>Particulas por pie cúbico</option>
                            <option value="3" <?php if(isset($_REQUEST['UniMed']) && $_REQUEST['UniMed'] == 3){print "selected";}?>>Porcentaje de humedad</option>
                            <option value="4" <?php if(isset($_REQUEST['UniMed']) && $_REQUEST['UniMed'] == 4){print "selected";}?>>Índice de rayos UVA</option>
                        </select>
                    </div>
                    <!--Fin Filtro Medida-->
                    <!--Seleccionar 2 valores-->
                    <div class="form-group">
                        <input type="text" class="js-range-slider" name="rango" value=""
                            data-type="double"
                            data-min="-200"
                            data-max="200"
                            data-from= "<?php if(isset($rango1)){print $rango1;}else{print "-200";}?>"
                            data-to= "<?php if(isset($rango2)){print $rango2;}else{print "200";}?>"
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
//No se puede realizar la consulta con la fecha:
//Estas son las condiciones de la busqueda, hay un fallo en la busqueda por que la fecha tiene un espacio en medio, y da error en la consulta
//mediante la consulta y solo funciona para la primera página, no se aplica a las páginas de posición 1,2... que son usadas en la paginacion.
    include("SGBD.php");
    if(isset($_REQUEST["fecha1"]) && !empty($_REQUEST["fecha1"])){
        $fechaInicio = to_date($_REQUEST["fecha1"]);
    } else {
        $fechaInicio='to_date("2000-01-01 00:00:00")';
    }
    if(isset($_REQUEST["fecha2"]) && !empty($_REQUEST["fecha2"])){
        $fechaFin = to_date($_REQUEST["fecha2"]);
    } else {
        $fechaFin='to_date("2200-01-01 00:00:00")';
    }
    //$condicion='m.Fecha_Hora BETWEEN '. $fechaInicio .' and '. $fechaFin;
    if(isset($_REQUEST["rango"])){
        $valor = $_REQUEST["rango"];
    list($valorInicio,$valorFin) = explode(';',$valor);
    } else {
        $valorInicio = -200;
        $valorFin = 200;
    }
    $condicion="m.valor between ". $valorInicio." and ".$valorFin;
    if(isset($_REQUEST["UniMed"])){
        if($_REQUEST["UniMed"] != 0){
            $condicion=$condicion." and m.Variables_Id like ". $_REQUEST["UniMed"];
        }}

        //Posicion para el limit de la tabla
        if(isset($_REQUEST['posicion'])){
            $inicio = $_REQUEST['posicion'];
        } else {
            $inicio = 0;
        }
        //Fin Posicion
        $campos = 'm.Fecha_Hora,s.modelo,m.Valor,s.id,m.Sensores_id,m.Variables_Id';
        $tablas = 'medidas m inner join sensores s on m.Sensores_id = s.id';
        $pagina = $inicio*5;
        $limite = 5;
        print $condicion;
        $query = SGBD::Select($campos,$tablas,$condicion,$pagina,$limite);
        //Tabla
        print "<div>";
            print "<div>";
            $cuenta = SGBD::sql("select valor from medidas");
                $count = mysqli_num_rows($cuenta);
                print "<table class='table' id='tabla'>";
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
//Cambiar los valores de Variables id y el nombre de las variables segun el id asociado a estas, estos id son los usados aqui.
//Temperatura:(ºC)                      1
//Particulas (p/ft³)                    2
//Humedad:(%)                           3
//Índice UV                             4
//Intensidad UV:(uW/cm2)                5
//Presión:(hPa = hectopascales)         6
//CO2:(PPM = partes por millón)         7
//Concentración de gases(%)             8
//Concentración de partículas(%)        9
                        while($reg=mysqli_fetch_array($query)){
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
                                if($reg['Valor'] <= 2){$indice="Bajo";}
                                if($reg['Valor'] > 2 && $reg['Valor'] <= 5){$indice="Moderado";}
                                if($reg['Valor'] > 5 && $reg['Valor'] <= 7){$indice="Alto";}
                                if($reg['Valor'] > 7){$indice="Muy Alto";}
                            } else if($reg['Variables_Id'] == 5){
                                $variable='uW/cm2';
                                $cvariable='table-warning';
                                $fvariable='Intensidad UV';
                            } else if($reg['Variables_Id'] == 6){
                                $variable='hPa';
                                $cvariable='table-primary';
                                $fvariable='Presión';
                            } else if($reg['Variables_Id'] == 7){
                                $variable='PPM';
                                $cvariable='table-light';
                                $fvariable="CO<sub>2</sub>";
                            } else if($reg['Variables_Id'] == 8){
                                $variable='%';
                                $cvariable='table-secondary';
                                $fvariable='Conc. Gases';
                            } else if($reg['Variables_Id'] == 9){
                                $variable='%';
                                $cvariable='table-secondary';
                                $fvariable='Conc. Particulas';
                            }
                            if($variable != 4){
                                print "<tr class='$cvariable'>";
                                    print "<td>".$reg['Fecha_Hora']."</td>";
                                    print "<td>".$fvariable."</td>";
                                    print "<td>".$reg['Valor'].' '.$variable."</td>";
                                    print "<td>".$reg['modelo']."</td>";
                                print "</tr>";
                            } else {
                                print "<tr class='$cvariable'>";
                                    print "<td>".$reg['Fecha_Hora']."</td>";
                                    print "<td>".$fvariable."</td>";
                                    print "<td>".$variable.' de '.$reg['Valor']." ".$indice."</td>";
                                    print "<td>".$reg['modelo']."</td>";
                                print "</tr>";
                            }
                            $contador++;
                        }
                        print "</tbody>";
                print "</table>";
            print "</div>";
            //Fin Tabla
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
            //Boton de siguiente
            print "<div id='fr'>";
                if((5*$inicio) >= $count-5){
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
                    print "<form action='index.php?posicion=0'>";
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
