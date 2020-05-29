<?php
class clienteDAO
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
        $sql = $this->infra->estructura_sql("listar_cliente", array(0), 1);
        $this->objCon->Execute($sql);
    }

    public function listarInfoBonos(clsCliente $obj)
    {
        $arr = array($obj->getIdCliente());
        $sql = $this->infra->estructura_sql("listar_info_bonos", $arr, 1);
        $this->objCon->Execute($sql);
    }

    public function listarHistorialVentas(clsCliente $obj)
    {
        $arr = array($obj->getIdCliente());
        $sql = $this->infra->estructura_sql("listar_historial_ventas", $arr, 1);
        $this->objCon->Execute($sql);
    }

    public function guardar(clsCliente $obj)
    {
        $arr = array($obj->getNombres(), $obj->getApellidos(), $obj->getCedula(), $obj->getGenero(), $obj->getEdad());
        $sql = $this->infra->estructura_sql("guardar_cliente", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsCliente $obj){
        $arr = array($obj->getCedula());
        $sql = $this->infra->estructura_sql("buscar_cli", $arr, 1);
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsCliente $obj)
    {
        $arr = array($obj->getIdCliente());
        $sql = $this->infra->estructura_sql("eliminar_cli", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsCliente $obj){
        $arr = array($obj->getIdCliente(),$obj->getNombres(), $obj->getApellidos(), $obj->getCedula(), $obj->getGenero(), $obj->getEdad());
        $sql = $this->infra->estructura_sql("modificar_cli", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function generar_rpt()
    {
        $sql = $this->infra->estructura_sql("reporte", array('cliente', ''), 1);
        $data = $this->objCon->Execute_rpt($sql);
        return $data;
    }

    public function generar_rpt_csv()
    {
        $sql = $this->infra->estructura_sql("reporte", array('cliente', ''), 1);
        $data = $this->objCon->Execute_rpt($sql);
        return $data;
    }
}
