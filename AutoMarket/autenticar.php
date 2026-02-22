<?php
session_start();

// Configura la contraseña
$correct_password = "123";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    // Verificar la contraseña
    if ($password === $correct_password) {
        // Guardar la sesión
        $_SESSION['loggedin'] = true;
        // Redirigir a la página de inventario
        header("Location: ver_inventario.php");
        exit();
    } else {
        // Contraseña incorrecta, redirigir a la página de login con mensaje de error
        $_SESSION['error'] = "Contraseña incorrecta.";
        header("Location: login.php");
        exit();
    }
} else {
    // Si se intenta acceder directamente, redirigir a la página de login
    header("Location: login.php");
    exit();
}
?>
