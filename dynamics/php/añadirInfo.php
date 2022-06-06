<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        echo '<h1>Rellena los campos</h1>
            <form action="./info.php" method="post">
                <label for="grupo">Grupo</label>
                <input required type="number" name="grupo"  min="401" max="670"></input><br/>
                <label for="contacto">Contacto:</label>
                <input type="url" name="contacto"></input><br/>
                <label for="info">Información sobre ti: </label>
                <input type="text" name="info"></input><br/>

                <button>enviar</button>
            </form>';
        echo'
            <form action="./Perfil.php">
                <button>Regresar</button>
            </form>
        ';
        echo'
        <h1>Subir foto de perfil</h1>
        <form action="./archivo/archivo.php" method="POST" enctype="multipart/form-data">
            <fieldset><br/>
                <legend>Subir imágenes</legend>
                <label for="namei">Nombre de la imagen</label>
                <input required type="texto" name="namei" id="namei">
                <br/><br/>
                <label for="archivo">Archivo: </label>
                <input type="file" name="archivo" id="archivo">
                <br/><br/>
                <input type="submit" value="enviar"><br/><br/>
                <input type="reset" value="borrar">
            </fieldset>
        </form>
        ';
    ?>
</body>
</html>