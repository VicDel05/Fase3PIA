<?php
session_start();

if (isset($_POST['numerotarjeta']) && isset($_POST['titular']) && isset($_POST['metodpago']) && isset($_POST['fechaven']) && isset($_POST['cvv'])) {
 
    $numerotarjeta = $_POST['numerotarjeta'];
    $titular = $_POST['titular'];
    $metodpago = $_POST['metodpago'];
    $fechaven = $_POST['fechaven'];
    $cvv = $_POST['cvv'];

 
    $conexion = mysqli_connect("localhost", "root", "", "mydb");
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }


    $insertar = "INSERT INTO TipoPago (titularTarjeta, tipoTarjeta, numeroTarjeta, fechaVencimiento, cvv) VALUES ('$titular', '$metodpago', '$numerotarjeta', '$fechaven', '$cvv')";
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