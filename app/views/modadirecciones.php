<?php 

    $usuario = $_SESSION['correo'];

    $conexion = mysqli_connect("localhost", "root", "", "mydb");
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM Direccion WHERE Usuarios_idUsuarios='$usuario'";
    $result = $conexion->query($query);
    mysqli_close($conexion);

?>

    <div class="modal fade" id="dirModal" tabindex="-1" aria-labelledby="dirModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="dirModalLabel">Direcciones</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <table class="table table-hover">
                <thead>
                        <tr>
                            <th>C.P.</th>
                            <th>Calle</th>
                            <th>Numero</th>
                            <th>Colonia</th>
                            <th>Municipio</th>
                            <th>Entre calles</th>
                        </tr>
                    </thead>
                    <tbody id="">
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['CpDireccion']; ?></td>
                                    <td><?php echo $row['CalleDireccion']; ?></td>
                                    <td><?php echo $row['NumeroDireccion']; ?></td>
                                    <td><?php echo $row['ColoniaDireccion']; ?></td>
                                    <td><?php echo $row['MunicipioDireccion']; ?></td>
                                    <td><?php echo $row['EntreCalleDireccion']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">No hay registros</td>
                                </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>