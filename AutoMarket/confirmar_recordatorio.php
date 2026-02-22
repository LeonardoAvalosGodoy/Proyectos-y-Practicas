<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_recordatorio = $_POST["id_recordatorio"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tienda";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener información del producto y proveedor
    $sql = "SELECT productos.nombre AS producto, proveedores.nombre AS proveedor, proveedores.correo
            FROM recordatorios
            JOIN productos ON recordatorios.id_producto = productos.id
            JOIN proveedores ON productos.id_proveedor = proveedores.id
            WHERE recordatorios.id = $id_recordatorio";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $producto = $row["producto"];
        $proveedor = $row["proveedor"];
        $correo_proveedor = $row["correo"];

        // Marcar el recordatorio como confirmado
        $sql_update = "UPDATE recordatorios SET estado = 'confirmado' WHERE id = $id_recordatorio";
        if ($conn->query($sql_update) === TRUE) {
            // Enviar correo al proveedor
            $to = $correo_proveedor;
            $subject = "Pedido de Reabastecimiento";
            $message = "Estimado $proveedor,\n\nNecesitamos reabastecer el producto: $producto.\n\nGracias.";
            $headers = "From: tienda@example.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Recordatorio confirmado y correo enviado al proveedor.";
            } else {
                echo "Recordatorio confirmado, pero no se pudo enviar el correo.";
            }
        } else {
            echo "Error al confirmar el recordatorio: " . $conn->error;
        }
    } else {
        echo "Error al obtener los datos del recordatorio.";
    }

    $conn->close();
}
?>
