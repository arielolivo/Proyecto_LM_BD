 <?php
    include("..\..\SGBD.php");
            $modelo = trim(htmlspecialchars($_REQUEST["s_imodelo"], ENT_QUOTES, "UTF-8"));
            $nombre = trim(htmlspecialchars($_REQUEST["s_inombre"], ENT_QUOTES, "UTF-8"));
            $estacion = trim(htmlspecialchars($_REQUEST["s_idestacion"], ENT_QUOTES, "UTF-8"));
            //CON1
            $i = SGBD::sql("INSERT INTO sensores(Id_Estacion, Modelo, Nombre) VALUES ('$estacion', '$modelo', '$nombre')");
        //HEADER QUE MANDA UN MENSAJE A inicio.php
            header('location: ..\..\m_data.php?s_mensaje=SENSOR AGREGADO');
            
?>