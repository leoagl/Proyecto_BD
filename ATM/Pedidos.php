<?php require('./LAYOUT/header.php') ?>
<link rel="stylesheet" href="CSS/Pedidos.css">
<script src="Calc.js"></script>
<main class="Form">
<input type="hidden" id="idProducto" name="idProducto">
<input type="hidden" id="precioProducto" name="precioProducto">
<form class="formulario" id="formulario" method="post" onsubmit="agregarPedido(event)">
        <!--Variable Fecha Venta-->
		<div class="formulario-grupo" id="Variable-FV">
        <label for="LetraFV" class="Formulario-Label">Fecha de Venta</label>
        <div class="Variable-grupo-input">
            <input type="date" class="formulario-input" name="LetraFV" id="LetraFV" placeholder="YYYY-MM-DD">
        </div>
        </div>
        <!--Variable Cantidad Venta-->
        <div class="formulario-grupo" id="Variable-CV">
            <label for="LetraCV" class="Formulario-Label">Cantidad</label>
            <div class="Variable-grupo-input">
                <input type="text" class="formulario-input" name="LetraCV" id="LetraCV" placeholder="Cantidad de producto" oninput="calcularTotalVenta()">
            </div>
        </div>
        <!--Variable ID_Producto Venta-->
        <div class="formulario-grupo" id="Variable-IV">
            <label for="LetraIV" class="Formulario-Label">ID del producto</label>
            <div class="Variable-grupo-input">
                <input type="text" class="formulario-input" name="LetraIV" id="LetraIV" placeholder="ID del producto" onblur="obtenerPrecioProducto()">
            </div>
        </div>
        <!--Variable Total Venta-->
        <div class="formulario-grupo" id="Variable-TV">
            <label for="LetraTV" class="Formulario-Label">Total de Venta</label>
            <div class="Variable-grupo-input">
                <input type="text" class="formulario-input" name="LetraTV" id="LetraTV" placeholder="$Total" readonly>
            </div>
        </div>
		<!--Variable Id Cliente-->
			<div class="formulario-grupo" id="Variable-IC">
            <label for="LetraIC" class="Formulario-Label">ID del Cliente</label>
            <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraIC" id="LetraIC" placeholder="ID">
            </div>
        </div>
		<!--Variable Id Trabajador-->
			<div class="formulario-grupo" id="Variable-IT">
            <label for="LetraIT" class="Formulario-Label">ID del Trabajador</label>
            <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraIT" id="LetraIT" placeholder="ID" value="<?php echo isset($_SESSION['ID_trabajador']) ? $_SESSION['ID_trabajador'] : 'No hay ID';?>" readonly>
            </div>
        </div>
        <!--Calculo-->
        <div class="formulario-grupo">
            <label for="Calc" class="Formulario-Label">Insertar</label>
        <button class="formulario-input-boton" type="Submit">Añadir</button>
        </div>
        <br>
		<br>
</form>
<script>
    function obtenerPrecioProducto() {
    var idProducto = document.getElementById('LetraIV').value;

    // Realizar una solicitud AJAX al servidor para obtener el precio del producto
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var precio = parseFloat(this.responseText) || 0;
            document.getElementById('precioProducto').value = precio;
            calcularTotalVenta();
        }
    };

    // Ajusta la URL para que refleje el archivo y los parámetros correctos
    xhttp.open("GET", "../obtener_precio.php?id=" + idProducto, true);
    xhttp.send();
}

function calcularTotalVenta() {
    var cantidad = parseFloat(document.getElementById('LetraCV').value) || 0;
    var precio = parseFloat(document.getElementById('precioProducto').value) || 0;
    var totalVenta = cantidad * precio;
    document.getElementById('LetraTV').value = totalVenta.toFixed(2);
}
</script>
</main>
<table id="tablaPedido">
	<thead>
		<tr class="Arriba">
			<th colspan="7">Pedidos</th>
		</tr>
		<tr class="Abajo">
			<th>#Id Venta</th>
			<th>Fecha de Venta</th>
            <th>Cantidad</th>
            <th>ID del Producto</th>
			<th>Total de Venta</th>
			<th>Id del Cliente</th>
			<th>Id del Trabajador</th>
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
$sql = "SELECT idVenta, FechaVenta, TotalVenta, Clientes_idCliente, Trabajadores_idTrabajador, cantidad, Pasteles_idPastel FROM pedidos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idVenta"] . "</td>";
        echo "<td>" . $row["FechaVenta"] . "</td>";
        echo "<td>" . $row["cantidad"] . "</td>";
        echo "<td>" . $row["Pasteles_idPastel"] . "</td>";
        echo "<td>" . $row["TotalVenta"] . "</td>";
        echo "<td>" . $row["Clientes_idCliente"] . "</td>";
        echo "<td>" . $row["Trabajadores_idTrabajador"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No hay datos en la tabla pedidos</td></tr>";
}

$conn->close();
?>
	</thead>
	<tbody>
	</tbody>
</table>


<?php require('./LAYOUT/aside.php') ?>

<?php require('./LAYOUT/footer.php') ?>