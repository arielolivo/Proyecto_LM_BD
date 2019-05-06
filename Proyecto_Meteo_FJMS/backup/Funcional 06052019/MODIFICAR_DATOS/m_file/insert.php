<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>INSERT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <?php
            $marca = trim(htmlspecialchars($_REQUEST["imarca"], ENT_QUOTES, "UTF-8"));
            $modelo = trim(htmlspecialchars($_REQUEST["imodelo"], ENT_QUOTES, "UTF-8"));
            $ip = trim(htmlspecialchars($_REQUEST["iip"], ENT_QUOTES, "UTF-8"));
            $tipoc = trim(htmlspecialchars($_REQUEST["iticon"], ENT_QUOTES, "UTF-8"));
            $ubi = trim(htmlspecialchars($_REQUEST["iubi"], ENT_QUOTES, "UTF-8"));
            
            //CON1
            $conexion = mysqli_connect("localhost", "root", "", "estacion")
                or die("Problemas de conexión");
                
            mysqli_query($conexion, 
                "INSERT INTO estaciones(Marca, Modelo, IP, Tipo_Conex, Ubi) VALUES ('$marca','$modelo', '$ip', '$tipoc', '$ubi')")
                or die("Problemas en el insert".mysqli_error($conexion));

        
            mysqli_close($conexion);
        //HEADER QUE MANDA UN MENSAJE A inicio.php
            header('location: ..\inicio_Beta.php?mensaje=ESTACIÓN AGREGADA');
            
            ?>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </body>
</html>