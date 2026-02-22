<?php
session_start(); // Iniciar sesión para usar variables de sesión

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$productos = $_POST['producto'];
$cantidades = $_POST['cantidad'];

$success = true;

for ($i = 0; $i < count($productos); $i++) {
    $producto = $productos[$i];
    $cantidad = $cantidades[$i];

    $sql = "INSERT INTO pedidos (nombre_completo, correo, telefono, direccion, producto, cantidad)
            VALUES ('$nombre_completo', '$correo', '$telefono', '$direccion', '$producto', '$cantidad')";

    if ($conn->query($sql) !== TRUE) {
        $success = false;
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
        break;
    }
}

if ($success) {
    $_SESSION['message'] = "Pedido guardado correctamente.";
}

$conn->close();

header("Location: solicitarProductos.php");
exit();
?>
