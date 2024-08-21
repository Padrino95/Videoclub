<?php
echo "
<section class='container mt-5'>
    <form action='../Controladores/admin_insertar_lanzamiento.php' method='POST' enctype='multipart/form-data'>
        <div class='mb-3'>
            <label for='serie' class='form-label'>Serie:</label>
            <select class='form-select' id='serie' name='serie' required>";
                foreach ($series as $value) {                
            echo"<option value='$value[id]'>$value[nombre]</option>
            ";
                }
            echo"</select>
        </div>
        <div class='mb-3'>
        <label for='plataforma' class='form-label'>plataforma:</label>
        <select class='form-select' id='plataforma' name='plataforma' required>";
            foreach ($plataformas as $value) {                
        echo"<option value='$value[id]'>$value[nombre]</option>
        ";
            }
        echo"</select>
    </div>
        <div class='mb-3'>
            <label for='fecha' class='form-label'>Fecha:</label>
            <input type='date' class='form-control' id='fecha' name='fecha'>
        </div>
        <button type='submit' class='btn btn-primary' name='enviar'>Enviar</button>
    </form>
</section>";
?>