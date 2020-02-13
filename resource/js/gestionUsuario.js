$(document).ready(function() {
    $("#btnGuardarUsuario").click(guardarUsuario);
    listFincas();
});

function guardarUsuario() {
    passCla = $("#txtPass2").val();
    let objUsuario = {
        idUsuario: $("#txtIdUsuario").val(),
        cedula: $("#txtCedulaU").val(),
        nombres: ($("#txtNombreU").val()).toUpperCase(),
        apellidos: ($("#txtApellidosU").val()).toUpperCase(),
        edad: $("#txtEdadU").val(),
        genero: $("#selGenero").val(),
        correo: ($("#txtCorreoU").val()).toUpperCase(),
        nickname: $("#txtNicknameU").val(),
        password: $("#txtPass1").val(),
        idFincaU: $("#selFincasU").val(),
        type: ""
    };
    if (
        objUsuario.cedula !== "" &&
        objUsuario.nombres !== "" &&
        objUsuario.apellidos !== "" &&
        objUsuario.edad !== "" &&
        objUsuario.genero !== "" &&
        objUsuario.correo !== "" &&
        objUsuario.nickname !== "" &&
        objUsuario.password !== "" &&
        objUsuario.idFincaU !== ""
    ) {
        if (objUsuario.idUsuario !== "") {
            objUsuario.type = 'update';
        } else {
            if (passCla == objUsuario.password) {
                objUsuario.type = 'save';
            } else {
                alert("Las claves deben ser iguales");
            }
        }
        $.ajax({
            type: 'post',
            url: "controller/ctlUsuario.php",
            beforeSend: function() {},
            data: objUsuario,
            success: function(data) {
                console.log(data);

                var info = JSON.parse(data);
                if (info.res === "Success") {
                    limpiarUsuario();
                    alert("Operacion exitosa");
                } else {
                    alert("No se pudo almacenar");
                }
            },
            error: (jqXHR, textStatus, errorThrown) => {
                alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
                alert("verifique la ruta de archivo!");
            }
        });
    } else {
        alert("Ingrese todos los datos");
    }
}

function listFincas() {
    $.ajax({
        type: 'post',
        url: "controller/ctlList.php",
        beforeSend: function() {

        },
        data: { type: 'loadListFincas' },
        success: function(respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "<option value='0'>---SELECCIONE---</option>";
            if (info.length > 0) {
                for (k = 0; k < info.length; k++) {
                    lista = lista + "<option value='" + info[k].idFinca + "'>" + info[k].nombreFinca + "</option>";
                }
                $("#selFincasU").html(lista);
            } else {

            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}

function limpiarUsuario() {
    $("#txtCedulaU").val("");
    $("#txtNombreU").val("");
    $("#txtApellidosU").val("");
    $("#txtEdadU").val("");
    $("#selGenero").val(0);
    $("#txtCorreoU").val("");
    $("#txtNicknameU").val("");
    $("#txtPass1").val("");
    $("#txtPass2").val("");
    $("#selFincasU").val(0);
}