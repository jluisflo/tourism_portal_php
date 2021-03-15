<?php
    function conectar()
    {
        $server="localhost";
        $user="root";
        $password="";
        $database="BD_turismo";
        $conexion = mysqli_connect($server, $user, $password, $database);
        if (!$conexion) DIE("Lo sentimos, no se ha podido conectar con la base de datos: " . mysqli_error());
 
        return $conexion;
    }
?>