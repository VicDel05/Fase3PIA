<?php 
    $conexion = mysqli_connect("localhost", "root", "", "mydb");
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM Ventas INNER JOIN Usuarios ON Ventas.Usuarios_idUsuarios = Usuarios.idUsuarios";
    $result = $conexion->query($query);

    mysqli_close($conexion);


?>

    <div id="printArea">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Tipo de pago</th>
                </tr>
            </thead>
            <tbody id="tablaproducto">
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