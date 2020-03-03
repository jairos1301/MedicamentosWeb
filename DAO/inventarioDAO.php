<?php
class inventarioDAO {
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

    public function guardar(clsInventario $obj){
        $arr = array($obj->getIdInventario(),$obj->getNombreInv(),$obj->getDescripcionInv(),$obj->getFechaVen(),$obj->getCantidad(),$obj->getFechaFab(),$obj->getPrecio(),$obj->getEmpleado_idEmpleado(),$obj->getLaboratorio_idLaboratorio());
        $sql = $this->infra->estructura_sql("guardar_inv",$arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsInventario $obj){
        $arr = array($obj->getIdInventario());
        $sql = $this->infra->estructura_sql("buscar_inv",$arr, 1);
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsInventario $obj)
    {
        $arr = array($obj->getIdInventario());
        $sql = $this->infra->estructura_sql("eliminar_inv",$arr);
        //print_r($sql);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsInventario $obj){
        $arr = array($obj->getIdInventario(),$obj->getNombreInv(),$obj->getDescripcionInv(),$obj->getFechaVen(),$obj->getCantidad(),$obj->getFechaFab(),$obj->getPrecio(),$obj->getEmpleado_idEmpleado(),$obj->getLaboratorio_idLaboratorio());
        $sql = $this->infra->estructura_sql("modificar_inv",$arr);
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = $this->infra->estructura_sql("lista_inventarios", array(), 1);
        $this->objCon->Execute($sql);
    }
}
