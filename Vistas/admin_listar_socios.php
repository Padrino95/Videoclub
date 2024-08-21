<section class="container mt-5">
    <?php
    
echo "
<div class='container mt-5'>
    <form action='../Controladores/admin_buscar_socios.php' method='POST'>
        <div class='mb-3'>
            <label for='nombre' class='form-label'>Buscar por Nombre:</label>
            <input type='text' class='form-control' name='nombre'>
        </div>
        <button type='submit' class='btn btn-primary' name='enviarBuscarSocio'>Buscar</button>
    </form>
</div>

<div class='container mt-3 d-flex justify-content-star align-items-center'>
    <a href='../Controladores/admin_insertar_socio.php'>
        <button class='btn btn-success' name='añadirSocio'>Añadir</button>
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
                <th scope='col'>Id</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Nick</th>
                <th scope='col'>Modificar</th>
                <th scope='col'>Borrar</th>
            </tr>
        </thead>
        <tbody>
    ";
    foreach ($socios as  $value) {
        echo "
        <tr>
        <td> $value[id] </td>
        <td> $value[nombre] </td>
        <td> $value[nick] </td>
        <td><a href='../Controladores/admin_modificar_socio.php?id=$value[id]&nombre=$value[nombre]&nick=$value[nick]'>
                <button class='btn btn-warning' name='modificarSocio'>Modificar</button>
            </a>
        </td>
        <td><a href='../Controladores/admin_borrar_socio.php?id=$value[id]'>
                <button class='btn btn-danger' name='borrarSocio'>Borrar</button>
            </a>
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