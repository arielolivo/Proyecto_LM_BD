<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ESTACIONES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../recursos/bootstrap/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="padding-top:50px">
    <div class="container">
<!--CABECERA-->
<div class="bg-warning text-dark" style="position:absolute;left:0px; top: 0px; z-index:1; width: 100%">
<div style="float: right;">
<a href="#" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">RETROCEDER</a>
</div>
  <h3>ESTACIONES</h3>
</div>

<!--ESTE MENSAJE LLEGA DEL HEADER DEL ARCHIVO de los archivos .php que estan en la carpeta m_file-->
<div>
<?php
        if (isset($_REQUEST["mensaje"])) {
          print "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>$_REQUEST[mensaje]</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
            }
?>
</div>


<!--MODAL: BOTÓN CON VENTANA EMERGENTE PARA INSERTAR-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertar">
  AGREGAR
</button>
<!-- CABECERA INSERTAR-->
<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA ESTACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--FORMULARIO INSERTAR-->
      <form action="m_file/estaciones/insert.php" method="post">
                <div class="form-group">
                    <label for="imarca">MARCA</label>
                    <input type="text" class="form-control" name="imarca" id="imarca"  maxlength="45" placeholder="45 CARACTERES" required>
                </div>
                <div class="form-group">
                    <label for="imodelo">MODELO</label>
                    <input type="text" class="form-control" name="imodelo" id="imodelo" maxlength="45" placeholder="45 CARACTERES" required>
                </div>

                <div class="form-group">
                    <label for="iip">IP</label>
                    <input type="text" class="form-control" name="iip" id="iip" maxlength="15" placeholder="15 CARACTERES" required>
                </div>
                
                <div class="form-group">
                    <label for="iticon">TIPO DE CONEXIÓN</label>
                    <input type="text" class="form-control" name="iticon" id="iticon" maxlength="45" placeholder="45 CARACTERES" required>
                </div>

                <div class="form-group">
                    <label for="iubi">UBICACIÓN</label>
                    <input type="text" class="form-control" name="iubi" id="iubi" maxlength="45" placeholder="45 CARACTERES" required>
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
                        print "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#borrar$reg[Id]'>Borrar</button>";
                        //DIV MODAL BORRAR
                        print "<div class='modal fade' id='borrar$reg[Id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                        print   "<div class='modal-dialog' role='document'>";
                        print     "<div class='modal-content'>";
                        print       "<div class='modal-header'>";
                        print         "<h5 class='modal-title' id='borrar'>BORRAR</h5>";
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
                        print         "<a href='m_file/estaciones/delete.php?id=$reg[Id]' class='btn btn-danger' id='ids'>BORRAR</a>";
                        print       "</div>";
                        print     "</div>";
                        print   "</div>";
                        print "</div>";
                        print "";
                        print "</td>";
                        //FIN MODAL BORRAR

                        //MODAL: BOTÓN MODIFICAR
                        print "<td>";
                        print "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modificar$reg[Id]'>";
                        print "Modificar";
                        print "</button>";
                        //DIV MODAL MODIFICAR
                        print "<div class='modal fade' id='modificar$reg[Id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                        print "<div class='modal-dialog' role='document'>";

                        print  "<div class='modal-content'>";
                        print  "<div class='modal-header'>";
                        print  "<h5 class='modal-title' id='modificar'>MODIFICAR ESTACIÓN</h5>";
                        print  "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        print  "<span aria-hidden='true'>&times;</span>";
                        print  "</button>";
                        print  "</div>";
                        print  "<div class='modal-body'>";
                        //FORMULARIO MODIFICAR
                        //La línea siguiente esta haciendo referencia al id de la fila del regristro -update.php?id=$reg[Id]-
                        print  "<form action='m_file/estaciones/update.php?id=$reg[Id]' method='post'>";
                        print         "<div class='form-group'>";
                        print              "<label for='mmarca'>MARCA</label>";
                        print              "<input type='text' class='form-control' name='mmarca' id='mmarca?$reg[Marca]&' value='$reg[Marca]' maxlength='45'>";
                        print          "</div>";
                        print          "<div class='form-group'>";
                        print              "<label for='mmodelo'>MODELO</label>";
                        print              "<input type='text' class='form-control' name='mmodelo' id='mmodelo?$reg[Modelo]' value='$reg[Modelo]' maxlength='45'>";
                        print          "</div>";
                  
                        print          "<div class='form-group'>";
                        print              "<label for='mip'>IP</label>";
                        print              "<input type='text' class='form-control' name='mip' id='mip?$reg[IP]' value='$reg[IP]' maxlength='15'>";
                        print          "</div>";
                        print          "<div class='form-group'>";
                        print              "<label for='mticon'>TIPO DE CONEXIÓN</label>";
                        print              "<input type='text' class='form-control' name='mticon' id='mticon?$reg[Tipo_Conex]' value='$reg[Tipo_Conex]' maxlength='45'>";
                        print          "</div>";
                  
                        print          "<div class='form-group'>";
                        print              "<label for='mubi'>UBICACIÓN</label>";
                        print              "<input type='text' class='form-control' name='mubi' id='mubi?$reg[Ubi]' value='$reg[Ubi]' maxlength='45'>";
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
    
  <!--FIN CONTAINER-->  
    </div>

   <!--
COSAS A CORREGIR Y AÑADIR
ESTACIONES

FORMULARIO: PONER LIMITE DE CARACETRES. HECHO
MODAL MODIFICAR: HACER QUE LOS CAMPOS SE MODIFIQUEN INDIVIDUALMENTE. HECHO
SENSORES: AÑADIR BOTTÓN PARA VINVULARLO A UNA ESTACIÓN.
PONER UNA VERSION HORIZONTAL Y VERTICAL DE LA WEB MODIFICAR
PONER PANEL SPOILER INFORMACIÓN
PONER ESCTRUCTURA DE TEXTO POR EJEMPLO (192.168.1.1)
HACER QUE LA TABLA DE LA CONSULTA SE ADAPTE A LA PANTALLA
   --> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../recursos/bootstrap/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../recursos/bootstrap/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../recursos/bootstrap/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>