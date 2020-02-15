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
        $sql = "INSERT INTO Inventario(nombre,descripcion,fechaVencimiento,cantidad,fechaFabricacion,precio,idEmpFk,idLabFk) "
        . "VALUES ('" . $obj->getNombre() . "','" . $obj->getDescripcion() . "','"  . 
        $obj->getFechaVencimiento(). "','"  . $obj->getCantidad() . "','" . $obj->getFechaFabricacion() ."','" . 
        $obj->getPrecio() . "','" . $obj->getIdEmpFk() . "','" . $obj->getIdLabFk() ."',)";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsInventario $obj){
        $sql = "SELECT nombre,descripcion,fechaVencimiento,cantidad,fechaFabricacion,precio,idEmpFk,idLabFk from Laboratorio
        where idLaboratorio = " . $obj->getIdLaboratorio() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsInventario $obj)
    {
        $sql = "DELETE from Laboratorio where idLaboratorio=" . $obj->getIdLaboratorio() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsInventario $obj){
        $sql = "UPDATE Laboratorio SET nombre='" . $obj->getNombre() . "',descripcion='" . 
        $obj->getDescripcion() . "',fechaVencimiento='"  . $obj->getFechaVencimiento() . 
        "',cantidad="  . $obj->getCantidad() . ",fechaFabricacion='"  . $obj->getFechaFabricacion() . 
        "',precio="  . $obj->getPrecio() . ",idEmpFk="  . $obj->getIdEmpFk() . 
        "',idLabFk="  . $obj->getLabFk() . "' where idInventario=" . $obj->getIdInventario() ."";
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = "SELECT nombre,descripcion,fechaVencimiento,cantidad,fechaFabricacion,precio,E.nombre,I.nombre from Inventario I
        join Empleado E on I.idEmpFk = E.idEmpleado
        join Laboratorio L on I.idEmpFk = L.idLaboratorio";
        $this->objCon->Execute($sql);
    }
}