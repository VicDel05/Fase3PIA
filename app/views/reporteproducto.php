<?php 
    $conexion = mysqli_connect("localhost", "root", "", "mydb");
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM Productos INNER JOIN CategoriaProducto ON Productos.CategoriaProducto_idCategoriaProducto = CategoriaProducto.idCategoriaProducto ";
    $result = $conexion->query($query);

    mysqli_close($conexion);


?>
    <h4 class="fw-light">Reporte Productos</h4>
    <div id="printArea">
        <table class="table table-hover">
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
    

    <div class="mt-3">
        <button class="btn btn-dark" onclick="printSection()">Descargar reporte</button>
    </div>

    <script>
        function printSection() {
            var printContent = document.getElementById('printArea').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }
    </script>