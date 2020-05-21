<?php
class proveedorDAO {
    private $con;
    private $objCon;
    private $infra;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        require '../infrastructure/infraestructura.php';
        $this->infra = new infraestructura();
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsProveedor $obj){
        $arr = array($obj->getNombrePro(),$obj->getRazonSocial(),$obj->getTelefonoPro(),$obj->getCorreoPro());
        $sql = $this->infra->estructura_sql("guardar_pro", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsProveedor $obj){
        $arr = array($obj->getNombrePro());
        $sql = $this->infra->estructura_sql("buscar_pro", $arr, 1);
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsProveedor $obj)
    {
        $arr = array($obj->getIdProveedor());
        $sql = $this->infra->estructura_sql("eliminar_pro", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsProveedor $obj){
        $arr = array($obj->getIdProveedor(),$obj->getNombrePro(),$obj->getRazonSocial(),$obj->getTelefonoPro(),$obj->getCorreoPro());
        $sql = $this->infra->estructura_sql("modificar_pro", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = $this->infra->estructura_sql("listar_proveedores", array(), 1);
        $this->objCon->Execute($sql);
    }

    public function generar_rpt(){
        $sql = $this->infra->estructura_sql("reporte",array('proveedor',''), 1);
        $data = $this->objCon->Execute_rpt($sql);
        return $data;
    }

    public function generar_rpt_csv(){
        $sql = $this->infra->estructura_sql("reporte",array('proveedor',''), 1);
        $data = $this->objCon->Execute_rpt($sql);
        return $data;
    }
}
