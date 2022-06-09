<?php
    header("Content-Type:aplication/json");
    session_start();
    require "../conexion.php";
    $json = json_decode(file_get_contents("php://input"), true);
    $conexion = connect(); 

    $comentario= (isset($json['comentario'])&& $json['comentario'] != "")? $json['comentario']:null;
    $idP = $json['idpublicacion'];
    $fechaSubida = date("Y-m-d H:i:s");
    $numCuenta = $_SESSION["numcuenta"];
    // falta el id publicación ya no
    $peticionComentario = "INSERT INTO comentarios VALUES (null, $idP, $numCuenta, '$fechaSubida', '$comentario')";
    $consultaComent = mysqli_query($conexion, $peticionComentario);
    if($consultaComent == true){
        echo '{"ok":true}';
    }else{
        echo '{"ok":false}';
    }
?> 