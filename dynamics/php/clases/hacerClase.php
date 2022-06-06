<?php
    header("Content-Type: application/json");

    require "../conexion.php";
    $conexion = connect();
    session_start();
    $error = 0;

    $nombre = (isset($_POST["nombre"]) && $_POST["nombre"]!= "")?$_POST["nombre"]:false;
    
    $consultaNombre = "SELECT nombre from clases WHERE nombre = '$nombre'";
    $consulta = mysqli_query($conexion, $consultaNombre);

    if(mysqli_num_rows($consulta) != 0){
        $error = 1;
    }
    else{
        $peticionCrear = "INSERT INTO clases VALUES (NULL, $_SESSION[numcuenta], NULL, '$nombre')";
        $consulta = mysqli_query($conexion, $peticionCrear);
    }

    if($error == 1){
        echo '{"ok":false, "texto":"Esa clase ya existe, renómbrala, por favor."}';
    }
    else{
        echo '{"ok":false, "texto":"Clase creada."}';
    }
