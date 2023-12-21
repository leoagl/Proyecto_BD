<?php require('./LAYOUT/header.php') ?>
<link rel="stylesheet" href="CSS/Pastel.css">
<script src="cheats.js"></script>
<main>
<form class="formulario" id="formulario" method="post" onsubmit="agregarProducto(event)">
<h1>Insertar productos</h1>	
<br>        
<!--Variable Nombre-->
			<div class="formulario-grupo" id="Variable-NPr">
        <label for="LetraNPr" class="Formulario-Label">Nombre</label>
        <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraNPr" id="LetraNPr" placeholder="Nombre del Producto">
        </div>
        </div>
		<!--Variable Precio-->
					<div class="formulario-grupo" id="Variable-Pr">
        <label for="LetraPr" class="Formulario-Label">Precio</label>
        <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraPr" id="LetraPr" placeholder="Precio del Productor">
        </div>
        </div>
		<!--Variable Costo-->
				<div class="formulario-grupo" id="Variable-CP">
        <label for="LetraCP" class="Formulario-Label">Costo</label>
        <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraCP" id="LetraCP" placeholder="Costo del Producto">
        </div>
        </div>
		<!--Variable Stock-->
		<div class="formulario-grupo" id="Variable-SK">
        <label for="LetraSK" class="Formulario-Label">Stock</label>
        <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraSK" id="LetraSK" placeholder="Stock del Producto">
        </div>
        </div>
		<!--Variable Fecha Caducacidad-->
			<div class="formulario-grupo" id="Variable-FC">
            <label for="LetraFC" class="Formulario-Label">Fecha de Caducidad</label>
            <div class="Variable-grupo-input">
            <input type="date" class="formulario-input" name="LetraFC" id="LetraFC" placeholder="YYYY/MM/DD">
            </div>
        </div>
		<!--Variable Fecha de Preparacion-->
				<div class="formulario-grupo" id="Variable-FP">
            <label for="LetraFP" class="Formulario-Label">Fecha de Preparacion</label>
            <div class="Variable-grupo-input">
            <input type="date" class="formulario-input" name="LetraFP" id="LetraFP" placeholder="YYYY/MM/DD">
            </div>
        </div>
        <!--Variable Proveedor-->
        <div class="formulario-grupo" id="Variable-P">
            <label for="LetraP" class="Formulario-Label">Proveedor</label>
            <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraP" id="LetraP" placeholder="Proveedor">
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
<form class="formulario_actualizar" id="formulario_actualizar" method="post" onsubmit="actualizarStock(event)">
    <h1>Actualizar Stock</h1>
<!--Variable ID del producto-->
        <div class="formulario-grupo" id="Variable-idP">
        <label for="LetraIdP" class="Formulario-Label">Id del producto</label>
        <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraIdP" id="LetraIdP" placeholder="ID del Producto">
        </div>
        </div>
		<!--Variable Cantidad-->
		<div class="formulario-grupo" id="Variable-C">
        <label for="LetraC" class="Formulario-Label">Cantidad</label>
        <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraC" id="LetraC" placeholder="Cantidad del Producto">
        </div>
        </div>
        <!--Calculo-->
        <div class="formulario-grupo">
            <label for="Calc" class="Formulario-Label">Actualizar</label>
        <button class="formulario-input-boton" type="Submit">Actualizar</button>
        </div>
        <br>
		<br>
</form> 
</main>


<table id="tablaProducto">
	<tr>
		<th>#</th>
		<th>Nombre</th>
		<th>Precio Proveedor</th>
        <th>Costo Publico</th>
        <th>Stock</th>
        <th>Fecha de Caducidad</th>
        <th>Fecha de Preparacion</th>
        <th>Proveedor</th>
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
$sql = "SELECT idPastel, Nombre, Precio, Costo, STOCK, Reorden, fecha_Caducidad, fecha_Preparación, Proveedores_idProveedor FROM pasteles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idPastel"] . "</td>";
        echo "<td>" . $row["Nombre"] . "</td>";
        echo "<td>" . $row["Precio"] . "</td>";
        echo "<td>" . $row["Costo"] . "</td>";
        echo "<td>" . $row["STOCK"] . "</td>";
        echo "<td>" . $row["fecha_Caducidad"] . "</td>";
        echo "<td>" . $row["fecha_Preparación"] . "</td>";
        echo "<td>" . $row["Proveedores_idProveedor"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No hay datos en la tabla trabajadores</td></tr>";
}

$conn->close();
?>
</table>
<table id ="Mostarproveedores">
    <tr>
        <th>#</th>
		<th>Nombre</th>
		<th>Direccion</th>
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

// Consulta SQL para obtener los datos de la tabla proveedores
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
    echo "<tr><td colspan='5'>No hay datos en la tabla proveedores</td></tr>";
}

$conn->close();
?>
</table>
<?php require('./LAYOUT/footer.php') ?>