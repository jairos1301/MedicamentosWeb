<?php

require '../infrastructure/CORS.php';
include '../DAO/reportesDAO.php';

$cod_grafica = isset($_REQUEST['cod_grafica']) ? $_REQUEST['cod_grafica'] : '';


$conex = new reportesDAO();

$conex->generar_grafica($cod_grafica);
