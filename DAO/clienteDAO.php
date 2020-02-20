<?php
class clienteDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function listar(){
        $sql = "SELECT idCliente,nombres,apellidos from Cliente";
        $this->objCon->Execute($sql);
    }

    public function guardar(clsCliente $obj){
        $sql = "INSERT INTO cliente(nombres,apellidos,cedula,genero,edad) "
        . "VALUES ('" . $obj->getnombres() . "','" . $obj->getapellidos() .
        "',"  . $obj->getcedula() . ",'" . $obj->getgenero() ."'," . 
        $obj->getedad() . ")";
        $this->objCon->ExecuteTransaction($sql);
    }
}
