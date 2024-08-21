<?php
require_once("../Bd/bd.php");
require_once("../Funciones/funciones.php");
require_once("../Modelos/series.php");
require_once("../Modelos/plataformas.php");
require_once("../Modelos/lanzamiento.php");
require_once("../Modelos/socios.php");
include("../Vistas/cabeceraSeriesAdmin.php");

$id = checkLoggin();
pintaMenu($id);
checkAdmin($id);

/////////////////////////////////////////////////LISTAR SOCIOS/////////////////////////////////
$socio = new socios();
$socios= $socio->listarSocios();
include("../Vistas/admin_listar_socios.php");

include("../Vistas/footerSeriesAdmin.php");