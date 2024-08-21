<?php
class socios
{
    private $bd;
    private $socio;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }

    public function insertarSocio($nombre, $nick, $pass, $activo)
    {
        $insercion = $this->bd->prepare("insert into socios values (null,?,?,?,?)");
        $contraseña = md5(md5(md5(md5(md5($pass)))));
        $insercion->bind_param("ssss", $nombre, $nick, $contraseña, $activo);
        $insercion->execute();
        $insercion->close();
    }
    public function modificarSocio($id, $nombre, $nick, $pass)
    {
        if (!$pass) {
            $modificacion = $this->bd->prepare("update socios set nombre =?, nick =? where id=? and activo='1'");
            $modificacion->bind_param("ssi", $nombre, $nick, $id);
        } else {
            $modificacion = $this->bd->prepare("update socios set nombre=?, nick=?, pass=? where id=? and activo='1'");
            $contraseña = md5(md5(md5(md5(md5($pass)))));
            $modificacion->bind_param("sssi", $nombre, $nick, $contraseña, $id);
        }
        $modificacion->execute();
        $modificacion->close();
    }

    public function desactivarSocio($id)
    {
        $desactivar = $this->bd->prepare("update socios set activo = '0' where id =? and activo='1'");
        $desactivar->bind_param("i", $id);
        $desactivar->execute();
        $desactivar->close();
    }

    public function buscarSocio($nombre)
    {
        $busqueda= "%".$nombre."%";
        $buscar = $this->bd->prepare("select * from socios where nombre like ? and activo='1'");
        $buscar->bind_param("s", $busqueda);
        $buscar->bind_result($id, $nombre, $nick, $pass, $activo);
        $buscar->execute();
        $buscar->store_result();
        if ($buscar->num_rows() > 0) {
            $i = 0;
            while ($buscar->fetch()) {
                $this->socio[$i]['id'] = $id;
                $this->socio[$i]['nombre'] = $nombre;
                $this->socio[$i]['nick'] = $nick;
                $this->socio[$i]['pass'] = $pass;
                $this->socio[$i]['activo'] = $activo;
            }
            return $this->socio;
        } else {
            return -1;
        }
        $buscar->close();
    }

    public function loginSocio($nick, $pass)
    {
        $contraseña = md5(md5(md5(md5(md5($pass)))));
        $buscar = $this->bd->prepare("SELECT id from socios where nick =? and pass =? and activo='1'");
        $buscar->bind_param("ss", $nick, $contraseña);
        $buscar->bind_result($id);
        $buscar->execute();
        $buscar->store_result();
        if ($buscar->num_rows() > 0) {
            $buscar->fetch();
            return $id;
        } else {
            return -1;
        }
        $buscar->close();
    }

    public function listarSocios()
    {
        $listar=$this->bd->query("SELECT * from socios where id<>0 and activo='1'");
        $this->socio=$listar->fetch_all(MYSQLI_ASSOC);
        return $this->socio;
    }
}
