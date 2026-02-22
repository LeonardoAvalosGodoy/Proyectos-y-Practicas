<?php
session_start();
include 'precios.php'; // Incluir el archivo de precios

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si la sesión de carrito está creada, si no, inicializarla
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $productos = $_POST['producto'];
    $cantidades = $_POST['cantidad'];

    // Crear un array para almacenar el pedido
    $pedido = [
        'nombre_completo' => $nombre_completo,
        'correo' => $correo,
        'telefono' => $telefono,
        'direccion' => $direccion,
        'productos' => [],
        'total' => 0
    ];

    // Agregar productos al pedido
    for ($i = 0; $i < count($productos); $i++) {
        $producto = $productos[$i];
        $cantidad = (int) $cantidades[$i];

        if (array_key_exists($producto, $precios)) {
            $precio_unitario = $precios[$producto];
            $subtotal = $precio_unitario * $cantidad;

            $pedido['productos'][] = [
                'producto' => $producto,
                'cantidad' => $cantidad,
                'precio_unitario' => $precio_unitario,
                'subtotal' => $subtotal
            ];

            // Calcular el total del pedido
            $pedido['total'] += $subtotal;
        } else {
            // Manejar el caso en que el producto no tenga un precio definido
            $_SESSION['message'] = "El producto '$producto' no tiene un precio definido.";
            header("Location: solicitarProductos.php");
            exit();
        }
    }

    // Guardar el pedido en la sesión
    $_SESSION['cart'][] = $pedido;

    // Mensaje de éxito
    $_SESSION['message'] = "Pedido guardado exitosamente.";

    // Redirigir a la página principal
    header("Location: solicitarProductos.php");
    exit();
}
?>
