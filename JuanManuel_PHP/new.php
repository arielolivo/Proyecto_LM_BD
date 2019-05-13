<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<?php
include("SGBD.php");
define("LIMITE", 5);
/*
$fechaInicio = trim(htmlspecialchars( strip_tags($_REQUEST["fechainicio"]), ENT_QUOTES, "UTF-8"));
$fechaFin = trim(htmlspecialchars( strip_tags($_REQUEST["fechafin"]), ENT_QUOTES, "UTF-8"));
$medida = trim(htmlspecialchars( strip_tags($_REQUEST["medida"]), ENT_QUOTES, "UTF-8"));
$valor = trim(htmlspecialchars( strip_tags($_REQUEST["valor"]), ENT_QUOTES, "UTF-8"));
$pagina = trim(htmlspecialchars( strip_tags($_REQUEST["pagina"]), ENT_QUOTES, "UTF-8"));
list($valorInicio,$valorFin) = exploit(';',$valor);
*/
$fechaInicio="";
$fechaFin="";
$medida = 'centigrados';
$valorInicio = -200;
$valorFin = 200;


if (isset($fechaInicio) && !empty($fechaInicio)){
    $FI=strtotime($fechaInicio);
}else{
    $time = SGBD::SelectTime("min");
    $FI = mysqli_fetch_array($time);
}

if (isset($fechaFin) && !empty($fechaFin)){
    $FF=strtotime($fechaFin);
}else{
    $time = SGBD::SelectTime("min");
    $FF = mysqli_fetch_array($time);
}

$campos = 'm.Fecha_Hora,s.modelo,m.Valor,s.id,m.Sensores_id,m.Variables_Id';
$tablas = 'medidas m inner join sensores s on m.Sensores_id = s.id';
$condicion = 'Fecha_Hora BETWEEN ' . $FI['Fecha_Hora'] . ' and ' . $FF['Fecha_Hora'];
$pagina = 0;
$limite = LIMITE;
//Hay dos formas de consultar pero voy a dejar esta
$query = SGBD::Select($campos,$tablas,$condicion,$pagina,$limite);
/*$query = SGBD::sql("SELECT $campos FROM $tablas 
ORDER BY $order
WHERE $condicion
$limite");*/

while($r = mysqli_fetch_array($query)){
    print '<p>' . $r['Variables_Id'] . '</p>';
    print '<p>' . $r['Fecha_Hora'] . '</p>';
    print '<p>' . $r['Valor'] . '</p>';
}
/*
while($row=mysqli_fetch_array($query)){

    printf("%s<br>",$row["Fecha_Hora"]);

    }
*/

?>
</body>
</html>