<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../Assets/Styles/Styles.css" rel="stylesheet">
    <title>Serie Completa</title>
</head>

<body>
    <?php
    foreach ($datos as  $value) {
        echo "<section class='container mt-5'>
        <div class='row'>
            <div class='col'>
                <img src='../Assets/Imagenes/Series/$value[foto]' class='img-fluid mb-5'>
                <h2 class='text-center mb-5'>$value[nombre]</h2>
                <p>$value[descripcion]</p>
                <p></p>
            </div>
        </div>
    </section>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>