'use strict'

$(document).ready(function() {
    $("#guardarInv").click(guardarInventario);
    $("#eliminarInv").click(eliminarInventario);
    $("#modificarInv").click(guardarInventario);
    $('#tbl_inventario').DataTable();
    listarInventario();
});

function guardarInventario() {
    let objInv = {
        idInventario: $("#idInventario").val(),
        nombreInv: $("#nombreInv").val(),
        descripcionInv: $("#descripcionInv").val(),
        fechaVencimiento: $("#fechaVenInv").val(),
        cantidad: $("#cantidadInv").val(),
        fechaFabricacion: $("#fechaFabInv").val(),
        precio: $("#precioInv").val(),
        Empleado_idEmpleado: $("#inputEmp").val(),
        Laboratorio_idLaboratorio: $("#inputLab").val(),
        type: ""
    };
    if (
        objInv.nombreInv !== "" &&
        objInv.fechaVencimiento !== "" &&
        objInv.descripcionInv !== "" &&
        objInv.cantidad !== "" &&
        objInv.fechaFabricacion !== "" &&
        objInv.precio !== "" &&
        objInv.Empleado_idEmpleado !== "" &&
        objInv.Laboratorio_idLaboratorio !== "" 
    ) {
        if (objInv.idInventario !== "") {
            objInv.type = 'update';
        } else {
            objInv.type = 'save';
        }
        $.ajax({
            type: 'post',
            url: "controller/ctlInventario.php",
            beforeSend: function() {},
            data: objInv,
            success: function(data) {
                console.log(data);
                var info = JSON.parse(data);
                if (info.res === "Success") {
                    limpiarInventario();
                    listarInventario();
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

function listarInventario() {
    $.ajax({
        type: 'post',
        url: "controller/ctlInventario.php",
        beforeSend: function() {
        },
        data: { type: 'list' },
        success: function(respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "";
            if (info.length > 0) {
                for (let k = 0; k < info.length; k++) {
                    lista = lista + '<tr id="codigo" onclick="buscarInventario(' + info[k].idInventario + ')">';
                    lista = lista + '<td>' + info[k].nombreInv + '</td>';
                    lista = lista + '<td>' + info[k].descripcionInv + '</td>';
                    lista = lista + '<td>' + info[k].fechaVen + '</td>';
                    lista = lista + '<td>' + info[k].cantidad + '</td>';
                    lista = lista + '<td>' + info[k].fechaFab + '</td>';
                    lista = lista + '<td>' + info[k].precio + '</td>';
                    lista = lista + '<td>' + info[k].nombres + '</td>';
                    lista = lista + '<td>' + info[k].nombreLab + '</td>';
                    lista = lista + '</tr>';
                }
                $("#listarInventario").html(lista);
            } else {
                $("#listarInventario").html("<tr><td>No se encuentra informacion</td>></tr>");
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}

function buscarInventario(codigo) {
    $("#idInventario").val(codigo);
    const objInv = {
        idInventario: codigo,
        type: 'search'
    };
    $.ajax({
        type: 'post',
        url: "controller/ctlInventario.php",
        beforeSend: function() {
        },
        data: objInv,
        success: function(res) {
            const info = JSON.parse(res);
            let data;
            if (info.res !== "NotInfo") {
                data = JSON.parse(info.data);
            }
            if (info.msj === "Success") {
                $("#nombreInv").val(data[0].nombreInv);
                $("#descripcionInv").val(data[0].descripcionInv);
                $("#fechaVenInv").val(data[0].fechaVen);
                $("#cantidadInv").val(data[0].cantidad);
                $("#fechaFabInv").val(data[0].fechaFab);
                $("#precionInv").val(data[0].precio);
                $("#inputEmp").val(data[0].Empleado_idEmpleado);
                $("#inputLab").val(data[0].Laboratorio_idLaboratorio);
            } else {
                alert("No se encuentra");
                limpiarInventario();
            }
        }
    });
}

function eliminarInventario() {
    var dato = $("#idInventario").val();
    if (dato == "") {
        alert("Debe cargar los datos a eliminar");
    } else {
        const objInv = {
            idInventario: dato,
            type: 'delete'
        };

        $.ajax({
            type: 'post',
            url: "controller/ctlInventario.php",
            beforeSend: function() {

            },
            data: objInv,
            success: function(res) {
                console.log(res);
                var info = JSON.parse(res);
                if (info.res == "Success") {
                    limpiarInventario();
                    alert("Eliminado con exito");
                    listarInventario();
                } else {
                    alert("No se pudo eliminar");
                    limpiarInventario();
                }
            },
            error: (jqXHR, textStatus, errorThrown) => {
                alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
                alert("verifique la ruta de archivo!");
            }
        });
    }
}

function limpiarInventario() {
    $("#idInventario").val("");
    $("#nombreInv").val("");
    $("#fechaVenInv").val("");
    $("#descripcionInv").val("");
    $("#cantidadInv").val("");
    $("#fechaFabInv").val("");
    $("#precionInv").val("");
    $("#inputEmp").val(0);
    $("#inputLab").val(0);
}