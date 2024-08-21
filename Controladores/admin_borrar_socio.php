<?php
require_once("../Bd/bd.php");
require_once("../Funciones/funciones.php");
require_once("../Modelos/socios.php");
include("../Vistas/cabeceraSeriesAdmin.php");
$id = checkLoggin();
pintaMenu($id);
checkAdmin($id);

/////////////////////////////////////////////////DESACTIVAR SOCIOS/////////////////////////////////
if (isset($_GET['id'])) {
    $socio = new socios();
    $socios= $socio->desactivarSocio($_GET["id"]);
    header("refresh:0; url=../Controladores/admin_listar_socios.php");
}
//  include("../Vistas/footerSeriesAdmin.php");