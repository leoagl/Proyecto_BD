<?php require('./LAYOUT/header.php') ?>
<link rel="stylesheet" href="CSS/Proveedor.css">
<script src="Calc.js"></script>
<table>
	<thead>
		<tr class="Arriba">
			<th colspan="5">Ventas</th>
		</tr>
		<tr class="Abajo">
			<th>#</th>
			<th>Fecha de Venta</th>
			<th>Total de Venta</th>
			<th>Id del Cliente</th>
			<th>Id del Trabajador</th>
		</tr>
	</thead>
	<tbody>
		<tr>
        <?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$database = "pasteleria_lupita";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla pedidos
$sql = "SELECT idVenta, FechaVenta, TotalVenta, Clientes_idCliente, Trabajadores_idTrabajador FROM pedidos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idVenta"] . "</td>";
        echo "<td>" . $row["FechaVenta"] . "</td>";
        echo "<td>" . $row["TotalVenta"] . "</td>";
        echo "<td>" . $row["Clientes_idCliente"] . "</td>";
        echo "<td>" . $row["Trabajadores_idTrabajador"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay datos en la tabla pedidos</td></tr>";
}

$conn->close();
?>
		</tr>
	</tbody>
</table>


<?php require('./LAYOUT/footer.php') ?>