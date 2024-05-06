<?php include "header_estilo.inc.php";?>

<?php
    $codusuario=$_GET["codusuario"];
    include("conexion.inc.php");
    $sql = "SELECT codcuenta, monto, tipo, condicion, codUsuario
            FROM cuenta
            WHERE condicion LIKE 'ACTIVA' AND codUsuario = '$codusuario';";

    $tabla = mysqli_query($conn, $sql);
?>

<div class="tabla">


<br><p>Se muestran todas las cuentas existentes:</p>
<table>
    <tr>
    <th>codigo de cuenta</th>
    <th>monto</th>
    <th>tipo</th>
    <th>condicion</th>
    <th>codigo de usuario</th>
    <th>acciones</th>
    </tr>

<?php
echo "<a href=formInsertar.php?codusuario=".$codusuario.">Insertar</a>";
while($row = mysqli_fetch_array($tabla))
    {
            echo "<tr>
            <td>".$row["codcuenta"]."</td>
            <td>".$row["monto"]."</td>
            <td>".$row["tipo"]."</td>
            <td>".$row["condicion"]."</td>
            <td>".$row["codUsuario"]."</td>
            <td>           
            <a href=formActualizar.php?codusuario=".$codusuario."&codcuenta=".$row["codcuenta"].">Editar</a>
            <a href=eliminar.php?codusuario=".$codusuario."&codcuenta=".$row["codcuenta"].">Eliminar</a>
            </td>
            </tr>";
    }
?>
</table>
</div>
<?php include "footer_estilo.inc.php";?>
