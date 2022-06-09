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
        echo'<h1>Subir tarea</h1><br/>
            <form action="./tareaLog.pnp" method="POST">
                <h3>Subir imagen o archivo (opcional)</h3>

                <label for="nameArch">Nombre del archivo</label>
                <input type="texto" name="nameArch" id="nameArch">
                <br/>
                <label for="archivo">Archivo: </label>
                <input type="file" name="archivo" id="archivo">
                <br/><br/>  
                <h3>Comentario (opcional)</h3>

                <label for="comentarioSubir">Agregar comentario al profesor: </label>
                <input type="text" name="comentarioSubir" id="comentario"> (requerido)<br/><br/>
                <input type="submit" value="Marcar como completada/eviar"><br/><br/>
                <input type="reset" value="borrar">
            </form> 
        ';

    ?>
</body>
</html>