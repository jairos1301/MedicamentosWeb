'use strict'

let cols = "";

$(document).ready(function () {

    //$("div_grafica").hide();
    let chart;


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
                    var x = res.data


                    var row_value = {
                        "2015-5-1": 22792461.479999978,
                        "2015-6-1": 24807797.38999998,
                        "2015-7-1": 25261456.609999962
                    };

                    // This first value of array if the name of your data
                    var sum_list = [];
                    for (let i = 0; i < response.length; i++) {
                        sum_list[i] = response[i].genero + response[i].cantidad;
                    }
                    
                    debugger;

                    chart = c3.generate({
                        bindto: '#div_chart',
                        data: {
                            columns: [
                                sum_list
                            ],
                            type: 'bar',
                        },
                        donut: {
                            title: "Iris Petal Width"
                        }
                    });



                    

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