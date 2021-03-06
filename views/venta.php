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
                <button type="button" class="btn btn-primary" id="rpt_csv_cliente">CSV</button>
                <button type="button" id="btn_pdf_cliente" class="btn btn-primary" id="rpt_csv_cliente">PDF</button>
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
    <div class="row">
        <div class="col-2">
            <form name="formPDF" method="post" action="./reporte/gestionPDF.php" target="_blank">
                <input type="hidden" name="nombre" value="venta">
                <input type="hidden" name="nombre_rpt" value="VENTAS">
                <input type="submit" class="btn btn-info" value="Generar PDF">
            </form>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-info" id="rpt_csv_venta">Generar CSV</button>
        </div>
    </div>
</div>
<div id="div_rpt_detalle">
    <form name="formPDF" id="formDetalle" method="post" action="./reporte/gestionPDF.php" target="_blank">
        <input type="hidden" name="rpt" value="detalle">
        <input type="hidden" name="vwhere" id="vwhere" value="">
        <input type="hidden" name="nombre" value="venta">
        <input type="hidden" name="nombre_rpt" value="DETALLE DE VENTAS">
        <input type="submit" value="Generar PDF">
    </form>
</div>
<div id="dialog_venta_csv" class="row">
    <div class="col-3">
        <form name="formCSV_emp1" method="post" action="./reporte/gestionCSV.php" target="_blank">
            <input type="hidden" name="separator" value=",">
            <input type="hidden" name="nombre" value="venta">
            <input type="hidden" name="nombre_rpt" value="VENTAS">
            <input type="submit" class="btn btn-primary" onclick="cerrar('dialog_venta_csv');" value="Separar por ,">
        </form>
    </div>
    <div class="col-4">
        <form name="formCSV_emp2" method="post" action="./reporte/gestionCSV.php" target="_blank">
            <input type="hidden" name="separator" value=";">
            <input type="hidden" name="nombre" value="venta">
            <input type="hidden" name="nombre_rpt" value="VENTAS">
            <input type="submit" class="btn btn-primary" onclick="cerrar('dialog_venta_csv');" value="Separar por ;">
        </form>
    </div>
</div>
<div id="dialog_cliente_csv" class="row">
    <div class="col-3">
        <form name="formCSV_emp1" method="post" action="./reporte/gestionCSV.php" target="_blank">
            <input type="hidden" name="separator" value=",">
            <input type="hidden" name="nombre" value="cliente">
            <input type="hidden" name="nombre_rpt" value="CLIENTES">
            <input type="submit" class="btn btn-primary" onclick="cerrar('dialog_cliente_csv');" value="Separar por ,">
        </form>
    </div>
    <div class="col-4">
        <form name="formCSV_emp2" method="post" action="./reporte/gestionCSV.php" target="_blank">
            <input type="hidden" name="separator" value=";">
            <input type="hidden" name="nombre" value="cliente">
            <input type="hidden" name="nombre_rpt" value="CLIENTES">
            <input type="submit" class="btn btn-primary" onclick="cerrar('dialog_cliente_csv');" value="Separar por ;">
        </form>
    </div>
</div>
<div hidden>
    <form id="form_pdf_cliente" name="formPDF" method="post" action="./reporte/gestionPDF.php" target="_blank">
        <input type="hidden" name="nombre" value="cliente">
        <input type="hidden" name="nombre_rpt" value="CLIENTES">
        <input type="submit" class="btn btn-primary" value="PDF">
    </form>
</div>