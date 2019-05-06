<?php
 
$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];
 
if(empty($usuario) || empty($pass)){
header("Location: sesion.html");
exit();
}
 
$conexion = mysqli_connect("localhost", "root", "", "estacion")
                or die("Problemas de conexión");
$sql = "SELECT usuario, contrasena FROM usuarios WHERE usuario LIKE $usuario contrasena = $pass";
echo $sql;

mysqli_query($conexion, $sql) or die("Problemas al logearse");
 
if($row = mysql_fetch_array($sql)){
if($row['contrasena'] == $pass){
session_start();
echo "contraseña";
$_SESSION['usuario'] = $usuario;
//header("Location: contenido.php");
echo "usuario";
}else{
//header("Location: sesion.html");
exit();
}
}else{
//header("Location: ");
exit();
}
 
 
?>