<?php
class lanzamiento
{
    private $bd;
    private $lanzamiento;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }

    public function insertarLanzamiento($serie, $plataforma, $fecha)
    {
        $insercion = $this->bd->prepare("insert into lanzamientos values (?,?,?)");
        $insercion->bind_param("sss", $serie, $plataforma, $fecha);
        $insercion->execute();
        $insercion->close();
    }

    public function modificarLanzamiento($serie, $plataforma, $fecha)
    {
        $modificacion = $this->bd->prepare("update lanzamientos set  fecha=? where serie=? and plataforma=?");
        $modificacion->bind_param("sii", $fecha, $serie, $plataforma);
        $modificacion->execute();
        $modificacion->close();
    }

    public function borrarLanzamiento($serie, $plataforma)
    {
        //realmente creo que podria hacerlo con una consulta normal ya que estos datos seguramente se reciban de un botón o un enlace
        $modificacion = $this->bd->prepare("delete from lanzamientos where serie=? and plataforma=?");
        $modificacion->bind_param("ss", $serie, $plataforma);
        $modificacion->execute();
        $modificacion->close();
    }

    public function buscarLanzamientoPorSerie($IdSerie)
    {
        $busqueda = $this->bd->prepare("select  series.nombre, plataformas.nombre,  fecha  from lanzamientos, plataformas, series where lanzamientos.serie=series.id and lanzamientos.plataforma=plataformas.id and series.id=?");
        $busqueda->bind_param("i", $IdSerie);
        $busqueda->bind_result($serie, $plataforma, $fecha);
        $busqueda->execute();
        $busqueda->store_result();
        if ($busqueda->num_rows() > 0) {
            $i = 0;
            while ($busqueda->fetch()) {
                $this->lanzamiento[$i]["serie"] = $serie;
                $this->lanzamiento[$i]["plataforma"] = $plataforma;
                $this->lanzamiento[$i]["fecha"]=$fecha;
                $i++;
            }
            return $this->lanzamiento;
        } else {
            return "No hay lanzamientos para esta serie";
        }
        $busqueda->close();
    }

    public function buscarLanzamientoPorPlataforma($IdPlataforma)
    {
        $busqueda = $this->bd->prepare("select plataformas.id, plataformas.nombre, plataformas.activo, plataformas.logotipo, series.nombre, series.id, series.foto, fecha from plataformas, series, lanzamientos where plataformas.id=lanzamientos.plataforma and series.id=lanzamientos.serie and plataformas.id=? and series.activo='1'");
        $busqueda->bind_param("i", $IdPlataforma);
        $busqueda->bind_result($id, $nombre, $activo, $logotipo, $serie, $idSerie, $foto, $fecha);
        $busqueda->execute();
        $busqueda->store_result();
        if ($busqueda->num_rows() > 0) {
            $i = 0;
            while ($busqueda->fetch()) {
                $this->lanzamiento[$i]["id"] = $id;
                $this->lanzamiento[$i]["idSerie"]= $idSerie;
                $this->lanzamiento[$i]["nombre"] = $nombre;
                $this->lanzamiento[$i]["activo"] = $activo;
                $this->lanzamiento[$i]["logotipo"] = $logotipo;
                $this->lanzamiento[$i]["serie"] = $serie;
                $this->lanzamiento[$i]["foto"] = $foto;
                $this->lanzamiento[$i]["fecha"] = $fecha;
                $i++;
            }
            return $this->lanzamiento;
        }
        $busqueda->close();
    }

    public function ultimosLanzamientos($IdPlataforma)
    {
        $busqueda = $this->bd->prepare("select series.nombre, fecha, series.foto from lanzamientos, series where id=serie and plataforma=? limit 4");
        $busqueda->bind_param("i", $IdPlataforma);
        $busqueda->bind_result($serie, $fecha, $foto);
        $busqueda->execute();
        $busqueda->store_result();
        if ($busqueda->num_rows() > 0) {
            $i = 0;
            while ($busqueda->fetch()) {
                $this->lanzamiento[$i]["serie"] = $serie;
                $this->lanzamiento[$i]["fecha"] = $fecha;
                $this->lanzamiento[$i]["foto"]=$foto;
                $i++;
            }
            return $this->lanzamiento;
        } else {
            return "No hay lanzamientos para esta plataforma";
        }
    }

    public function listarSeriesPlataforma($IdPlataforma)
    {
        $busqueda = $this->bd->prepare("select series.id, series.nombre, series.foto, lanzamientos.fecha  from plataformas, series, lanzamientos where plataformas.id=lanzamientos.plataforma and series.id=lanzamientos.serie and plataformas.id=?");
        $busqueda->bind_param("i", $IdPlataforma);
        $busqueda->bind_result($id, $nombre, $foto, $fecha);
        $busqueda->execute();
        $busqueda->store_result();
        if ($busqueda->num_rows() > 0) {
            $i = 0;
            while ($busqueda->fetch()) {
                $this->lanzamiento[$i]["id"] = $id;
                $this->lanzamiento[$i]["nombre"] = $nombre;
                $this->lanzamiento[$i]["foto"] = $foto;
                $this->lanzamiento[$i]["fecha"] = $fecha;
                $i++;
            }
            return $this->lanzamiento;
        } else {
            return "No hay series para esta plataforma";
        }
    }

    public function listarLanzamientos()
    {
        $listado = $this->bd->query("select lanzamientos.serie idSerie, lanzamientos.plataforma idPlataforma, series.nombre serie, plataformas.nombre plataforma, lanzamientos.fecha from lanzamientos, series, plataformas where series.id=lanzamientos.serie and plataformas.id=lanzamientos.plataforma order by fecha desc");
        $this->lanzamiento = $listado->fetch_all(MYSQLI_ASSOC);
        if (!$this->lanzamiento) {
            return "No hay lanzamientos";
        } else {
            return $this->lanzamiento;
        }
    }
}
