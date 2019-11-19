<?php


include("conexion.php");
$usuario=$_POST["nombre"];
$password=$_POST["password"];

$statement = "SELECT ID_usuario,nombre,password
              FROM usuarios
             WHERE nombre = '$usuario'
             AND password = '$password'";

$resultado=$conexionBD->query($statement);
if($resultado->num_rows>0){
    echo "Bienvenido ".$usuario;
    session_start();
    $_SESSION["datosUsuario"]=mysqli_fetch_assoc($resultado);
    $_SESSION["nombre"]=$usuario;
}
else{
    echo "Usuario o Contraseña incorrecta";
}

//var_dump($resultado);


?>