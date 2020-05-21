<?php

require '../infrastructure/CORS.php';
include "../model/clsTipoUsuario.php";
include '../DAO/tipoUsuarioDAO.php';

    $idTipoUsuario = isset($_REQUEST['idTipoUsuario']) ? $_REQUEST['idTipoUsuario'] : '';
    $nombreTipo = isset($_REQUEST['nombreTipo']) ? $_REQUEST['nombreTipo'] : '';
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
    
    $proveedor = new clsTipoUsuario($idTipoUsuario,$nombreTipo);
    $conex = new tipoUsuarioDAO();

switch ($type) {
    case "list":
        $conex->listar();
        break;
}
?>