
<?php
session_start();
include 'precios.php';

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function agregarAlCarrito($producto, $cantidad, $precio, $conn) {
    $stmt = $conn->prepare("INSERT INTO carrito (producto, cantidad, precio) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $producto, $cantidad, $precio);
    $stmt->execute();
    $stmt->close();
}

function calcularTotalCarrito($conn) {
    $total = 0;
    $result = $conn->query("SELECT cantidad, precio FROM carrito");
    while ($row = $result->fetch_assoc()) {
        $total += $row['cantidad'] * $row['precio'];
    }
    return $total;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    $productos = $_POST['productos'];
    $cantidades = $_POST['cantidades'];

    $_SESSION['nombre_cliente'] = $_POST['nombre_completo'];

    if (!empty($productos) && !empty($cantidades)) {
        for ($i = 0; $i < count($productos); $i++) {
            $producto = $productos[$i];
            $cantidad = $cantidades[$i];

            $result = $conn->query("SELECT precio FROM productos WHERE nombre = '$producto'");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $precio = $row['precio'];
                agregarAlCarrito($producto, $cantidad, $precio, $conn);
            } else {
                $_SESSION['message'] = "El producto $producto no está disponible en la tienda.";
                header("Location: solicitarProductos.php");
                exit();
            }
        }
        $total = calcularTotalCarrito($conn);

        $stmt = $conn->prepare("INSERT INTO pedidos (nombre_completo, correo, telefono, direccion, total) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssd", $_POST['nombre_completo'], $_POST['correo'], $_POST['telefono'], $_POST['direccion'], $total);
        $stmt->execute();
        $stmt->close();

        $_SESSION['message'] = "Los productos se agregaron al carrito.";
    } else {
        $_SESSION['message'] = "Por favor, selecciona al menos un producto y especifica la cantidad.";
        header("Location: solicitarProductos.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['finalizar'])) {
  $_SESSION['nombre_cliente'] = $_POST['nombre_completo'];
  if (calcularTotalCarrito($conn) >= 100) {
      $total = calcularTotalCarrito($conn);
      $stmt = $conn->prepare("INSERT INTO pedidos (nombre_completo, correo, telefono, direccion, total) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssd", $_POST['nombre_completo'], $_POST['correo'], $_POST['telefono'], $_POST['direccion'], $total);
      $stmt->execute();
      $pedido_id = $stmt->insert_id;
      $stmt->close();

      // Redirigir a la página de la factura
      header("Location: factura.php?pedido_id=$pedido_id");
      exit();

      $_SESSION['message'] = "El pedido se ha realizado con éxito.";
  } else {
      $_SESSION['message'] = "El total del carrito debe ser al menos de 100 pesos.";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['limpiar'])) {
    $conn->query("TRUNCATE TABLE carrito");
    $_SESSION['message'] = "El carrito ha sido vaciado.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['buy_product'])) {
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];

        $sql = "UPDATE productos SET stock = stock - '$cantidad' WHERE id='$id' AND stock >= '$cantidad'";
        $conn->query($sql);

        echo "<script>
                setTimeout(function() {
                    window.location.href = 'solicitarProductos.php';
                }, 1000);
              </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Abarrotes Gran Viña</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    #products {
      background-color: #f4f4f4;
      padding: 80px 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 15px;
    }

    .section-title {
      text-align: center;
      margin-bottom: 50px;
    }

    .section-title h2 {
      color: #333;
      font-size: 36px;
      margin-bottom: 10px;
    }

    .section-title p {
      color: #666;
      font-size: 18px;
    }

    .swiper-container {
      margin-top: 30px;
    }

    .swiper-slide {
      text-align: center;
    }

    .product-item {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      max-width: 250px;
      margin: 0 auto;
    }

    .product-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .product-item img {
      max-width: 100%;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    .product-item h3 {
      font-size: 20px;
      color: #333;
      margin-bottom: 10px;
    }

    .product-item p {
      font-size: 16px;
      color: #666;
      margin-bottom: 10px;
      flex-grow: 1;
    }

    .product-item h4 {
      font-size: 18px;
      color: #FF4500;
    }

    #hero h1,
    #hero h2 {
      color: #fff !important;
      text-align: justify;
    }

    .btn-get-started {
      background: #ff4500;
      color: #fff;
      padding: 10px 20px;
      border-radius: 50px;
      text-decoration: none;
    }

    .btn-get-started:hover {
      background: #e63900;
      color: #fff;
    }

    #header {
      background: rgba(0, 0, 0, 0.7);
      padding: 20px 0;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 100;
      transition: background 0.5s ease;
    }

    #header.header-scrolled {
      background: rgba(0, 0, 0, 0.9);
    }

    #header .logo h1 {
      color: #fff;
      font-size: 24px;
      margin: 0;
    }

    #header .navbar {
      margin: 0;
      padding: 0;
      list-style: none;
      display: flex;
      align-items: center;
    }

    #header .navbar li {
      margin: 0 10px;
    }

    #header .navbar a {
      color: #fff;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 50px;
      transition: background 0.3s;
    }

    #header .navbar a:hover {
      background: #ff4500;
    }

    .dropdown ul {
      display: none;
      position: absolute;
      background: rgba(0, 0, 0, 0.7);
      padding: 10px 0;
      border-radius: 10px;
      top: 40px;
      list-style: none;
    }

    .dropdown:hover ul {
      display: block;
    }

    .dropdown ul li {
      margin: 0;
      padding: 0;
    }

    .dropdown ul a {
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      display: block;
    }

    .dropdown ul a:hover {
      background: #ff4500;
    }

    /* Footer Styles */
    #footer {
      background: #333;
      color: #fff;
      padding: 20px 0;
    }

    #footer .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #footer .footer-logo h2 {
      margin: 0;
      font-size: 24px;
    }

    #footer .social-links a {
      color: #fff;
      margin: 0 10px;
      font-size: 20px;
      transition: color 0.3s;
    }

    #footer .social-links a:hover {
      color: #ff4500;
    }

    #footer .footer-links {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-wrap: wrap;
    }

    #footer .footer-links li {
      margin: 0 10px;
    }

    #footer .footer-links a {
      color: #fff;
      text-decoration: none;
    }

    #footer .footer-links a:hover {
      color: #ff4500;
    }
  </style>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <h1 class="text-light">
          <a href="index.php"><span>Gran Viña</span></a>
        </h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php#hero">Inicio</a></li>
          <li><a href="solicitarProductos.php">Carrito de Compras</a></li>
          <li><a href="contactanos.php">Contáctanos</a></li>
          <li><a href="sobreNosotros.php">Sobre Nosotros</a></li>
          <li><a href="ver_inventario.php">Inventario</a></li>
          <li class="dropdown">
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background-image: url('assets/img/supermercado.jpg'); background-size: cover; background-position: center;">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 id="hero-title" class="text-light">Bienvenido a Abarrotes Gran Viña</h1>
        <h2 id="hero-subtitle" class="text-light">Tu destino para compras de abarrotes en línea</h2>
        <div id="hero-btn" class="mt-4">
          <a href="#contact" class="btn btn-primary btn-lg">Ver productos</a>
        </div>
      </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="assets/img/contacto.jpg" class="img-fluid" alt="Contacto">
      </div>
    </div>
  </div>
</section>

<style>
  .animate {
    opacity: 1;
    transition: opacity 0.8s ease-in-out;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var heroTitle = document.getElementById('hero-title');
    var heroSubtitle = document.getElementById('hero-subtitle');
    var heroBtn = document.getElementById('hero-btn');

    // Añadir clase de animación para los elementos del héroe
    heroTitle.classList.add('animate');
    heroSubtitle.classList.add('animate');
    heroBtn.classList.add('animate');

    // Desencadenar animación después de un breve retraso
    setTimeout(function() {
      heroTitle.style.opacity = '0.8';
      heroSubtitle.style.opacity = '0.8';
      heroBtn.style.opacity = '0.8';
    }, 100);
  });
</script>

  <!-- End Hero -->

    <!-- End Hero -->

    <section id="products">
    <div class="container">
        <div class="section-title">
            <h2>Carrito de Compras</h2>
            <p>Revisa tu carrito de compras antes de realizar tu pedido.</p>
        </div>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <!-- Formulario para agregar productos -->
        <form method="post" action="solicitarProductos.php">
        <div class="mb-3">
    <label for="nombre_completo" class="form-label">Nombre Completo</label>
    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
</div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div id="product-fields">
    <div class="row product-field mb-3">
        <div class="col-md-6">
            <label for="productos" class="form-label">Producto:</label>
            <select name="productos[]" id="productos" class="form-select" required>
                <option value="">Seleccionar producto</option>
                <?php
                $result = $conn->query("SELECT nombre, precio, stock FROM productos WHERE stock > 0");
                while ($row = $result->fetch_assoc()) {
                    $stock = htmlspecialchars($row['stock']);
                    $stock_notice = $stock <= 10 ? ' - Últimas unidades' : '';
                    echo '<option value="' . htmlspecialchars($row['nombre']) . '" data-stock="' . $stock . '">' . htmlspecialchars($row['nombre']) . ' - $' . htmlspecialchars($row['precio']) . ' (Productos Disponibles: ' . $stock . $stock_notice . ')</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="cantidad" class="form-label">Cantidad:</label>
            <div class="input-group">
                <input type="number" class="form-control" name="cantidades[]" id="cantidad" min="1" value="1" required>
                <button class="btn btn-outline-secondary" type="button" id="cart-button">
                    <i class="bi bi-cart-fill"></i> Carrito
                </button>
            </div>
        </div>
        <div class="col-md-2">
            <div id="stock-notification" style="color: red;"></div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var productosSelect = document.getElementById("productos");
        var cantidadInput = document.getElementById("cantidad");
        var stockNotification = document.getElementById("stock-notification");

        productosSelect.addEventListener("change", function() {
            var stock = parseInt(this.options[this.selectedIndex].getAttribute("data-stock"));
            if (stock <= 10) {
                stockNotification.textContent = "Últimas unidades disponibles";
            } else {
                stockNotification.textContent = "";
            }
            updateRemainingQuantity();
        });

        cantidadInput.addEventListener("input", function() {
            updateRemainingQuantity();
        });

        function updateRemainingQuantity() {
            var stock = parseInt(productosSelect.options[productosSelect.selectedIndex].getAttribute("data-stock"));
            var cantidad = parseInt(cantidadInput.value);
            var remaining = stock - cantidad;
            var remainingText = "Quedan " + remaining + " unidades";
            if (remaining < 0) {
                remainingText = "No hay suficientes unidades";
            }
            stockNotification.textContent = remainingText;
        }

        var cartButton = document.getElementById("cart-button");
        cartButton.addEventListener("click", function() {
            // Aquí puedes agregar la lógica para añadir el producto al carrito
            alert("Añadir producto al carrito");
        });
    });
</script>

            <button type="button" id="add-product" class="btn btn-success mt-3">Agregar Producto</button>
            <button type="submit" name="agregar" class="btn btn-success mt-3">Agregar al Carrito</button>
        </form>

        <!-- Formulario para revisar y finalizar el pedido -->
        <form method="post" action="solicitarProductos.php">
            <h2>Pedido de: <?php echo isset($_SESSION['nombre_cliente']) ? htmlspecialchars($_SESSION['nombre_cliente']) : ''; ?></h2>
            <?php
            $result = $conn->query("SELECT producto, cantidad, precio FROM carrito");
            if ($result->num_rows > 0) {
                echo '<table class="table table-custom">';
                echo '<thead><tr><th>Producto</th><th>Cantidad</th><th>Precio</th></tr></thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['producto']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['cantidad']) . '</td>';
                    echo '<td>$' . htmlspecialchars($row['precio']) . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '<tfoot><tr><td colspan="2">Total</td><td>$' . calcularTotalCarrito($conn) . '</td></tr></tfoot>';
                echo '</table>';

                echo '<button type="submit" name="finalizar" class="btn btn-success mx-3">Finalizar Pedido</button>';
                echo '<button type="submit" name="limpiar" class="btn btn-danger mx-3">Limpiar Carrito</button>';

            } else {
                echo '<p>No hay productos en el carrito.</p>';
            }
            ?>
        </form>
    </div>

    <script>
        // Script para agregar campos de productos dinámicamente
        document.getElementById('add-product').addEventListener('click', function () {
            const productFields = document.getElementById('product-fields');
            const newProductField = document.createElement('div');
            newProductField.classList.add('row', 'product-field', 'mb-3');
            newProductField.innerHTML = `
                <div class="col-md-6">
                    <label for="productos" class="form-label">Producto:</label>
                    <select name="productos[]" class="form-select" required>
                        <option value="">Seleccionar producto</option>
                        <?php
                        $result = $conn->query("SELECT nombre, precio, stock FROM productos WHERE stock > 0");
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . htmlspecialchars($row['nombre']) . '">' . htmlspecialchars($row['nombre']) . ' - $' . htmlspecialchars($row['precio']) . ' (Stock: ' . htmlspecialchars($row['stock']) . ')</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidades[]" min="1" value="1" required>
                </div>
            `;
            productFields.appendChild(newProductField);
        });
    </script>
</section>
