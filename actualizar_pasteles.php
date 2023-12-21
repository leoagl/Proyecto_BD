<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos esenciales están presentes
    if (!isset($_POST["LetraIdP"]) || !isset($_POST["LetraC"])) {
        echo json_encode(["success" => false, "message" => "Error: Campos esenciales faltantes."]);
        exit;
    }

    $idPastel = $_POST["LetraIdP"];
    $STOCK = $_POST["LetraC"];

    // Realiza la conexión a la base de datos
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $database = "pasteleria_lupita";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        echo json_encode(["success" => false, "message" => "Conexión fallida: " . $conn->connect_error]);
        exit;
    }

    // Realiza una actualización en la tabla de pasteles restando la cantidad al stock
    $sql = "UPDATE pasteles SET STOCK = STOCK + ? WHERE idPastel = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $STOCK, $idPastel);

    // Ejecuta la actualización y verifica si fue exitosa
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Stock actualizado correctamente"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al actualizar el stock: " . $stmt->error]);
    }

    // Cierra la conexión
    $stmt->close();
    $conn->close();
}
?>
