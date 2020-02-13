<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Fincas</title>
        <link href="resource/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="resource/jquery/jquery.js"></script>
        <script type="text/javascript" src="resource/js/cargarList.js"></script>
        <script type="text/javascript" src="resource/js/gestionUsuario.js"></script>
    </head>
    <body class="bg-info" id="page-top">
        
        <?php
        if (isset($_GET['page'])) {
            include('views/' . $_GET['page'] . ".php");
        } else {
            include("views/login.php");
        }
        ?>
    </body>
</html>