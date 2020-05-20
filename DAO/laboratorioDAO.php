<?php
class laboratorioDAO {
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

    public function guardar(clsLaboratorio $obj){
        $arr = array($obj->getNombreLab(),$obj->getDescripcionLab());
        $sql = $this->infra->estructura_sql("guardar_lab", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsLaboratorio $obj){
        $arr = array($obj->getNombreLab());
        $sql = $this->infra->estructura_sql("buscar_Lab", $arr, 1);
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsLaboratorio $obj)
    {
        $arr = array($obj->getIdLaboratorio());
        $sql = $this->infra->estructura_sql("eliminar_lab", $arr);
        // echo($sql);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsLaboratorio $obj){
        $arr = array($obj->getIdLaboratorio(),$obj->getNombreLab(),$obj->getDescripcionLab());
        $sql = $this->infra->estructura_sql("modificar_lab", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function listar(){
        $sql = $this->infra->estructura_sql("lista_laboratorios", Array(), 1);
        $this->objCon->Execute($sql);
    }
}

