<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Función para conectar a la base de datos
function conectarBD() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tienda";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}

// Función para obtener productos desde la base de datos
function obtenerProductos() {
    $conn = conectarBD();
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);
    $productos = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    }
    $conn->close();
    return $productos;
}

// Función para restablecer el contador de autoincremento
function restablecerAutoIncremento() {
    $conn = conectarBD();
    $sql_reset_autoincrement = "ALTER TABLE productos AUTO_INCREMENT = 1";
    $conn->query($sql_reset_autoincrement);
    $conn->close();
}

// Función para insertar productos en la base de datos
function insertarProductos($productos) {
    $conn = conectarBD();
    foreach ($productos as $nombre => $detalles) {
        $precio = $detalles['precio'];
        $stock = $detalles['stock'];
        $stock_minimo = 10; // Suponiendo un stock mínimo estándar

        // Verificar si el producto ya existe en la base de datos
        $sql_check = "SELECT * FROM productos WHERE nombre = '$nombre'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows == 0) {
            // Si el producto no existe, insertarlo en la base de datos
            $sql_insert = "INSERT INTO productos (nombre, stock, stock_minimo, precio) VALUES ('$nombre', '$stock', '$stock_minimo', '$precio')";
            $conn->query($sql_insert);
        }
    }
    $conn->close();
}

// Productos predefinidos
$precios = [
    'Arroz' => ['precio' => 20, 'stock' => 50],
    'Frijoles' => ['precio' => 25, 'stock' => 40],
    'Aceite' => ['precio' => 50, 'stock' => 30],
    'Azúcar' => ['precio' => 18, 'stock' => 60],
    'Harina' => ['precio' => 22, 'stock' => 45],
    'Leche' => ['precio' => 15, 'stock' => 100],
    'Huevos' => ['precio' => 35, 'stock' => 80],
    'Pan' => ['precio' => 10, 'stock' => 70],
    'Café' => ['precio' => 45, 'stock' => 25],
    'Té' => ['precio' => 30, 'stock' => 50],
    'Sal' => ['precio' => 12, 'stock' => 55],
    'Pimienta' => ['precio' => 20, 'stock' => 40],
    'Pasta' => ['precio' => 18, 'stock' => 50],
    'Salsa de Tomate' => ['precio' => 15, 'stock' => 35],
    'Mantequilla' => ['precio' => 22, 'stock' => 40],
    'Queso' => ['precio' => 60, 'stock' => 25],
    'Jabón' => ['precio' => 8, 'stock' => 100],
    'Shampoo' => ['precio' => 35, 'stock' => 30],
    'Papel Higiénico' => ['precio' => 45, 'stock' => 80],
    'Detergente' => ['precio' => 40, 'stock' => 50]
];

// Restablecer autoincremento e insertar productos si la tabla está vacía
$conn = conectarBD();
$sql_check_empty = "SELECT COUNT(*) as count FROM productos";
$result_check_empty = $conn->query($sql_check_empty);
$row = $result_check_empty->fetch_assoc();
if ($row['count'] == 0) {
    restablecerAutoIncremento();
    insertarProductos($precios);
}
$conn->close();

// Procesar las solicitudes POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = conectarBD();

    if (isset($_POST['add_product'])) {
        $nombre = $_POST['nombre'];
        $stock = $_POST['stock'];
        $stock_minimo = $_POST['stock_minimo'];
        $precio = $_POST['precio'];

        $sql = "INSERT INTO productos (nombre, stock, stock_minimo, precio) VALUES ('$nombre', '$stock', '$stock_minimo', '$precio')";
        $conn->query($sql);
    } elseif (isset($_POST['update_product'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $stock = $_POST['stock'];
        $stock_minimo = $_POST['stock_minimo'];
        $precio = $_POST['precio'];

        $sql = "UPDATE productos SET nombre='$nombre', stock='$stock', stock_minimo='$stock_minimo', precio='$precio' WHERE id='$id'";
        $conn->query($sql);
    } elseif (isset($_POST['delete_product'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM productos WHERE id='$id'";
        $conn->query($sql);
    } elseif (isset($_POST['delete_all'])) {
        $sql = "DELETE FROM productos";
        $conn->query($sql);
        restablecerAutoIncremento(); // Restablecer autoincremento después de eliminar todos los productos
    }

    $conn->close();
}

// Obtener los productos actualizados
$productos = obtenerProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Inventario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons form {
            display: inline-block;
        }

        .action-buttons input[type="text"],
        .action-buttons input[type="number"] {
            width: auto;
            display: inline-block;
        }

        .action-buttons button {
            display: inline-block;
            margin-right: 5px;
        }

        .delete-button {
            background-color: #d9534f;
        }

        .delete-button:hover {
            background-color: #c9302c;
        }

        a.button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #0275d8;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 10px;
        }

        a.button:hover {
            background-color: #025aa5;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Administrar Inventario</h2>

        <form method="post" action="admin_inventario.php">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="stock">Cantidad Disponible:</label>
                <input type="number" id="stock" name="stock" required>
            </div>
            <div class="form-group">
                <label for="stock_minimo">Stock Mínimo:</label>
                <input type="number" id="stock_minimo" name="stock_minimo" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" id="precio" name="precio" required>
            </div>
            <div class="form-group">
                <button type="submit" name="add_product">Agregar Producto</button>
            </div>
        </form>

        <form method="post" action="admin_inventario.php">
            <div class="form-group">
                <button type="submit" name="delete_all" class="delete-all-button">Eliminar Todo el Inventario</button>
            </div>
        </form>

        <a href="ver_inventario.php" class="button">Ver Inventario</a>
        <a href="logout.php" class="button">Cerrar Sesión</a>

        <h3>Productos Existentes</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad Disponible</th>
                <th>Stock Mínimo</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <?php
            if (count($productos) > 0) {
                foreach ($productos as $producto) {
                    echo "<tr>
                        <td>{$producto['id']}</td>
                        <td>{$producto['nombre']}</td>
                        <td>{$producto['stock']}</td>
                        <td>{$producto['stock_minimo']}</td>
                        <td>{$producto['precio']}</td>
                        <td class='action-buttons'>
                            <form method='post' action='admin_inventario.php'>
                                <input type='hidden' name='id' value='{$producto['id']}'>
                                <input type='text' name='nombre' value='{$producto['nombre']}' required>
                                <input type='number' name='stock' value='{$producto['stock']}' required>
                                <input type='number' name='stock_minimo' value='{$producto['stock_minimo']}' required>
                                <input type='number' step='0.01' name='precio' value='{$producto['precio']}' required>
                                <button type='submit' name='update_product'>Actualizar</button>
                                <button type='submit' name='delete_product' class='delete-button'>Eliminar</button>
                            </form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay productos en el inventario.</td></tr>";
            }
            ?>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $(".delete-all-button").click(function(e) {
                if (!confirm("¿Estás seguro de que deseas eliminar todo el inventario?")) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
