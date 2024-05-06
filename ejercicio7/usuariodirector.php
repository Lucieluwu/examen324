<?php include "header_estilo.inc.php"; ?>

<?php
include("conexion.inc.php");

$codusuario = 2;
$rol = 'director';

$sqlmontototaldepartamento = "SELECT 
    SUM(CASE WHEN p.ciudad='Santa Cruz de la Sierra' THEN c.monto END) AS SANTACRUZ,
    SUM(CASE WHEN p.ciudad='Cochabamba' THEN c.monto END) AS COCHABAMBA,
    SUM(CASE WHEN p.ciudad='La Paz' THEN c.monto END) AS LAPAZ,
    SUM(CASE WHEN p.ciudad='Beni' THEN c.monto END) AS BENI,
    SUM(CASE WHEN p.ciudad='Pando' THEN c.monto END) AS PANDO,
    SUM(CASE WHEN p.ciudad='Tarija' THEN c.monto END) AS TARIJA,
    SUM(CASE WHEN p.ciudad='Sucre' THEN c.monto END) AS SUCRE,
    SUM(CASE WHEN p.ciudad='Potosi' THEN c.monto END) AS POTOSI,
    SUM(CASE WHEN p.ciudad='Oruro' THEN c.monto END) AS ORURO
FROM 
    cuenta c 
INNER JOIN 
    usuario u ON u.codUsuario = c.codUsuario
INNER JOIN 
    persona p ON p.carnet = u.carnet";

$montoTotal = mysqli_query($conn, $sqlmontototaldepartamento);

$sql = "SELECT codcuenta, codUsuario, monto, tipo, condicion
        FROM cuenta";

$cuentas = mysqli_query($conn, $sql);
?>

<div class="cajita">
    <?php
    echo "<br>Se muestra el monto total de todas las cuentas por departamento:";
    echo "<table border='1px'>";
    echo "<tr>
                <th>SANTACRUZ</th>
                <th>COCHABAMBA</th>
                <th>LAPAZ</th>
                <th>BENI</th>
                <th>PANDO</th>
                <th>TARIJA</th>
                <th>SUCRE</th>
                <th>POTOSI</th>
                <th>ORURO</th>
                </tr>";
    while ($fila = mysqli_fetch_array($montoTotal)) {
        echo "<tr>
                <td>" . $fila["SANTACRUZ"] . "</td>
                <td>" . $fila["COCHABAMBA"] . "</td>
                <td>" . $fila["LAPAZ"] . "</td>
                <td>" . $fila["BENI"] . "</td>
                <td>" . $fila["PANDO"] . "</td>
                <td>" . $fila["TARIJA"] . "</td>
                <td>" . $fila["SUCRE"] . "</td>
                <td>" . $fila["POTOSI"] . "</td>
                <td>" . $fila["ORURO"] . "</td>
            </tr>";
    }
    echo "</table>";


    echo "Las cuentas existentes: ";
    echo "<table border='1px'>";
    echo "<tr>
                <th>Codigo Cuenta</th>
                <th>Monto</th>
                <th>Tipo</th>
                <th>Condicion</th>
                <th>Codigo Usuario</th></tr>";
    while ($fila = mysqli_fetch_array($cuentas)) {
        echo "<tr>
                <td>" . $fila["codcuenta"] . "</td>
                <td>" . $fila["monto"] . "</td>
                <td>" . $fila["tipo"] . "</td>
                <td>" . $fila["condicion"] . "</td>
                <td>" . $fila["codUsuario"] . "</td>
              </tr>";
    }
    echo "</table>";
    echo "<br>";
    ?>
</div>

<?php include "footer_estilo.inc.php"; ?>
