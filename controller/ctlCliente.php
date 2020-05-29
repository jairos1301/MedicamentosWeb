<?php
require '../infrastructure/CORS.php';
include "../model/clsCliente.php";
include '../DAO/clienteDAO.php';

$idCliente = isset($_REQUEST['idCliente']) ? $_REQUEST['idCliente'] : '';
$nombres = isset($_REQUEST['nombres']) ? $_REQUEST['nombres'] : '';
$apellidos = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : '';
$cedula = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : '';
$genero = isset($_REQUEST['genero']) ? $_REQUEST['genero'] : '';
$edad = isset($_REQUEST['edad']) ? $_REQUEST['edad'] : '';
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";

$cliente = new clsCliente($idCliente, $nombres, $apellidos, $cedula, $genero, $edad);
$conex = new clienteDAO();

switch ($type) {
    case "save":
        $conex->guardar($cliente);
        break;
    case "search":
        $conex->buscar($cliente);
        break;
    case "delete":
        $conex->eliminar($cliente);
        break;
    case "update":
        $conex->modificar($cliente);
        break;
    case "listInfoBono":
        $conex->listarInfoBonos($cliente);
        break;
    case "historialVentas":
        $conex->listarHistorialVentas($cliente);
        break;
    case "list":
        $conex->listar();
        break;
}
