<?php

require '../infrastructure/CORS.php';
include "../model/clsEmpleado.php";
include '../DAO/empleadoDAO.php';

    $idEmpleado = isset($_REQUEST['idEmpleado']) ? $_REQUEST['idEmpleado'] : '';
    $cedula = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : '';
    $nombres = isset($_REQUEST['nombres']) ? $_REQUEST['nombres'] : "";
    $apellidos = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : "";
    $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : "";
    $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "";
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";
    $idTipoUsuario = isset($_REQUEST['idTipoUsuario']) ? $_REQUEST['idTipoUsuario'] : "";
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";

    $empleado = new clsEmpleado($idEmpleado, $cedula, $nombres, $apellidos, $correo, $usuario, $password, $idTipoUsuario);
    $conex = new empleadoDAO();

switch ($type) {
    case "save":
        $conex->guardar($empleado);
        break;
    case "search":
        $conex->buscar($empleado);
        break;
    case "delete":
        $conex->eliminar($empleado);
        break;
    case "update":
        $conex->modificar($empleado);
        break;
    case "list":
        $conex->listar();
        break;
    case "con":
        $conex->login();
        break;
    case "desc":
        session_destroy();
        $mensaje=  "Sesion cerrada correctamente";
        header('index.php?msjlogin=' . $mensaje);
        break;
}
?>