<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cuentas</title>

	<!-- Bootstrap CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

	<style type="text/css">

body {
    margin: 0;
    background-color: #3C5B6F;
    color: #DFD0B8;
    height: auto;
    padding-bottom: 100px;
}

header {
    height: 100px;
    font-size: 40px;
    text-align: center;
}

footer {
    padding-top: 50px;
    text-align: center;
    position: fixed; 
    bottom: 0; 
    width: 100%; 
}

.container {
    width: 95%;
}

.cajita
{
    text-align: center;
    background-color: #948979;
    padding-top: 20px;
    padding-bottom: 20px;
    margin-left:250px;
    margin-top: 80px;
    width: 65%;
}

table
{
    width: 70%;
    border: 3px solid #948979;
}

th, td {
    border: 1px solid #948979;
    padding: 6px;
}

.tabla
{
    margin-left: 300px;
}

.tabla a
{
    color: #DFD0B8;
}
	</style>
</head>
<body>

<header class="bg-dark text-light">
    <div class="container">
        <h1>Banco JUAN</h1>
    </div>
</header>

<div class="cajita mt-5">
	<h1>Bienvenido a la tabla de cuentas!</h1>

	<div id="body">
	<table class="table">
		<thead class="thead-dark">
			<tr>	
				<th>codcuenta</th>
				<th>monto</th>
				<th>tipo</th>
				<th>condicion</th>
				<th>codUsuario</th>
				<th>opción</th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach($filas as $fila)
			{
				echo "<tr>";	
				echo "<td>$fila->codcuenta</td>";
				echo "<td>$fila->monto</td>";
				echo "<td>$fila->tipo</td>";
				echo "<td>$fila->condicion</td>";
				echo "<td>$fila->codUsuario</td>";
				echo "<td><a href='Lectura/indexdos?codcuenta=".$fila->codcuenta."' class='btn btn-danger'>Eliminar</a></td>";
				echo "</tr>";
			}
		?>
		</tbody>
	</table>
	</div>

</div>
<footer class="bg-dark text-light">
    <div class="container">
        <p>Banco JUAN. Contáctanos. Siempre confiables.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
