<?php
session_start();

if (isset($_SESSION['correo'])) {
    // Verificar si el usuario ya ha comentado
    $usuario = $_SESSION['correo'];
    $conexion = mysqli_connect("localhost", "root", "", "mydb");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    if (isset($_POST['comentario'])) {
        $comentario = $_POST['comentario'];

        // Preparar la consulta SQL para insertar el comentario
        $consulta = "INSERT INTO Comentarios (Comentario, Usuarios_idUsuarios) VALUES ('$comentario', '$usuario')";

        // Ejecutar la consulta
        if (mysqli_query($conexion, $consulta)) {
            echo "Comentario publicado exitosamente.";
        } else {
            echo "Error al publicar el comentario: " . mysqli_error($conexion);
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    } else {
        echo "Todos los campos son obligatorios.";
    }
    
    mysqli_close($conexion);
} else {
    echo "Debe iniciar sesión para publicar un comentario.";
}
?>