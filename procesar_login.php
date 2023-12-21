<?php
session_start();

$servername = "localhost:3308";
$username = "root";
$password = "";
$database = "pasteleria_lupita";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["username"];  
    $password = $_POST["password"];

    $sql = "SELECT idTrabajador, Nombre, Apellido, Roles_idRoles FROM trabajadores WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute(); //Ejecuta la consulta
    $stmt->bind_result($idTrabajador,$Nombre,$Apellido,$Roles_idRoles);
    $stmt->fetch();
    $stmt->close();
    
    if ($idTrabajador) {
        // Redirecciona según el rol
        if ($Roles_idRoles == 1) { 
            $nombreCompleto = $Nombre . ' ' . $Apellido;
            $_SESSION['nombre_usuario'] = $nombreCompleto; 
            header("Location: Admin/index.php");
            exit();
        } elseif ($Roles_idRoles == 2) { 
            $nombreCompleto = $Nombre . ' ' . $Apellido;
            $_SESSION['nombre_usuario'] = $nombreCompleto;
            $_SESSION['ID_trabajador'] = $idTrabajador; 
            header("Location: ATM/index.php");
            exit();
        } else {
            // Rol desconocido
            $respuesta = ['error' => 'Rol desconocido'];
        }
    } else {
        $respuesta = ['error' => 'El trabajador no existe o las credenciales son incorrectas'];
    }
}
echo json_encode($respuesta);


$conn->close();
?>
