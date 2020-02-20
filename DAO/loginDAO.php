<?php
class loginDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function login(clsLogin $obj){
        $sql = "SELECT usuario,password from Empleado where "
        . "usuario='" . $obj->getUsuario() . "' and " 
        . "password='" . $obj->getPassword() . "'";
        $resultado = $this->objCon->getConnect()->prepare($sql);
        $resultado->execute();
        if($resultado->rowCount() > 0){
            $vec = $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        $mensaje = "";
        if (isset($vec)) {
            session_start();
            $_SESSION["user"] = $vec[0]['usuario'];
            header('location:../index.php');
        } else {
            $mensaje = "El usuario ingresado no existe";
        }
        header('location:../index.php?page=vistaEmpleado' . $mensaje);
    }


}