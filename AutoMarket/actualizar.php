<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "tienda";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "UPDATE pedidos SET nombre_completo = ?, correo = ?, telefono = ?, direccion = ?, producto = ?, cantidad = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nombre_completo, $correo, $telefono, $direccion, $producto, $cantidad, $id);

    if ($stmt->execute()) {
        echo "Pedido actualizado con éxito.";
    } else {
        echo "Error al actualizar el pedido: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: index.php"); // Redirigir de vuelta a la página principal después de actualizar
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
