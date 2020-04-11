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

                    switch (cod_grafica) {
                        case 1:
                            rpt_genero(response);

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