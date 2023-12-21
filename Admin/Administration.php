<?php require('./LAYOUT/header.php') ?>
<link rel="stylesheet" href="CSS/Admin.css">
<script src="cheats.js"></script>
<main class="main2">
    <h1>Bienvenido, esta pagina es del Administrador</h1>
    <p>En este apartado se puede ver el enlistado y inserccion del Personal de la Empresa</p>
</main>
<div class="alert-text">
            <div class="marquee-text-wrap">
                <div class="marquee-text-content">
                    <div class="marquee-text-text" style="animation-duration: 10s;">
                        <div class="alert-main alert-close"></div>
                    </div>
                    <div class="marquee-text-text" style="animation-duration: 10s;">
                        <div class="alert-main alert-close"></div>
                    </div>
                </div>
            </div>
        </div>
<div class="card">
    <div class="face front">
        <img src="" alt="">
    </div>
    <div class="face back">
    </div>
</div>
<main class="Form">
<form class="formulario" id="formulario" method="post" action="../insercion_trabajadores.php" onsubmit="agregarPersonal(event)">
<!--Variable Nombre-->		
        <div class="formulario-grupo" id="Variable-NP">
        <label for="LetraNP" class="Formulario-Label">Nombre</label>
        <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraNP" id="LetraNP" placeholder="Nombre del Trabajador">
        </div>
        </div>
        <!--Variable Apellido-->
        <div class="formulario-grupo" id="Variable-AP">
            <label for="LetraAP" class="Formulario-Label">Apellido</label>
            <div class="Variable-grupo-input">
                <input type="text" class="formulario-input" name="LetraAP" id="LetraAP" placeholder="Apellido del Trabajador">
            </div>
        </div>
		<!--Variable Email-->
			<div class="formulario-grupo" id="Variable-EP">
            <label for="LetraEP" class="Formulario-Label">Email</label>
            <div class="Variable-grupo-input">
            <input type="text" class="formulario-input" name="LetraEP" id="LetraEP" placeholder="Correo Electronico del Trabajador">
            </div>
        </div>
        <!--Variable contraseña-->
        <div class="formulario-grupo" id="Variable-C">
            <label for="LetraAP" class="Formulario-Label">Contraseña</label>
            <div class="Variable-grupo-input">
                <input type="text" class="formulario-input" name="contrasena" id="contrasena" placeholder="Contraseña del Trabajador">
            </div>
        </div>
		<!--Variable Rol-->
			<div class="formulario-grupo" id="Variable-R">
            <label for="LetraR" class="Formulario-Label">Rol</label>
            <div class="Variable-grupo-input">
				<select name="rol" id="rol" required>
					<option value="">Seleccione el Rol</option>
					<option value="2">Cajero</option>
					<option value="1">Administrador</option>
				</select>
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
<table id="tablaPersonal">
<tr>
		<th>#</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Email</th>
		<th>Rol</th>
</tr>
<?php
// Realizar la conexión a la base de datos (puedes ajustar estos datos según tu configuración)
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
$sql = "SELECT idTrabajador, Nombre, Apellido, Email, Roles_idRoles FROM trabajadores";
$result = $conn->query($sql);

// Imprimir las filas de la tabla HTML con los datos obtenidos
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idTrabajador"] . "</td>";
        echo "<td>" . $row["Nombre"] . "</td>";
        echo "<td>" . $row["Apellido"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Roles_idRoles"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay datos en la tabla trabajadores</td></tr>";
}

// Cerrar la conexión a la base de datos
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