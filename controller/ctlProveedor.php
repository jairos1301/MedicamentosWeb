<?php

require '../infrastructure/CORS.php';
include "../model/clsProveedor.php";
include '../DAO/proveedorDAO.php';

    $idProveedor = isset($_REQUEST['idProveedor']) ? $_REQUEST['idProveedor'] : '';
    $nombrePro = isset($_REQUEST['nombrePro']) ? $_REQUEST['nombrePro'] : '';
    $razonsocial = isset($_REQUEST['razonsocial']) ? $_REQUEST['razonsocial'] : '';
    $telefonoPro = isset($_REQUEST['telefonoPro']) ? $_REQUEST['telefonoPro'] : '';
    $correoPro = isset($_REQUEST['correoPro']) ? $_REQUEST['correoPro'] : '';
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
    
    $proveedor = new clsProveedor($idProveedor,$nombrePro,$razonsocial,$telefonoPro,$correoPro);
    $conex = new proveedorDAO();

switch ($type) {
    case "save":
        $conex->guardar($proveedor);
        break;
    case "search":
        $conex->buscar($proveedor);
        break;
    case "delete":
        $conex->eliminar($proveedor);
        break;
    case "update":
        $conex->modificar($proveedor);
        break;
    case "list":
        $conex->listar();
        break;
}
?>