<?php
    session_start();
    include("../conexion.php");
    $conexion = connect();
    // sesión numCuenta para   
    $numCuenta = $_SESSION['numcuenta'];
    $nombreClase = $_GET['nombre'];

    $peticionNombre = "SELECT id_clase from clases where nombre='$nombreClase'";
    $peticionNombre = mysqli_query($conexion, $peticionNombre);
    $peticionNombre = mysqli_fetch_array($peticionNombre);
    // var_dump($peticionNombre);

    //fecha subida
    $fechaSubida = date("Y-m-d H:i:s");

    // $peticionTexto = "UPDATE tarea SET "
    $comentario= (isset($_POST['comentario'])&& $_POST["comentario"] != "")? $_POST['comentario']: "Sin comentarios";
    $fechaEntrega= (isset($_POST['fechaEntrega'])&& $_POST["fechaEntrega"] != "")? $_POST['fechaEntrega']: "Sin fecha de entrega";
    $valorPuntos= (isset($_POST['puntos'])&& $_POST["puntos"] != "")? $_POST['puntos']: NULL;
    $nombreAct= (isset($_POST['nombreAct'])&& $_POST["nombreAct"] != "")? $_POST['nombreAct']: NULL;


    $nCuentaMaestro= $_SESSION["tipo"];

    if(isset($_FILES['archivo'])){
        $nombre= (isset($_POST['namei'])&& $_POST["namei"] != "")? $_POST['namei']: "No especifico";
        $name= $_FILES['archivo']['name'];
        $ext= $extencion = pathinfo($name,PATHINFO_EXTENSION);
        $arch= $_FILES['archivo']['tmp_name'];

        // $peticionInfo = "UPDATE tareas SET material='$nombre' WHERE numcuenta=$numCuentaMaestro";

        if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'docx'){
            rename($arch, '../../../statics/media/archivosTarea/'.$nombre.'.'.$ext);
            $nombreC = $nombre.'.'.$ext;
            $peticionRegistro = "INSERT INTO tareas VALUES (NULL, '$numCuenta', $peticionNombre[0], '$fechaSubida',
            '$fechaEntrega', '$valorPuntos', '$nombreAct', '$comentario', '$nombre')";
            // var_dump($peticionRegistro);
            // $peticionInfo = "UPDATE tareas SET material='$nombre' WHERE numcuenta=$numCuentaMaestro";

        }else{
            echo"Solo aceptamos imagenes con extención .jpg, .jpeg, .png, .pdf, .docx ";
        }

    }else if(isset($_FILES['archivo'])!=true){

    }
    $consultaA = mysqli_query($conexion, $peticionRegistro);

    // falta agregar a donde va a redireccionar
    if($consultaA == true){
        echo'
        <script type="text/javascript">
            window.location.href = "../clases/vistaClase.php?nombre='.$nombreClase.'";
            alert("El archivo fue subido correctamente");
        </script>';
        die();
    }else{
        echo'
        <script type="text/javascript">
            window.location.href = "../clases/vistaClase.php?nombre='.$nombreClase.'";
            alert("Algo falló.");
        </script>';
        die();
    }
?>