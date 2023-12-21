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
    $precio = $_POST["precio"];
    $costo = $_POST["costo"];
    $stock = $_POST["stock"];
    $FechaCaduca = $_POST["FechaCaduca"];
    $FechaPrepara = $_POST["FechaPrepara"];
    $Proveedor = $_POST["Proveedor"];
    // Insertar datos en la base de datos
    $sql = "INSERT INTO pasteles (Nombre, Precio, Costo, STOCK, fecha_Caducidad, fecha_Preparación, Proveedores_idProveedor) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiissi", $nombre, $precio, $costo, $stock, $FechaCaduca, $FechaPrepara, $Proveedor);
    $stmt->execute();
    $stmt->close();

    echo "Datos insertados correctamente";
}

$conn->close();
?>
