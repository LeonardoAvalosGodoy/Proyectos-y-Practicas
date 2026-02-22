<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Pedido</title>
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
            max-width: 400px;
            width: 100%;
        }

        .container h2 {
            margin-bottom: 1rem;
            color: #333;
        }

        .container p {
            margin-bottom: 1rem;
        }

        .success-message {
            color: #4caf50;
        }

        .error-message {
            color: #f44336;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Eliminar Pedido</h2>
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

            $sql = "DELETE FROM pedidos WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo "<p class='success-message'>Pedido eliminado con éxito.</p>";
            } else {
                echo "<p class='error-message'>Error al eliminar el pedido: " . $conn->error . "</p>";
            }

            $stmt->close();
            $conn->close();
        } else {
            header("Location: index.php");
            exit();
        }
        ?>
        <a href="index.php" class="btn btn-primary">Volver a la página principal</a>
    </div>
</body>

</html>
