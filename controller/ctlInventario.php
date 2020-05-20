<?php
include "../model/clsInventario.php";
include '../DAO/inventarioDAO.php';
require '../infrastructure/CORS.php';

    $idInventario = isset($_REQUEST['idInventario']) ? $_REQUEST['idInventario'] : '';
    $nombreInv = isset($_REQUEST['nombreInv']) ? $_REQUEST['nombreInv'] : ''; 
    $descripcionInv = isset($_REQUEST['descripcionInv']) ? $_REQUEST['descripcionInv'] : '';
    $fechaVencimiento = isset($_REQUEST['fechaVencimiento']) ? $_REQUEST['fechaVencimiento'] : '';
    $cantidad = isset($_REQUEST['cantidad']) ? $_REQUEST['cantidad'] : '';
    $fechaFabricacion = isset($_REQUEST['fechaFabricacion']) ? $_REQUEST['fechaFabricacion'] : '';
    $precio = isset($_REQUEST['precio']) ? $_REQUEST['precio'] : '';
    $Empleado_idEmpleado = isset($_REQUEST['Empleado_idEmpleado']) ? $_REQUEST['Empleado_idEmpleado'] : '';
    $Laboratorio_idLaboratorio = isset($_REQUEST['Laboratorio_idLaboratorio']) ? $_REQUEST['Laboratorio_idLaboratorio'] : '';
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";

    $inventario = new clsInventario($idInventario, $nombreInv, $descripcionInv, $fechaVencimiento, $cantidad, $fechaFabricacion, $precio, $Empleado_idEmpleado, $Laboratorio_idLaboratorio);
    $conex = new inventarioDAO();

switch ($type) {
    case "save":
        $conex->guardar($inventario);
        break;
    case "search":
        $conex->buscar($inventario);
        break;
    case "delete":
        $conex->eliminar($inventario);
        break;
    case "update":
        $conex->modificar($inventario);
        break;
    case "list":
        $conex->listar();
        break;
    case "devo":
        $conex->devo($inventario);
        break;
}
