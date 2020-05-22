<?php
class estanteriaDAO {
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

    public function guardar(clsEstanteria $obj){
        $arr = array($obj->getNombre(),$obj->getDescripcion());
        $sql = $this->infra->estructura_sql("guardar_estanteria", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsEstanteria $obj){
        $arr = array($obj->getNombre());
        $sql = $this->infra->estructura_sql("buscar_estanteria", $arr, 1);
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsEstanteria $obj)
    {
        $arr = array($obj->getIdEstanteria());
        $sql = $this->infra->estructura_sql("eliminar_estanteria", $arr);
        // echo($sql);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsEstanteria $obj){
        $arr = array($obj->getIdEstanteria(),$obj->getNombre(),$obj->getDescripcion());
        $sql = $this->infra->estructura_sql("modificar_estanteria", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function listar(){
        $sql = $this->infra->estructura_sql("listar_estanteria", Array(), 1);
        $this->objCon->Execute($sql);
    }
}

