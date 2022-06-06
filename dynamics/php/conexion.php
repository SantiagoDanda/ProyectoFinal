
<?php
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("PASSWORD", "");
    define("DB", "moodle");

    function connect(){
        $conexion = mysqli_connect(DBHOST,DBUSER,PASSWORD,DB);
        if(!$conexion){
            mysqli_error();
            echo "no se pudo conectar a la base";
        }
        return $conexion;
    }
?>
