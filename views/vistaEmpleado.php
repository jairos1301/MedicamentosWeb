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
            </form>
            <div class="row">
                <div>
                    <button type="button" class="btn btn-primary" id="guardarEmp">Guardar</button>
                    <button type="button" class="btn btn-danger" id="eliminarEmp">Eliminar</button>
                    <button type="button" class="btn btn-success" id="modificarEmp">Modificar</button>
                    <button type="button" class="btn btn-info" id="rpt_csv_emp">Generar CSV</button>
                </div>
                <div style="margin-left: 4px;">
                    <form name="formPDF" method="post" action="./reporte/gestionPDF.php" target="_blank">
                        <input type="hidden" name="nombre" value="empleado">
                        <input type="hidden" name="nombre_rpt" value="EMPLEADOS">
                        <input type="submit" class="btn btn-info" value="Generar PDF">
                    </form>
                </div>
            </div>
        </div>
        <div id="dialog_emp_csv" class="row" style="margin-left: 100px; margin-top: 20px">
            <form name="formCSV_emp1" method="post" action="./reporte/gestionCSV.php" target="_blank">
                <input type="hidden" name="separator" value=",">
                <input type="hidden" name="nombre" value="empleado">
                <input type="hidden" name="nombre_rpt" value="EMPLEADOS">
                <input type="submit" class="btn btn-primary" onclick="cerrar('dialog_emp_csv');" value="Separar por ','">
            </form>
            <form style="margin-left: 16px" name="formCSV_emp2" method="post" action="./reporte/gestionCSV.php" target="_blank">
                <input type="hidden" name="separator" value=";">
                <input type="hidden" name="nombre" value="empleado">
                <input type="hidden" name="nombre_rpt" value="EMPLEADOS">
                <input type="submit" class="btn btn-primary" onclick="cerrar('dialog_emp_csv');" value="Separar por ';'">
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