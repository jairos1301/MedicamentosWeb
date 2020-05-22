<?php
require '../infrastructure/CORS.php';
include "../model/clsEstanteria.php";
include '../DAO/estanteriaDAO.php';

    $idEstanteria = isset($_REQUEST['idEstanteria']) ? $_REQUEST['idEstanteria'] : '';
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : ''; 
    $descripcion = isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : '';
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";

    $estanteria = new clsEstanteria($idEstanteria, $nombre, $descripcion);
    $conex = new estanteriaDAO();

switch ($type) {
    case "save":
        $conex->guardar($estanteria);
        break;
    case "search":
        $conex->buscar($estanteria);
        break;
    case "delete":
        $conex->eliminar($estanteria);
        break;
    case "update":
        $conex->modificar($estanteria);
        break;
    case "list":
        $conex->listar();
        break;
}
?>