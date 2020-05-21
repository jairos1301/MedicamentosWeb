<?php
class tipoUsuarioDAO {
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
        $sql = $this->infra->estructura_sql("listar_tipousuario", array(), 1);
        $this->objCon->Execute($sql);
    }
}
