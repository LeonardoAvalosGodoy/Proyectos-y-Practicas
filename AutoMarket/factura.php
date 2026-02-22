<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!isset($_GET['pedido_id'])) {
    die("No se ha especificado un ID de pedido.");
}

$pedido_id = intval($_GET['pedido_id']);

$stmt = $conn->prepare("SELECT nombre_completo, correo, telefono, direccion, total, fecha FROM pedidos WHERE id = ?");
$stmt->bind_param("i", $pedido_id);
$stmt->execute();
$pedido_result = $stmt->get_result();
$pedido = $pedido_result->fetch_assoc();
$stmt->close();

$productos_result = $conn->query("SELECT producto, cantidad, precio FROM carrito");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - Pedido #<?php echo $pedido_id; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice h1 {
            text-align: center;
        }
        .invoice table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice table th, .invoice table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .invoice table th {
            background-color: #f4f4f4;
        }
        .invoice .total {
            text-align: right;
        }
        .invoice .total th, .invoice .total td {
            border: none;
        }
        .back-button {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <h1>Factura</h1>
        <p><strong>Pedido #:</strong> <?php echo $pedido_id; ?></p>
        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($pedido['nombre_completo']); ?></p>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($pedido['correo']); ?></p>
        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($pedido['telefono']); ?></p>
        <p><strong>Dirección:</strong> <?php echo htmlspecialchars($pedido['direccion']); ?></p>
        <p><strong>Fecha:</strong> <?php echo htmlspecialchars($pedido['fecha']); ?></p>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $productos_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['producto']); ?></td>
                        <td><?php echo htmlspecialchars($row['cantidad']); ?></td>
                        <td>$<?php echo number_format($row['precio'], 2); ?></td>
                        <td>$<?php echo number_format($row['cantidad'] * $row['precio'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr class="total">
                    <th colspan="3">Total</th>
                    <td>$<?php echo number_format($pedido['total'], 2); ?></td>
                </tr>
            </tfoot>
        </table>

        <p>Gracias por su compra en Abarrotes Gran Viña.</p>
        <button class="back-button" onclick="window.history.back();">Volver</button>
    </div>
</body>
</html>
