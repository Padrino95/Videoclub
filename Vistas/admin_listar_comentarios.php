
<section class="container mt-5 table-responsive">
    <?php
    echo "
    <table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th scope='col'>Serie</th>
                <th scope='col'>Socio</th>
                <th scope='col'>Fecha</th>
                <th scope='col'>Texto</th>
                <th scope='col'>Borrar</th>
            </tr>
        </thead>
        <tbody>
    ";
    foreach ($comentarios as  $value) {
        echo "
        <tr>
        <td> $value[serie] </td>
        <td> $value[socio] </td>
        <td> ".fechaEspañol($value["fecha"])." </td>
        <td> $value[texto] </td>
        <td><form action='../Controladores/admin_borrar_comentario.php' method='POST'>
                <input type='hidden' name='serie' value='$value[idSerie]'>
                <input type='hidden' name='socio' value='$value[idSocio]'>
                <input type='hidden' name='fecha' value='$value[fecha]'>
            <button type='submit' class='btn btn-danger' name='borrarComentario'>Borrar</button>
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