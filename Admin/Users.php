<?php require('./LAYOUT/header.php') ?>
<link rel="stylesheet" href="CSS/Users Style.css">
<script src="cheats.js"></script>
<div class="post-method-btn-box">
    <div class="post-method-btn-star star-1">
        <img src="IMG/Start span.png" alt="">
    </div>
    <div class="post-method-button-close post-method-button">
        <img src="IMG/Registration.png" width="40" alt="">
        <div class="post-method-btn-text">
            <div>Usuarios Registrados</div>
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
<main>
<form class="formulario" id="formulario" method="post" action="../insercion_usuarios.php" onsubmit="agregarUsuario(event)">
	        <!--Variable Nombre-->
			<div class="formulario-grupo" id="Variable-N">
        <label for="LetraN" class="Formulario-Label">Nombre</label>
        <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraN" id="LetraN" placeholder="Nombre del Usuario">
        </div>
        </div>
        <!--Variable Apellido-->
        <div class="formulario-grupo" id="Variable-A">
            <label for="LetraA" class="Formulario-Label">Apellido</label>
            <div class="Variable-grupo-input">
                <input type="text" class="formulario-input" name="LetraA" id="LetraA" placeholder="Apellido del Usuario">
            </div>
        </div>
		<!--Variable Email-->
			<div class="formulario-grupo" id="Variable-E">
            <label for="LetraE" class="Formulario-Label">Telefono</label>
            <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraT" id="LetraT" placeholder="Telefono del Usuario">
            </div>
        </div>
		<!--Variable Rol-->
			<!--<div class="formulario-grupo" id="Variable-R">
            <label for="LetraR" class="Formulario-Label">Rol</label>
            <div class="Variable-grupo-input">
				<select name="rol" id="rol" required>
					<option value="">Seleccione el Rol</option>
					<option value="ATM/Cajero">Cajero</option>
					<option value="Admin">Administrador</option>
				</select>
            </div>
        </div>-->
        <!--Calculo-->
        <div class="formulario-grupo">
            <label for="Calc" class="Formulario-Label">Insertar</label>
        <button class="formulario-input-boton" type="Submit">Añadir</button>
        </div>
        <br>
		<br>
</form>
</main>
<table id="tabla">
	<tr>
		<th>#</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Telefono</th>
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
$sql = "SELECT idCliente, nombre, apellido, telefono FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idCliente"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["apellido"] . "</td>";
        echo "<td>" . $row["telefono"] . "</td>";
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