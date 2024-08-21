<?php
require_once("../Bd/bd.php");
require_once("../Funciones/funciones.php");
require_once("../Modelos/socios.php");
require_once("../Modelos/lanzamiento.php");
require_once("../Modelos/comentario.php");
include("../Vistas/cabeceraSeriesAdmin.php");
$id = checkLoggin();
pintaMenu($id);
checkAdmin($id);

/////////////////////////////////////////////////BORRAR COMENTARIO/////////////////////////////////
if (isset($_POST['borrarComentario'])) {
    $comentario = new comentario();
    $comentario->borrarComentario($_POST["socio"],$_POST["serie"], $_POST["fecha"]);
    include("../Vistas/footerSeriesAdmin.php");
    header("refresh:100; url=../Controladores/admin_listar_comentarios.php");
}   