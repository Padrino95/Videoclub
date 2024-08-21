
<section class="container mt-5">
    <?php
    echo "
    <table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th scope='col'>Id</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Nick</th>
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
    </tr>
        ";
    }
    echo "
    </tbody>
    </table>
    ";


    ?>
</section>