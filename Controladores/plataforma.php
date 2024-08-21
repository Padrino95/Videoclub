<?php
    require_once("../Modelos/lanzamiento.php");
    require_once("../Bd/bd.php");
    require_once("../Funciones/funciones.php");

    $id=checkLoggin();
    pintaMenu($id);
    $lanzamiento= new lanzamiento();
    $lanzamientos= $lanzamiento->listarSeriesPlataforma($_GET["id"]);
    include("../Vistas/plataforma.php");
    pintarFooter();
?>