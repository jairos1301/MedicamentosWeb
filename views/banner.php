<head>
<script type="text/javascript" src="resource/js/login.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="?page=vistaEmpleado">Empleado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=vistaInventario">Inventario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=venta">Venta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=reporte">Reporte</a>
            </li>
        </ul>
    </div>
    <form class="form-inline mx-auto" name="formularioLogout" method="POST" action="controller/ctlLogin.php">
        <input type="text" id="" style="display: none;" name="type">
        <input class="btn btn-outline-danger" value="Desconectar" type="button" id="btnDesconectar" onclick="validarLogin(formularioLogout, 'desc')">
    </form>
</nav>