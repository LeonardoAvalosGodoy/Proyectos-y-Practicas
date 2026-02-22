<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordatorios de Stock</title>
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
        .btn-confirm {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-confirm:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Recordatorios de Stock</h2>
        <table>
            <tr>
                <th>Producto</th>
                <th>Acción</th>
            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "tienda");

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $sql = "SELECT recordatorios.id, productos.nombre
                    FROM recordatorios
                    JOIN productos ON recordatorios.id_producto = productos.id
                    WHERE recordatorios.estado = 'pendiente'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['nombre'] . "</td>
                            <td>
                                <form action='confirmar_recordatorio.php' method='post'>
                                    <input type='hidden' name='id_recordatorio' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn-confirm'>Confirmar</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No hay recordatorios pendientes.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>
