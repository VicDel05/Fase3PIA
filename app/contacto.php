<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
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
                <a class="nav-link" aria-current="page" href="acercade,php">Acerca de</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="producto.php">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-primary" href="contacto.php">Contacto</a>
              </li>
              <?php if (!$usuario_registrado): ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Iniciar sesión</a></li>
                    <?php endif; ?>
                    <?php if ($usuario_registrado): ?>
                        <li class="nav-item"><a class="nav-link" href="#">Comentarios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Cuenta</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Carrito</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Cerrar Sesión</a></li>
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
        <div class="row">
            <div class="col">
                <h1 class="fw-normal mt-3">Contactanos</h1>
                <p class="fw-light">
                    Si deseas comunicarte con el equipo de trabajo puedes usar el siguiente número telefónico: 8191838737
                    <br><br>
                    También puedes mandarnos mesanje por los diferentes medios de comunicación que tenemos disponible para ti:
                </p>
                <div class="mail">
                  <img src="img/gmail.png" alt="" class="img-fluid ilus">Correo
                </div>
                <div class="face">
                  <img src="img/facebook.png" alt="" class="img-fluid ilus">Facebook
                </div>
                <div class="ig">
                  <img src="img/instagram.png" alt="" class="img-fluid ilus">Instagram
                </div>
            </div>
            <div class="col mt-5 mx-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.3124419983183!2d-100.31635232533345!3d25.727179277373626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86629452551ea79f%3A0x66e03550ec5730cb!2sFacultad%20de%20Ingenier%C3%ADa%20Mec%C3%A1nica%20y%20El%C3%A9ctrica!5e0!3m2!1ses!2smx!4v1715718224836!5m2!1ses!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>