<?php
    require "../conexion.php";
    $conexion = connect();
    session_start();
    
    $nombreTarea = $_GET['nombreTarea'];
    $nombreClase = $_GET['nombreclase'];

    $consulta = "SELECT id_clase from clases where nombre = '$nombreClase'";
    $id = mysqli_query($conexion, $consulta);
    $id = mysqli_fetch_array($id);
    var_dump($id);

    $muestraDatos = "SELECT descripcion, puntos, fechasubida, fechaentrega, material from tareas where id_clase = $id[0] and nombre = '$nombreTarea'";
    $sql = mysqli_query($conexion, $muestraDatos);
    $sql = mysqli_fetch_array($sql);
    // sql[4]tiene el valor
 
    $comentario= (isset($_POST['comentarioSubir'])&& $_POST["comentarioSubir"] != "")? $_POST['comentarioSubir']: 'subido';
 
    //variable
    // $fechaSubida = date("Y-m-d H:i:s");
    // $numCuenta = $_SESSION['numcuenta'];

    

    // $peticionRegistro = "INSERT INTO tareahasusuario VALUES (NULL, NULL, $numCuenta, NULL, true, $nombreTrabajo, '$fechaSubida')";
    // $peticionReg =  mysqli_query($conexion, $peticionRegistro);
    // if($peticionReg == true){
    //     echo'
    //     <script type="text/javascript">
    //         alert("La tarea fue completada");
    //         window.location.href="./subirTarea.php";
    //     </script>';
    //     die();
    // }    else{
    //     echo'
    //     <script type="text/javascript">
    //         alert("Algo falló.");
    //     </script>';
    //     die();
    // } 
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
                <div class="div1" id="'.$nombreClase.'">
                </div>
                <div class="div1" id="'.$nombreTarea.'">
                </div>
                <div id="descargaTrol">

                <button id="descarga">Descargar</button>
                
                <form action="../subirTarea/subirTarea.php">
                    <button>Subir tu tarea</button>
                </form>
                ';
               echo '<div/>
            </div>
        </div>
    </body>
    <script >
    const descarga = document.getElementById("descarga");
    const ids= document.getElementsByClassName("div1");
    
    console.log("afdasdfasd");
    
    let idNombreClase= ids[0].id;
    let idNombreTarea= ids[0].id;
    descarga.addEventListener("click",(evento)=>{
        window.location.href="./descarga.php?nombreclase="+idNombreClase+"&nombreTarea="+idNombreTarea+"";
    });
    </script>
    </html>
    ';
    // <form action="./descarga.php?nombreTarea='.$nombreTarea.'&nombreclase='.$nombreClase.'" method="get">


    // if($sql[4] == NULL){ 
    //     $carpeta = opendir("../../../statics/media/archivosSubirTaea");
    //     $arch = [];
    //     $hay_archivos = true;
    //     $archivoTarea=readdir($carpeta);
    //     if($archivoTarea != false)
    // }
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
        </form>';
    }
