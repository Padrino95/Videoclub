<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="signin.css" rel="stylesheet">
    <link href="./Assets/Styles/Styles.css" rel="stylesheet">
    <title>Acceder</title>
</head>

<body>
    <?php
    
    if (isset($_GET["error"])) {
        if ($_GET["error"] == 1) {
            echo "<h1 class='text-center'>Debes introducir todos los datos correctamente</h1>";
            header("Refresh:2; url=../Vistas/acceso.php");
        } elseif ($_GET["error"] == 2) {
            echo "<h1 class='text-center'>Usuario o contraseña incorrectos</h1>";
            header("Refresh:2; url=../Vistas/acceso.php");
        }
    }
    ?>
    <main>
        <section class="container form-signin pt-5 color">
            <div class="row justify-content-center">
                <form action="../Controladores/control_acceso.php" method="post" class="col-4">
                    <div class="text-center">
                        <img class="mb-4" src="data:image/png;base64,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" alt="" width="72" height="57">
                        <h1 class="h3 mb-3 fw-normal">Ingrese sus datos</h1>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="nick" placeholder="Usuario">
                        <label for="floatingInput">Usuario</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Contraseña">
                        <label for="floatingPassword">Contraseña</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me" name="recordar"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="enviar">Sign in</button>
                    <p class="mt-5 mb-3 text-muted text-center">© 2017–2021</p>
                </form>
            </div>
            <div class='container mt-3 d-flex justify-content-center align-items-center'>
    <a href='../index.php' class='text-center'>
        <button class='btn btn-success btn-lg' name='añadirLanzamiento'>Volver</button>
    </a>
</div>
        </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>