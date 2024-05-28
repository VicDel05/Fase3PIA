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


  $idEtiqueta = isset($_GET['id']) ? intval($_GET['id']) : 0;

  $sql = "SELECT * FROM Productos WHERE idProductos = $idEtiqueta";
  $res = $conexion->query($sql);


  $query = "SELECT * FROM Productos INNER JOIN CategoriaProducto ON Productos.CategoriaProducto_idCategoriaProducto = CategoriaProducto.idCategoriaProducto ";
  $result = $conexion->query($query);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Datos del formulario
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        // Actualiza la etiqueta
        
        $sql = "UPDATE Productos SET CodigoProducto ='$codigo',NombreProducto='$nombre',DescripcionProducto='$descripcion',CantidadProducto='$cantidad',precioProducto='$precio',CategoriaProducto_idCategoriaProducto='$categoria',imagenProducto='$imagen' WHERE idProductos='$idEtiqueta'"; 
    
        // Vincular parámetros y ejecutar la consulta
        
        $exc = $conexion->query($sql);
        // Redirigir después de la actualización
        header("Location: registroproductos.php");
        exit();
    }

  if ($res->num_rows > 0) {
    // Crear un array para almacenar los datos de las etiquetas
    $productos = array();

    // Recorrer los resultados y guardarlos en el array
    while ($fila = $res->fetch_assoc()) {
        $productos[] = $fila;
    }
    } else {
    // Si no hay resultados, mostrar un mensaje
    echo "<p>No se encontraron productos.</p>";
}

  mysqli_close($conexion);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar productos</title>
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
                <a class="nav-link text-primary" href="registroproductos.php">Producto</a>
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
        <h1 class="fw-normal mt-3">Productos</h1>
        <div class="row">
            <div class="col-12 col-md-4">
                <?php foreach ($productos as $producto) {  ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="txtcodigo" class="form-label">Código del producto (5 caracteres)</label>
                        <input type="text" class="form-control" id="txtcodigo" placeholder="LP244" name="codigo" value="<?php echo $producto['CodigoProducto']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txtnombreP" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control" id="txtnombreP" placeholder="Pluma" name="nombre" value="<?php echo $producto['NombreProducto']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txtdescrip" class="form-label">Descripcion del producto</label>
                        <textarea class="form-control" id="txtdescrip" rows="3" name="descripcion" value=""><?php echo $producto['DescripcionProducto']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="opccategoria" class="form-label">Categoria del producto</label>
                        <select id="opccategoria" class="form-select" name="categoria" >
                        <option selected disable>Seleccione una categoria</option>
                        <?php 
                        $conexion = mysqli_connect("localhost", "root", "", "mydb");
                        if (!$conexion) {
                            die("Conexión fallida: " . mysqli_connect_error());
                        }

                        $sql = $conexion->query("SELECT * FROM CategoriaProducto");
                        while($resultado = $sql->fetch_assoc()){
                            echo "<option value='".$resultado['idCategoriaProducto']."'>".$resultado['NombreCategoria']."</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtcantidad" class="form-label">Cantidad del piezas en inventario</label>
                        <input type="text" class="form-control" id="txtcantidad" placeholder="10" name="cantidad" value="<?php echo $producto['CantidadProducto']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txtprecio" class="form-label">Precio del producto</label>
                        <input type="text" class="form-control" id="txtprecio" placeholder="$35" name="precio" value="<?php echo $producto['precioProducto']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txtimg" class="form-label">Imagen del producto</label>
                        <input type="text" class="form-control" id="txtimg" placeholder="URL" name="imagen" value="<?php echo $producto['imagenProducto']; ?>">
                    </div>
                    <div class="mt-3">
                    <button type="submit" class="btn btn-success mx-3 mb-3">Crear</button>
                    </div>
                </form>
                <?php } ?>
            </div>
            <div class="col-12 col-md-8">
                <table class="table tb">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tablaproducto">
                    <?php if ($result->num_rows > 0): ?>
                  <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['idProductos']; ?></td>
                        <td><?php echo $row['CodigoProducto']; ?></td>
                        <td><?php echo $row['NombreProducto']; ?></td>
                        <td><?php echo $row['DescripcionProducto']; ?></td>
                        <td><?php echo $row['NombreCategoria']; ?></td>
                        <td><?php echo $row['CantidadProducto']; ?></td>
                        <td><?php echo $row['precioProducto']; ?></td>
                        <td>
                            <?php foreach ($productos as $producto) {?>
                            <a href="./updateproductos.php?id=<?php echo $producto['idProductos']; ?>" class="btn btn-warning" id="edit-btn"><img src="img/editar.png" alt="update" width="20px"></a>
                            <?php } ?>
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


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- JS -->
    
</body>
</html>