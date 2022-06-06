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

            <h2>Actualizar foto de perfil</h2>
            <label for="nArchivo">Nombre del archivo:</label>
            <input required type="text" name="nArchivo"></input><br/>
            <button>enviar</button>
        </form>';
        echo'
            <form action="./Perfil.php">
                <button>Regresar</button>
            </form>
        ';
    ?>
</body>
</html>