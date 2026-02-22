<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Pedido</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .container h2 {
            margin-bottom: 1.5rem;
            color: #333;
        }

        .container input[type="text"],
        .container input[type="email"],
        .container input[type="number"] {
            width: 100%;
            padding: 0.8rem;
            margin: 0.5rem 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .container input[type="submit"] {
            width: 100%;
            padding: 0.8rem;
            background: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .container input[type="submit"]:hover {
            background: #0056b3;
        }

        .error {
            color: #dc3545;
            margin-top: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Actualizar Pedido</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];

            $servername = "localhost";
            $username = "root";
            $dbpassword = "";
            $dbname = "tienda";

            $conn = new mysqli($servername, $username, $dbpassword, $dbname);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $sql = "SELECT nombre_completo, correo, telefono, direccion, producto, cantidad FROM pedidos WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<form method='POST' action='actualizar.php'>
                        <input type='hidden' name='id' value='{$id}'>
                        <input type='text' name='nombre_completo' placeholder='Nombre Completo' value='{$row['nombre_completo']}'><br>
                        <input type='email' name='correo' placeholder='Correo' value='{$row['correo']}'><br>
                        <input type='text' name='telefono' placeholder='Teléfono' value='{$row['telefono']}'><br>
                        <input type='text' name='direccion' placeholder='Dirección' value='{$row['direccion']}'><br>
                        <input type='text' name='producto' placeholder='Producto' value='{$row['producto']}'><br>
                        <input type='number' name='cantidad' placeholder='Cantidad' value='{$row['cantidad']}'><br>
                        <input type='submit' value='Actualizar'>
                      </form>";
            } else {
                echo "<p class='error'>Pedido no encontrado.</p>";
            }

            $stmt->close();
            $conn->close();
        } else {
            header("Location: index.php");
            exit();
        }
        ?>
    </div>
</body>

</html>
