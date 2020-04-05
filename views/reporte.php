<?php
include("views/banner.php");
?>
<br>
<script>
    'use scrict'

    $(document).ready(function() {

        $("#dialog_rpt").hide();


        $(document).on('click', '#btn_rpt', function(e) {
            e.preventDefault();
            let cod_reporte = parseInt($("#select_rpt").val());
            if (cod_reporte) {
                switch (cod_reporte) {
                    case 1:
                        $(".nombre_rpt").val("Mejores clientes");
                        break;
                    case 2:
                        $(".nombre_rpt").val("Mejores empleados");
                        break;
                    case 3:
                        $(".nombre_rpt").val("Productos mas vendidos");
                        break;
                    case 4:
                        $(".nombre_rpt").val("Informe diario de ventas");
                        break;
                }
                $(".cod_rpt").val(cod_reporte);
                $("#dialog_rpt").dialog({
                    draggable: false,
                    resizable: false,
                    width: "25%",
                    title: "Generar Reporte CSV"
                });
            } else {
                Swal.fire({
                    title: 'Cuidado!',
                    text: 'Debe seleccionar un reporte',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });
</script>
<form id="form_rpt">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <select class="custom-select form-control" id="select_rpt" required>
                    <option value="">Seleccione el reporte...</option>
                    <option value="1">Mejores clientes</option>
                    <option value="2">Mejores empleados</option>
                    <option value="3">Productos mas vendidos</option>
                    <option value="4">Informe diario de ventas</option>
                </select>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-info" id="btn_rpt">Generar</button>
            </div>
        </div>
    </div>
</form>
<div id="dialog_rpt" class="row text-center">
    <div class="col-6">
        <form name="formCSV_emp1" method="post" action="./reporte/gestionCSV_rpt.php" target="_blank">
            <input type="hidden" name="separator" value=",">
            <input type="hidden" name="nombre_rpt" class="nombre_rpt" value="">
            <input type="hidden" name="cod_rpt" class="cod_rpt" value="">
            <input type="submit" class="btn btn-primary" value="Separar por ,">
        </form>
    </div>
    <div class="col-6">
        <form name="formCSV_emp2" method="post" action="./reporte/gestionCSV_rpt.php" target="_blank">
            <input type="hidden" name="separator" value=";">
            <input type="hidden" name="nombre_rpt" class="nombre_rpt" value="">
            <input type="hidden" name="cod_rpt" class="cod_rpt" value="">
            <input type="submit" class="btn btn-primary" value="Separar por ;">
        </form>
    </div>
</div>