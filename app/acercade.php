<?php
session_start();
$usuario_registrado = isset($_SESSION['correo']) && isset($_SESSION['rol']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de nosotros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg barraNav">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/QC-logo.png" alt="" width="75px" class="rounded"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-primary" aria-current="page" href="acercade.php">Acerca de</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="producto.php">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacto.php">Contacto</a>
              </li>
              <?php if (!$usuario_registrado): ?>
                      <li class="nav-item"><a class="nav-link" href="login.php">Iniciar sesión</a></li>
                    <?php endif; ?>
                    <?php if ($usuario_registrado): ?>
                      <li class="nav-item"><a class="nav-link" href="comentario.php">Comentarios</a></li>
                      <li class="nav-item"><a class="nav-link" href="carrito.php">Carrito</a></li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cuenta</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="cuenta.php"><img src="img/usuario.png" alt="" class="img-fluid imglogout">Mi cuenta</a></li>
                          <li><a class="dropdown-item" href="logout.php"><img src="img/cerrar-sesion.png" alt="logout" class="img-fluid imglogout">Cerrar sesión</a></li>
                        </ul>
                      </li>
                    <?php endif; ?>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Productos" aria-label="Search">
              <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>
          </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-2 fw-normal">Acerca de nosotros</h1>
        <div class="row">
            <div class="col-12 col-md-6">
                <p class="fw-light">
                    Bienvenidos a Quill & Craft, tu destino número uno para todas tus necesidades de papelería y suministros de oficina. Desde 2024, nos hemos comprometido a proporcionar a nuestros clientes una experiencia de compra excepcional, ofreciendo una amplia gama de productos de calidad y un servicio al cliente incomparable.
                </p>
                <h4 class="fw-normal">Nuestra mision</h4>
                <p class="fw-light">
                    Nuestra misión es simple: queremos inspirar a nuestros clientes a alcanzar sus objetivos ofreciendo productos de alta calidad que fomenten la creatividad, la productividad y la organización. Nos esforzamos por ser más que una tienda de suministros; queremos ser tu socio en el éxito, proporcionando las herramientas y el apoyo que necesitas para triunfar en cualquier tarea que emprendas.
                </p>
                <h4 class="fw-normal">Nuestra Selección</h4>
                <p class="fw-light">
                    Desde bolígrafos y cuadernos hasta accesorios de escritorio, en Quill & Craft tenemos todo lo que necesitas para equipar tu espacio de trabajo o estudio. Trabajamos con los principales fabricantes y proveedores para garantizar que nuestros clientes tengan acceso a los últimos productos y las mejores marcas del mercado.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <img src="img/workteam.jpg" alt="Equipo de trabajo" class="img-fluid p-2">
            </div>
        </div>

        <h2 class="fw-normal">Equipo de trabajo</h2>
          <div>
            <h4 class="fw-light">Victor Alfonso Delgado Bautista</h4>
            <p class="fw-light">"Dentro del proyecto fui encargado de la planificación, la documentación y el desarrollo de la página web."</p>
            <p class="fw-light">Experiencia</p>
            <ul class="fw-light">
              <li>HTML</li>
              <li>CSS</li>
              <li>MySQL (básico)</li>
              <li>JavaScript (básico)</li>
            </ul>
          </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>