<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=ESTACION;host=localhost","root","");
switch($_GET['Consultar']){
		// Buscar �ltimo Dato
		case 1:
		    $statement=$pdo->prepare("SELECT UNIX_TIMESTAMP(CONVERT_TZ(m.Fecha_Hora, '+00:00', @@global.time_zone))*1000 as x, Valor as y FROM Medidas ORDER BY Sensores_Id DESC LIMIT 0,1");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break; 
		// Buscar Todos los datos
		default:
			
			$statement=$pdo->prepare("SELECT UNIX_TIMESTAMP(CONVERT_TZ(m.Fecha_Hora, '+00:00', @@global.time_zone))*1000 as x, Valor as y FROM Medidas m  ORDER BY Fecha_Hora");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break;

}
?>