<?php
require_once("../Bd/bd.php");
require_once("../Funciones/funciones.php");
require_once("../Modelos/socios.php");
require_once("../Modelos/lanzamiento.php");
include("../Vistas/cabeceraSeriesAdmin.php");

$id = checkLoggin();
pintaMenu($id);
checkAdmin($id);

/////////////////////////////////////////////////BORRAR LANZAMIENTO/////////////////////////////////
if (isset($_POST['borrarLanzamiento'])) {
    $lanzamiento = new lanzamiento();
    $lanzamiento->borrarLanzamiento($_POST["serie"], $_POST["plataforma"]);
    include("../Vistas/footerSeriesAdmin.php");
    header("refresh:0; url=../Controladores/admin_listar_lanzamientos.php");
}