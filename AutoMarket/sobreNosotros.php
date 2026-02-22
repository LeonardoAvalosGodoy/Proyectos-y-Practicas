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
          <li><a href="ver_inventario.php">Inventario</a></li>
          <li class="dropdown">
      </nav>
    </div>
  </header>
  <!-- End Header -->
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="background-image: url('assets/img/supermercado.jpg'); background-size: cover; background-position: center;">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 id="hero-title" class="hero-title">Sobre Nosotros</h1>
        <h2 id="hero-subtitle" class="hero-subtitle">Calidad y conveniencia en cada compra</h2>
        <div id="hero-btn" class="mt-4">
          <a href="#contact" class="btn btn-primary btn-lg">Mas Informacion</a>
        </div>
      </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="assets/img/me.gif" class="img-fluid" alt="Contacto">
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
  window.addEventListener('load', function() {
    var heroContent = document.querySelector('#hero .col-lg-6');

    // Añadir clase de animación para los elementos del héroe
    var heroTitle = document.getElementById('hero-title');
    var heroSubtitle = document.getElementById('hero-subtitle');
    var heroBtn = document.getElementById('hero-btn');
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

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Sobre Nosotros</h2>
        </div>
        <div class="row content">
          <div class="col-lg-6">
            <p>
              En la Gran Viña, somos una tienda dedicada a ofrecer la mejor experiencia de compra de productos de abarrotes en línea. Nuestro objetivo es proporcionar una plataforma conveniente y segura para que nuestros clientes puedan adquirir sus productos favoritos desde la comodidad de su hogar.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Productos de alta calidad.</li>
              <li><i class="bi bi-check-circle"></i> Entregas rápidas y seguras.</li>
              <li><i class="bi bi-check-circle"></i> Atención al cliente personalizada.</li>
              <li><i class="bi bi-check-circle"></i> Variedad de productos a precios competitivos.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Nuestro equipo está compuesto por profesionales apasionados por el servicio al cliente y comprometidos con la satisfacción de nuestros usuarios. Nos esforzamos por mantener una amplia variedad de productos y por mejorar continuamente nuestros servicios para adaptarnos a las necesidades de nuestros clientes.
            </p>
            <p>
              Creemos en la importancia de la confianza y la transparencia, y nos aseguramos de que cada compra sea una experiencia positiva para nuestros clientes. Gracias por confiar en nosotros y permitirnos ser parte de tu día a día. ¡Esperamos poder servirte pronto!
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Us Section -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </div>
</body>
</html>
