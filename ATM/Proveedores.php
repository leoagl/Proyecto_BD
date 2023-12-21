<?php require('./LAYOUT/header.php') ?>
<link rel="stylesheet" href="CSS/Proveedor.css">
<script src="Calc.js"></script>

<table>
	<thead>
		<tr class="Arriba">
			<th colspan="5">Proveedores</th>
		</tr>
		<tr class="Abajo">
			<th>#</th>
			<th>Nombre</th>
			<th>Contacto</th>
			<th>Telefono</th>
			<th>Email</th>
		</tr>
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

// Consulta SQL para obtener los datos de la tabla trabajadores
$sql = "SELECT idProveedor, Nombre, Direccion, Telefono, Email FROM proveedores";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idProveedor"] . "</td>";
        echo "<td>" . $row["Nombre"] . "</td>";
        echo "<td>" . $row["Direccion"] . "</td>";
        echo "<td>" . $row["Telefono"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay datos en la tabla trabajadores</td></tr>";
}

$conn->close();
?>
</table>


<?php require('./LAYOUT/aside.php') ?>

<?php require('./LAYOUT/footer.php') ?>