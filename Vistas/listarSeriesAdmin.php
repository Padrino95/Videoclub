<section>
    <?php
        echo"<div class='container mt-3 d-flex justify-content-star align-items-center'>
                <a href='../Controladores/admin_insertar_serie.php?enviar'>
                    <button class='btn btn-success' name='añadirSocio'>Añadir</button>
                </a>
            </div>";
        echo"<div class='container mt-5'>
        <form action='../Controladores/seriesAdmin.php' method='POST'>
            <div class='mb-3'>
                <label for='nombre' class='form-label'>Buscar por Nombre:</label>
                <input type='text' class='form-control'  name='nombre'>
            </div>
            <button type='submit' class='btn btn-primary' name='enviarBuscarSerie'>Buscar</button>
        </form>
    </div>";
    echo"<div class='container-md'>
    <div class='row justify-content-center'>";
    if (isset($seriesBusqueda)) {
    foreach ($seriesBusqueda as $values3) {
        echo "<div class='col-md-3'>
    <div class='card '>  
        <img src='../Assets/Imagenes/Series/$values3[foto]' class='card-img-top img-fluid'>
                <div class='card-body'>
                 <h5 class='card-title'>$values3[nombre]</h5>
                 </div>
    </div>
        </div>";
    }
    echo "</div>";
}
    ?>
</section>
<section>
    <?php
    if (isset($series)) {
    echo "<div class='container-md'>";

    foreach ($series as $plataforma => $values) {
        echo "<h1 class='text-center mt-5'>$plataforma</h1><hr class='w-75 m-auto mb-5'>
    <div class='row'>";
        foreach ($values as $values2) {
            echo "<div class='col-md-3'>
        <div class='card '>  
            <img src='../Assets/Imagenes/Series/$values2[foto]' class='card-img-top img-fluid'>
                    <div class='card-body'>
                     <h5 class='card-title'>$values2[serie]</h5>
                     <a href='../Controladores/verSerieCompleta.php?id=$values2[idSerie]' class='btn btn-primary p-1'>Ver más</a>
                     <a href='../Controladores/seriesAdmin.php?Modificar=$values2[idSerie]' class='btn btn-danger p-1'>Modificar</a>
                     <a href='../Controladores/seriesAdmin.php?Desactivar=$values2[idSerie]' class='btn btn-danger p-1'>Desactivar</a>
                    </div>
        </div>
            </div>";
        }
        echo "</div>";
    }
}
    ?>
</section>