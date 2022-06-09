<?php
    session_start();
    require "conexion.php";
    $conexion=connect();
    $numcuenta= $_SESSION["numcuenta"];
    $Peticion= "INSERT INTO kahhut VALUES ('$_POST[data]',".$_SESSION["numcuenta"].", NULL)";
    mysqli_query($conexion, $Peticion);
    $peticion2="SELECT MAX(idcuestionario) FROM kahhut WHERE numcuenta=".$_SESSION["numcuenta"];
    $query2= mysqli_query($conexion, $peticion2);
    $send= mysqli_fetch_array($query2);
    $send= json_encode($send);
    echo $send;
?>