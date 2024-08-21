<?php
require_once("../Bd/bd.php");
require_once("../Funciones/funciones.php");
require_once("../Modelos/series.php");
require_once("../Modelos/plataformas.php");
require_once("../Modelos/lanzamiento.php");
include("../Vistas/cabeceraSeriesAdmin.php");

$id = checkLoggin();
pintaMenu($id);
checkAdmin($id);

$plataforma = new plataformas();
$plataformas = $plataforma->listarPlataformas();
if (isset($_GET["error"])) {
    echo"<h1 class='text-center'>Debes introducir los datos correctamente</h1>";
    header("Refresh:2; url=./seriesAdmin.php");
}
//////////////////////////////////////////////////////DESACTIVAR SERIE/////////////////////////////////////////////////////////// 
if (isset($_GET['Desactivar'])) {
    $idSerie = $_GET['Desactivar'];
    $serie = new series();
    $serie->desactivarSerie($idSerie);
    header("Refresh:1; url=./seriesAdmin.php");
}

//////////////////////////////////////////////////////BUSCAR SERIE///////////////////////
if (isset($_POST['enviarBuscarSerie'])) {
    $nombre= trim($_POST['nombre']);
    $serie = new series();
    $seriesBusqueda = $serie->buscarSerieNombre($nombre);
    include("../Vistas/listarSeriesAdmin.php");
}


///////////////////////////////////////////MODIFICAR SERIE///////////////////////
if (isset($_GET["Modificar"]))  {
    $idSerie = $_GET["Modificar"];
    $serie = new series();
    $datos = $serie->buscarSerieId($idSerie);
    $nombre= $datos[0]["nombre"];
    $descripcion= $datos[0]["descripcion"];
    include("../Vistas/modificarSerieAdmin.php");
}
if (isset($_POST["enviarEditar"])) {
    if (!$_POST["nombre"] || !$_POST["descripcion"] ||!$_FILES["foto"] ||!$_POST["id"]) {
        $error=1;
        header("Refresh:0; url=./seriesAdmin.php?error=$error");
    }else{
        $nombre= trim($_POST["nombre"]);
        $descripcion= trim($_POST["descripcion"]);
        $idSerie= $_POST["id"];
        $serie = new series();

        // Procesamiento imagen
        $info = pathinfo($_FILES['foto']['name']);
        $extension = $info['extension'];
        if (!file_exists('../Assets/Imagenes/Series')) {
            mkdir("../Assets/Imagenes/Series");
        }
        move_uploaded_file($_FILES['foto']['tmp_name'], "../Assets/Imagenes/Series/$idSerie.$extension");

        $ruta = "$idSerie.$extension";

        $serie->modificarSerie($idSerie, $nombre, $descripcion, $ruta);
        header("Refresh:0; url=./seriesAdmin.php");
    }
}

//////////////////////////////////////////////////LISTAR SERIES///////////////////////
if (!isset($seriesBusqueda)) {
foreach ($plataformas as $value) {
    $lanzamiento = new lanzamiento();
    $series[$value["nombre"]] = $lanzamiento->buscarLanzamientoPorPlataforma($value["id"]);
}
include("../Vistas/listarSeriesAdmin.php");

}


include("../Vistas/footerSeriesAdmin.php");
