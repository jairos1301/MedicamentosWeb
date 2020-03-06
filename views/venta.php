<?php
include("banner.php");
?>
<br>
<br>
<div class="row">
    <div class="col-6">
        <div class="row">
            <div class="col-10 offset-1">
                <table id="tbl_medicamentos" class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Laboratorio</th>
                            <th>Existencias</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody id="body_medicamentos">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-5" id="div_carrito">
        <div class="row">
            <div class="col-11">
                <div class="card">
                    <div class="card-header">
                        Carrito de compras
                    </div>
                    <div class="card-body">
                        <table id="tbl_venta" class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>Medicamento</th>
                                    <th>Cantidad</th>
                                    <th>Valor</th>
                                    <th>Quitar</th>
                                </tr>
                            </thead>
                            <tbody id="body_venta">
                            </tbody>
                            <tfoot class="bg-primary">
                                <td colspan="2"><b>Total</b></td>
                                <td id="total_venta"><b>0</b></td>
                                <td></td>
                            </tfoot>
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-10">
                                <select id="cliente" class="form-control">
                                    <option value="" disabled selected>Seleccione el cliente</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn btn-primary" id="agrega_cliente"> + </button>
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" id="vender">Finalizar venta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1">
        <button class="btn btn-danger mr-auto" id="ventas_realizadas">Ventas realizadas</button>
    </div>
</div>
<div id="dialog_cliente">
    <form id="form_cliente">
        <div class="row">
            <div class="col-6">
                <input type="text" required id="nombres" class="form-control" placeholder="Nombres">
            </div>
            <div class="col-6">
                <input type="text" required id="apellidos" class="form-control" placeholder="Apellidos">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <input type="number" id="cedula" required style="-webkit-appearance: none;" class="form-control" placeholder="Cedula">
            </div>
            <div class="col-6">
                <select id="genero" required class="form-control">
                    <option value="" disabled selected>Seleccione el género</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <input type="number" id="edad" required style="-webkit-appearance: none;" class="form-control" placeholder="Edad" min="8">
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>
<div id="dialog_venta">
    <table id="tbl_ventas" class="table table-condensed">
        <thead class="bg-primary">
            <tr>
                <th>Fecha</th>
                <th>Valor total</th>
                <th>Cliente</th>
                <th>Vendedor</th>
            </tr>
        </thead>
        <tbody id="body_ventas">

        </tbody>
    </table>
</div>