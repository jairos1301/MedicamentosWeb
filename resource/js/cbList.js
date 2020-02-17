'use strict'
$(document).ready(function() {
    listaEmpleados();
    listaLaboratorios();
});

function listaEmpleados() {
    $.ajax({
        type: 'post',
        url: "controller/ctlList.php",
        beforeSend: function() {

        },
        data: { type: 'loadListEmp' },
        success: function(respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "<option value='0'>---SELECCIONE---</option>";
            if (info.length > 0) {
                for (let k = 0; k < info.length; k++) {
                    lista = lista + "<option value='" + info[k].idEmpleado + "'>" + info[k].nombres + "</option>";
                }
                $("#inputEmp").html(lista);
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}

function listaLaboratorios() {
    $.ajax({
        type: 'post',
        url: "controller/ctlList.php",
        beforeSend: function() {

        },
        data: { type: 'loadListLab' },
        success: function(respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "<option value='0'>---SELECCIONE---</option>";
            if (info.length > 0) {
                for (let k = 0; k < info.length; k++) {
                    lista = lista + "<option value='" + info[k].idLaboratorio + "'>" + info[k].nombreLab + "</option>";
                }
                $("#inputLab").html(lista);
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}