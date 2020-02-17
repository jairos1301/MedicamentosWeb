<?php
include "../model/clsInventario.php";
include '../DAO/inventarioDAO.php';

    $idInventario = isset($_POST['idInventario']) ? $_POST['idInventario'] : '';
    $nombreInv = isset($_POST['nombreInv']) ? $_POST['nombreInv'] : ''; 
    $descripcionInv = isset($_POST['descripcionInv']) ? $_POST['descripcionInv'] : '';
    $fechaVencimiento = isset($_POST['fechaVencimiento']) ? $_POST['fechaVencimiento'] : '';
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
    $fechaFabricacion = isset($_POST['fechaFabricacion']) ? $_POST['fechaFabricacion'] : '';
    $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
    $Empleado_idEmpleado = isset($_POST['Empleado_idEmpleado']) ? $_POST['Empleado_idEmpleado'] : '';
    $Laboratorio_idLaboratorio = isset($_POST['Laboratorio_idLaboratorio']) ? $_POST['Laboratorio_idLaboratorio'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : "";

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
}
?>