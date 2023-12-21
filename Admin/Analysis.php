<?php require('./LAYOUT/header.php') ?>
<link rel="stylesheet" href="CSS/Analysis.css">
<script src="cheats.js"></script>
<main class="main2">
    <h1>Pagina de Analisis</h1>
    <p>Detalles de la compras hechas</p>
</main>
<div class="post-method-btn-box">
    <div class="post-method-btn-star star-1">
        <img src="IMG/Start span.png" alt="">
    </div>
    <div class="post-method-button-close post-method-button">
        <img src="IMG/Registration.png" width="40" alt="">
        <div class="post-method-btn-text">
            <div>Analisis</div>
            <div class="time-animate">
                <span>/</span>
                <span>A</span>
                <span>N</span>
                <span>4</span>
                <span>L</span>
                <span>I</span>
                <Span>S</Span>
                <span>I</span>
                <span>S</span>
                <span>/</span>
            </div>
        </div>
    </div>
    <div class="post-method-btn-star star-r">
        <img src="IMG/Start span.png" alt="">
    </div>
</div>
<table id="tablaProducto">
	<tr>
		<th>#Codigo del Pastel</th>
		<th>ID Venta</th>
		<th>Fecha del Pedido</th>
        <th>Importe</th>
	</tr>
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

// Consulta SQL para obtener los datos de la tabla trabajadores
$sql = "SELECT idVenta, FechaVenta, TotalVenta, Pasteles_idPastel FROM pedidos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idVenta"] . "</td>";
        echo "<td>" . $row["FechaVenta"] . "</td>";
        echo "<td>" . $row["TotalVenta"] . "</td>";
        echo "<td>" . $row["Pasteles_idPastel"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay datos en la tabla pedidos</td></tr>";
}

$conn->close();
?>
    </tr>
</table>
<?php require('./LAYOUT/footer.php') ?>