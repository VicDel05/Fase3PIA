<?php
session_start();

// Verificar si el usuario ha iniciado sesión y es administrador
if (!isset($_SESSION['correo']) || $_SESSION['rol'] != 1) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/estillos-a.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg barraNav">
        <div class="container-fluid">
          <a class="navbar-brand" href="inicioAdmin.php"><img src="img/QC-logo.png" alt="Logo" width="75px" class="rounded"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="registro.php">Registro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registroproductos.php">Producto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="venta.php">Venta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-primary" href="reporte.php">Reporte</a>
              </li>
            </ul>
            <div class="d-flex mx-3">
              <a href="logout.php"><img src="img/cerrar-sesion.png" alt="" class="img-fluid imglogout"></a>
            </div>
          </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="fw-normal mt-3">Reportes</h1>
        <div class="row">
            <div class="col-12 col-md-3">
              <div class="card">
                <div class="card-body bg-dark text-white">
                  <h5 class="card-title">Lista de reportes</h5>
                  <div class="mt-3">
                    <ul class="nav flex-column">
                      <li class="nav-item mt-3">
                        <a href="#" class="btn btn-light w-100" data-page="views/reporteventa.php">Ventas</a>
                      </li>
                      <li class="nav-item mt-3">
                        <a href="#" class="btn btn-light w-100" data-page="views/reporteproducto.php">Productos</a>
                      </li>
                      <li class="nav-item mt-3">
                        <a href="#" class="btn btn-light w-100" data-page="views/reporteusuarios.php">Usuarios</a>
                      </li>
                      <li class="nav-item mt-3">
                        <a href="#" class="btn btn-light w-100" data-page="views/reportecomentario.php">Comentarios</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-9">
              <div class="mt-3 contenido" id="content-area">
              </div>
            </div>
        </div> 

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- JS -->
    <script>
      $(document).ready(function() {
            $('.btn-light').on('click', function(e) {
                e.preventDefault();
                var page = $(this).data('page');
                $('#content-area').load(page);
            });
      });
    </script>
</body>
</html>