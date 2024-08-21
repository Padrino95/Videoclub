<?php
require_once("../Bd/bd.php");
require_once("../Funciones/funciones.php");
require_once("../Modelos/plataformas.php");



$id=checkLoggin();
pintaMenu($id);
checkAdmin($id);
// SOLO ADMIN==================================================================
$plataforma = new plataformas();
$listadoPlataformas = $plataforma->listarPlataformas();

$error= 0;
///////////////////////////////////////////////////////INSERTAR/////////////////////////////////////////////////////////// 
if (isset($_POST["enviarPlataforma"])) {
    if (!$_POST["Nombre"] || !$_FILES["logo"]) {
        $error=1;
    } else {
        $nombre = trim($_POST["Nombre"]);

        // Procesamiento imagen
        $info = pathinfo($_FILES['logo']['name']);
        $extension = $info['extension'];
        if (!file_exists('../Assets/Imagenes/Plataformas')) {
            mkdir("../Assets/Imagenes/Plataformas");
        }
        $id= $plataforma->siguientePlataforma();
        move_uploaded_file($_FILES['logo']['tmp_name'], "../Assets/Imagenes/Plataformas/$id.$extension");

        $ruta = "$id.$extension";
        $plataforma->insertarPlataforma($nombre, $ruta);
        header("refresh:0; url=../Controladores/plataformasAdmin.php");
    }
}
////////////////////////////////////////////////////MODIFICAR/////////////////////////////////////////////////////////
if (isset($_POST["modificarPlataforma"])) {
    if (!$_POST["Nombre"] || !$_FILES["logo"] || !$_POST["select"] || !$_POST["selectId"]) {
        $error=1;
    }else{
        $nombre= trim($_POST["Nombre"]);
        
        // sacamos la ruta de la imagen
        $conexion = conectar();
        $rutaBorrar = $conexion->prepare("select logotipo from plataformas where id =?");
        $rutaBorrar->bind_param("i", $_POST["selectId"]);
        $rutaBorrar->bind_result($ruta3);
        $rutaBorrar->execute();
        $rutaBorrar->fetch();
        $rutaBorrar->close();

        //borramos la iamgen de local 
        unlink("../Assets/Imagenes/Plataformas/$ruta3");

        // Procesamiento imagen
        $info = pathinfo($_FILES['logo']['name']);
        $extension = $info['extension'];
        if (!file_exists('../Assets/Imagenes/Plataformas')) {
            mkdir("../Assets/Imagenes/Plataformas");
        }
        $id= $_POST["selectId"];
        move_uploaded_file($_FILES['logo']['tmp_name'], "../Assets/Imagenes/Plataformas/$id.$extension");

        $logo = "$id.$extension";

        // Modificamos
        $plataforma->modificarPlataforma($_POST["selectId"], $nombre, $logo, '1');
        $conexion->close();
    }
}
///////////////////////////////////////////////////BUSCAR////////////////////////////////////////////////////////
if (isset($_POST["buscar"])) {
    if (!$_POST["Nombre"]) {
        $error=1;
    }else{
        $busqueda= trim($_POST["Nombre"]);
        $buscar=$plataforma->buscarPlataforma($busqueda);
    }
}
include("../Vistas/plataformasAdmin.php");
