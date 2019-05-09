<?php

$id = trim(htmlspecialchars($_REQUEST["id"], ENT_QUOTES, "UTF-8"));

             //CON1
             $conexion = mysqli_connect("localhost", "root", "", "estacion")
                 or die("Problemas de conexión");

            $sql = "DELETE FROM sensores WHERE Id = $id";
            echo $sql;
            mysqli_query($conexion, $sql)
                 or die("Problemas en el delete".mysqli_error($conexion));


// DELETE FROM `estacion`.`estaciones` WHERE (`Id` = '24');
        
            mysqli_close($conexion);
        //HEADER QUE MANDA UN MENSAJE A inicio.php
        header('location: ..\..\sensores.php?s_mensaje=SENSOR BORRADO');
            
?>