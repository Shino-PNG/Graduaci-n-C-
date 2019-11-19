<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de usuarios</title>
    <link rel="stylesheet" href="../css/bootstrap.css"/>
</head>
<body>
    <?php

        include("conexion.php");
        $consulta= "SELECT nombre,password,email FROM usuarios";

        $resultado= $conexionBD->query($consulta);
        //var_dump($resultado);
        $usuarios=array();

        echo"<table class=\"table table-striped\">
                <th>Nombre</th>
                <th>Contraseña</th>
                <th>Email</th>        
            </tr>
        ";

        while($fila= mysqli_fetch_assoc($resultado)){
            $usuarios[]=$fila;
            $nombre= $fila["nombre"];
            $contraseña= $fila["password"];
            $email= $fila["email"];

            echo "<tr>
                <td>$nombre</td>
                <td>$contraseña</td>
                <td>$email</td>
            </tr>";
        }

        echo"</table>";

        //var_dump($usuarios);
    ?>
</body>
</html>