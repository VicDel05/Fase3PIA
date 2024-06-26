<?php
session_start();
$usuario_registrado = isset($_SESSION['correo']) && isset($_SESSION['rol']);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg barraNav">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="./img/QC-logo.png" alt="" width="75px" class="rounded"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="acercade.php">Acerca de</a>
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
                        <a class="nav-link dropdown-toggle" href="cuenta.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cuenta</a>
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
      <h1 class="fw-normal text-center mt-3">Papeleria Quill & Craft</h1>
      <h3 class="fw-light text-center">"Todo para tu creatividad, al alcance de un clic"</h3>

      <div class="row">
        <div class="col-12 col-md-6">
          <p class="fw-light">Podras encontrar productos para realizar cualquier tarea ya sea escolar hasta de oficina, productos de buena calidad y con un precio accesible.</p>
          <p class="fw-light">Dentro de nuestra seleccion de productos encontraras:</p>
          <ul class="fw-light">
            <li>Cuadernos</li>
            <li>Colores, lapices y lapiceros</li>
            <li>Boligrafos</li>
            <li>Marcadores</li>
            <li>Tijeras, borradores, sacapunta, pegamento en barra y líquidos</li>
            <li>Hojas de maquina, cartulinas</li>
            <li>Reglas y transportadores</li>
          </ul>
        </div>
        <div class="col-12 col-md-6">
          <img src="./img/utiles.jpeg" alt="producto" class="img-fluid">
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>