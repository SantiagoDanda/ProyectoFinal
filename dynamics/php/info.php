<?php
 q        // iniciar las seciones
        session_start();
        include("./conexion.php");
        $conexion = connect();
        
        $numcuenta = $_SESSION['numcuenta'];

        // variables que voy a enviar
        $info = (isset($_POST["info"]) && $_POST["info"] != "") ? $_POST["info"]: 'sin info';
        $grupo = (isset($_POST["grupo"]) && $_POST["grupo"] != "") ? $_POST["grupo"]: 'sin grupo';
        $contacto = (isset($_POST["contacto"]) && $_POST["contacto"] != "") ? $_POST["contacto"]: 'sin contacto';

        $peticionInfo = "UPDATE usuarios SET grupo=$grupo, info='$info', contacto='$contacto' WHERE numcuenta=$numcuenta";
        echo "<br/><br/><br/>";
        $consultaA = mysqli_query($conexion, $peticionInfo);

        if($consultaA == true){
            echo'
            <script type="text/javascript">
                alert("Los datos fueron enviados exitosamente");
                window.location.href="./Perfil.php";
            </script>';
            die();
        }else{
            echo'
            <script type="text/javascript">
                alert("Algo falló.");
                window.location.href="./añadirInfo.php";
            </script>';
            die();
        }
?>