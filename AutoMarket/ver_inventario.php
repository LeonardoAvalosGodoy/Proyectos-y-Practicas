<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT nombre, stock, stock_minimo FROM productos";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .low-stock {
            background-color: #f8d7da;
            color: #721c24;
        }
        .no-stock {
            background-color: #000;
            color: #fff;
        }
        .high-stock {
            background-color: #d4edda;
            color: #155724;
        }
        .warning, .urgent {
            font-weight: bold;
        }
        .warning {
            color: red;
        }
        .urgent {
            color: darkred;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #0275d8;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 10px;
        }
        .button:hover {
            background-color: #025aa5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Inventario de Productos</h2>
        <table>
            <tr>
                <th>Producto</th>
                <th>Cantidad Disponible</th>
                <th>Stock Mínimo</th>
            </tr>
            <?php
            $contactarProveedor = false;
            $urgeSurtir = false;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $rowClass = "";
                    if ($row["stock"] == 0) {
                        $rowClass = "no-stock";
                        $urgeSurtir = true;
                    } elseif ($row["stock"] < $row["stock_minimo"]) {
                        $rowClass = "low-stock";
                    } elseif ($row["stock"] > 20) {
                        $rowClass = "high-stock";
                    }

                    if ($row["stock"] < 20) {
                        $contactarProveedor = true;
                    }

                    echo "<tr class='$rowClass'>
                            <td>" . $row['nombre'] . "</td>
                            <td>" . $row['stock'] . "</td>
                            <td>" . $row['stock_minimo'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay productos en el inventario.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <?php if ($urgeSurtir): ?>
            <p class="urgent">¡Urgente! Algunos productos están agotados. Urge surtir productos.</p>
        <?php elseif ($contactarProveedor): ?>
            <p class="warning">¡Alerta! La cantidad disponible de algunos productos es menor a 20. Contactar al proveedor.</p>
        <?php endif; ?>
        <div class="buttons">
            <a href="admin_inventario.php" class="button">Volver</a>
            <a href="logout.php" class="button">Cerrar Sesión</a>
            <a href="formulario_mensaje_proveedor.php" class="button">Enviar Mensaje a Proveedor</a>
        </div>
    </div>
</body>
</html>
