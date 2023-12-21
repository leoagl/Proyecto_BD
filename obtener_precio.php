<?php
// Obtén el ID del producto desde la solicitud GET
$idProducto = $_GET['id'];

// Realiza la consulta a la base de datos para obtener el precio
$servername = "localhost:3308";
$username = "root";
$password = "";
$database = "pasteleria_lupita";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT Precio FROM pasteles WHERE idPastel = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idProducto);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo $data['Precio'];


$stmt->close();
$conn->close();
?>