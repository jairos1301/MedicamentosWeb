<?php
class listDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function listDeptos(){
        $sql = "SELECT * from Departamento";
        $this->objCon->Execute($sql);
    }

    public function listFincas(){
        $sql = "SELECT idFinca, nombreFinca from Finca";
        $this->objCon->Execute($sql);
    }

    public function listMuni($valor){
        $sql = "SELECT * from Municipio where Departamento_idDepartamento = " . $valor;
        $this->objCon->Execute($sql);
    }
}