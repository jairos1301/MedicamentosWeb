<?php

include "../model/clsLogin.php";
include '../DAO/loginDAO.php';

$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$usuario = isset($_REQUEST['usuario']) ?  $_REQUEST['usuario'] : "";
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";

    session_start();

    $log = new clsLogin($usuario, $password);
    $conex = new loginDAO();

switch ($type) {
    case "con":
        $conex->login($log);
        break;
    case "desc":
        session_destroy();
        //$mensaje =  "Sesion cerrada correctamente";
        header('location:../index.php?msjlogin=' . $mensaje);
        break;
}
?>