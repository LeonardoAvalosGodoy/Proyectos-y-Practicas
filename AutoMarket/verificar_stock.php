<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar los productos con stock bajo
$sql = "SELECT id, nombre FROM productos WHERE stock < stock_minimo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_producto = $row['id'];
        $nombre_producto = $row['nombre'];

        // Insertar un recordatorio en la base de datos si no existe uno pendiente para este producto
        $sql_recordatorio = "INSERT INTO recordatorios (id_producto)
                             SELECT $id_producto
                             WHERE NOT EXISTS (SELECT * FROM recordatorios WHERE id_producto = $id_producto AND estado = 'pendiente')";
        $conn->query($sql_recordatorio);
    }
}

$conn->close();
?>
