<?php
    require "../conexion.php";
    $conexion = connect();
    session_start();
    $nombreTarea = $_GET['nombreTarea'];
    $nombreClase = $_GET['nombreclase'];
    $consulta = "SELECT id_clase from clases where nombre = '$nombreClase'";
    $id = mysqli_query($conexion, $consulta);
    $id = mysqli_fetch_array($id);
    $muestraDatos = "SELECT descripcion, puntos, fechasubida, fechaentrega, material from tareas where id_clase = $id[0] and nombre = '$nombreTarea'";
    $sql = mysqli_query($conexion, $muestraDatos);
    $sql = mysqli_fetch_array($sql);
    $nombreTrabajo = basename($sql[4]);
    $rutaTarea = "../../../statics/media/archivosTarea".$sql[4];
    header('Content-Type: aplication/pdf');
    header('Content-Disposition: attachment; filename="'.$nombreTrabajo.'";');
    readfile('../../../statics/media/archivosSubirTarea/'.$nombreTrabajo.'');
    exit;
    move_uploaded_file($_FILES[$nombreTrabajo]['tmp_name'], '../../../statics/media/archivosSubirTaea/'.$nombreTrabajo);
    echo '<a download="'.$nombreTrabajo.' href="../../../statics/media/archivosSubirTaea/'.$nombreTrabajo.'">Descargar pdf</a>';
?>