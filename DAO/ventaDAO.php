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
        $sql = "SELECT v.fecha_venta as fecha,v.valor_total as valor,concat(c.nombres,' ',c.apellidos) as cliente,
        concat(e.nombres,' ',e.apellidos) as empleado from venta v 
        inner join cliente c on c.idCliente=v.Cliente_idCliente 
        inner join empleado e on e.idEmpleado=v.Empleado_idEmpleado";
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
