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
    <title>Administrador</title>
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
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="logout.php"><img src="./img/cerrar-sesion.png" alt="logout" class="img-fluid mx-3 imglogout"></a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container mt-5">
        <?php echo "<h1>Bienvenido, " . $_SESSION['nombre'] . "!</h1>"; ?>
        <div class="row opc">
            <div class="col-12 col-md-6 mb-3" id="reg">
                <a href="registro.php" class="text-white links">
                <div class="text-center rounded registro"><img src="img/anadir.png" alt="registro" class="img-fluid imgopc"><p class="fw-light fs-5">Registro</p></div>
                </a>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <a href="registroproductos.php" class="text-white links">
                <div class="text-center rounded producto"><img src="img/agregar-producto.png" alt="producto" class="img-fluid imgopc"><p class="fw-light fs-5">Producto</p></div>
                </a>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <a href="venta.php" class="text-white links">
                <div class="text-center rounded venta"><img src="img/venta.png" alt="venta" class="img-fluid imgopc"><p class="fw-light fs-5">Venta</p></div>
                </a>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <a href="reporte.php" class="text-white links">
                <div class="text-center rounded reporte"><img src="img/reporte.png" alt="reporte" class="img-fluid imgopc"><p class="fw-light fs-5">Reporte</p></div>
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- JS -->

</body>
</html>