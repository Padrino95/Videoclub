<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanzamientos por serie</title>
</head>

<body>
    <section class="container">
        <div class="row justify-content-center">
            <h2 class="text-center">Disponible en</h2>
            <?php
            foreach ($matrizLanzamiento as $lanzamientoSerie) {
                echo"<div class='col-md-4 p-3 m-1 mt-4 bg-danger border border-warning rounded'>
                <h3 class='text-center'>$lanzamientoSerie[plataforma]</h3>
                <p class='text-center m-0'>".fechaEspañol($lanzamientoSerie["fecha"])."</p>
                </div>";
            }
            ?>
        </div>
    </section>
</body>

</html>