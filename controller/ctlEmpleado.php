<?php

include "../model/clsEmpleado.php";
include '../DAO/empleadoDAO.php';

    $idEmpleado = isset($_POST['idEmpleado']) ? $_POST['idEmpleado'] : '';
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
    $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
    $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";

    $empleado = new clsEmpleado($idEmpleado,$cedula, $nombres, $apellidos, $correo, $usuario, $password);
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