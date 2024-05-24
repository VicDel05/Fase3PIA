<?php
session_start();

if (isset($_POST['nombre']) && isset($_POST['apeillidop']) && isset($_POST['apeillidom']) && isset($_POST['correo']) && isset($_POST['contrasena'])) {
 
    $nombre = $_POST['nombre'];
    $apellidop = $_POST['apeillidop'];
    $apellidom = $_POST['apeillidom'];
    $correo = $_POST['correo'];
    $pass = $_POST['contrasena'];

 
    $conexion = mysqli_connect("localhost", "root", "", "mydb");


    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $consulta = "SELECT * FROM Usuarios WHERE CorreoUsuario = '$correo'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_num_rows($resultado);

    if ($filas > 0) {
        
        echo "El correo ya ha sido registrado.";
    } else {
        
        $insertar = "INSERT INTO Usuarios (NombreUsuaros, ApellidopUsuarios, ApellidomUsuario, CorreoUsuario, ContrasenaUsuario, Roles_idRoles) VALUES ('$nombre', '$apellidop', '$apellidom', '$correo', '$pass', 2)";
        if (mysqli_query($conexion, $insertar)) {
            echo "Registro exitoso.";
            header("Location: login.php"); 
            exit; 
        } else {
            echo "Error: " . $insertar . "<br>" . mysqli_error($conexion);
        }
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
} else {
    echo "Todos los campos son obligatorios.";
}
?>