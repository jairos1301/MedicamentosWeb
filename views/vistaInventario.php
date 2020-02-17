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
                    <label for="inputFechaVenInv">Fecha Vencimiento</label>
                    <input type="date" class="form-control" id="fechaVenInv">
                </div>
            </div>
            <div class="form-group">
                <label for="inputDescripcionInv">Descripción</label>
                <textarea class="form-control" id="descripcionInv" rows="3" placeholder="Descripción"></textarea>
            </div>
            <div class="form-group">
                <label for="inputCorreoEmp">Cantidad</label>
                <input type="number" class="form-control" id="cantidadInv" placeholder="Cantidad">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputUsuarioEmp">Fecha Fabricación</label>
                    <input type="date" class="form-control" id="fechaFabInv">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPasswordEmp">Precio</label>
                    <input type="number" class="form-control" id="precioInv" placeholder="Precio">
                </div>
            </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmpleado">Empleado</label>
                    <select id="inputEmp" class="form-control">
                        <option value="0">Elejir...</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputLaboratorio">Laboratorio</label>
                    <select id="inputLab" class="form-control">
                        <option value="0">Elejir...</option>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="guardarInv">Guardar</button>
            <button type="button" class="btn btn-danger" id="eliminarInv">Eliminar</button>
            <button type="button" class="btn btn-success" id="modificarInv">Modificar</button>
        </form>
        </div>
        <div class="col-6 mt-5 ml-auto mr-auto">
            <table class="table" id="tbl_empleado">
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
                <tbody id="listarInventario">
                </tbody>
            </table>
        </div>
    </div>
</body>