<?php require('./LAYOUT/header.php') ?>
<link rel="stylesheet" href="CSS/Suppliers Style.css">
<script src="cheats.js"></script>
<div class="post-method-btn-box">
    <div class="post-method-btn-star star-1">
        <img src="IMG/Start span.png" alt="">
    </div>
    <div class="post-method-button-close post-method-button">
        <img src="IMG/Registration.png" width="40" alt="">
        <div class="post-method-btn-text">
            <div>Proveedores Registrados</div>
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
<main>
<form class="formulario" id="formulario" method="post" action="../insercion_proveedores.php" onsubmit="agregarProveedor(event)">
	        <!--Variable Nombre-->
			<div class="formulario-grupo" id="Variable-NP">
        <label for="LetraNP" class="Formulario-Label">Nombre</label>
        <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraNP" id="LetraNP" placeholder="Nombre del Proveedor">
        </div>
        </div>
        <!--Variable Direccion-->
        <div class="formulario-grupo" id="Variable-D">
            <label for="LetraD" class="Formulario-Label">Direccion</label>
            <div class="Variable-grupo-input">
                <input type="text" class="formulario-input" name="LetraD" id="LetraD" placeholder="Direccion del Proveedor">
            </div>
        </div>
		<!--Variable Telefono-->
			<div class="formulario-grupo" id="Variable-T">
            <label for="LetraT" class="Formulario-Label">Telefono</label>
            <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraT" id="LetraT" placeholder="Telefono del Proveedor">
            </div>
        </div>
		<!--Variable Email-->
				<div class="formulario-grupo" id="Variable-EPP">
            <label for="LetraEP" class="Formulario-Label">Email</label>
            <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraEP" id="LetraEP" placeholder="Correo Electronico del Usuario">
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
</main>
<table id="tablaProveedor">
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

<?php require('./LAYOUT/footer.php') ?>