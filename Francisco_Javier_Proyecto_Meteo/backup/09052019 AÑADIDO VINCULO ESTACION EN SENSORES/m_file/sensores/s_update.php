
        <div class="container">
            <?php
            $modelo = trim(htmlspecialchars($_REQUEST["s_mmodelo"], ENT_QUOTES, "UTF-8"));
            $nombre = trim(htmlspecialchars($_REQUEST["s_mnombre"], ENT_QUOTES, "UTF-8"));
            $id = trim(htmlspecialchars($_REQUEST["id"], ENT_QUOTES, "UTF-8"));
            
            //CON1
            $conexion = mysqli_connect("localhost", "root", "", "estacion")
                or die("Problemas de conexión");
                
            mysqli_query($conexion, 
                "UPDATE sensores SET Modelo = '$modelo',Nombre = '$nombre' WHERE Id = $id")
                or die("Problemas en el UPDATE".mysqli_error($conexion));

        
            mysqli_close($conexion);
        //HEADER QUE MANDA UN MENSAJE A inicio.php
            header('location: ..\..\sensores.php?s_mensaje=SENSOR ACTUALIZADO');
            
            ?>