<?php
if (isset($_POST["enviar"])) {
    $error=0;
    if (!$_POST["nick"] || !$_POST["pass"]) {
        $error=1;
        header("Refresh:0; url=../Vistas/acceso.php?error=$error");
    }else{
        $nick= trim($_POST["nick"]);
        $pass= trim($_POST["pass"]);
        require_once("../Bd/bd.php");
        require_once("../Modelos/socios.php");
        $socio= new socios();
        $id= $socio->loginSocio($nick, $pass);
        if ($id==-1) {
            $error=2;
            header("Refresh:0; url=../Vistas/acceso.php?error=$error");
        }else{
            require_once("../Funciones/funciones.php");
            $conexion= conectar();
            $consulta= $conexion->query("SELECT nombre FROM socios WHERE id=$id");
            $res= $consulta->fetch_array(MYSQLI_ASSOC);
            session_start();
            $_SESSION["id"]=$id;
            $_SESSION["nombre"]=$res["nombre"];
            if (isset($_POST["recordar"])) {
                setcookie("sesion", session_encode(), time()+(30*24*60*60), "/");
            }
            header("Refresh:0; url=../index.php");
        }
    }
}
?>