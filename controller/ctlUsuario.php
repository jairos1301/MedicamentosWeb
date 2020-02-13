<?php

include "../model/clsUsuario.php";
include '../DAO/usuarioDAO.php';


    $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : "";
    $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
    $edad = isset($_POST['edad']) ? $_POST['edad'] : "";
    $genero = isset($_POST['genero']) ? $_POST['genero'] : "";
    $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
    $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $idFincaU = isset($_POST['idFincaU']) ? $_POST['idFincaU'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";

    $usuario = new clsUsuario($idUsuario, $cedula, $nombres, $apellidos, $edad, $genero, $correo, $nickname, $password, $idFincaU);
    $conex = new usuarioDAO();

switch ($type) {
    case "save":
        $conex->guardar($usuario);
        break;
    // case "search":
    //     $conex->buscar($usuario);
    //     break;
    // case "delete":
    //     $conex->eliminar($usuario);
    //     break;
    // case "update":
    //     $conex->modificar($usuario);
    //     break;
    // case "list":
    //     $conex->listar();
    //     break;
}
?>