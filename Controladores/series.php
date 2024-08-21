            <?php
            require_once("../Funciones/funciones.php");
            require_once("../Modelos/plataformas.php");
            require_once("../Modelos/lanzamiento.php");
            require_once("../Bd/bd.php");
            $id=checkLoggin();
            pintaMenu($id);

            $plataforma = new plataformas();
            $plataformas = $plataforma->listarPlataformas();
            foreach ($plataformas as $value) {
                $lanzamiento = new lanzamiento();
                $series[$value["nombre"]] = $lanzamiento->buscarLanzamientoPorPlataforma($value["id"]);            
            }
            include("../Vistas/mostrar_series.php");
            ?>
          