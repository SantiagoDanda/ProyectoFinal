<?php
    header("Content-Type: application/json");
    require "../conexion.php";
    $conexion = connect();
    session_start();
    $error = 0;

    $nombreClase = $_GET['nombre'];
    
    $consulta = "SELECT id_clase from clases where nombre = '$nombreClase'";
    $sql = mysqli_query($conexion, $consulta);
    $sql = mysqli_fetch_array($sql);

    $datos = "SELECT nombre, descripcion, fecha from publicacionesclase inner join usuarios on publicacionesclase.numcuenta=usuarios.numcuenta where id_clase=$sql[0]";
    $sql = mysqli_query($conexion, $datos);
    $sql = mysqli_fetch_all($sql);

    echo json_encode($sql);