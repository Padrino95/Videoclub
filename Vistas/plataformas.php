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
    <section id="plataformas" class="container">
        <div class="row">
            <h1 class="text-center pt-3">Plataformas disponibles</h1>
            <?php
                foreach ($listadoPlataformas as $value) {
                    echo"<div class='col-md-4 mt-5'>
                    <a href='./plataforma.php?id=$value[id]'><img src='../Assets/Imagenes/Plataformas/$value[logotipo]' class='img-fluid plataformas'></a>
                    </div>";        
                }
            ?>
        </div>
    </section>
</body>
<?php pintarFooter() ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>