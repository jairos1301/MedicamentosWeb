<?php
session_start();
include "../model/clsVenta.php";
include '../DAO/ventaDAO.php';

$total = isset($_REQUEST['total']) ? $_REQUEST['total'] : '';
$cliente = isset($_REQUEST['cliente']) ? $_REQUEST['cliente'] : '';
$empleado = $_SESSION["id"];
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
$arrInv = isset($_REQUEST['arrInv']) ? $_REQUEST['arrInv'] : '';
$arrCant = isset($_REQUEST['arrCant']) ? $_REQUEST['arrCant'] : '';



$venta = new clsVenta($total, $cliente, $empleado, $arrInv, $arrCant);
$conex = new ventaDAO();

switch ($type) {
    case "save":
        $conex->guardar($venta);
        break;
        // case "search":
        //     $conex->buscar($laboratorio);
        //     break;
        // case "delete":
        //     $conex->eliminar($laboratorio);
        //     break;
        // case "update":
        //     $conex->modificar($laboratorio);
        //     break;
    case "list":
        $conex->listar();
        break;
}
