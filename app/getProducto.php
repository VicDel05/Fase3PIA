<?php

    $conexion = mysqli_connect("localhost", "root", "", "mydb");
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $id = $conexion->real_escape_string($_POST['id']);

    $sql = "SELECT CodigoProducto, NombreProducto, DescripcionProducto, CategoriaProducto_idCategoriaProducto, CantidadProducto, precioProducto, imagenProducto FROM Productos WHERE idProductos=$id LIMIT 1";

    $resultado = $conexion->query($sql);
    $rows = $resultado->num_rows;

    $producto = [];

    if($rows > 0){
        $producto = $resultado->fetch_array();
    }

    echo json_encode($producto, JSON_UNESCAPED_UNICODE);