<?php
session_start();
include "../model/clsVenta.php";
include '../DAO/ventaDAO.php';

$total = isset($_POST['total']) ? $_POST['total'] : '';
$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : '';
$empleado = $_SESSION["id"];
$type = isset($_POST['type']) ? $_POST['type'] : '';
$arrInv = isset($_POST['arrInv']) ? $_POST['arrInv'] : '';
$arrCant = isset($_POST['arrCant']) ? $_POST['arrCant'] : '';



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
