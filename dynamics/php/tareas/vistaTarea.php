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

    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tareas</title>
        <link rel="stylesheet" href="../../../statics/style/css/vistaTarea.css">
    </head>
    <body>
        <div id="contenedor-datos">
            <div id="datos">
                <h1 id="nombreTarea">'.$nombreTarea.'</h1>
                <div id="descripcion">'.$sql[0].'</div>
                <div id="puntos">Puntos:'.$sql[1].'/100</div>
                <div id="fechaentrega">Fecha entrega: '.$sql[3].'</div>
                <div id="fechasubida">Tarea generada el: '.$sql[2].'</div>
                <button>Descargar el material</button>
            </div>
        </div>
    </body>
    </html>
    ';
    if($_SESSION["tipo"] == 'profe'){
        $consultaNombres= "SELECT nombre from clasehasusuario inner join usuarios on clasehasusuario.id_usuario=usuarios.numcuenta where id_clase =$id[0]";
        $sql = mysqli_query($conexion, $consultaNombres);
        $sql = mysqli_fetch_assoc($sql);

        echo '<h2>Revisar a:</h2>';

        foreach ($sql as $key => $value) {
            echo '<div>'.$value.'</div>';
        }
    }else{
        echo '
        <form>
        <br><br>Subir archivo: 
        <input type="file"><br><br>
        <input type="submit">
        </form>
        ';
    }
