<?php
    include("conexion.inc.php");
    $monto = $_GET["monto"];
    $tipo = $_GET["tipo"];
    $codusuario = $_GET["codusuario"];

    $sql = "INSERT INTO cuenta VALUES (NULL, $monto, '$tipo', 'ACTIVA', $codusuario)";
    mysqli_query($conn, $sql);
    header("Location: b_usuario.php?codusuario=".$codusuario);
?>