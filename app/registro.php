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

  $query = "SELECT * FROM Usuarios INNER JOIN Roles ON Usuarios.Roles_idRoles = Roles.idRoles";
  $result = $conexion->query($query);

  mysqli_close($conexion);

?>

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
      <div class="row">
        <div class="col-12 col-md-4">
          <form action="validar-usuario.php" method="POST">
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
            <select id="rol" class="form-select" name="rol">
              <option selected disable>Seleccione un rol</option>
              <?php 
                      $conexion = mysqli_connect("localhost", "root", "", "mydb");
                      if (!$conexion) {
                          die("Conexión fallida: " . mysqli_connect_error());
                      }

                      $sql = $conexion->query("SELECT * FROM Roles");
                      while($resultado = $sql->fetch_assoc()){
                        echo "<option value='".$resultado['idRoles']."'>".$resultado['NombreRol']."</option>";
                      }
                    ?>
            </select>
            <div class="mt-3">
                <button type="submit" class="btn btn-success mx-3 mb-3">Crear</button>
            </div>
          </form>
        </div>
        <div class="col-12 col-md-8">
          <table class="table ">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="tablaproducto">
              <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                  <tr>
                    <td><?php echo $row['idUsuarios']; ?></td>
                    <td><?php echo $row['NombreUsuaros']; ?></td>
                    <td><?php echo $row['CorreoUsuario']; ?></td>
                    <td><?php echo $row['NombreRol']; ?></td>
                    <td>
                      <a href="./updateusuario.php?id=<?php echo $row['idUsuarios']; ?>" class="btn btn-warning" id="edit-btn"><img src="img/editar.png" alt="update" width="20px"></a>
                      <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><img src="img/basura.png" alt="delete" width="20px"></a>
                    </td>
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
      </div>
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

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Usuario</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
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
                <option selected disable>Seleccione un rol</option>
                <?php 
                        $conexion = mysqli_connect("localhost", "root", "", "mydb");
                        if (!$conexion) {
                            die("Conexión fallida: " . mysqli_connect_error());
                        }

                        $sql = $conexion->query("SELECT * FROM Roles");
                        while($resultado = $sql->fetch_assoc()){
                          echo "<option value='".$resultado['idRoles']."'>".$resultado['NombreRol']."</option>";
                        }
                      ?>
              </select>
            </form>
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