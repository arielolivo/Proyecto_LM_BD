 <?php
            
            $modelo = trim(htmlspecialchars($_REQUEST["s_imodelo"], ENT_QUOTES, "UTF-8"));
            $nombre = trim(htmlspecialchars($_REQUEST["s_inombre"], ENT_QUOTES, "UTF-8"));
            $estacion = trim(htmlspecialchars($_REQUEST["s_idestacion"], ENT_QUOTES, "UTF-8"));
            //CON1
            $conexion = mysqli_connect("localhost", "root", "root", "estacion")
                or die("Problemas de conexión");
                
            mysqli_query($conexion, 
                "INSERT INTO sensores(Id_Estacion, Modelo, Nombre) VALUES ('$estacion', '$modelo', '$nombre')")
                or die("Problemas en el insert".mysqli_error($conexion));

        
            mysqli_close($conexion);
        //HEADER QUE MANDA UN MENSAJE A inicio.php
            header('location: ..\..\m_data.php?s_mensaje=SENSOR AGREGADO');
            
?>