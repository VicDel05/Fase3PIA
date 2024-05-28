<?php
session_start();

if (isset($_POST['cp']) && isset($_POST['calle']) && isset($_POST['numero']) && isset($_POST['colonia']) && isset($_POST['municipio']) && isset($_POST['entrecalles'])) {
 
    $cp = $_POST['cp'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
    $municipio = $_POST['municipio'];
    $entrecalles = $_POST['entrecalles'];
    $usuario = $_SESSION['correo'];

 
    $conexion = mysqli_connect("localhost", "root", "", "mydb");
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }


    $insertar = "INSERT INTO Direccion (CpDireccion, CalleDireccion, NumeroDireccion, ColoniaDireccion, MunicipioDireccion, EntreCalleDireccion, Usuarios_idUsuarios) VALUES ('$cp', '$calle', '$numero', '$colonia', '$municipio', '$entrecalles', '$usuario')";
        if (mysqli_query($conexion, $insertar)) {
            echo "Registro exitoso.";
            header("Location: cuenta.php"); 
            exit; 
        } else {
            echo "Error: " . $insertar . "<br>" . mysqli_error($conexion);
        }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
} else {
    echo "Todos los campos son obligatorios.";
}
?>