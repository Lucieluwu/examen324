<?php
    include("conexion.inc.php");
    $codcuenta = $_GET["codcuenta"];
    $codusuario=$_GET["codusuario"];
    $sql = "UPDATE cuenta SET condicion='ELIMINADA' WHERE codcuenta='$codcuenta'";
    mysqli_query($conn, $sql);
    header("Location: b_usuario.php?codusuario=".$codusuario);
    exit();
?>
