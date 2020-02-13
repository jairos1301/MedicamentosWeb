$(document).ready(function() {
    listDeptos();
    //listFincas();
});

function listDeptos() {
    $.ajax({
        type: 'post',
        url: "controller/ctlList.php",
        beforeSend: function() {

        },
        data: { type: 'loadListDepto' },
        success: function(respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "<option value='0'>---SELECCIONE---</option>";
            if (info.length > 0) {
                for (k = 0; k < info.length; k++) {
                    lista = lista + "<option value='" + info[k].idDepartamento + "'>" + info[k].nombreDepto + "</option>";
                }
                $("#txtDepto").html(lista);
                $("#listarDeptosMun").html(lista);
            } else {

            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}

function listMunicipios() {
    const objMunicipio = {
        valor: $("#txtDepto").val(),
        type: 'loadListMuni'
    };
    $.ajax({
        type: 'post',
        url: "controller/ctlList.php",
        beforeSend: function() {},
        data: objMunicipio,
        success: function(respuesta) {

            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);

            var lista = "<option value='0'>---SELECCIONE---</option>";

            if (info.length > 0) {
                for (k = 0; k < info.length; k++) {
                    lista = lista + "<option value='" + info[k].idMunicipio + "'>" + info[k].nombreMpio + "</option>";
                }
                $("#txtMunicipio").html(lista);
            } else {
                lista = "<option value='0'>NO HAY ELEMENTOS</option>";
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}