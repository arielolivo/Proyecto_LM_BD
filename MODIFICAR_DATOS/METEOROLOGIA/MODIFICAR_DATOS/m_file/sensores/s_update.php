
        <div class="container">
            <?php
            $modelo = trim(htmlspecialchars($_REQUEST["imodelo"], ENT_QUOTES, "UTF-8"));
            $nombre = trim(htmlspecialchars($_REQUEST["inombre"], ENT_QUOTES, "UTF-8"));
            
            //CON1
            $conexion = mysqli_connect("localhost", "root", "", "estacion")
                or die("Problemas de conexión");
                
            mysqli_query($conexion, 
                "UPDATE sensores SET Modelo = '$modelo',Nombre = '$nombre'")
                or die("Problemas en el UPDATE".mysqli_error($conexion));

        
            mysqli_close($conexion);
        //HEADER QUE MANDA UN MENSAJE A inicio.php
            header('location: ..\..\sensores.php?mensaje=ESTACIÓN ACTUALIZADA');
            
            ?>