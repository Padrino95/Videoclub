<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./Assets/Styles/Styles.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <main>
        <section>
<?php

echo "<div class='container-md'>";

foreach ($series as $plataforma=>$values) {
    echo"<h1 class='text-center mt-5'>$plataforma</h1><hr class='w-75 m-auto mb-5'>
    <div class='row'>";
    foreach ($values as $values2)
    // print_r($values2);
        echo "<div class='col-md-3'>
        <div class='card '>  
            <img src='../Assets/Imagenes/Series/$values2[foto]' class='card-img-top img-fluid'>
                    <div class='card-body'>
                     <h5 class='card-title'>$values2[serie]</h5>
                     <a href='../Controladores/verSerieCompleta.php?id=$values2[idSerie]' class='btn btn-primary'>Ver más</a>
                 </div>
                 </div>
            </div>";
}
echo "      
        </div>
    </div>
";
?>
  </section>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            </body>
            <?php pintarFooter(); ?>

            </html>