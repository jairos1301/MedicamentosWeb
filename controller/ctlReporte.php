<?php

include '../DAO/reportesDAO.php';

$cod_grafica = isset($_POST['cod_grafica']) ? $_POST['cod_grafica'] : '';

$conex = new reportesDAO();

$conex->generar_grafica($cod_grafica);
