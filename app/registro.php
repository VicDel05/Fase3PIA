<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
                <a class="nav-link text-primary" href="registro.php">Registro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registroproductos.php">Producto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="venta.php">Venta</a>
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
        <h1 class="fw-normal mt-3">Registro de usuarios</h1>
        <form id="createUserForm">
          <label class="mt-2" for="txtnombre">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="txtnombre">
          <label class="mt-2" for="txtapellidop">Apellido Parteno</label>
          <input type="text" class="form-control" name="apeillidop" id="txtapellidop">
          <label class="mt-2" for="txtapellidom">Apellido Materno</label>
          <input type="text" class="form-control" name="apeillidom" id="txtapellidom">
          <label class="mt-2" for="txtcorreo">Correo</label>
          <input type="text" class="form-control" name="correo" id="txtcorreo" placeholder="example@gmail.com">
          <label class="mt-2" for="txtpass">Contraseña</label>
          <input type="password" class="form-control" name="contrasena" id="txtpass">
          <label for="rol" class="form-label">Rol</label>
          <select id="rol" class="form-select">
            <option selected value="1">Administrador</option>
            <option value="2">Miembro</option>
          </select>
          <div class="mt-3">
              <button type="submit" class="btn btn-success mx-3 mb-3">Crear</button>
              <button type="" class="btn btn-warning mx-3 mb-3">Modificar</button>
              <button type="" class="btn btn-primary mx-3 mb-3">Buscar</button>
              <button type="" class="btn btn-danger mx-3 mb-3">Eliminar</button>
          </div>
      </form>
    </div>


    
    <div class="modal fade" id="adModal" tabindex="-1" aria-labelledby="adModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark ">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-white">
            Registro exitoso
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
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