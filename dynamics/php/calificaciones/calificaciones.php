<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
    <link rel="stylesheet" href="../../../statics/style/css/calificaciones.css">
</head>
<body>
    <?php
    // inicioi de sesión
        session_start();
        //Esto incluye la conexión a la BD
        include("../conexion.php");
        $conexion = connect();


        // $foto= $_SESSION["url"];
        $usuario = $_SESSION["usuario"];
        $numCuenta = $_SESSION["numcuenta"];

        //peticiones
        $peticionUrl = "SELECT url FROM usuarios where usuario = '$usuario'";
        $foto = mysqli_query($conexion, $peticionUrl);
        $foto = mysqli_fetch_array($foto);

        //nos da los valores del perfil
        $direccionImagen = "../../../statics/media/img/".$foto[0];
        $inicial = substr($usuario, 0,1);
        $inicial = strtoupper($inicial);

        //Variables
        
        $peticionMat = "SELECT nombre from clasehasusuario NATURAL JOIN clases where id_usuario=$numCuenta";
        $materia = mysqli_query($conexion, $peticionMat);
        $z=0; 
        while($materiav = mysqli_fetch_array($materia)){
            // var_dump($materiav[0]);
            if($materiav != NULL){
                $arregloMat[$z] = $materiav;
            }else{
                $arregloMat = NULL;
            }
            $z++;
        }
        $z=0;
        $arregloIdMat = NULL;
        $peticionIdMat = "SELECT id_clase from clasehasusuario NATURAL JOIN clases where id_usuario=$numCuenta";
        $idMat = mysqli_query($conexion, $peticionIdMat);
        while($idMateria = mysqli_fetch_array($idMat)){
            $arregloIdMat[$z] = $idMateria;
            $z++;
        }
        if($arregloIdMat != NULL){
            $totalClases =count($arregloMat);
        }else{
            $totalClases = 0;
        }
        // $porcentaje = 70;
        echo '<div class="encabezado"><h1><u>Calificaciones </u></h1></div><br/>';
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
        if($totalClases != 0){
            for($i = 0; $i < $totalClases; $i++){
            echo"
                <div id='contenedorCal'>
                    <div id='contenedorClases'>
                    <div id='linea'>
                        <strong id='bloque'>Nombre del curso:</strong><u id='bloque'>".$arregloMat[$i]['nombre']."</u>
                    </div><br/>
                        <form action='./listaCalif.php'>
                            <button class='estiloB' class='botonClass' id='".$arregloIdMat[$i]['id_clase']."' name='".$arregloIdMat[$i]['id_clase']."'>Ver calificaciones</button><br/>
                        </form>
                        <div id='porcentajeT'>
                        </div>                
                    </div> 
                </div><br/>";
            }
        }else{
            echo"No estas inscrito a ninguna clase";
        }
    ;
        
    ?>
     <!-- echo"
        <script src='../../js/calificacion.js'>
        </script>
        " -->
     <!-- <script src='../../js/calificaciones.js'>
        </script> -->
</body>
</html>