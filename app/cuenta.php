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
    <title>Mi cuenta</title>
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
                          <li><a class="dropdown-item" href="#"><img src="img/usuario.png" alt="" class="img-fluid imglogout">Mi cuenta</a></li>
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
      <div class="row">
        <div class="col-12 col-md-4 mt-3">
          <div class="card mt-3 bg-secondary">
            <div class="card-body text-white">
                <div class="text-center">
                    <img src="img/usuario (1).png" alt="user" class="img-fluid" width="200px">
                </div>
                <h4 class="fw-lighter mt-3">Usuario: <?= htmlspecialchars($_SESSION["nombre"]) ?></h4>  
                <h4 class="fw-lighter">Correo: <?= htmlspecialchars($_SESSION["email"]) ?></h4> 
                <div class="mt-3 text-center">
                    <a href="" class="btn btn-dark">Direcciones</a>
                    <a href="" class="btn btn-dark">Metodos de pago</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 mt-3">
            <h3>Dirección</h3>
            <form action="">
                <label for="" class="form-label">Codigo postal</label>
                <input type="text" name="" id="" class="form-control">
                <label for="" class="form-label">Calle</label>
                <input type="text" name="" id="" class="form-control">
                <label for="" class="form-label">Numero</label>
                <input type="text" name="" id="" class="form-control">
                <label for="" class="form-label">Colonia</label>
                <input type="text" name="" id="" class="form-control">
                <label for="" class="form-label">Municipio</label>
                <input type="text" name="" id="" class="form-control">
                <label for="" class="form-label">Entre calles</label>
                <input type="text" name="" id="" class="form-control">
                <div class="mt-3">
                    <a href="" class="btn btn-primary">Enviar</a>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-4 mt-3">
            <h3>Metodo de pago</h3>
            <form action="">
                <label for="" class="form-label">Número de tarjeta</label>
                <input type="text" name="" id="" class="form-control">
                <label for="" class="form-label">Titular de la tarjeta</label>
                <input type="text" name="" id="" class="form-control">
                <label for="" class="form-label">Tipo de tarjeta</label>
                <select value="" class="form-select">
                    <option selected disable>Selecciona el tipo de tarjeta</option>
                    <option name="" id="">Credito</option>
                    <option name="" id="">Debito</option>
                </select>
                <label for="" class="form-label">Fecha de vencimiento</label>
                <input type="text" name="" id="" class="form-control" placeholder="12/24">
                <label for="" class="form-label">CVV</label>
                <input type="text" name="" id="" class="form-control">
                <div class="mt-3">
                    <a href="" class="btn btn-primary">Enviar</a>
                </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>