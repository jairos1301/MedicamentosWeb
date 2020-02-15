<?php
    include("views/banner.php");
?>
<body>
    <div class="row">
        <div class="col-5 ml-5 mt-5">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" id="idInventario" style="display: none">
                    <label for="inputNombreInv">Nombre</label>
                    <input type="text" class="form-control" id="nombreInv" placeholder="Nombre">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputApellidosEmp">Fecha Vencimiento</label>
                    <input type="date" class="form-control" id="apellidosEmp" placeholder="Apellidos">
                </div>
            </div>
            <div class="form-group">
                <label for="inputNombresEmp">Descripción</label>
                <input type="text" class="form-control" id="nombreEmp" placeholder="Nombres">
            </div>
            <div class="form-group">
                <label for="inputDescripcionInv">Descripción</label>
                <textarea class="form-control" id="descripcionInv" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="inputCorreoEmp">Cantidad</label>
                <input type="number" class="form-control" id="correoEmp" placeholder="Correo">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputUsuarioEmp">Fecha Fabricación</label>
                    <input type="date" class="form-control" id="usuarioEmp" placeholder="Usuario">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPasswordEmp">Precio</label>
                    <input type="password" class="form-control" id="passwordEmp" placeholder="Password">
                </div>
            </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmpleado">Empleado</label>
                    <select id="inputEmpleado" class="form-control">
                        <option selected>Elejir...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputLaboratorio">Laboratorio</label>
                    <select id="inputLaboratorio" class="form-control">
                        <option selected>Elejir...</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        </div>
        <div class="col-6 mt-5 ml-auto mr-auto">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripciónn</th>
                        <th scope="col">Vencimiento</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Fabricación</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Laboratorio</th>
                    </tr>
                </thead>
                <tbody id="listarEmpleados">
                </tbody>
            </table>
        </div>
    </div>
</body>