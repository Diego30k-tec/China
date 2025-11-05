<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Restaurante - Comidas</title>

  <!-- Bootstrap 5.3.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="assets/css/styless.css">
  
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>



  <!-- Header con Navbar -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">CHINA WORK</a>

        <!-- Contenido soportado del Navbar (colapsable) -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Menú</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Precios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contacto</a>
            </li>
          </ul>

          <!-- Buscador -->
          <form class="d-flex search-form flex-grow-1 me-4" role="search">
            <input class="form-control me-2 rounded-pill" type="search" placeholder="¿Qué estás buscando?" aria-label="Buscar">
            <button class="btn btn-outline-primary rounded-circle" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </div>

        <!-- Login, Carrito y Toggler (siempre visibles, toggler solo en <lg) -->
        <div class="d-flex align-items-center">
          
          <?php if(isset($_SESSION['user_name'])): ?>
            <span class="d-none d-lg-inline me-3 text-muted small" id="login-text">
              Hola, <?= htmlspecialchars($_SESSION['user_name']) ?> |
              <a href="assets/php/logout.php" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#loginModal">Cerrar Sesión</a>
            </span>
          <!-- Versión ícono para pantallas medianas y pequeñas (md y down) -->
          <?php else: ?>
            <a href="#" class="d-lg-none me-3" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="bi bi-person fs-4 text-muted"></i></a>
          <?php endif; ?>
          <!-- Carrito -->
          <a href="#" class="btn position-relative me-2">
            <i class="bi bi-cart3 fs-4"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">0</span>
          </a>
          <!-- Botón toggler para mobile (solo visible en <lg) -->
          <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </nav>
  </header>

  <!-- Modal de Login -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="loginForm" action="assets/php/login.php" method="POST">
          <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingresa tu correo" required>
          </div>
          <div class="mb-3">
            <label for="pass" class="form-label">Contraseña</label>
            <input type="password" name="pass" id="pass" class="form-control" placeholder="Ingresa tu contraseña" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
        </form>
          <p class="mt-3 text-center small text-muted">¿No tienes cuenta? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Regístrate</a></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de Registro -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Registrarse</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="registerForm" action="assets/php/registro.php" method="POST">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Tu nombre" required>
            </div>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo</label>
              <input type="email" name="correo" id="correo" class="form-control" placeholder="Tu correo electrónico" required>
            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">Contraseña</label>
              <input type="password" name="pass" id="pass" class="form-control" placeholder="Crea una contraseña" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Registrarse</button>
          </form>
          <p class="mt-3 text-center small text-muted">¿Ya tienes cuenta? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Iniciar Sesión</a></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Breadcrumb -->
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
      </ol>
    </nav>
  </div>

  <!-- Filtros y Productos -->
  <div class="container my-4">
    <div class="catagrias row text-center px-4 py-2">
      <h2>CATEGORIAS</h2>
    </div>
      <h3>Chifa</h3>

    <!-- Grid de productos -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
      <!-- Producto 1 -->
      <div class="col">
        <div class="card product-card h-100 border-0 shadow-sm">
          <img src="https://static.wixstatic.com/media/9755d8_b2d98eade0814b17a67fdf7d95888fdc~mv2.png/v1/fill/w_899,h_656,al_c,q_90,usm_0.66_1.00_0.01,enc_avif,quality_auto/9755d8_b2d98eade0814b17a67fdf7d95888fdc~mv2.png" 
               class="card-img-top" alt="Sazonador Paellero" style="height: 200px; object-fit: cover;">
          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-1"></p>
            <h6 class="card-title fw-bold">Lomo Saltado</h6>
            <p class="text-muted small">Precio desde</p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
              <span class="h5 text-success mb-0">s/12.00</span>
              <button class="btn btn-success btn-add">
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Producto 2 -->
      <div class="col">
        <div class="card product-card h-100 border-0 shadow-sm">
          <img src="https://static.wixstatic.com/media/9755d8_b651a03592414d4b9642b0164cea6ba9~mv2.jpg/v1/fill/w_960,h_720,fp_0.50_0.50,q_90,enc_avif,quality_auto/9755d8_b651a03592414d4b9642b0164cea6ba9~mv2.jpg" 
               class="card-img-top" alt="Sazonador Paellero" style="height: 200px; object-fit: cover;">
          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-1"></p>
            <h6 class="card-title fw-bold">Tallarin Saltado de Carne</h6>
            <p class="text-muted small">Precio desd</p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
              <span class="h5 text-success mb-0">s/10.00</span>
              <button class="btn btn-success btn-add">
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Producto 3 -->
      <div class="col">
        <div class="card product-card h-100 border-0 shadow-sm">
          <img src="https://static.wixstatic.com/media/9755d8_1cc8a76c98ef41f99c17e2f89a7fa325~mv2.jpg/v1/fill/w_1104,h_828,fp_0.50_0.50,q_90,enc_avif,quality_auto/9755d8_1cc8a76c98ef41f99c17e2f89a7fa325~mv2.jpg" 
               class="card-img-top" alt="Sazonador Paellero" style="height: 200px; object-fit: cover;">
          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-1"></p>
            <h6 class="card-title fw-bold">Aeropurto</h6>
            <p class="text-muted small">Precio desde</p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
              <span class="h5 text-success mb-0">s/10.00</span>
              <button class="btn btn-success btn-add">
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Producto 4 -->
      <div class="col">
        <div class="card product-card h-100 border-0 shadow-sm">
          <img src="https://static.wixstatic.com/media/9755d8_a1a612def03a4b3e885d421ec3edf0c6~mv2.png/v1/fill/w_960,h_720,fp_0.50_0.50,q_95,enc_avif,quality_auto/9755d8_a1a612def03a4b3e885d421ec3edf0c6~mv2.png" 
               class="card-img-top" alt="Sazonador Paellero" style="height: 200px; object-fit: cover;">
          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-1"></p>
            <h6 class="card-title fw-bold">Arroz Chaufa de Pollo</h6>
            <p class="text-muted small">Precio desde</p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
              <span class="h5 text-success mb-0">s/10.00</span>
              <button class="btn btn-success btn-add">
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer py-4 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5 class="fw-bold">CHINA WORK</h5>
          <p class="small text-muted">Tu local de confianza para comer sabreoso.</p>
        </div>
        <div class="col-md-4">
          <h6>Enlaces</h6>
          <ul class="list-unstyled small text-muted">
            <li><a href="#" class="text-decoration-none text-muted">Términos y condiciones</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Política de privacidad</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Contacto</a></li>
          </ul>
        </div>
        <div class="col-md-4 text-md-end">
          <p class="small text-muted mb-1">© 2025 China Work. Todos los derechos reservados.</p>
          <div>
            <a href="#" class="text-muted me-2"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-muted me-2"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-muted"><i class="bi bi-twitter"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- JavaScript personalizado (separado) -->
  <script src="assets/js/login.js"></script>
  <script src="assets/js/register.js"></script>
  
<?php if (isset($_SESSION['success'])): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: '¡Éxito!',
      text: '<?= $_SESSION['success']; ?>',
      confirmButtonColor: '#28a745',
      timer: 2500
    });
  </script>
  <?php unset($_SESSION['success']); endif; ?>

  <?php if (isset($_SESSION['error'])): ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: '<?= $_SESSION['error']; ?>',
      confirmButtonColor: '#dc3545'
    });
  </script>
  <?php unset($_SESSION['error']); endif; ?>

</body>
</html>