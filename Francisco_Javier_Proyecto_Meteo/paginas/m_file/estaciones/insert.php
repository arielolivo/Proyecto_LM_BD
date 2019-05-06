
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
            header('location: ../../estaciones.php?mensaje=ESTACIÓN AGREGADA');
            
            ?>