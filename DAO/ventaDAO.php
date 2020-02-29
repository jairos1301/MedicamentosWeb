<?php
class ventaDAO
{
    private $con;
    private $objCon;

    function __construct()
    {
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function listar()
    {
        $sql = "call listar_ventas(0)";
        $this->objCon->Execute($sql);
    }

    public function guardar(clsVenta $obj)
    {
        $sql = "INSERT INTO venta(valor_Total,Cliente_idCliente,Empleado_idEmpleado) "
            . "VALUES (" . $obj->gettotal() . "," . $obj->getcliente() .
            ","  . $obj->getempleado() . ")";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function getLastId(){
        return $this->objCon->getLastInsertId();
    }
}
