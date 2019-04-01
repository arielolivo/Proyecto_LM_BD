<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Consulta Join</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <!--CONSULTA-->
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
            </tr>";
                while ($reg = mysqli_fetch_array($registros)) {
                    echo "<tr>";
                        echo "<td>" . $reg['Id'] . "</td>";
                        echo "<td>" . $reg['Marca'] . "</td>";
                        echo "<td>" . $reg['Modelo'] . "</td>";
                        echo "<td>" . $reg['IP'] . "</td>";
                        echo "<td>" . $reg['Tipo_Conex'] . "</td>";
                        echo "<td>" . $reg['Ubi'] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";
            mysqli_close($conexion);
        ?>

<!--INSERTAR-->

<!--MODIFICAR-->

<!--BORRAR-->

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>