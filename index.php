<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="resource/icono.png" type="image/ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medicamentos</title>
    <link href="resource/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="resource/jquery/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- <script src="sweetalert2.all.min.js"></script> -->
    <script type="text/javascript" src="resource/js/empleados.js"></script>
    <script type="text/javascript" src="resource/js/inventario.js"></script>
    <script type="text/javascript" src="resource/js/cbList.js"></script>
    <script type="text/javascript" src="resource/js/venta.js"></script>
    <script type="text/javascript" src="resource/js/reporte.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <script type="text/javascript" src="resource/js/login.js"></script>
    <link href="resource/Framework/c3-0.4.17/c3.css" rel="stylesheet" type="text/css" />
    <script src="resource/Framework/c3-0.4.17/bower_components/d3/d3.min.js" type="text/javascript"></script>
    <script src="resource/Framework/c3-0.4.17/c3.min.js" type="text/javascript"></script>

</head>

<body class="" id="page-top">

    <?php

    session_start();

    if (isset($_REQUEST['msjlogin'])) {
        echo $_REQUEST['msjlogin'];
    }

    if (isset($_SESSION["user"])) {
        include("views/masterPage.php");
    } else {
        include("views/login.php");
    }
    ?>
</body>

</html>