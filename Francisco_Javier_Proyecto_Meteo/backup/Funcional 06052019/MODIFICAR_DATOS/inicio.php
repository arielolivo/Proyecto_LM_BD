<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ESTACIONES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="padding-top:50px">
    <div class="container">
<div class="bg-warning text-dark" style="position:absolute;left:0px; top: 0px; z-index:1; width: 100%">
  <h3>ESTACIONES</h3>
</div>

<!--ESTE MENSAJE LLEGA DEL HEADER DEL ARCHIVO insert.php-->
<div>
<?php
        if (isset($_REQUEST["insertar"])) {
          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>$_REQUEST[insertar]</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
            }
?>
</div>


<!--MODAL: Boton con ventana emergente-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertar">
  AGREGAR
</button>
<!-- CABECERA -->
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
          <!--FORMULARIO-->
      <form action="m_file\insert.php" method="post">
                <div class="form-group">
                    <label for="imarca">MARCA</label>
                    <input type="text" class="form-control" name="imarca" id="imarca" required>
                </div>
                <div class="form-group">
                    <label for="imodelo">MODELO</label>
                    <input type="text" class="form-control" name="imodelo" id="imodelo" required>
                </div>

                <div class="form-group">
                    <label for="iip">IP</label>
                    <input type="text" class="form-control" name="iip" id="iip" required>
                </div>
                
                <div class="form-group">
                    <label for="iticon">TIPO DE CONEXIÓN</label>
                    <input type="text" class="form-control" name="iticon" id="iticon" required>
                </div>

                <div class="form-group">
                    <label for="iubi">UBICACIÓN</label>
                    <input type="text" class="form-control" name="iubi" id="iubi" required>
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
            "SELECT * from estaciones") or die("Problemas en la consulta:".mysqli_error($conexion));
            
            echo "<table class='table table-striped'>";
            echo "<tr>
            <th>ID</th>
            <th>MARCA</th>
            <th>MODELO</th>
            <th>IP</th>
            <th>TIPO_CONEXION</th>
            <th>UBICACION</th>
            <th>OPCIONES</th>
            <th></th>
            </tr>";
                while ($reg = mysqli_fetch_array($registros)) {
                    echo "<tr>";
                        echo "<td>" . $reg['Id'] . "</td>";
                        echo "<td>" . $reg['Marca'] . "</td>";
                        echo "<td>" . $reg['Modelo'] . "</td>";
                        echo "<td>" . $reg['IP'] . "</td>";
                        echo "<td>" . $reg['Tipo_Conex'] . "</td>";
                        echo "<td>" . $reg['Ubi'] . "</td>";
                        echo "<td>";
                        echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#borrar'>";
                        echo "Borrar";
                        echo "</button>";
                        echo "</td>";
                        echo "<td>";
                        echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modificar'>";
                        echo "Modificar";
                        echo "</button>";
                        echo "</td>";
                    echo "</tr>";
                }
            echo "</table>";
            mysqli_close($conexion);
        ?>
</div>
<!--MODIFICAR-->

<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificar">MODIFICAR ESTACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--FORMULARIO-->
      <form action="m_file\update.php" method="post">
                <div class="form-group">
                    <label for="imarca">MARCA</label>
                    <input type="text" class="form-control" name="imarca" id="imarca" required>
                </div>
                <div class="form-group">
                    <label for="imodelo">MODELO</label>
                    <input type="text" class="form-control" name="imodelo" id="imodelo" required>
                </div>

                <div class="form-group">
                    <label for="iip">IP</label>
                    <input type="text" class="form-control" name="iip" id="iip" required>
                </div>
                
                <div class="form-group">
                    <label for="iticon">TIPO DE CONEXIÓN</label>
                    <input type="text" class="form-control" name="iticon" id="iticon" required>
                </div>

                <div class="form-group">
                    <label for="iubi">UBICACIÓN</label>
                    <input type="text" class="form-control" name="iubi" id="iubi" required>
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

<!--MODAL BORRAR-->
<form action="m_file\delete.php" method="post">
<div class="modal fade" id="borrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="borrar">BORRAR</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                ¿ESTAS SEGURO DE QUE DESEAS BORRAR ESTA ESTACIÓN?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                                <!--FORMULARIO BORRAR-->
                                <form action="m_file\delete.php" method="post">
                                <input type="submit" class="btn btn-danger" value="BORRAR">
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
</form>
    
  <!--FIN CONTAINER-->  
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>