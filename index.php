<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medicamentos</title>
    <link href="resource/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="resource/jquery/jquery.js"></script>
    <script type="text/javascript" src="resource/js/empleados.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- <script type="text/javascript" src="resource/js/gestionUsuario.js"></script> -->
    
</head>

<body class="" id="page-top">

    <?php
    if (isset($_GET['page'])) {
        include('views/' . $_GET['page'] . ".php");
    } else {
        include("views/banner.php");
    }
    ?>
</body>

</html>