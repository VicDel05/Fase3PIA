<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Link de CSS -->
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg barraNav">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/QC-logo.png" alt="" width="75px" class="rounded"></a>
        </div>
    </nav>
    
    <div class="container p-5 ">

        <div class="container-fluid p-3 formulario">
            <h1 class="text-center">Inicia sesión</h1>
            <div class="row m-auto">
                <div class="col-12 col-lg-4 text-center">
                   <img src="img/QC-logo.png" alt="logo" class="img-fluid img1">
                </div>
                <div class="col-12 col-lg-8 m-auto">
                    <form id="log" action="validar-login.php" method="post">
                        <label class="mt-2" for="txtcorreo">Correo</label>
                        <input type="text" class="form-control" name="correo" id="txtcorreo" placeholder="example@gmail.com" required>
                        <label class="mt-2" for="txtpass">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" id="txtpass" required>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-light">Ingresar</button>
                        </div>
                    </form>
                    
                    <div class="mt-3">
                        <p>Si aún no tiene una cuenta <a href="signup.php">registrate ahora</a></p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>
</html>