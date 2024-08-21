<?php
echo"
<section class='container mt-5'>
    <form action='../Controladores/admin_insertar_serie.php' method='POST' enctype='multipart/form-data'>
        <div class='mb-3'>
            <label for='nombre' class='form-label' >Nombre:</label>
            <input type='text' class='form-control' id='nombre' name='nombre' required>
        </div>
        <div class='mb-3'>
            <label for='descripcion' class='form-label'>descripcion:</label>
            <input type='text' class='form-control' id='descripcion' name='descripcion' required>
        </div>
        <div class='mb-3'>
            <label for='imagen' class='form-label'>Imagen:</label>
            <input type='file' class='form-control' id='imagen' name='imagen' required>
        </div>
        <button type='submit' class='btn btn-primary' name='enviar'>Enviar</button>
    </form>
</section>
";
?>