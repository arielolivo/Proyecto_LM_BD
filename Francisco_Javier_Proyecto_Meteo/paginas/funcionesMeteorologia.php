<?php
//PAGINA PRINCIPAL

//ESTACI�N (MODELO)
include("SGBD.php");

/*
$registros = mysqli_query($conexion, "SELECT Id, Modelo FROM estaciones")
                            or die("Problemas en el select".mysqli_error($conexion));
                        while ($reg = mysqli_fetch_array($registros)) {
                            print "<option value='$reg[Id]'>$reg[Modelo]</option>";
                        }
*/
$i = SGBD::sql("SELECT Id, Modelo FROM estaciones");

                        

//CONSULTA VISUALIZAR DATOS
/*
$registros = mysqli_query($conexion, 
            "SELECT * from sensores") or die("Problemas en la consulta:".mysqli_error($conexion));
*/

$i = SGBD::sql("SELECT * from sensores");

//------EDITAR ESTACIONES------


// BORRAR
/*
$sql = "DELETE FROM estaciones WHERE Id = $id";
            echo $sql;
            mysqli_query($conexion, $sql)
                 or die("Problemas en el delete".mysqli_error($conexion));
*/

$i = SGBD::sql("DELETE FROM estaciones WHERE Id = $id");


/*
$sql = "DELETE FROM estaciones WHERE Id = $id";
*/

$i = SGBD::sql($sql);



//INSERTAR
/*
mysqli_query($conexion, 
                "INSERT INTO estaciones(Marca, Modelo, IP, Tipo_Conex, Ubi) VALUES ('$marca','$modelo', '$ip', '$tipoc', '$ubi')")
                or die("Problemas en el insert".mysqli_error($conexion));
*/

$i = SGBD::sql("INSERT INTO estaciones(Marca, Modelo, IP, Tipo_Conex, Ubi) VALUES ('$marca','$modelo', '$ip', '$tipoc', '$ubi')");

//UPDATE
/*
mysqli_query($conexion, "UPDATE estaciones SET Marca = '$marca', Modelo = '$modelo',IP = '$ip', Tipo_Conex = '$tipoc', Ubi = '$ubi' WHERE Id = $id")
                or die("Problemas en el UPDATE".mysqli_error($conexion));
*/

$i = SGBD::sql("UPDATE estaciones SET Marca = '$marca', Modelo = '$modelo',IP = '$ip', Tipo_Conex = '$tipoc', Ubi = '$ubi' WHERE Id = $id");

//------EDITAR SENSORES------

//BORRAR
/*
$sql = "DELETE FROM sensores WHERE Id = $id";
            echo $sql;
            mysqli_query($conexion, $sql)
                 or die("Problemas en el delete".mysqli_error($conexion));
*/

$i = SGBD::Delete("sensores","Id = $id");
$i = SGBD::sql("DELETE FROM sensores WHERE Id = $id");

//INSERTAR
/*
mysqli_query($conexion, 
                "INSERT INTO sensores(Id_Estacion, Modelo, Nombre) VALUES ('$estacion', '$modelo', '$nombre')")
                or die("Problemas en el insert".mysqli_error($conexion));
*/

$i = SGBD::sql("INSERT INTO sensores(Id_Estacion, Modelo, Nombre) VALUES ('$estacion', '$modelo', '$nombre')");


//UPDATE
/*
 mysqli_query($conexion, 
                "UPDATE sensores SET Modelo = '$modelo',Nombre = '$nombre' WHERE Id = $id")
                or die("Problemas en el UPDATE".mysqli_error($conexion));
*/


$i = SGBD::Update("sensores","Modelo = '$modelo',Nombre = '$nombre'","Id = $id");



?>