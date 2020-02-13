<?php
class usuarioDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsUsuario $obj){
        $sql = "INSERT INTO Usuario(cedula,nombres,apellidos,edad,genero,correo,nickname,password,Finca_idFinca,Municipio_idMunicipio) "
        . "VALUES ('" . $obj->getCedula() . "','" . $obj->getNombres() . "','"  . 
        $obj->getApellidos(). "',"  . $obj->getEdad() . ","  . $obj->getGenero() . ",'"  . 
        $obj->getCorreo() . "','" . $obj->getNickname() ."','" . $obj->getPassword() . "'," . 
        $obj->getIdFincaU() . "," . 2 .")";
        $this->objCon->ExecuteTransaction($sql);
    }

    // public function buscar(clsUsuario $obj){
    //     $sql = "SELECT nombreUsuario,tamanio,Municipio_idMunicipio,Departamento_idDepartamento,cantidad,piscina,descripcion,nombreMpio from Usuario F 
    //     join Municipio M on F.Municipio_idMunicipio = M.idMunicipio 
    //     join Departamento D on M.Departamento_idDepartamento = D.idDepartamento
    //     where idUsuario = " . $obj->getIdUsuario() . "";
    //     $this->objCon->Execute($sql);
    // }

    // public function eliminar(clsUsuario $obj)
    // {
    //     $sql = "DELETE from Usuario where idUsuario=" . $obj->getIdUsuario() . "";
    //     $this->objCon->ExecuteTransaction($sql);
    // }

    // public function modificar(clsUsuario $obj){
    //     $sql = "UPDATE Usuario SET nombreUsuario='" . $obj->getNombreUsuario() . "',tamanio=" . 
    //         $obj->getTamanio() . ",Municipio_idMunicipio="  . $obj->getIdMunicipio() . 
    //         ",cantidad="  . $obj->getCantidad() . ",piscina="  . $obj->getPiscina() . 
    //         ",descripcion='"  . $obj->getDescripcion() . "' where idUsuario=" . $obj->getIdUsuario() ."";
    //     $this->objCon->ExecuteTransaction($sql);
    // }
    
    // public function listar(){
    //     $sql = "SELECT idUsuario,nombreUsuario,tamanio,nombreMpio,nombreDepto,cantidad,piscina,descripcion from Usuario F 
    //     join Municipio M on F.Municipio_idMunicipio = M.idMunicipio 
    //     join Departamento D on M.Departamento_idDepartamento = D.idDepartamento";
    //     $this->objCon->Execute($sql);
    // }
}