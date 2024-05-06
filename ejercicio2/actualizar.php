<?php
    include("conexion.inc.php");
    $codcuenta = $_GET["codcuenta"];
    $codusuario=$_GET["codusuario"];
    $monto = $_GET["monto"];
    $tipo = $_GET["tipo"];
    $condicion = $_GET["condicion"];

    $sql = "UPDATE cuenta SET codcuenta='$codcuenta', monto='$monto',tipo='$tipo',
    condicion='$condicion', codusuario='$codusuario' WHERE codcuenta=$codcuenta";
    mysqli_query($conn, $sql);
    header("Location: b_usuario.php?codusuario=".$codusuario);

?>

