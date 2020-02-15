<?php
include "../model/clsInventario.php";
include '../DAO/inventarioDAO.php';

    $idInventario = isset($_POST['idLaboratorio']) ? $_POST['idLaboratorio'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : ''; 
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $fechaVencimiento = isset($_POST['fechaVencimiento']) ? $_POST['fechaVencimiento'] : '';
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
    $fechaFabricacion = isset($_POST['fechaFabricacion']) ? $_POST['fechaFabricacion'] : '';
    $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
    $idEmpFk = isset($_POST['idEmpFk']) ? $_POST['idEmpFk'] : '';
    $idLabFk = isset($_POST['idLabFk']) ? $_POST['idLabFk'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : "";

    $inventario = new clsInventario($idInventario, $nombre, $descripcion, $fechaVencimiento, $cantidad, $fechaFabricacion, $precio, $idEmpFk, $idLabFk);
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