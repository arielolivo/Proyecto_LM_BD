
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
                "UPDATE estaciones SET Marca = '$marca', Modelo = '$modelo',IP = '$ip', Tipo_Conex = '$tipoc', Ubi = '$ubi'")
                or die("Problemas en el UPDATE".mysqli_error($conexion));

        
            mysqli_close($conexion);
        //HEADER QUE MANDA UN MENSAJE A inicio.php
            header('location: ..\..\sensores.php?mensaje=ESTACIÓN ACTUALIZADA');
            
            ?>