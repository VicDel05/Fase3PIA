<?php 
    $conexion = mysqli_connect("localhost", "root", "", "mydb");
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM Comentarios INNER JOIN Usuarios ON Comentarios.Usuarios_idUsuarios  = Usuarios.idUsuarios";
    $result = $conexion->query($query);

    mysqli_close($conexion);


?>
    <div id="printArea">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Comentario</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody id="">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['idComentario']; ?></td>
                            <td><?php echo $row['Comentario']; ?></td>
                            <td><?php echo $row['NombreUsuaros']; ?></td>
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
    