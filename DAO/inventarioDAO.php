<?php
class inventarioDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsInventario $obj){
        $sql = "INSERT INTO Inventario(nombreInv,descripcionInv,fechaVen,cantidad,fechaFab,precio,Empleado_idEmpleado,Laboratorio_idLaboratorio) "
        . "VALUES ('" . $obj->getNombreInv() . "','" . $obj->getDescripcionInv() . "','"  . 
        $obj->getFechaVen(). "','"  . $obj->getCantidad() . "','" . $obj->getFechaFab() ."'," . 
        $obj->getPrecio() . "," . $obj->getEmpleado_idEmpleado() . "," . $obj->getLaboratorio_idLaboratorio() . ")";
        $sql = "select guardar_inv('".$obj->getNombreInv() ."','". $obj->getDescripcionInv() ."','". $obj->getFechaVen() .");";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsInventario $obj){
        $sql = "SELECT idInventario,nombreInv,descripcionInv,fechaVen,cantidad,fechaFab,precio,Empleado_idEmpleado,Laboratorio_idLaboratorio from Inventario
        where idInventario = " . $obj->getIdInventario() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsInventario $obj)
    {
        $sql = "DELETE from Inventario where idInventario=" . $obj->getIdInventario() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsInventario $obj){
        $sql = "UPDATE Inventario SET nombreInv='" . $obj->getNombreInv() . "',descripcionInv='" . 
        $obj->getDescripcionInv() . "',fechaVen='"  . $obj->getFechaVen() . 
        "',cantidad="  . $obj->getCantidad() . ",fechaFab='"  . $obj->getFechaFab() . 
        "',precio="  . $obj->getPrecio() . ",Empleado_idEmpleado="  . $obj->getEmpleado_idEmpleado() . 
        ",Laboratorio_idLaboratorio="  . $obj->getLaboratorio_idLaboratorio() . " where idInventario=" . $obj->getIdInventario() ."";
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = "call listar_inventario(0)";
        $this->objCon->Execute($sql);
    }
}