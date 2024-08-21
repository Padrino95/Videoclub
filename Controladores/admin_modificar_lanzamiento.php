<?php
require_once("../Bd/bd.php");
require_once("../Funciones/funciones.php");
require_once("../Modelos/socios.php");
require_once("../Modelos/series.php");
require_once("../Modelos/lanzamiento.php");
require_once("../Modelos/plataformas.php");
include("../Vistas/cabeceraSeriesAdmin.php");

$id = checkLoggin();
pintaMenu($id);
checkAdmin($id);

/////////////////////////////////////////////////MODIFICAR LANZAMIENTO/////////////////////////////////
if (isset($_POST['enviar'])) {
    $serie= $_POST['serie'];
    $plataforma= $_POST['plataforma'];

   $lanzamiento = new lanzamiento();
   $lanzamiento->modificarLanzamiento($serie, $plataforma, $_POST['fecha']);
    header("refresh:100; url=../Controladores/admin_listar_socios.php");
}elseif (isset($_POST["modificarLanzamiento"])) {
    $idSerie= $_POST["serie"];
    $idPlataforma= $_POST["plataforma"];

    $serie= new series();
    $plataforma= new plataformas();
    $series= $serie->listarSeries();
    $plataformas= $plataforma->listarPlataformas();

    include("../Vistas/admin_modificar_lanzamiento.php");
}
 include("../Vistas/footerSeriesAdmin.php");