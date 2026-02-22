<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    // Verificar la contraseña
    if ($password === '123') {
        $_SESSION['loggedin'] = true;
        header("Location: admin_inventario.php");
        exit();
    } else {
        $error = "Contraseña incorrecta.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ver Inventario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('assets/img/login-background.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
            border: 1px solid #ddd;
        }

        .container h2 {
            margin-bottom: 1.5rem;
            color: #333;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .form-group input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-group input[type="password"]:focus {
            border-color: #007bff;
        }

        .btn-custom {
            width: 100%;
            padding: 0.75rem;
            background: #007bff;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-custom:hover {
            background: #0056b3;
        }

        .btn-back {
            display: inline-block;
            margin-top: 1rem;
            color: #007bff;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-back:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            margin-top: 1rem;
        }

        .login-icon {
            font-size: 3rem;
            color: #007bff;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <i class="fas fa-user-circle login-icon"></i>
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-custom">Iniciar Sesión</button>
        </form>
        <?php if (isset($error)) { echo '<div class="error">' . $error . '</div>'; } ?>
        <a href="index.php" class="btn-back"><i class="fas fa-arrow-left"></i> Volver</a>
    </div>
</body>
</html>
