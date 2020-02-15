<?php
class laboratorioDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function listar(){
        $sql = "SELECT idLaboratorio,nombre,descripcion from Laboratorio";
        $this->objCon->Execute($sql);
    }
}
