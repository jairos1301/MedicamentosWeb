<?php
class empleadoDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsEmpleado $obj){
        $sql = "INSERT INTO Empleado(cedula,nombres,apellidos,correo,usuario,password) "
        . "VALUES (" . $obj->getCedula() . ",'" . $obj->getNombres() . "','" . 
        $obj->getApellidos(). "','"  . $obj->getCorreo() . "','" . $obj->getUsuario() ."','" . 
        $obj->getPassword() . "')";
        //print($sql);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsEmpleado $obj){
        $sql = "SELECT idEmpleado,cedula,nombres,apellidos,correo,usuario,password from Empleado
        where idEmpleado = " . $obj->getIdEmpleado() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsEmpleado $obj)
    {
        $sql = "DELETE from Empleado where idEmpleado=" . $obj->getIdEmpleado() . "";
        print($sql);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsEmpleado $obj){
        $sql = "UPDATE Empleado SET cedula=" . $obj->getCedula() . ",nombres='" . 
        $obj->getNombres() . "',apellidos='"  . $obj->getApellidos() . 
        "',correo='"  . $obj->getCorreo() . "',usuario='"  . $obj->getUsuario() . 
        "',password='"  . $obj->getPassword() . "' where idEmpleado=" . $obj->getIdEmpleado() ."";
        print($sql);
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = "SELECT idEmpleado,cedula,nombres,apellidos,correo,usuario,password from Empleado";
        $this->objCon->Execute($sql);
    }
}