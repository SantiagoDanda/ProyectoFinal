<?php
// envía el nombre al iniciar la sesion
    $nombre = (isset($_POST["UsuarioSes"]) && $_POST["usuarioSes"] != "") ? $_POST["usuarioSes"]: false;
    $contrasena = (isset($_POST["contrasena"]) && $_POST["contrasena"] != "") ? $_POST["contrasena"]: false;

    // hacer petición a la base de datos pidiendo la contraseña 
    // la petición se hace conforme al usuario, lo busca 
    $constraBase = "1234567";
    $usuario = "Jesús";

    // verifica que el usuario exista
    if($nombre != NULL){
        // verifica que la contraseña coincida con la del usuario
        if($constrasena != $constraBase){
            echo '
                <script>
                    alert("El usuario o la contraseña son icorrectos");
                    window.location.href="./../..";
                </script>
            ';
        }else if($constraBase == $constrasena){
            echo '
                <script>
                    window.location.href="../../statics/templates/alumnoPrincipal.html";
                </script>
            ';
        }
    }else if($nombre == NULL){
        echo'
            <script>
                alert("El usuario no existe, por favor registrate");
                window.location.href="./../..";
            </script>
        ';
    }
?>