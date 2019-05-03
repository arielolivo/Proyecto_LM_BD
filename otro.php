<?php

    /*****************************************************************************

    .::. AdaCnxBd .::.

    @Autor@: Aldrin Echeverry Higgins

    @Email@: aldrin@adanetwork.net

    @Descripción@: Una Clase diseñada con los conceptos de POO(Programación Orientada a Objetos) en PHP.

    @Empresa@: Ada Network

    @Versión@: 1.0

    *****************************************************************************/

    class AdaCnxBd{

    //Atributos Basicos de la clase

    var $servidor; //Nombre de la maquina donde se encuentra la BD generalmente es localhost

    var $nombreBD; //Nombre de la Base de Datos

    var $nombreDeUsuario; //Nombre del usuario autorizado para entrar a la Base de Datos

    var $contrasena; //Contraseña del Usuario



    //Atributos Modificados

    var $enlace;//Almacena el enlace con la Base de Datos una vez establecido

    var $resultado;//Almacena el resultado obtenido por la consulta a la BD

    var $consulta;//Almacena la consulta realizada con el metodo consultaBD();



    //Constructor de la Clase

    //Inicializa algunos atributos Básicos

    //Ejemplo: $objBD=new //AdaCnxBD("localhost","MiBaseDeDatos","MiNombreDeUsuario","MiContraseña");

    function AdaCnxBd($servidor,$nombreBD,$nombreDeUsuario,$contrasena){

    $this->servidor=$servidor;

    $this->nombreBD=$nombreBD;

    $this->nombreDeUsuario=$nombreDeUsuario;

    $this->contrasena=$contrasena;

    }



    //Metodos y Procedimientos

    //conectarBD(); Te permite conectar y enlazar la BD, el enlace a la BD es almacenado modificando

    //el atributo $enlace

    //Ejemplo: $objBD->conectarBD();

    function conectarBD(){

    if($this->enlace=mysql_connect($this->servidor,$this->nombreDeUsuario,$this->contrasena)){

    if(mysql_select_db($this->nombreBD,$enlace)){

    $this->enlace=$enlace;echo "OK";

    }else{

    echo "Error al seleccionar la base de datos!";

    exit();

    }

    }else{

    echo "Error al enlazar al Servidor!";

    exit();

    }

    }



    //consultarBD(); permite realizar consultas en la BD enlazada

    //Ejemplo: $objBD->consultarBD("select * from MyTabla where 1");

    function consultarBD($sentenciaSQL){

    $this->consulta=mysql_query($sentenciaSQL,$this->enlace);

    }



    //obtenerResultado(); Devuelve los resultados de la Base de Datos

    /*Ejemplo:



    while($fila=$objBD->obtenerResultado()){

    printf("%s<br>",$fila["nombre"]);

    }

    */

    function obtenerResultado(){

    $this->resultado=mysql_fetch_array($this->consulta);

    return $this->resultado;

    }



    //liberarConsulta(); libera el contenido del atributo que almacena las consultas

    //Ejemplo: $objBD->consultarBD("select * from MyTabla where 1");

    function liberarConsulta(){

    mysql_free_result($this->consulta);

    }



    function insertarRegistro($sentenciaSQL){

    mysql_query($sentenciaSQL,$this->enlace);

    }



    }//Fin de la Clase AdaCnxBd

    ?>







    <?php

/*
    include("AdaCnxBd.php");

    $objBd=new AdaCnxBd("localhost","MyBD","MyLogin","MyPass");

    $objBd->conectarBD();

    $objBd->consultarBD("select * from MyTable");

    while($row=$objBd->obtenerResultado()){

    printf("%s<br>",$row["nombreDelCampo"]);

    }

    $objBd->terminarConsulta();

    $objBD->desconectarBD();
*/
    ?>
