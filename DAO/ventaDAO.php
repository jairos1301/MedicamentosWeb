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

    public function generar_rpt(){
        $sql = $this->infra->estructura_sql("reporte",array('venta',''), 1);
        $data = $this->objCon->Execute_rpt($sql);
        return $data;
    }

    public function generar_rpt_csv(){
        $sql = $this->infra->estructura_sql("reporte",array('venta',''), 1);
        $data = $this->objCon->Execute_rpt($sql);
        return $data;
    }

    public function generar_rptdet($vwhere){
        $sql = $this->infra->estructura_sql("reporte",array('detalle',$vwhere), 1);
        $data = $this->objCon->Execute_rpt($sql);
        return $data;
    }

}
