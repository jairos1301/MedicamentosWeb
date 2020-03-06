<?php
class ventaDAO
{
    
    private $con;
    private $objCon;
    private $infra;

    function __construct()
    {
        require '../infrastructure/clsConexion.php';
        require '../infrastructure/infraestructura.php';
        $this->infra = new infraestructura();
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function listar()
    {
        $sql = $this->infra->estructura_sql("listar_ventas", array(0), 1);
        $this->objCon->Execute($sql);
    }

    public function guardar(clsVenta $obj)
    {
        $arr = array($obj->gettotal(),$obj->getcliente(),$obj->getempleado(),$obj->getarrinv().",",$obj->getarrcant().",");
        $sql = $this->infra->estructura_sql("guardar_venta",$arr);
        $this->objCon->ExecuteTransaction($sql);
    }

}
