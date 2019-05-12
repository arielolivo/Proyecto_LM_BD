<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMINISTRACIÓN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../recursos/bootstrap/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
* {
    margin: 0px;
    padding: 0px;
}

#contenedor {
    width: 100%;
    margin: auto;
}

#estaciones {
    width: 70%;
    margin: auto;
    overflow: auto;
}

#sensores {
    width: 70%;
    margin: auto;
    overflow: auto;
}
</style>

</head>
<body >
    <div id="contenedor">
<!--CABECERA-->
<div class="bg-warning text-dark" style="height: 39px">
<div style="float: right;">
<a href="#" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">RETROCEDER</a>
</div>
  <h3>ADMINISTRACIÓN</h3>
</div>
<!--FIN CABECERA-->

<!--MENÚ DE OPCIONES-->
<nav style="float: right">
<div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#estaciones" role="tab" aria-controls="estaciones" aria-selected="true">ESTACIONES</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#sensores" role="tab" aria-controls="sensores" aria-selected="false">SENSORES</a>
  </div>
</nav>
<!--FIN MENÚ DE OPCIONES-->


<div class="tab-content" id="nav-tabContent" style="padding-top:50px">

<!--MENSAJES DE AVISO-->
<!--ESTE MENSAJE LLEGA DEL HEADER DEL ARCHIVO de los archivos .php que estan en la carpeta m_file de ESTACIONES-->
<div style="width: 70%; margin: auto">
<?php
        if (isset($_REQUEST["e_mensaje"])) {
          print "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>$_REQUEST[e_mensaje]</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
            }
?>
</div>

<!--MENSAJE SENSORES-->
<div style="width: 70%; margin: auto">
<?php
        if (isset($_REQUEST["s_mensaje"])) {
          print "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>$_REQUEST[s_mensaje]</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
            }
?>
</div>
<!-- FIN MENSAJES DE AVISO-->

<!--MARCO ESTACIONES-->
  <div class="tab-pane fade show active" id="estaciones" role="tabpanel" aria-labelledby="nav-home-tab">
  <!--ESTACIONES-->
  <div style="background: #33C4FF; border-radius: 5px 5px 5px 5px"><h3>ESTACIONES</h3></div>

<!--MODAL: BOTÓN CON VENTANA EMERGENTE PARA INSERTAR-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#e_insertar">
  AGREGAR
</button>
<!-- CABECERA INSERTAR-->
<div class="modal fade" id="e_insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="e_insertar1">AGREGAR NUEVA ESTACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--FORMULARIO INSERTAR-->
      <form action="m_file/estaciones/e_insert.php" method="post">
                <div class="form-group">
                    <label for="e_imarca">MARCA</label>
                    <input type="text" class="form-control" name="e_imarca" id="e_imarca"  maxlength="15" placeholder="15 CARACTERES" required>
                </div>
                <div class="form-group">
                    <label for="e_imodelo">MODELO</label>
                    <input type="text" class="form-control" name="e_imodelo" id="e_imodelo" maxlength="15" required>
                </div>

                <div class="form-group">
                    <label for="e_iip">IP</label>
                    <input type="text" class="form-control" name="e_iip" id="e_iip" maxlength="15" required>
                </div>
                
                <div class="form-group">
                    <label for="e_iticon">TIPO DE CONEXIÓN</label>
                    <input type="text" class="form-control" name="e_iticon" id="e_iticon" maxlength="15" required>
                </div>

                <div class="form-group">
                    <label for="e_iubi">UBICACIÓN</label>
                    <input type="text" class="form-control" name="e_iubi" id="e_iubi" maxlength="15" required>
                </div>

                <p>
                    <input type="submit" class="btn btn-primary btn-block" value="Insertar">
                </p>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
<!--FIN MODAL INSERTAR-->
</div>


<!--CONSULTA BD ESTACIÓN/ESTACIONES-->
<div style="margin-top: 10px">

        <?php
        //CONEXIÓN
            $conexion = mysqli_connect("localhost", "root", "", "estacion") 
            or die("Problemas con la conexión");
        //CONSULTA DE REGISTRO
            $registros = mysqli_query($conexion, 
            "SELECT * from estaciones") or die("Problemas en la consulta:".mysqli_error($conexion));
            //INICIO TABLA
            print "<table class='table table-striped'>";
            print "<tr>
            <th>ID</th>
            <th>MARCA</th>
            <th>MODELO</th>
            <th>IP</th>
            <th>TIPO_CONEXION</th>
            <th>UBICACION</th>
            <th>OPCIONES</th>
            <th></th>
            </tr>";
            //PRESENTACIÓN DE LA CONSULTA
                while ($reg = mysqli_fetch_array($registros)) {
                    print "<tr>";
                        print "<td>" . $reg['Id'] . "</td>";
                        print "<td>" . $reg['Marca'] . "</td>";
                        print "<td>" . $reg['Modelo'] . "</td>";
                        print "<td>" . $reg['IP'] . "</td>";
                        print "<td>" . $reg['Tipo_Conex'] . "</td>";
                        print "<td>" . $reg['Ubi'] . "</td>";
                        //MODAL: BOTON BORRAR
                        print "<td>";
                        //En el data-target='#borrar$reg[Id]' le ponemos el $reg[Id] para que coga el id de cada fila
                        print "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#e_borrar$reg[Id]'>Borrar</button>";
                        //DIV MODAL BORRAR
                        print "<div class='modal fade' id='e_borrar$reg[Id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                        print   "<div class='modal-dialog' role='document'>";
                        print     "<div class='modal-content'>";
                        print       "<div class='modal-header'>";
                        print         "<h5 class='modal-title' id='e_dborrar1'>BORRAR</h5>";
                        print         "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        print           "<span aria-hidden='true'>&times;</span>";
                        print         "</button>";
                        print       "</div>";
                        print       "<div class='modal-body'>";
                        print         "¿ESTAS SEGURO DE QUE DESEAS BORRAR ESTA ESTACIÓN?";
                        print       "</div>";
                        print       "<div class='modal-footer'>";
                        print         "<button type='button' class='btn btn-secondary' data-dismiss='modal'>CERRAR</button>";
                        //BOTON QUE VA AL PHP BORRAR CON EL ID DE LA FILA $reg[Id]
                        print         "<a href='m_file/estaciones/e_delete.php?id=$reg[Id]' class='btn btn-danger' id='ids'>BORRAR</a>";
                        print       "</div>";
                        print     "</div>";
                        print   "</div>";
                        print "</div>";
                        print "";
                        print "</td>";
                        //FIN MODAL BORRAR

                        //MODAL: BOTÓN MODIFICAR
                        print "<td>";
                        print "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#e_modificar$reg[Id]'>";
                        print "Modificar";
                        print "</button>";
                        //DIV MODAL MODIFICAR
                        print "<div class='modal fade' id='e_modificar$reg[Id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                        print "<div class='modal-dialog' role='document'>";

                        print  "<div class='modal-content'>";
                        print  "<div class='modal-header'>";
                        print  "<h5 class='modal-title' id='e_modificar1'>MODIFICAR ESTACIÓN</h5>";
                        print  "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        print  "<span aria-hidden='true'>&times;</span>";
                        print  "</button>";
                        print  "</div>";
                        print  "<div class='modal-body'>";
                        //FORMULARIO MODIFICAR
                        //La línea siguiente esta haciendo referencia al id de la fila del regristro -e_update.php?id=$reg[Id]-
                        print  "<form action='m_file/estaciones/e_update.php?id=$reg[Id]' method='post'>";
                        print         "<div class='form-group'>";
                        print              "<label for='e_mmarca'>MARCA</label>";
                        print              "<input type='text' class='form-control' name='e_mmarca' id='e_mmarca?$reg[Marca]&' value='$reg[Marca]' maxlength='15'>";
                        print          "</div>";
                        print          "<div class='form-group'>";
                        print              "<label for='e_mmodelo'>MODELO</label>";
                        print              "<input type='text' class='form-control' name='e_mmodelo' id='e_mmodelo?$reg[Modelo]' value='$reg[Modelo]' maxlength='15'>";
                        print          "</div>";
                  
                        print          "<div class='form-group'>";
                        print              "<label for='e_mip'>IP</label>";
                        print              "<input type='text' class='form-control' name='e_mip' id='e_mip?$reg[IP]' value='$reg[IP]' maxlength='15'>";
                        print          "</div>";
                        print          "<div class='form-group'>";
                        print              "<label for='e_mticon'>TIPO DE CONEXIÓN</label>";
                        print              "<input type='text' class='form-control' name='e_mticon' id='e_mticon?$reg[Tipo_Conex]' value='$reg[Tipo_Conex]' maxlength='15'>";
                        print          "</div>";
                  
                        print          "<div class='form-group'>";
                        print              "<label for='e_mubi'>UBICACIÓN</label>";
                        print              "<input type='text' class='form-control' name='e_mubi' id='e_mubi?$reg[Ubi]' value='$reg[Ubi]' maxlength='15'>";
                        print          "</div>";
                  
                        print          "<p>";
                        print              "<input type='submit' class='btn btn-primary btn-block' value='MODIFICAR'>";
                        print          "</p>";
                        print      "</form>";
                        print"</div>";
                        print"<div class='modal-footer'>";
                        print  "<button type='button' class='btn btn-secondary' data-dismiss='modal'>CERRAR</button>";
                        print"</div>";
                        print"</div>";
                        print"</div>";
                        print"</div>";
   
                        print "</td>";
                        print "</tr>";
                }
            //FIN TABLA
            print "</table>";
            //FIN CONEXION
            mysqli_close($conexion);
        ?>
<!--FIN DIV CONSULTA ESTACIÓN/ESTACIONES-->
</div>
  
  </div>
<!--FIN MARCO ESTACIONES-->






<!--MARCO SENSORES-->
  <div class="tab-pane fade" id="sensores" role="tabpanel" aria-labelledby="nav-profile-tab">
 
<!--SENSORES-->

<div style="background: #E5DC1E; border-radius: 5px 5px 5px 5px"><h3>SENSORES</h3></div>

<!--MODAL: Boton con ventana emergente-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#s_insertar">
  AGREGAR
</button>
<!-- CABECERA -->
<div class="modal fade" id="s_insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="s_insertar2">AGREGAR NUEVO SENSOR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--FORMULARIO-->
      <form action="m_file/sensores/s_insert.php" method="post">
                <div class="form-group">

                <div class="form-group">
                    <label for="s_idestacion">ESTACIÓN (MODELO)</label>

                    <select class="form-control" name="s_idestacion" id="s_idestacion">
                        <?php
                        $conexion = mysqli_connect("localhost", "root", "", "estacion") 
                            or die("Problemas de conexión");
                        $registros = mysqli_query($conexion, "SELECT Id, Modelo FROM estaciones")
                            or die("Problemas en el select".mysqli_error($conexion));
                        while ($reg = mysqli_fetch_array($registros)) {
                            print "<option value='$reg[Id]'>$reg[Modelo]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="s_imodelo">MODELO</label>
                    <input type="text" class="form-control" name="s_imodelo" id="s_imodelo" maxlength="15" required>
                </div>

                    <label for="s_inombre">NOMBRE</label>
                    <input type="text" class="form-control" name="s_inombre" id="s_inombre" maxlength="15" required>
                </div>
                

                <p>
                    <input type="submit" class="btn btn-primary btn-block" value="Insertar">
                </p>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>


<!--CONSULTA-->
<div style="margin-top: 10px">

        <?php
            $conexion = mysqli_connect("localhost", "root", "", "estacion") 
            or die("Problemas con la conexión");
            $registros = mysqli_query($conexion, 
            "SELECT * from sensores") or die("Problemas en la consulta:".mysqli_error($conexion));
            
            print "<table class='table table-striped'>";
            print "<tr>
            <th>MODELO</th>
            <th>NOMBRE</th>
            <th>OPCIONES</th>
            <th></th>
            </tr>";
                while ($reg = mysqli_fetch_array($registros)) {
                    print "<tr>";
                        print "<td>" . $reg['Modelo'] . "</td>";
                        print "<td>" . $reg['Nombre'] . "</td>";
                        print "<td>";
                        print "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#s_borrar$reg[Id]'>Borrar</button>";
                        //DIV MODAL BORRAR
                        print "<div class='modal fade' id='s_borrar$reg[Id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                        print   "<div class='modal-dialog' role='document'>";
                        print     "<div class='modal-content'>";
                        print       "<div class='modal-header'>";
                        print         "<h5 class='modal-title' id='s_borrar2'>BORRAR</h5>";
                        print         "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        print           "<span aria-hidden='true'>&times;</span>";
                        print         "</button>";
                        print       "</div>";
                        print       "<div class='modal-body'>";
                        print         "¿ESTAS SEGURO DE QUE DESEAS BORRAR ESTE SENSOR?";
                        print       "</div>";
                        print       "<div class='modal-footer'>";
                        print         "<button type='button' class='btn btn-secondary' data-dismiss='modal'>CERRAR</button>";
                        //<!--FORMULARIO BORRAR-->;
                        print         "<a href='m_file/sensores/s_delete.php?id=$reg[Id]' class='btn btn-danger' id='ids'>BORRAR</a>";
                        print       "</div>";
                        print     "</div>";
                        print   "</div>";
                        print "</div>";
                        print "";
                        print "</td>";
                        //FIN MODAL BORRAR

                        //BOTON MODIFICAR
                        print "<td>";
                        print "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#s_modificar$reg[Id]'>";
                        print "Modificar";
                        print "</button>";
                      //MODAL MODIFICAR
                        print "<div class='modal fade' id='s_modificar$reg[Id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                        print "<div class='modal-dialog' role='document'>";

                        print  "<div class='modal-content'>";
                        print  "<div class='modal-header'>";
                        print  "<h5 class='modal-title' id='s_modificar2'>MODIFICAR SENSOR</h5>";
                        print  "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        print  "<span aria-hidden='true'>&times;</span>";
                        print  "</button>";
                        print  "</div>";
                        print  "<div class='modal-body'>";
                        //TABLA MODIFICAR
                        print  "<form action='m_file/sensores/s_update.php?id=$reg[Id]' method='post'>";
                        print          "<div class='form-group'>";
                        print              "<label for='s_mmodelo'>MODELO</label>";
                        print              "<input type='text' class='form-control' name='s_mmodelo' id='s_mmodelo?$reg[Modelo]' maxlength='15' value='$reg[Modelo]'>";
                        print          "</div>";
                  
                        print          "<div class='form-group'>";
                        print              "<label for='s_mnombre'>NOMBRE</label>";
                        print              "<input type='text' class='form-control' name='s_mnombre' id='s_mnombre?$reg[Nombre]' maxlength='15' value='$reg[Nombre]'>";
                        print          "</div>";
                        print          "<p>";
                        print              "<input type='submit' class='btn btn-primary btn-block' value='MODIFICAR'>";
                        print          "</p>";
                        print      "</form>";
                        print"</div>";
                        print"<div class='modal-footer'>";
                        print  "<button type='button' class='btn btn-secondary' data-dismiss='modal'>CERRAR</button>";
                        print"</div>";
                        print"</div>";
                        print"</div>";
                        print"</div>";
   
                        print "</td>";
                        print "</tr>";
                }
            print "</table>";
            mysqli_close($conexion);
        ?>
</div>

<!--FIN DIV SENSORES-->
</div>



  </div>
<!--FIN MARCO ESTACIONES-->
</div>



 <!--FIN CONTAINER-->  
 </div>

<!--
COSAS A CORREGIR Y AÑADIR
ESTACIONES

FORMULARIO: PONER LIMITE DE CARACETRES. HECHO
MODAL MODIFICAR: HACER QUE LOS CAMPOS SE MODIFIQUEN INDIVIDUALMENTE. HECHO
SENSORES: AÑADIR BOTTÓN PARA VINVULARLO A UNA ESTACIÓN. HECHO
PONER PANEL SPOILER INFORMACIÓN
PONER ESCTRUCTURA DE TEXTO POR EJEMPLO (192.168.1.1)
HACER QUE LA TABLA DE LA CONSULTA SE ADAPTE A LA PANTALLA. HECHO
--> 

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="../recursos/bootstrap/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="../recursos/bootstrap/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="../recursos/bootstrap/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>