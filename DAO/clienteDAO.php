<?php
class clienteDAO {
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

    public function listar(){
        $sql = $this->infra->estructura_sql("listar_cliente", Array(0), 1);
        $this->objCon->Execute($sql);
    }

    public function guardar(clsCliente $obj){
        $arr = array($obj->getnombres(),$obj->getapellidos(),$obj->getcedula(),$obj->getgenero(),$obj->getedad());
        $sql = $this->infra->estructura_sql("guardar_cliente", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }
}
