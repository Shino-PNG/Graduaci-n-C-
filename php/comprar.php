<?php
session_start();

include("conexion.php");

if($_POST["paquete1"]>0){
    $idUsuario=$_SESSION["datosUsuario"]["id"];
    $lugares=$_POST["paquete1"];

    $statementVerificarDuplicados="SELECT * FROM usuarios_paquetes
                                   WHERE idUsuario=$idUsuario
                                   AND paquete = 1";

$resultadoVerificarDuplicados=$conexionBD->query($statementVerificarDuplicados);
$duplicados=$resultadoVerificarDuplicados->num_rows;

if($duplicados==0){
    $statement="INSERT INTO usuarios_paquetes(idUsuario,paquete,lugares)
    VALUES ($idUsuario,1,$lugares)";
    $resultado=$conexionBD->query($statement);
    echo"resultado de insertar paquete1 ".$resultado;
}
}

if($_POST["paquete2"]>0){
    $idUsuario=$_SESSION["datosUsuario"]["id"];
    $lugares=$_POST["paquete2"];

    $statementVerificarDuplicados="SELECT * FROM usuarios_paquetes
                                   WHERE idUsuario=$idUsuario
                                   AND paquete = 2";

$resultadoVerificarDuplicados=$conexionBD->query($statementVerificarDuplicados);
$duplicados=$resultadoVerificarDuplicados->num_rows;

if($duplicados==0){
    $statement="INSERT INTO usuarios_paquetes(idUsuario,paquete,lugares)
    VALUES ($idUsuario,2,$lugares)";
    $resultado=$conexionBD->query($statement);
    echo"resultado de insertar paquete2 ".$resultado;
}
}

if($_POST["paquete3"]>0){
    $idUsuario=$_SESSION["datosUsuario"]["id"];
    $lugares=$_POST["paquete3"];

    $statementVerificarDuplicados="SELECT * FROM usuarios_paquetes
                                   WHERE idUsuario=$idUsuario
                                   AND paquete = 3";

$resultadoVerificarDuplicados=$conexionBD->query($statementVerificarDuplicados);
$duplicados=$resultadoVerificarDuplicados->num_rows;

if($duplicados==0){
    $statement="INSERT INTO usuarios_paquetes(idUsuario,paquete,lugares)
    VALUES ($idUsuario,3,$lugares)";
    $resultado=$conexionBD->query($statement);
    echo"resultado de insertar paquete3 ".$resultado;
}
}

echo"<p>Lugares comprados</p>";

echo"<p>".$POST["paquete1"]."</p>";
echo"<p>".$POST["paquete2"]."</p>";
echo"<p>".$POST["paquete3"]."</p>";

echo"<p>Usuario que hizo la operación</p>";
echo"<p>".$_SESSION["datosUsuario"]["id"]."</p>";

?>