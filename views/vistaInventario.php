<?php
    include("views/banner.php");
?>
<body>
    <div class="row">
        <div class="ml-5 mt-5">
        <form autocomplete="off">
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
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputDescripcionInv">Descripción</label>
                    <textarea class="form-control" style="resize: none;" id="descripcionInv" placeholder="Descripción"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCorreoEmp">Cantidad</label>
                    <input type="number" class="form-control" id="cantidadInv" placeholder="Cantidad">
                </div>
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
            <button type="button" class="btn btn-danger mr-auto" id="inventario">Lista Inventario</button>
        </form>
        </div>
        <div id="divInv">
            <table class="table" id="tbl_empleado">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha/Ven</th>
                        <th scope="col">Cant</th>
                        <th scope="col">Fecha/Fab</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Lab</th>
                    </tr>
                </thead>
                <tbody id="listarInventario">
                </tbody>
            </table>
        </div>
    </div>
</body>
