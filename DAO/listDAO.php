<?php
class listDAO {
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

    public function listEmps(){
        $sql = $this->infra->estructura_sql("lista_empleados", array(), 1);
        $this->objCon->Execute($sql);
    }

    public function listLabs(){
        $sql = $this->infra->estructura_sql("lista_laboratorios", array(), 1);
        $this->objCon->Execute($sql);
    }
}
