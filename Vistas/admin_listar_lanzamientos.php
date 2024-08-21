<section>
<?php
    echo"<div class='container mt-3 d-flex justify-content-star align-items-center'>
    <a href='../Controladores/admin_insertar_lanzamiento.php?enviar'>
        <button class='btn btn-success' name='añadirLanzamiento'>Añadir</button>
    </a>
</div>";
?>
</section>
<section class="container mt-5 table-responsive">
    <?php
    echo "
    <table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th scope='col'>Serie</th>
                <th scope='col'>Plataforma</th>
                <th scope='col'>Fecha</th>
                <th scope='col'>Modificar</th>
                <th scope='col'>Borrar</th>
            </tr>
        </thead>
        <tbody>
    ";
    foreach ($lanzamientos as  $value) {
        echo "
        <tr>
        <td> $value[serie] </td>
        <td> $value[plataforma] </td>
        <td> ".fechaEspañol($value["fecha"])." </td>
        <td><form action='../Controladores/admin_modificar_lanzamiento.php' method='POST'>
                <input type='hidden' name='serie' value='$value[idSerie]'>
                <input type='hidden' name='plataforma' value='$value[idPlataforma]'>
                <button type='submit' class='btn btn-warning' name='modificarLanzamiento'>Modificar</button>
            </form>
        </td>
        <td><form action='../Controladores/admin_borrar_lanzamiento.php' method='POST'>
                <input type='hidden' name='serie' value='$value[idSerie]'>
                <input type='hidden' name='plataforma' value='$value[idPlataforma]'>
            <button type='submit' class='btn btn-warning' name='borrarLanzamiento'>Borrar</button>
        </form>
        </td>
    </tr>
        ";
    }
    echo "
    </tbody>
    </table>
    ";


    ?>
</section>