
            <?php
            $marca = trim(htmlspecialchars($_REQUEST["e_imarca"], ENT_QUOTES, "UTF-8"));
            $modelo = trim(htmlspecialchars($_REQUEST["e_imodelo"], ENT_QUOTES, "UTF-8"));
            $ip = trim(htmlspecialchars($_REQUEST["e_iip"], ENT_QUOTES, "UTF-8"));
            $tipoc = trim(htmlspecialchars($_REQUEST["e_iticon"], ENT_QUOTES, "UTF-8"));
            $ubi = trim(htmlspecialchars($_REQUEST["e_iubi"], ENT_QUOTES, "UTF-8"));
            
            //CON1
            $conexion = mysqli_connect("localhost", "root", "", "estacion")
                or die("Problemas de conexión");
                
            mysqli_query($conexion, 
                "INSERT INTO estaciones(Marca, Modelo, IP, Tipo_Conex, Ubi) VALUES ('$marca','$modelo', '$ip', '$tipoc', '$ubi')")
                or die("Problemas en el insert".mysqli_error($conexion));

        
            mysqli_close($conexion);
        //HEADER QUE MANDA UN MENSAJE A inicio.php
            header('location: ../../estaciones.php?e_mensaje=ESTACIÓN AGREGADA');
            
            ?>