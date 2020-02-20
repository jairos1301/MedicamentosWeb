<?php
include "../model/clsCliente.php";
include '../DAO/clienteDAO.php';

$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
$genero = isset($_POST['genero']) ? $_POST['genero'] : '';
$edad = isset($_POST['edad']) ? $_POST['edad'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : "";

$cliente = new clsCliente($nombres, $apellidos, $cedula, $genero, $edad);
$conex = new clienteDAO();

switch ($type) {
    case "save":
        $conex->guardar($cliente);
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
