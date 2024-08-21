<?php
class series
{
    private $bd;
    private $serie;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }
    public function insertarSerie($nombre, $descripcion, $foto)
    {
        $insercion = $this->bd->prepare("insert into series values (null, ?, ?, ?, '1')");
        $insercion->bind_param("sss", $nombre, $descripcion, $foto);
        $insercion->execute();
        $insercion->close();
    }
    public function modificarSerie($id, $nombre, $descripcion, $foto)
    {
        $modificacion = $this->bd->prepare("update series set nombre=?, descripcion=?, foto=? where id=? and activo='1'");
        $modificacion->bind_param("sssi", $nombre, $descripcion, $foto, $id);
        $modificacion->execute();
        $modificacion->close();
    }
    public function desactivarSerie($id)
    {
        // quizás debería haberlo hecho con consulta preparada
        $this->bd->query("update series set activo='0' where id=$id");
    }
    public function buscarSerieNombre($nombre)
    {
        $patron = "%" . $nombre . "%";
        $busqueda = $this->bd->prepare("select * from series where nombre like ? and activo='1'");
        $busqueda->bind_param("s", $patron);
        $busqueda->bind_result($id, $nombre, $descripcion, $foto, $activo);
        $busqueda->execute();
        $busqueda->store_result();
        if ($busqueda->num_rows() > 0) {
            $i = 0;
            while ($busqueda->fetch()) {
                $this->serie[$i]["id"] = $id;
                $this->serie[$i]["nombre"] = $nombre;
                $this->serie[$i]["descripcion"] = $descripcion;
                $this->serie[$i]["foto"] = $foto;
                $this->serie[$i]["activo"] = $activo;
                $i++;
            }
            return $this->serie;
        } else {
            return -1;
        }
    }
    public function buscarSerieId($id)
    {
        $busqueda = $this->bd->prepare("select * from series where id like ? and activo='1'");
        $busqueda->bind_param("i", $id);
        $busqueda->bind_result($id, $nombre, $descripcion, $foto, $activo);
        $busqueda->execute();
        $busqueda->store_result();
        if ($busqueda->num_rows() > 0) {
            $i = 0;
            while ($busqueda->fetch()) {
                $this->serie[$i]["id"] = $id;
                $this->serie[$i]["nombre"] = $nombre;
                $this->serie[$i]["descripcion"] = $descripcion;
                $this->serie[$i]["foto"] = $foto;
                $this->serie[$i]["activo"] = $activo;
                $i++;
            }
            return $this->serie;
        } else {
            return -1;
        }
    }
    public function listarSeries()
    {
        $consulta = $this->bd->query("select* from series where activo = '1'");
        $this->serie = $consulta->fetch_all(MYSQLI_ASSOC);
        return $this->serie;
    }

    public function siguienteSerie(){
        $consulta=$this->bd->query("select AUTO_INCREMENT from information_schema.tables where table_schema= 'series' and table_name='series'");
        $datos = $consulta->fetch_all(MYSQLI_ASSOC);
        return $datos[0]['AUTO_INCREMENT'];
    }
}
