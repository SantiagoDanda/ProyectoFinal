<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
    <link rel="stylesheet" href="../../statics/style/css/calificaciones.css">
</head>
<body>
    <?php
    // inicioi de sesión
        session_start();
        //Esto incluye la conexión a la BD
        include("./conexion.php");
        $conexion = connect();

        // $foto= $_SESSION["url"];
        $usuario = $_SESSION["usuario"];

        //peticiones
        $peticionUrl = "SELECT url FROM usuarios where usuario = '$usuario'";
        $foto = mysqli_query($conexion, $peticionUrl);
        $foto = mysqli_fetch_array($foto);

        //nos da los valores del perfil
        $direccionImagen = "../../statics/media/img/".$foto[0];
        $inicial = substr($usuario, 0,1);
        $inicial = strtoupper($inicial);

        //Variables
        $materia = array("Matemáticas III", "Otra materia II");
        $totalClases = count($materia);
        $porcentaje = 70;
    
        echo '<div class="encabezado"><h1><u>Calificaciones </u></h1><div><input type="text"></input></div></div><br/>';
        //Parte de la foto de perfil
        echo"<div id='cuadroClases'>";
            echo "<div id='fotoPerfil'>";
                if($foto[0] != NULL){
                    echo"<img id='perfil' alt='Foto perfil' src=".$direccionImagen.">";
                }else{
                    echo"<div id= 'perfilSinFoto'><strong>".$inicial."</strong></div>";
                }
                echo"
            </div>
        </div> <br/>
        <div style='text-aling:center;'><strong>Nombre: </strong>".$usuario."</div><br/><br/>
        ";
        // AQUÍ IRIAN LAS PETICIONES DE LAS CLASES Y LAS CALIFICACIONES
        for($i = 0; $i < $totalClases; $i++){
            echo"
            <div id='cuadroClases'>
                <div id='contenedorClases'>
                    <u>".$materia[$i]."</u><br/>
                    <div id='porcentajeT'>
                        <div id='porcentajeC' width=''></div>
                    </div>
                </div> 
            </div><br/>
            ";
        }
    ?>
</body>
</html>