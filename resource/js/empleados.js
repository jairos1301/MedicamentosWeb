'use strict'

$(document).ready(function() {
    $("#guardarEmp").click(guardarEmpleado);
    $("#eliminarEmp").click(eliminarEmpleado);
    $("#modificarEmp").click(guardarEmpleado);
    listarEmpleados();
});

function guardarEmpleado() {
    let objEmp = {
        idEmpleado: $("#idEmp").val(),
        cedula: $("#cedulaEmp").val(),
        nombres: $("#nombresEmp").val(),
        apellidos: $("#apellidosEmp").val(),
        correo: $("#correoEmp").val(),
        usuario: $("#usuarioEmp").val(),
        password: $("#passwordEmp").val(),
        type: ""
    };
    if (
        objEmp.cedula !== "" &&
        objEmp.nombres !== "" &&
        objEmp.apellidos !== "" &&
        objEmp.correo !== "" &&
        objEmp.usuario !== "" &&
        objEmp.password !== ""
    ) {
        if (objEmp.idEmpleado !== "") {
            objEmp.type = 'update';
        } else {
            objEmp.type = 'save';
        }
        $.ajax({
            type: 'post',
            url: "controller/ctlEmpleado.php",
            beforeSend: function() {},
            data: objEmp,
            success: function(data) {
                var info = JSON.parse(data);
                if (info.res === "Success") {
                    limpiarEmpleado();
                    alert("Operacion exitosa");
                    listarEmpleados();
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

function listarEmpleados() {
    $.ajax({
        type: 'post',
        url: "controller/ctlEmpleado.php",
        beforeSend: function() {

        },
        data: { type: 'list' },
        success: function(respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "";
            if (info.length > 0) {
                for (let k = 0; k < info.length; k++) {
                    lista = lista + '<tr id="codigo" style="cursor: pointer;" onclick="buscarEmpleado(' + info[k].idEmpleado + ')">';
                    lista = lista + '<td>' + info[k].cedula + '</td>';
                    lista = lista + '<td>' + info[k].nombres + '</td>';
                    lista = lista + '<td>' + info[k].apellidos + '</td>';
                    lista = lista + '<td>' + info[k].correo + '</td>';
                    lista = lista + '<td>' + info[k].usuario + '</td>';
                    lista = lista + '</tr>';
                }
                $("#listarEmpleados").html(lista);
            } else {
                $("#listarEmpleados").html("<tr><td>No se encuentra informacion</td>></tr>");
            }
            $("#tbl_empleado").DataTable({
                "language" : {
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

function buscarEmpleado(codigo) {
    $("#idEmp").val(codigo);
    const objEmp = {
        idEmpleado: $("#idEmp").val(),
        type: 'search'
    };
    $.ajax({
        type: 'post',
        url: "controller/ctlEmpleado.php",
        beforeSend: function() {
        },
        data: objEmp,
        success: function(res) {
            const info = JSON.parse(res);
            let data;
            if (info.res !== "NotInfo") {
                data = JSON.parse(info.data);
            }
            if (info.msj === "Success") {

                $("#idEmp").val(data[0].idEmpleado);
                $("#cedulaEmp").val(data[0].cedula);
                $("#nombresEmp").val(data[0].nombres);
                $("#apellidosEmp").val(data[0].apellidos);
                $("#correoEmp").val(data[0].correo);
                $("#usuarioEmp").val(data[0].usuario);
                $("#passwordEmp").val(data[0].password);
            } else {
                alert("No se encuentra");
                limpiarEmpleado();
            }
        }
    });
}

function eliminarEmpleado() {
    var dato = $("#idEmp").val();
    if (dato == "") {
        alert("Debe cargar los datos a eliminar");
    } else {
        const objEmp = {
            idEmpleado: dato,
            type: 'delete'
        };

        $.ajax({
            type: 'post',
            url: "controller/ctlEmpleado.php",
            beforeSend: function() {

            },
            data: objEmp,
            success: function(res) {
                var info = JSON.parse(res);
                if (info.res == "Success") {
                    limpiarEmpleado();
                    listarEmpleados();
                    alert("Eliminado con exito");
                } else {
                    alert("No se pudo eliminar tiene registros asociados");
                }
            },
            error: (jqXHR, textStatus, errorThrown) => {
                alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
                alert("verifique la ruta de archivo!");
            }
        });
    }
}

function limpiarEmpleado() {
    $("#idEmp").val("");
    $("#cedulaEmp").val("");
    $("#nombresEmp").val("");
    $("#apellidosEmp").val("");
    $("#correoEmp").val("");
    $("#usuarioEmp").val("");
    $("#passwordEmp").val("");
}
