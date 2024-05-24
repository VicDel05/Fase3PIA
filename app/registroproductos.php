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

$query = "SELECT * FROM Productos";
$resultado = mysqli_query($conexion, $query);
$productos = [];

while ($fila = mysqli_fetch_assoc($resultado)) {
    $productos[] = $fila;
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
            <div class="col-12 col-md-6">
                <form id="regProd">
                <div class="mb-3">
                    <label for="txtcodigo" class="form-label">Código del producto (5 caracteres)</label>
                    <input type="text" class="form-control" id="txtcodigo" placeholder="LP244" name="codigo">
                </div>
                <div class="mb-3">
                    <label for="txtnombreP" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control" id="txtnombreP" placeholder="Pluma" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="txtdescrip" class="form-label">Descripcion del producto</label>
                    <textarea class="form-control" id="txtdescrip" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="opccategoria" class="form-label">Categoria del producto</label>
                    <select id="opccategoria" class="form-select">
                    <option selected value="1">Cuadernos y libretas</option>
                    <option value="2">Hojas y Papeles</option>
                    <option value="3">Carpetas y Archivadore</option>
                    <option value="4">Bolígrafos y Plumas</option>
                    <option value="5">Lápices y Portaminas</option>
                    <option value="6">Rotuladores, Marcadores y Plumones</option>
                    <option value="7">Crayones y Ceras</option>
                    <option value="8">Grapadoras y Perforadoras</option>
                    <option value="9">Clips, cintas y Sujetapapeles</option>
                    <option value="10">Tijeras y Cúteres</option>
                    <option value="11">Organizadores y Carpetas</option>
                    <option value="12">Pinturas</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="txtcantidad" class="form-label">Cantidad del piezas en inventario</label>
                    <input type="text" class="form-control" id="txtcantidad" placeholder="10" name="cantidad">
                </div>
                <div class="mb-3">
                    <label for="txtprecio" class="form-label">Precio del producto</label>
                    <input type="text" class="form-control" id="txtprecio" placeholder="$35" name="precio">
                </div>
                <div class="mb-3">
                    <label for="txtimg" class="form-label">Imagen del producto</label>
                    <input type="text" class="form-control" id="txtimg" placeholder="URL" name="imagen">
                </div>
                    <div class="mt-3">
                    <button type="submit" class="btn btn-success mx-3 mb-3">Crear</button>
                    <button type="" class="btn btn-warning mx-3 mb-3">Modificar</button>
                    <button type="" class="btn btn-primary mx-3 mb-3">Buscar</button>
                    <button type="" class="btn btn-danger mx-3 mb-3">Eliminar</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
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
                        </tr>
                    </thead>
                    <tbody id="tablaproducto">

                    </tbody>
                </table>
            </div>
        </div>

        
    </div>
    

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Producto registrado exitosamente
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const producto = <?php echo json_encode($productos); ?>;
            // const searchInput = document.getElementById('termino_busqueda');
            const tableBody = document.getElementById('tablaproducto');

            function mostrarProducto(filtradas) {
                tableBody.innerHTML = '';
                filtradas.forEach(cita => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${producto.idProductos}</td>
                        <td>${producto.CodigoProducto}</td>
                        <td>${producto.NombreProducto}</td>
                        <td>${producto.DescripcionProducto}</td>
                        <td>${producto.CategoriaProducto_idCategoriaProducto}</td>
                        <td>${producto.CantidadProducto}</td>
                        <td>${producto.precioProducto}</td>
                    `;
                    tableBody.appendChild(row);
                });
            }

            searchInput.addEventListener('input', function() {
                const termino = searchInput.value.toLowerCase();
                const filtradas = citas.filter(cita => 
                    cita.IdCita.toString().includes(termino) || 
                    cita.FechaCita.toLowerCase().includes(termino) || 
                    cita.HoraCita.toLowerCase().includes(termino) || 
                    cita.UsuarioIdUsuario.toString().includes(termino)
                );
                mostrarCitas(filtradas);
            });

            mostrarCitas(citas);
        });
    </script>
</body>
</html>