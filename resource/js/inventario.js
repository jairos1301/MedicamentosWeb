'use strict'

$(document).ready(function () {
    $("#guardarInv").click(guardarInventario);
    $("#eliminarInv").click(eliminarInventario);
    $("#modificarInv").click(guardarInventario);
    $("#dialog_inv").hide();
    $("#divInv").hide();
    $("#dialog_devo").hide();
    listarInventario();
    listarDevo();

    $(document).on('click', '#devolucion', function () {
        $("#dialog_devo").dialog({
            draggable: false,
            resizable: false,
            width: "80%",
            title: "Devolución"
        });
    });

    $(document).on('click', '#rpt_csv_inv', function () {
        $("#dialog_inv").dialog({
            draggable: false,
            resizable: false,
            width: "40%",
            title: "Generar Reporte CSV"
        });
    });
});

function listarDevo() {
    $.ajax({
        type: 'post',
        url: "controller/ctlInventario.php",
        beforeSend: function () {
        },
        data: { type: 'list' },
        success: function (respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "";
            if (info.length > 0) {
                for (let k = 0; k < info.length; k++) {
                    lista = lista + '<tr id="codigo" style="cursor: pointer;" onclick="devolver(' + info[k].idInventario + ',' + info[k].cantidad + ')">';
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
                $("#listardevo").html(lista);
            } else {
                $("#listardevo").html("<tr><td>No se encuentra informacion</td>></tr>");
            }
            $('#tbl_devo').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                    "sInfo": "Mostrando del _START_ al _END_ de _TOTAL_ ",
                    "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 ",
                    "sInfoFiltered": "(filtrado de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                }
            });
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}

function devolver(id, cant) {
    var cantidad = prompt("Cuantas unidades se devuelven");
    if (cantidad > 0) {
        cant += parseInt(cantidad);
        $.ajax({
            type: 'post',
            url: "controller/ctlInventario.php",
            beforeSend: function () { },
            data: "type=devo&idInventario=" + id + "&cantidad=" + cant,
            success: function (data) {
                console.log(data);

                var info = JSON.parse(data);
                if (info.res === "Success") {
                    Swal.fire({
                        title: 'Bien!',
                        text: 'Operación exitosa',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    location.reload();
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Operación fallida',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    });
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
            text: 'Ingrese un valor mayor a 0',
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        });
    }
}

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
            beforeSend: function () { },
            data: objInv,
            success: function (data) {
                console.log(data);

                var info = JSON.parse(data);
                if (info.res === "Success") {
                    limpiarInventario();
                    listarInventario();
                    Swal.fire({
                        title: 'Bien!',
                        text: 'Operación exitosa',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'No se pudo almacenar',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    });
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
            text: 'Ingrese los datos correctamente',
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        });
    }
}

function listarInventario() {
    $.ajax({
        type: 'post',
        url: "controller/ctlInventario.php",
        beforeSend: function () {
        },
        data: { type: 'list' },
        success: function (respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "";
            if (info.length > 0) {
                for (let k = 0; k < info.length; k++) {
                    lista = lista + '<tr id="codigo" style="cursor: pointer;" onclick="buscarInventario(' + info[k].idInventario + ')">';
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
            $('#tbl_inventario').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                    "sInfo": "Mostrando del _START_ al _END_ de _TOTAL_ ",
                    "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 ",
                    "sInfoFiltered": "(filtrado de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                }
            });
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
        beforeSend: function () {
        },
        data: objInv,
        success: function (res) {
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
                $("#precioInv").val(data[0].precio);
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
        Swal.fire({
            title: 'Cuidado!',
            text: 'No hay objeto a eliminar.',
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        });
    } else {
        const objInv = {
            idInventario: dato,
            type: 'delete'
        };
        $.ajax({
            type: 'post',
            url: "controller/ctlInventario.php",
            beforeSend: function () {
            },
            data: objInv,
            success: function (res) {
                console.log(res);
                var info = JSON.parse(res);
                console.log(info.res);

                if (info.res == "Success") {
                    limpiarInventario();
                    Swal.fire({
                        title: 'Bien!',
                        text: 'Operación exitosa',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    listarInventario();
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Operación fallida',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    });
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

$(document).on('click', '#inventario', function () {
    $("#divInv").dialog({
        draggable: false,
        resizable: false,
        width: "80%",
        title: "Inventario"
    });
})

function limpiarInventario() {
    $("#idInventario").val("");
    $("#nombreInv").val("");
    $("#fechaVenInv").val("");
    $("#descripcionInv").val("");
    $("#cantidadInv").val("");
    $("#fechaFabInv").val("");
    $("#precioInv").val("");
    $("#inputEmp").val(0);
    $("#inputLab").val(0);
}
