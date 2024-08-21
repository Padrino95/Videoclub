<?php
    require_once("../Bd/bd.php");
    require_once("../Funciones/funciones.php");
    require_once("../Modelos/plataformas.php");
    $id=checkLoggin();
    pintaMenu($id);
    $plataforma= new plataformas ();
    $listadoPlataformas= $plataforma->listarPlataformas();
    include("../Vistas/plataformas.php");
?>