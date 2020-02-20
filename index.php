<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medicamentos</title>
    <link href="resource/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="resource/jquery/jquery.js"></script>
    <script type="text/javascript" src="resource/js/empleados.js"></script>
    <script type="text/javascript" src="resource/js/inventario.js"></script>
    <script type="text/javascript" src="resource/js/cbList.js"></script>
    <script type="text/javascript" src="resource/js/venta.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</head>

<body class="" id="page-top">

    <?php
    if (isset($_GET['page'])) {
        include('views/' . $_GET['page'] . ".php");
    } else {
        include("views/vistaInventario.php");
    }
    ?>
</body>

</html>