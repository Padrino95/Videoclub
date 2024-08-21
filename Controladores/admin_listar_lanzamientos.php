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

/////////////////////////////////////////////////LISTAR LANZAMIENTOS/////////////////////////////////
$lanzamiento = new lanzamiento();
$lanzamientos= $lanzamiento->listarLanzamientos();
include("../Vistas/admin_listar_lanzamientos.php");

include("../Vistas/footerSeriesAdmin.php");