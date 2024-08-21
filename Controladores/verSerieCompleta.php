    <?php
    require_once("../Funciones/funciones.php");
    require_once("../Modelos/series.php");
    require_once("../Bd/bd.php");
    require_once("../Modelos/lanzamiento.php");
    require_once("../Modelos/comentario.php");

    $id = checkLoggin();
    pintaMenu($id);
    $comentario = new comentario();
    if (isset($_GET["id"])) {
        $serie = new series();
        $datos = $serie->buscarSerieId($_GET["id"]);
        include("../Vistas/mostrarUnaSerie.php");

        $lanzamiento = new lanzamiento();
        $matrizLanzamiento = $lanzamiento->buscarLanzamientoPorSerie($_GET["id"]);
        include("../Vistas/lanzamientosSerie.php");

        if ($id > 0) {
            $comentarios = $comentario->buscarComentarioPorSerie($_GET["id"]);

            $mostrar;
            if ($comentario->comprobarComentario($id, $_GET['id'])) {
                $mostrar = 1;
            } else {
                $mostrar = 0;
            }
            include("../Vistas/verSerieCompletaUser.php");
        }
    }
    if (isset($_POST["enviarComentario"])) {
        $texto = trim($_POST["Comentario"]);
        $comentario->insertarComentario($id, $_POST["idSerie"], date('Y-m-d'), $_POST["Comentario"]);
        header("refresh:0;url=./verSerieCompleta.php?id=$_POST[idSerie]");
    }
    if (isset($_POST["borrar"])) {
        $comentario->borrarComentario($_POST["idSocio"], $_POST["idSerie"], $_POST["fecha"]);
        header("refresh:0;url=./verSerieCompleta.php?id=$_POST[idSerie]");
    }
    pintarFooter();
    ?>