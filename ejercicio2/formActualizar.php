<?php include "header_estilo.inc.php";?>
<?php
    include("conexion.inc.php");

    $codcuenta = $_GET["codcuenta"];
    $codusuario=$_GET["codusuario"];

    $sql = "SELECT * FROM cuenta WHERE codcuenta='$codcuenta'";
    $datos=mysqli_query($conn, $sql);
    $fila=mysqli_fetch_array($datos);
?>

<div class="cajita">

<?php
    echo "<form method='GET' action='actualizar.php'>
                codigo usuario:
                <input type='text' name='codusuario' value='" . $codusuario . "' readonly/><br>
                codigo cuenta:
                <input type='number' name='codcuenta' value='" . $codcuenta . "' readonly/><br>
                monto:
                <input type='number' name='monto' step='0.01' value='" . $fila['monto'] . "'/><br>
                tipo:
                <input type='text' name='tipo' value='" . $fila['tipo'] . "' readonly/><br>
                condicion:
                <input type='text' name='condicion' value='" . $fila['condicion'] . "' readonly/><br> 
                <input type='submit' value='Actualizar'> 
                </form>";

?>
</div>
<?php include "footer_estilo.inc.php";?>