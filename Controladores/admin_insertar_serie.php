<?php
require_once("../Bd/bd.php");
require_once("../Funciones/funciones.php");
require_once("../Modelos/series.php");
include("../Vistas/cabeceraSeriesAdmin.php");

$id = checkLoggin();
pintaMenu($id);
checkAdmin($id);

/////////////////////////////////////////////////INSERTAR SERIE/////////////////////////////////
if (isset($_POST['enviar'])) {
    $nombre= trim($_POST['nombre']);
    $descripcion= trim($_POST['descripcion']);

    // Procesamiento imagen
    $info = pathinfo($_FILES['imagen']['name']);
    $extension = $info['extension'];
    // if (!file_exists('../Assets/Imagenes/Series')) {
    //     mkdir("../Assets/Imagenes/Series");
    // }
    $serie = new series ();
    $id= $serie->siguienteSerie();
    move_uploaded_file($_FILES['imagen']['tmp_name'], "../Assets/Imagenes/Series/$id.$extension");

    $ruta = "$id.$extension";
    $serie->insertarSerie($nombre, $descripcion, $ruta);

    header("refresh:0; url=../Controladores/seriesAdmin.php");
}if (isset($_GET["enviar"])) {
    include("../Vistas/admin_insertar_serie.php");
}
 include("../Vistas/footerSeriesAdmin.php");