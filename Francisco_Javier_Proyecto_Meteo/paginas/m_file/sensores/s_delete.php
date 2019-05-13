<?php
include("..\..\SGBD.php");
$id = trim(htmlspecialchars($_REQUEST["id"], ENT_QUOTES, "UTF-8"));

             //CON1
             $i = SGBD::sql("DELETE FROM sensores WHERE Id = $id");


// DELETE FROM `estacion`.`estaciones` WHERE (`Id` = '24');
        
        
        //HEADER QUE MANDA UN MENSAJE A inicio.php
        header('location: ..\..\m_data.php?s_mensaje=SENSOR BORRADO');
            
?>