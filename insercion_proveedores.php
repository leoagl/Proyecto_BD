<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$database = "pasteleria_lupita";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO proveedores (Nombre, Direccion, Telefono, Email) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $nombre, $direccion, $telefono, $email);
    $stmt->execute();
    $stmt->close();

    echo "Datos insertados correctamente";
}

$conn->close();
?>
