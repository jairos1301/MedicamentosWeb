<?php
include("banner.php");
?>
<br>
<form id="form_rpt">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <select class="custom-select form-control" id="select_rpt" required>
                    <option value="">Seleccione el reporte...</option>
                    <option value="1">Distribución segun el género</option>
                    <option value="2">Distribución de cantidad de medicamentos </option>
                    <option value="3">Cantidad vendida por producto </option>
                    <option value="4">Empleados con más ventas </option>
                    <option value="5">Ventas e ingresos por dia del mes</option>
                    <option value="6">Ventas por dia de la semana</option>
                </select>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-info" id="btn_rpt">Generar</button>
            </div>
        </div>
    </div>
</form>
<br>
<br>
<div id="div_grafica" class="container">
    <div class="row text-center">
        <div class="col-12">
            <h2 id="title_chart">TITULO DE TALES</h2>
        </div>
    </div>
    <div id="div_chart"></div>
</div>