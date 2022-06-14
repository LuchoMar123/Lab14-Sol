<?php
    $usuario="root";
    $contra="";
    $base_datos="teo3";
    $equipo="localhost";
    
    $conexion = new mysqli($equipo,$usuario,$contra,$base_datos);
    if($conexion -> connect_error)
    {
        die("Conexion fallida" . $conexion -> connect_error);
    }
?>