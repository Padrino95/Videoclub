<?php
class plataformas
{
    private $bd;
    private $plataforma;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }
    public function insertarPlataforma($nombre, $logotipo)
    {
        $insercion = $this->bd->prepare("insert into plataformas values (null,?, '1',?)");
        $insercion->bind_param("ss", $nombre, $logotipo);
        $insercion->execute();
        $insercion->close();
    }
    public function modificarPlataforma($id, $nombre, $logotipo, $activo)
    {
        $modificacion = $this->bd->prepare("update plataformas set nombre=?, activo=?, logotipo=? where id=? and activo='1'");
        $modificacion->bind_param("sssi", $nombre, $activo,  $logotipo, $id);
        $modificacion->execute();
        $modificacion->close();
    }
    public function buscarPlataforma($nombre)
    {
        
        
        $patron = "%" . $nombre . "%";
        $busqueda = $this->bd->prepare("select * from plataformas where nombre like ? and activo='1'");
        $busqueda->bind_param("s", $patron);
        $busqueda->bind_result($id, $nombre, $activo, $logotipo);
        $busqueda->execute();
        $busqueda->store_result();
        $this->plataforma=null;
        if ($busqueda->num_rows > 0) {
            $i = 0;
            while ($busqueda->fetch()) {
                $this->plataforma[$i]["id"] = $id;
                $this->plataforma[$i]["nombre"] = $nombre;
                $this->plataforma[$i]["activo"] = $activo;
                $this->plataforma[$i]["logotipo"] = $logotipo;
                $i++;
            }
            return $this->plataforma;
        } else {
            return -1;
        }
    }
    public function listarPlataformas()
    {
        $consulta = $this->bd->query("SELECT * from plataformas where activo='1'");
        $this->plataforma = $consulta->fetch_all(MYSQLI_ASSOC);
        return $this->plataforma;
    }

    public function siguientePlataforma(){
        $consulta=$this->bd->query("select AUTO_INCREMENT from information_schema.tables where table_schema= 'series' and table_name='plataformas'");
        $datos = $consulta->fetch_all(MYSQLI_ASSOC);
        return $datos[0]['AUTO_INCREMENT'];
    }
}
