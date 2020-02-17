<?php
class listDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function listEmps(){
        $sql = "SELECT * from Empleado";
        $this->objCon->Execute($sql);
    }

    public function listLabs(){
        $sql = "SELECT * from Laboratorio";
        $this->objCon->Execute($sql);
    }
}