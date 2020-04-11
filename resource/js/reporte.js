'use strict'
let chart;

$(document).ready(function () {

    //$("div_grafica").hide();




    $(document).on('click', '#btn_rpt', function (e) {
        e.preventDefault();
        let cod_grafica = parseInt($("#select_rpt").val());
        if (cod_grafica) {

            $.ajax({
                type: 'post',
                url: "controller/ctlReporte.php",
                beforeSend: function () {
                },
                data: "cod_grafica=" + cod_grafica,
                success: function (respuesta) {
                    var res = JSON.parse(respuesta);
                    var response = JSON.parse(res.data);
                    debugger;
                    switch (cod_grafica) {
                        case 1:
                            rpt_genero(response);
                            break;
                        case 2:
                            rpt_medicamentos(response);
                            break;
                        case 3:
                            // rpt_medicamentos(response);
                            // break;
                        case 4:
                            rpt_det_empleado(response);
                            break;
                        default:
                            break;
                    }
                },
                error: (jqXHR, textStatus, errorThrown) => {
                    alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
                    alert("verifique la ruta de archivo!");
                }
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

function rpt_genero(response) {
    let cols = [];
    $("#title_chart").html('REPORTE SEGUN LA DISTRIBUCION DE GÉNERO');

    for (let i = 0; i < response.length; i++) {
        cols.push([response[i].genero + ": " + response[i].cantidad, response[i].cantidad]);

    }

    chart = c3.generate({
        bindto: '#div_chart',
        data: {
            columns: cols,
            type: 'donut',
        },
        donut: {
            title: "Distribucion de género"
        }
    });
}

function rpt_medicamentos(response) {
    let cols = [];
    $("#title_chart").html('REPORTE SEGUN LA DISTRIBUCION DE MEDICAMENTO');

    for (let i = 0; i < response.length; i++) {
        if(response[i].cantidad > 0)
        cols.push([response[i].medicamento + ": " + response[i].cantidad, response[i].cantidad]);
    }

    chart = c3.generate({
        bindto: '#div_chart',
        data: {
            columns: cols,
            type: 'donut',
        },
        donut: {
        }
    });
}


function rpt_det_empleado(response) {
    let cols = [];
    $("#title_chart").html('REPORTE VENTAS E INGRESOS POR EMPLEADO');

    for (let i = 0; i < response.length; i++) {
        cols.push([response[i].empleado + ": "+ response[i].generado, response[i].ventas]);
    }

    chart = c3.generate({
        bindto: '#div_chart',
        data: {
            columns: cols,
            type: 'bar'
        },
        bar: {
            width: {
                ratio: 0.5
            }        
        }
    });
}