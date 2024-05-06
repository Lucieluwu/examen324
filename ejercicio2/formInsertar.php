<?php include "header_estilo.inc.php";?>

<div class="cajita">
<?php
    include("conexion.inc.php");

    $codusuario=$_GET["codusuario"];

    echo "<form method='GET' action='insertar.php'>
                
            codigo de usuario:
            <input type='text' name='codusuario' value='" . $codusuario . "' readonly'/><br>
            monto de cuenta:
            <input type='number' name='monto' step='0.01' /><br>
            tipo de cuenta:
            <select id='tipo' name='tipo'>
            <option value='Cuenta de inversion'>Cuenta de inversion</option>
            <option value='Cuenta de ahorro'>Cuenta de ahorros</option>
            <option value='Cuenta corriente'>Cuenta corriente</option>
            </select><br>
            <input type='submit' value='Insertar'> 
            </form>";
?>
</div>
<?php include "footer_estilo.inc.php";?>