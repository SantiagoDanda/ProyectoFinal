<?php
    require "../conexion.php";
    $conexion = connect();
    session_start();

    $nombreClase = $_GET['nombre'];

    $consulta = "SELECT id_clase from clases where nombre = '$nombreClase'";
    $sql = mysqli_query($conexion, $consulta);
    $sql = mysqli_fetch_array($sql);

    echo json_encode($sql[0]);