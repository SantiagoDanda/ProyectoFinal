<!-- Manda las dudas al sistema-->
<?php 
    ///////////// MANDAR DUDAS - DANDA Y LUCA :V//////////////
    /*
    Aquí lo que estamos haciendo es mandar el mensaje desde la página de dudas hacia el admin
    */
    session_start();

    include("./conexion.php");
    $conexion= connect();

    $mensaje = (isset($_POST["comentario"]) && $_POST["comentario"] != "") ? $_POST["comentario"]: false;
    $asunto = (isset($_POST["asunto"]) && $_POST["asunto"] != "") ? $_POST["asunto"]: false;
    $comentario = (isset ($_POST["comentario"]) && $_POST["comentario"] != "") ? $_POST["comentario"]: false;
    $archivo = (isset ($_POST["archivo"]) && $_POST["archivo"] != "")? $_POST["archivo"]: false;
    
    $peticionMensaje = "INSERT INTO mensajes VALUES (NULL, '$_SESSION[numcuenta]', NULL, '$mensaje', '$asunto', 'dudas')";
    $consulta = mysqli_query($conexion, $peticionMensaje);

    echo 'a';
    header('Location: ./dudasPag.php');
?>