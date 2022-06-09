<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir tarea</title>
</head>
<body>
    <?php
        echo'<h1>Subir archivo</h1><br/>
            <form action="./tareaArch.php" method="post" enctype="multipart/form-data>
                <label for="nombreAct">Nombre de la actividad: </label> 
                <input  required type="text" name="nombreAct"> (requerido)
                <br/><br/>
                <label for="archivo">Archivo: </label>
                <input type="file" name="archivo" id="archivo">
                <br/><br/>
                <input type="submit" value="enviar"><br/><br/>
                <input type="reset" value="borrar">
            </form> 
        ';
        echo'
        <h1>Subir comentario o marcar como comopletado</h1><br/>
        <form action="./tareaLog.php" method="post">
            <label for="comentarioSubir">Agregar comentario al profesor: </label>
            <input type="text" name="comentarioSubir" id="comentario"> (requerido)<br/><br/>
            <button>marcar como completado</button>
        </form> 

        '
        ;

    ?>
    <!-- <label for="nameArch">Nombre del archivo</label>
                <input required type="texto" name="nameArch" id="nameArch">
                <br/>
                <label for="archivoT">Archivo: </label>
                <input required type="file" name="archivoT" id="archivoT">
                <br/><br/>  
                <input type="submit" value="eviar"><br/><br/>
                <input type="reset" value="borrar"> -->
</body>
</html>