<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../Assets/Styles/Styles.css" rel="stylesheet">
    <title>Plataformas</title>
</head>

<body>
    <section id="plataforma" class="container">
        <div class="row">
            <h1 class="text-center pt-3">Lanzamientos</h1>
            <?php
                echo"<div class='col'>";
                foreach ($lanzamientos as $value) {
                    echo"<div class='border-bottom border-dark mb-5'>
                    <img src='../Assets/Imagenes/Series/$value[foto]' class='img-fluid pt-5'>
                    <h3 class='text-center'>$value[nombre]</h3>
                    <p class='text-center'>".fechaEspañol($value["fecha"])."</p>
                    </div>";
                }
                echo"</div>";
            ?>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>