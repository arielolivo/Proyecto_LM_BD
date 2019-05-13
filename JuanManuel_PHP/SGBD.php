<?php
    //Los 'define' crean constantes
    
    /*Servidor*/
    define("HOST", 'localhost');
    /*Base de datos*/
    define("DB", 'estacion');
    /*Nombre del usuario*/
    define("USER", "root");
    /*Contraseña*/
    define("PASS", "");
    

    
class SGBD {
    public static function sql($query){
        $mysqli = new mysqli(HOST, USER, PASS, DB);
        if ($mysqli->connect_errno) {
            echo "Error: Fallo al conectarse a MySQL debido a:";
            echo "<strong> ".$mysqli->connect_error."</strong>";
            exit();
        }else{
            $mysqli->autocommit(FALSE);
            $mysqli->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            if(!$con = $mysqli->query($query)){
                echo 'Error de sintaxis en la consulta solicitada.';
                $mysqli->rollback();  
            }else{
                $mysqli->commit();
            }
            return $con;
        }
        $mysqli->close();
    }

 

//Estas funciones de aqui solo son atajos no son estrictamente necesarias
    /*Funcion para seleccionar datos*/
    public static function Select($campos, $tabla, $condicion,$pagina,$limite) {
        if (!$consul = SGBD::sql("SELECT $campos FROM $tabla ORDER BY Fecha_Hora
        LIMIT $pagina,$limite"/*"SELECT $campos FROM $tabla WHERE $condicion ORDER BY Fecha_Hora LIMIT $limit"*/ )) {
            echo " Ha ocurrido un error al obtener los datos.";
        }
        return $consul;
    }
    

    /*Funcion para insertar datos*/
    public static function Insert($tabla, $campos, $valores) {
        if (!$consul = SGBD::sql("INSERT INTO $tabla ($campos) VALUES($valores)")) {
            echo " Ha ocurrido un error al tratar de guardar los datos.";
        }
        return $consul;
    }

    /*Funcion para eliminar datos*/
    public static function Delete($tabla, $condicion) {
        if (!$consul = SGBD::sql("DELETE FROM $tabla WHERE $condicion")) {
            echo " Ha ocurrido un error al tratar de eliminar los datos.";
        }
        return $consul;
    }

    /*Funcion para actualizar datos*/
    public static function Update($tabla, $campos, $condicion) {
        if (!$consul = SGBD::sql("UPDATE $tabla SET $campos WHERE $condicion")) {
            echo " Ha ocurrido un error al tratar de actualizar los datos.";
        }
        return $consul;
    }
    
}
