<?php

include '../DAO/listDAO.php';



    $type = isset($_POST['type']) ? $_POST['type'] : "";
    $valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $conex = new listDAO();

switch ($type) {
    case "loadListDepto":
        $conex->listDeptos();
        break;
    case "loadListMuni":
        $conex->listMuni($valor);
        break;
    case "loadListFincas":
        $conex->listFincas();
        break;
}
