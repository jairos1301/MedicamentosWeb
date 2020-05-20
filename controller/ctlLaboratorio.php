<?php
require '../infrastructure/CORS.php';
include "../model/clsLaboratorio.php";
include '../DAO/laboratorioDAO.php';

    $idLaboratorio = isset($_REQUEST['idLaboratorio']) ? $_REQUEST['idLaboratorio'] : '';
    $nombreLab = isset($_REQUEST['nombreLab']) ? $_REQUEST['nombreLab'] : ''; 
    $descripcionLab = isset($_REQUEST['descripcionLab']) ? $_REQUEST['descripcionLab'] : '';
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";

    $laboratorio = new clsLaboratorio($idLaboratorio, $nombreLab, $descripcionLab);
    $conex = new laboratorioDAO();

switch ($type) {
    case "save":
        $conex->guardar($laboratorio);
        break;
    case "search":
        $conex->buscar($laboratorio);
        break;
    case "delete":
        $conex->eliminar($laboratorio);
        break;
    case "update":
        $conex->modificar($laboratorio);
        break;
    case "list":
        $conex->listar();
        break;
}
?>