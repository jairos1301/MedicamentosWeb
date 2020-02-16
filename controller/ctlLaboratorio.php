<?php
include "../model/clsLaboratorio.php";
include '../DAO/laboratorioDAO.php';

    $idLaboratorio = isset($_POST['idLaboratorio']) ? $_POST['idLaboratorio'] : '';
    $nombre = isset($_POST['nombreInv']) ? $_POST['nombre'] : ''; 
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : "";

    $laboratorio = new clsLaboratorio();
    $conex = new laboratorioDAO();

switch ($type) {
    // case "save":
    //     $conex->guardar($laboratorio);
    //     break;
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
?>