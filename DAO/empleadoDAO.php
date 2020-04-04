<?php
class empleadoDAO {
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

    public function guardar(clsEmpleado $obj){
        $arr = array($obj->getCedula(),$obj->getNombres(),$obj->getApellidos(),$obj->getCorreo(),$obj->getUsuario(),$obj->getPassword());
        $sql = $this->infra->estructura_sql("guardar_emp", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsEmpleado $obj){
        $arr = array($obj->getIdEmpleado());
        $sql = $this->infra->estructura_sql("buscar_emp", $arr, 1);
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsEmpleado $obj)
    {
        $arr = array($obj->getIdEmpleado());
        $sql = $this->infra->estructura_sql("eliminar_emp", $arr);
        // echo($sql);
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsEmpleado $obj){
        $arr = array($obj->getIdEmpleado(),$obj->getCedula(),$obj->getNombres(),$obj->getApellidos(),$obj->getCorreo(),$obj->getUsuario(),$obj->getPassword());
        $sql = $this->infra->estructura_sql("modificar_empl", $arr);
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = $this->infra->estructura_sql("lista_empleados", array(), 1);
        $this->objCon->Execute($sql);
    }

    public function generar_rpt(){
        $sql = $this->infra->estructura_sql("reporte",array('empleado',''), 1);
        $data = $this->objCon->Execute_rpt($sql);
        return $data;
    }

    public function generar_rpt_csv(){
        $sql = $this->infra->estructura_sql("reporte",array('empleado',''), 1);
        $data = $this->objCon->Execute_rpt($sql);
        return $data;
    }
}
