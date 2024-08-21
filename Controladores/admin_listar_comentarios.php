<?php
require_once("../Bd/bd.php");
require_once("../Funciones/funciones.php");
require_once("../Modelos/series.php");
require_once("../Modelos/plataformas.php");
require_once("../Modelos/lanzamiento.php");
require_once("../Modelos/comentario.php");
include("../Vistas/cabeceraSeriesAdmin.php");

$id = checkLoggin();
pintaMenu($id);
checkAdmin($id);
/////////////////////////////////////////////////LISTAR COMENTARIOS/////////////////////////////////
$comentario = new comentario();
$comentarios= $comentario->listarComentarios();
include("../Vistas/admin_listar_comentarios.php");

include("../Vistas/footerSeriesAdmin.php");