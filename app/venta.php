<?php
  session_start();

  // Verificar si el usuario ha iniciado sesión y es administrador
  if (!isset($_SESSION['correo']) || $_SESSION['rol'] != 1) {
      header("Location: login.php");
      exit;
  }
  $conexion = mysqli_connect("localhost", "root", "", "mydb");
  if (!$conexion) {
      die("Conexión fallida: " . mysqli_connect_error());
  }

  $query = "SELECT * FROM Ventas INNER JOIN Usuarios ON Ventas.Usuarios_idUsuarios = Usuarios.idUsuarios";
  $result = $conexion->query($query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
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
                <a class="nav-link text-primary" href="venta.php">Venta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="reporte.php">Reporte</a>
              </li>
            </ul>
            <div class="d-flex mx-3">
              <a href="logout.php"><img src="img/cerrar-sesion.png" alt="" class="img-fluid imglogout"></a>
            </div>
          </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="fw-normal mt-3">Ventas</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Tipo de pago</th>
                </tr>
            </thead>
            <tbody id="ventas">
              <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                  <tr>
                    <td><?php echo $row['idVentas']; ?></td>
                    <td><?php echo $row['Usuarios_idUsuarios']; ?></td>
                    <td><?php echo $row['fechaVenta']; ?></td>
                    <td><?php echo $row['MetodoPago_idMetodoPago']; ?></td>
                  </tr>
                    <?php endwhile; ?>
                      <?php else: ?>
                  <tr>
                    <td colspan="4" class="text-center">No hay registros</td>
                  </tr>
                    <?php endif; ?>
            </tbody>
        </table>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>