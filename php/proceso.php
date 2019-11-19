    <?php
    include("conexion.php");

    $nombre=$_POST["nombre"];
    $contrasena=hash ("whirlpool", $_POST["contrasena"]);
    $email=$_POST["email"];
    $statement="INSERT INTO usuarios (nombre, password, email) VALUES ('$nombre','$contrasena','$email')";

    $resultado= $conexionDB->query($statement);

    ?>

