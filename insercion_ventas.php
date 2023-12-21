<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realiza la conexión a la base de datos
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $database = "pasteleria_lupita";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtén los valores del formulario
    $FechaVenta = $_POST["FechaVenta"];
    $Cantidad = $_POST["Cantidad"];
    $IdProducto = $_POST["IdProducto"];
    $TotalVenta = $_POST["TotalVenta"];
    $IdCliente = $_POST["IdCliente"];
    $IdTrabajador = $_POST["IdTrabajador"];

    // Verifica si hay suficiente stock
    $sqlStock = "SELECT STOCK FROM pasteles WHERE idPastel = ?";
    $stmtStock = $conn->prepare($sqlStock);
    $stmtStock->bind_param("i", $IdProducto);
    $stmtStock->execute();
    $stmtStock->bind_result($stock);
    $stmtStock->fetch();
    $stmtStock->close();

    if ($stock >= $Cantidad) {
        // Realiza la inserción en la tabla de ventas
        $sqlInsert = "INSERT INTO pedidos (FechaVenta, cantidad, Pasteles_idPastel, TotalVenta, Clientes_idCliente, Trabajadores_idTrabajador) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("siiiii", $FechaVenta, $Cantidad, $IdProducto, $TotalVenta, $IdCliente, $IdTrabajador);

        // Verifica si la inserción fue exitosa
        if ($stmtInsert->execute()) {
            echo "Inserción exitosa";

            // Actualiza el stock en la tabla de pasteles
            $sqlUpdateStock = "UPDATE pasteles SET STOCK = STOCK - ? WHERE idPastel = ?";
            $stmtUpdateStock = $conn->prepare($sqlUpdateStock);
            $stmtUpdateStock->bind_param("ii", $Cantidad, $IdProducto);
            $stmtUpdateStock->execute();
            $stmtUpdateStock->close();
        } else {
            echo "Error al insertar: " . $stmtInsert->error;
        }

        $stmtInsert->close();
    } else {
        echo "No hay suficiente stock para la compra";
    }

    // Cierra la conexión
    $conn->close();
}
?>