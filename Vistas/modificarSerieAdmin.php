<?php
echo"
<section class='container mt-5'>
<form action='../Controladores/seriesAdmin.php' method='post' enctype='multipart/form-data'>
    <div class='mb-3'>
        <label for='id' class='form-label'>ID:</label>
        <input type='text' class='form-control' id='id' name='id' value='$idSerie'>
    </div>
    <div class='mb-3'>
        <label for='nombre' class='form-label'>Nombre:</label>
        <input type='text' class='form-control' id='nombre' name='nombre' value='$nombre'>
    </div>
    <div class='mb-3'>
        <label for='descripcion' class='form-label'>Descripción:</label>
        <textarea class='form-control' id='descripcion' name='descripcion' rows='3' >$descripcion</textarea>
    </div>
    <div class='mb-3'>
        <label for='foto' class='form-label'>Foto:</label>
        <input type='file' class='form-control' id='foto' name='foto'>
    </div>
    <button type='submit' class='btn btn-primary' name='enviarEditar'>Editar</button>
</form>
</section>
";
?>