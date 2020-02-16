<?php

include '../DAO/listDAO.php';

    $type = isset($_POST['type']) ? $_POST['type'] : "";

    $conex = new listDAO();

switch ($type) {
    case "loadListEmp":
        $conex->listEmps();
        break;
    case "loadListLab":
        $conex->listLabs();
        break;
}
