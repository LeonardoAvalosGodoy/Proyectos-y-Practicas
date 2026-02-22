<?php
session_start();
header('Content-Type: application/json');

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Conexión fallida: ' . $conn->connect_error]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_cliente = $_POST['nombre_cliente'];
    $correo_cliente = $_POST['correo_cliente'];
    $telefono_cliente = $_POST['telefono_cliente'];
    $mensaje = $_POST['mensaje'];

    // Consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO mensajes_proveedor (nombre_cliente, correo_cliente, telefono_cliente, mensaje) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre_cliente, $correo_cliente, $telefono_cliente, $mensaje);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Mensaje enviado exitosamente al proveedor.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al enviar el mensaje: ' . $conn->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
