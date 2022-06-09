<?php
    header("Content-Type: application/json");
    require "../conexion.php";
    $conexion = connect();
    session_start();
    date_default_timezone_set('UTC');
    $error = 0;

    $fecha = date("Y-m-d h:i:s");

    $nombreClase = $_GET['nombre'];
    $descripcion = (isset($_POST["publicacion"]) && $_POST["publicacion"]!= "")?$_POST["publicacion"]:false;
    // $descripcion = 'aaa';

    $consulta = "SELECT id_clase from clases where nombre = '$nombreClase'";
    $sql = mysqli_query($conexion, $consulta);
    $sql = mysqli_fetch_array($sql);
    // var_dump($consulta);

    $peticionIngreso = "INSERT INTO publicacionesclase VALUES (NULL, $sql[0], $_SESSION[numcuenta], '$descripcion', '$fecha')";
    $sql = mysqli_query($conexion, $peticionIngreso);
    
    echo json_encode($sql);

    