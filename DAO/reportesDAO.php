<?php
class reportesDAO
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

    public function generar_csv($cod_reporte){
        $sql = $this->infra->estructura_sql("reporte_csv",array($cod_reporte), 1);
        $data = $this->objCon->Execute_rpt($sql);
        return $data;
    }

}