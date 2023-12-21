<?php
$servername = "localhost:3308";
$username = "root";
$db_password = "";
$database = "pasteleria_lupita";

// Crear la conexión
$conn = new mysqli($servername, $username, $db_password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $rol = $_POST["rol"];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO trabajadores (Nombre, Apellido, Email, password, Roles_idRoles) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nombre, $apellido, $email, $contrasena, $rol);
    $stmt->execute();
    $stmt->close();

    echo "Datos insertados correctamente";
}

$conn->close();
?>
