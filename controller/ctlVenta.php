<?php
include "../model/clsVenta.php";
include '../DAO/ventaDAO.php';

$total = isset($_POST['total']) ? $_POST['total'] : '';
$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : '';
$empleado = isset($_POST['empleado']) ? $_POST['empleado'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';
$arrInv = isset($_POST['arrInv']) ? $_POST['arrInv'] : '';
$arrCant = isset($_POST['arrCant']) ? $_POST['arrCant'] : '';


$venta= new clsVenta($total, $cliente, $empleado);
$conex = new ventaDAO();

switch ($type) {
    case "save":
        $conex->guardar($venta);
        $x = $conex->getLastId();
        echo $x;
        
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
