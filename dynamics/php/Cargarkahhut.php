<?php
    require "conexion.php";
    $conexion=connect();
    $peticion= "SELECT * FROM kahhut WHERE idcuestionario=$_GET[idform]";
    $query= mysqli_query($conexion, $peticion);
    $respuesta=mysqli_fetch_array($query);
    $send=$respuesta["json"];
    echo $send;
    
?>