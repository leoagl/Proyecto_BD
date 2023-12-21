<?php require('./LAYOUT/header.php') ?>
<link rel="stylesheet" href="CSS/Sales.css">
<script src="cheats.js"></script>
<div class="post-method-btn-box">
    <div class="post-method-btn-star star-1">
        <img src="IMG/Start span.png" alt="">
    </div>
    <div class="post-method-button-close post-method-button">
        <img src="IMG/Registration.png" width="40" alt="">
        <div class="post-method-btn-text">
            <div>Centro de Compras</div>
            <div class="time-animate">
                <span>/</span>
                <span>C</span>
                <span>E</span>
                <span>N</span>
                <span>T</span>
                <span>E</span>
                <Span>R</Span>
                <span>/</span>
            </div>
        </div>
    </div>
    <div class="post-method-btn-star star-r">
        <img src="IMG/Start span.png" alt="">
    </div>
</div>
<div class="card">
    <div class="face front">
        <img src="" alt="">
    </div>
    <div class="face back">
    </div>
</div>
<!--
<div class="container-fijo">
    <input type="checkbox" id="btn-mas">
    <div class="redes">
    <a href="#" class="icon-facebook"></a>
    </div>
    <div class="btn-mas">
        <label for="btn-mas" class="icon-plus"></label>
    </div>
</div>-->
<table>
	<tr>
		<th>#</th>
		<th>Fecha</th>
		<th>Importe</th>
        <th>Id del Proveedor</th>
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
$sql = "SELECT p.idVenta, p.FechaVenta, p.TotalVenta, p.Clientes_idCliente, p.Trabajadores_idTrabajador, p.cantidad, p.Pasteles_idPastel, pd.costo, pd.Proveedores_idProveedor FROM pedidos p JOIN pasteles pd ON p.Pasteles_idPastel = pd.idPastel";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idVenta"] . "</td>";
        echo "<td>" . $row["FechaVenta"] . "</td>";
        echo "<td>" . $row["costo"] . "</td>";
        echo "<td>" . $row["Proveedores_idProveedor"] . "</td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No hay datos en la tabla pedidos</td></tr>";
}

$conn->close();
?>
	</tr>
</table>

<button onclick='descargarPDF()'>Descargar PDF</button>;



<?php require('./LAYOUT/footer.php') ?>