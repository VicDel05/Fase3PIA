<?php
session_start();

if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
    $usuario = trim($_POST['correo']);
    $pass = trim($_POST['contrasena']);

    $conexion = new mysqli("localhost", "root", "", "mydb");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Usar consultas preparadas para evitar inyecciones SQL
    $stmt = $conexion->prepare("SELECT idUsuarios, Roles_idRoles, ContrasenaUsuario FROM Usuarios WHERE CorreoUsuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($idUsuarios, $Roles_idRoles, $ContrasenaUsuario);
        $stmt->fetch();

        // Comparar las contraseñas directamente (sin hash)
        if ($pass === $ContrasenaUsuario) {
            $_SESSION['correo'] = $idUsuarios; // Asegúrate de almacenar el ID de usuario
            $_SESSION['rol'] = $Roles_idRoles;


            if ($Roles_idRoles == 1) {
                // Usuario es administrador, redirigir a la interfaz de administrador
                header("Location: inicioAdmin.php");
                exit;
            } else if ($Roles_idRoles == 2) {
                // Usuario es cliente, redirigir a la interfaz de usuario
                header("Location: index.php");
                exit;
            } else {
                echo "Rol de usuario no válido. <br>";
            }
        } else {
            echo "Credenciales incorrectas. <br>";
        }
    } else {
        echo "Credenciales incorrectas. <br>";
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Todos los campos son obligatorios. <br>";
}
?>