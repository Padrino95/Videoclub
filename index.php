<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./Assets/Styles/Styles.css" rel="stylesheet">
    <title>Videoclub</title>
</head>

<body>
    <?php
    require_once("./Funciones/funciones.php");
    require_once("./Modelos/comentario.php");
    require_once("./Modelos/lanzamiento.php");
    require_once("./Modelos/plataformas.php");
    // require_once("./Modelos/socios.php");
    require_once("./Bd/bd.php");

    ////////////////////////////////////////////////////////////////////////////COMPRUEBA SI HAY SESION Y PINTA CABECERA/////////////////////////////////////////////////////////
    pintaMenuIndex(checkLoggin());


    /////////////////////////////////////////////////////////////////////////////ULTIMOS 4 LANZAMIENTOS POR PLATAFORMA////////////////////////////////////////////////////////////
    $lanzamiento = new lanzamiento();
    $plataforma = new plataformas();

    $listadoPlataformas = $plataforma->listarPlataformas();
    echo "<section class='container-md mt-5'>";
    foreach ($listadoPlataformas as $value) {
        echo "<div class='row  row-gap-3'>";
        echo "<h1 class='text-center mt-5'>$value[nombre]</h1><hr>";
        $listadoLanzamiento = $lanzamiento->ultimosLanzamientos($value["id"]);
        foreach ($listadoLanzamiento as $values) {
            echo "<div class='col-sm-6 col-md-3'>
                        <div class='card bg-secondary h-100'>
                            <img src='./Assets/Imagenes/Series/$values[foto]' class='card-img-top img-fluid' >
                            <div class='card-body'>
                                <h5 class='card-title'>$values[serie]</h5>
                                <p class='card-text'>".fechaEspañol($values["fecha"])."</p>
                            </div>
                        </div>
                    </div>";
        }
        echo "</div>";
    }
    echo "</section>";
    ?>
    <!--/////////////////////////////////////////////////////////////////////////////ULTIMOS 5 COMENTARIOS///////////////////////////////////////////////////////////////////////////////////-->
    <section class="container mt-5 p-0">
        <div class="row">
            <?php
            $comentario = new comentario();
            carrouselComentarios($comentario->ultimos5Comentarios());
            ?>
        </div>
    </section>
    <!--////////////////////////////////////////////////////////////////////////////PINTAR FOOTER////////////////////////////////////////////////////////////////////////////////////////////-->
    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>