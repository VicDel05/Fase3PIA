<?php
session_start();

// // Verificar si el usuario ha iniciado sesión
// if (!isset($_SESSION['correo'])) {
//     header("Location: index.php");
//     exit;
// }

if (isset($_POST['codigo']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['categoria']) && isset($_POST['cantidad']) && isset($_POST['precio']) && isset($_POST['imagen'])) {

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $conexion = mysqli_connect("localhost", "root", "", "mydb");
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Preparar la consulta para insertar la cita en la base de datos
    $query = "INSERT INTO Productos (CodigoProducto, NombreProducto, DescripcionProducto, CantidadProducto, precioProducto, CategoriaProducto_idCategoriaProducto, imagenProducto) VALUES ('$codigo', '$nombre', '$descripcion', '$cantidad', '$precio', '$categoria', '$imagen')"; 
    if (mysqli_query($conexion, $query)) {
        echo "Registro exitoso.";
        header("Location: views/modprodreg.php"); 
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}else{
    echo "Todos los campos son obligatorios.";
}
mysqli_close($conexion);
?>