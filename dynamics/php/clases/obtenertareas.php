<?php
    header("Content-Type: application/json");
    require "../conexion.php";
    $conexion = connect();
    session_start();

    $nombreClase = $_GET['nombre'];

    $consulta = "SELECT id_clase from clases where nombre = '$nombreClase'";
    $sql = mysqli_query($conexion, $consulta);
    $sql = mysqli_fetch_array($sql);

    $consulta = "SELECT nombre from tareas where id_clase = $sql[0]";
    $sql = mysqli_query($conexion, $consulta);
    $sql = mysqli_fetch_all($sql);

    echo json_encode($sql);