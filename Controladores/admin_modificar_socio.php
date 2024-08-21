<?php
require_once("../Bd/bd.php");
require_once("../Funciones/funciones.php");
require_once("../Modelos/socios.php");
include("../Vistas/cabeceraSeriesAdmin.php");

$id = checkLoggin();
pintaMenu($id);
checkAdmin($id);

/////////////////////////////////////////////////MODIFICAR SOCIOS/////////////////////////////////
if (isset($_POST['enviar'])) {
    $nombre= trim($_POST['nombre']);
    $nick= trim($_POST['nick']);
    $pass= trim($_POST['contrasena']);
    
    if ($nombre != "" && $nick != "" && $pass != "") {
    $socio = new socios();
    $socios= $socio->modificarSocio($_POST["id"],$nombre, $nick, $pass);
    header("refresh:0; url=../Controladores/admin_listar_socios.php");
    }else{
        header("refresh:0; url=./admin_listar_socios.php");
    }
}else{
    include("../Vistas/admin_modificar_socio.php");
}
 include("../Vistas/footerSeriesAdmin.php");