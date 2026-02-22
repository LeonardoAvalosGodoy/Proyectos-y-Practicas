<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tienda";

    // Crea la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtiene los datos del formulario
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['message'];

    // Prepara la consulta SQL
    $sql = "INSERT INTO contactos (nombre, email, asunto, mensaje) VALUES (?, ?, ?, ?)";

    // Prepara la sentencia
    $stmt = $conn->prepare($sql);

    // Vincula los parámetros
    $stmt->bind_param("ssss", $nombre, $email, $asunto, $mensaje);

    // Ejecuta la sentencia
    if ($stmt->execute() === TRUE) {
        // Mostrar la notificación después de enviar el formulario
        echo '<script>
                window.onload = function() {
                  Swal.fire({
                    icon: "success",
                    title: "¡Mensaje enviado con éxito!",
                    text: "Tu mensaje ha sido enviado correctamente. Nos pondremos en contacto contigo lo antes posible.",
                    showConfirmButton: false,
                    timer: 3000
                  });
                }
              </script>';
        // Redirecciona después de 5 segundos
        header("refresh:5; url=contactanos.php");
    } else {
        $error = "Error al enviar el mensaje: " . $conn->error;
    }

    // Cierra la conexión y la sentencia preparada
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Agregar una regla CSS para cambiar el tipo de letra -->
    <style>
        body {
            font-family: Arial, sans-serif; /* Cambia "Arial" al tipo de letra que desees */
        }
    </style>
</head>

</html>
