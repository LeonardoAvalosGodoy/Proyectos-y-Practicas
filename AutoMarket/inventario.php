<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .text-center {
            margin-top: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        table th, table td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Carrito de Compras</h2>
        <div id="user-name" class="text-center mb-4">
            <!-- Aquí se mostrará el nombre del usuario -->
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <!-- Aquí se mostrarán los productos seleccionados -->
            </tbody>
        </table>
        <div class="text-center">
            <button class="btn btn-primary" onclick="location.href='index.php'">Seguir Comprando</button>
            <button class="btn btn-danger" onclick="vaciarCarrito()">Vaciar Carrito</button>
            <button class="btn btn-success" onclick="realizarPedido()">Realizar Pedido</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Función para agregar un producto al carrito
        function agregarAlCarrito(nombreProducto, cantidad, precioUnitario) {
            var subtotal = cantidad * precioUnitario;
            var newRow = `
                <tr>
                    <td>${nombreProducto}</td>
                    <td>${cantidad}</td>
                    <td>${precioUnitario.toFixed(2)}</td>
                    <td>${subtotal.toFixed(2)}</td>
                    <td><button class="btn btn-danger" onclick="eliminarDelCarrito(this)">Eliminar</button></td>
                </tr>`;
            document.getElementById('cart-items').innerHTML += newRow;
        }

        // Función para eliminar un producto del carrito
        function eliminarDelCarrito(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        // Función para vaciar todo el carrito
        function vaciarCarrito() {
            document.getElementById('cart-items').innerHTML = '';
        }

        // Función para realizar el pedido
        function realizarPedido() {
            // Aquí puedes agregar la lógica para enviar el pedido al servidor o realizar alguna acción adicional
            alert('Pedido realizado con éxito');
            vaciarCarrito(); // Vaciar el carrito después de realizar el pedido
        }

        // Función para mostrar el nombre del usuario
        function mostrarNombreUsuario(nombre) {
            document.getElementById('user-name').innerHTML = `<h4>Bienvenido, ${nombre}</h4>`;
        }

        // Ejemplo de uso:
        // Supongamos que tienes una lista de productos seleccionados en tu página principal
        // y deseas agregarlos al carrito cuando el usuario visite la página "Ver Productos".

        // Ejemplo de agregar productos al carrito:
        agregarAlCarrito("Arroz", 2, 5.99);
        agregarAlCarrito("Frijoles", 1, 3.49);
        agregarAlCarrito("Aceite", 3, 7.99);

        // Ejemplo de mostrar el nombre del usuario:
        mostrarNombreUsuario("");
    </script>
</body>
</html>
