
        <div class="container">
            <?php
            $marca = trim(htmlspecialchars($_REQUEST["e_mmarca"], ENT_QUOTES, "UTF-8"));
            $modelo = trim(htmlspecialchars($_REQUEST["e_mmodelo"], ENT_QUOTES, "UTF-8"));
            $ip = trim(htmlspecialchars($_REQUEST["e_mip"], ENT_QUOTES, "UTF-8"));
            $tipoc = trim(htmlspecialchars($_REQUEST["e_mticon"], ENT_QUOTES, "UTF-8"));
            $ubi = trim(htmlspecialchars($_REQUEST["e_mubi"], ENT_QUOTES, "UTF-8"));
            $id = trim(htmlspecialchars($_REQUEST["id"], ENT_QUOTES, "UTF-8"));
            
            //CON1
            $conexion = mysqli_connect("localhost", "root", "", "estacion")
                or die("Problemas de conexión");
                
            mysqli_query($conexion, 
                "UPDATE estaciones SET Marca = '$marca', Modelo = '$modelo',IP = '$ip', Tipo_Conex = '$tipoc', Ubi = '$ubi' WHERE Id = $id")
                or die("Problemas en el UPDATE".mysqli_error($conexion));

        
            mysqli_close($conexion);
        //HEADER QUE MANDA UN MENSAJE A inicio.php
            header('location: ../../m_data.php?e_mensaje=ESTACIÓN ACTUALIZADA');
            
            ?>