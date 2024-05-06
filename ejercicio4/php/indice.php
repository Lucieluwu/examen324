<?php include "header_estilo.inc.php";?>

<div class="cajita">
<form method="GET" action="http://localhost:8080/WebApplicationJava/ejerCuatro">
    <label for="codcuenta" >Codigo de cuenta</label>
    <input type="text" name="codcuenta">
    <br>
    <label for="carnet">Carnet:</label>
    <input type="text" name="carnet"><br>

    <label for="monto">Monto:</label>
    <input type="text" name="monto"><br><br>
    <input type="submit" value="ENVIAR A JAVA">
</form>
</div>
<br>
<div class="cajita">
<form method="GET" action="http://localhost:51282/EjercicioCuatro.aspx">
    <label for="codcuenta">Codigo de cuenta</label>
    <input type="text" name="codcuenta">
    <br>
    <label for="carnet">Carnet:</label>
    <input type="text" name="carnet"><br>

    <label for="monto">Monto:</label>
    <input type="text" name="monto"><br><br>
    <input type="submit" value="ENVIAR A NET">
</form>
</div>
<?php include "footer_estilo.inc.php";?>