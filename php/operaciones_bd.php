<?php
    class Operaciones{
        function __construct(){
            require 'config_bd.php'; //Llamo al archivo donde se encuentran las bariables de la conexión con la base de datos
            $this->conexion= mysqli_connect(SERVIDOR,USERNAME,PASSWORD,BDNAME); //Realizo la conexión con la base de datos
        }
        function cerrarconexion(){
            return $this->conexion->close();//Cierro la conexion con la base de datos
        }
        function consultar($consulta){
            return $this->conexion->query($consulta); //Realizo la consulta con la base de datos
        }
        function error(){
            return $this->conexion->errno;
        }
    }
?>