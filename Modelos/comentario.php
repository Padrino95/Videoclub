<?php
class comentario{
    private $bd;
    private $comentario; 

    public function __construct(){
        $this->bd= bd::conectar();
    }

    public function insertarComentario($socio, $serie, $fecha, $texto){
        $insercion = $this->bd->prepare("insert into comentario (socio, serie, fecha, texto) values (?,?,?,?)");
        $insercion->bind_param("iiss", $socio, $serie, $fecha, $texto);
        $insercion->execute();
        $insercion->close();
    }

    public function borrarComentario($idSocio, $idSerie, $fecha){
        $borrado = $this->bd->prepare("delete from comentario where socio=? and serie=? and fecha=?");
        $borrado->bind_param("iis", $idSocio, $idSerie, $fecha);
        $borrado->execute();
        $borrado->close();
    }

    public function buscarComentarioPorSerie($idSerie){
        $busqueda = $this->bd->prepare("select socio, serie, fecha, texto, nombre from comentario, socios where socio=id and serie=? order by fecha desc");
        $busqueda->bind_param("i", $idSerie);
        $busqueda->bind_result($idSocio, $idSerie, $fecha, $texto, $socio);
        $busqueda->execute();
        $busqueda->store_result();
        if ($busqueda->num_rows() > 0) {
            $i = 0;
            while ($busqueda->fetch()) {
                $this->comentario[$i]["idSocio"] = $idSocio;
                $this->comentario[$i]["idSerie"] = $idSerie;
                $this->comentario[$i]["fecha"] = $fecha;
                $this->comentario[$i]["texto"] = $texto;
                $this->comentario[$i]["socio"] = $socio;
                $i++;
            }
            return $this->comentario;
        }
        $busqueda->close();
    }

    public function ultimos5Comentarios(){
        $busqueda = $this->bd->query("select series.nombre serie, foto, socios.nombre socio, fecha, texto from comentario, socios, series where socio=socios.id and serie=series.id order by fecha desc limit 5");
        $this->comentario = $busqueda->fetch_all(MYSQLI_ASSOC);
        if ($this->comentario) {
            return $this->comentario;
        }
    }

    public function listarComentarios(){
        $listado = $this->bd->query("select series.nombre serie, foto, socios.nombre socio, fecha, texto, comentario.serie idSerie, comentario.socio idSocio from comentario, socios, series where socio=socios.id and serie=series.id");
        $this->comentario = $listado->fetch_all(MYSQLI_ASSOC);
        return $this->comentario;
    }

    public function comprobarComentario($idSocio, $idSerie){
        $consulta=$this->bd->prepare("select * from comentario where socio=? and serie=?");
        echo $this->bd->error;
        $consulta->bind_param("ii", $idSocio, $idSerie);
        $consulta->bind_result($idSocio, $idSerie, $fecha, $texto);
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    

}
?>