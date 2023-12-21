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
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO clientes (nombre, apellido, telefono) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $apellido, $telefono);
    $stmt->execute();
    $stmt->close();

    echo "Datos insertados correctamente";
}

$conn->close();
?>
