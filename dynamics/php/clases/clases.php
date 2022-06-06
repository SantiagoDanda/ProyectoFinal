<?php
    session_start();
    if($_SESSION["tipo"] != 'alumno'){
        header("Location: ./clasesprofe.php");
        die();
    }
    else{
        header("Location: ../../../statics/templates/clases.html");
        die();
    }
?>