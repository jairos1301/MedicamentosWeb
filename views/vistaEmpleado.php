<?php
include("views/banner.php");
?>

<head>
    <script type="text/javascript" src="resource/js/login.js"></script>
</head>

<body>
    <div class="row">
        <div class="col-5 ml-5 mt-5">
            <form autocomplete="off">
                <div class="form-group">
                    <input type="text" id="idEmp" style="display: none" value="">
                    <label for="inputCedulaEmp">Cedula</label>
                    <input type="number" class="form-control" id="cedulaEmp" placeholder="Nro. cedula">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNombresEmp">Nombres</label>
                        <input type="text" class="form-control" id="nombresEmp" placeholder="Nombres">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputApellidosEmp">Apellidos</label>
                        <input type="text" class="form-control" id="apellidosEmp" placeholder="Apellidos">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCorreoEmp">Correo</label>
                    <input type="email" class="form-control" id="correoEmp" placeholder="Correo">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputUsuarioEmp">Usuario</label>
                        <input type="text" class="form-control" id="usuarioEmp" placeholder="Usuario">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPasswordEmp">Password</label>
                        <input type="password" class="form-control" id="passwordEmp" placeholder="Password">
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="guardarEmp">Guardar</button>
                <button type="button" class="btn btn-danger" id="eliminarEmp">Eliminar</button>
                <button type="button" class="btn btn-success" id="modificarEmp">Modificar</button>
            </form>
        </div>
        <div class="col-6 mt-5 ml-auto mr-auto">
            <table class="table table-condensed" id="tbl_empleado">
                <thead class="bg-primary">
                    <tr>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody id="listarEmpleados">
                </tbody>
            </table>
        </div>
    </div>
    <div id="dialog_devo">
        <table class="table table-condensed" id="tbl_devo">
            <thead class="bg-primary">
                <tr>
                    <th>Cedula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody id="listarEmpleados">
            </tbody>
        </table>
    </div>
</body>