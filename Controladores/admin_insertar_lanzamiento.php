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

/////////////////////////////////////////////////AÑADIR LANZAMIENTO/////////////////////////////////
if (isset($_POST["enviar"])) {
    $lanzamiento = new lanzamiento();
    $lanzamientos= $lanzamiento->insertarLanzamiento($_POST["serie"], $_POST["plataforma"], $_POST["fecha"]);
}elseif (isset($_GET["enviar"])) {
    $serie= new series();
    $plataforma= new plataformas();
    $series= $serie->listarSeries();
    $plataformas= $plataforma->listarPlataformas();
    include("../Vistas/admin_insertar_lanzamiento.php");
}

include("../Vistas/footerSeriesAdmin.php");