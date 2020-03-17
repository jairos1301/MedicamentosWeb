'use strict'

let arrInv = [];

$(document).ready(function () {
    listarMedicamentos();
    listarVentas();
    listaClientes();
    $("#dialog_cliente").hide();
    $("#dialog_venta").hide();
    $("#div_carrito").hide();
    $("#div_rpt_detalle").hide();

    $(document).on('click', '.btn_elimina', function () {
        $("tr[value=" + this.value + "][class='tr_venta']").remove();
        actualiza_total();
        arrInv.splice(arrInv.indexOf(this.value), 1);
    });

    $(document).on('change', '.cantidad_venta', function () {
        var sgte = $(this).parent().next(".valor_medicamento");
        var cantidad = $(this).val();
        var valor = parseInt(sgte.data('unitario'));
        sgte.html(cantidad * valor);
        actualiza_total();
    });

    $(document).on('click', '#agrega_cliente', function () {
        $("#dialog_cliente").dialog({
            draggable: false,
            resizable: false,
            width: "40%",
            title: "Creación cliente"
        });
    });

    $(document).on('click', '#vender', function () {
        if ($("#cliente").val()) {
            var arrCant = [];
            $(".cantidad_venta").each(function () {
                arrCant.push(parseInt($(this).val()));
            })
            $.ajax({
                type: 'post',
                url: "controller/ctlVenta.php",
                beforeSend: function () {
                },
                data: "type=save&total=" + parseInt($("#total_venta").html()) + "&cliente=" + $("#cliente").val() + "&empleado=1&arrInv=" + arrInv + "&arrCant=" + arrCant,
                success: function (respuesta) {
                    var info = JSON.parse(respuesta);
                    if (info.res === "Success") {
                        listaClientes();
                        alert("Operacion exitosa");
                    } else {
                        alert("No se pudo almacenar");
                    }
                    location.reload();
                },
                error: (jqXHR, textStatus, errorThrown) => {
                    alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
                    alert("verifique la ruta de archivo!");
                }
            });
        } else {
            alert('Debe seleccionar un cliente');
        }
    })

    $(document).on('submit', '#form_cliente', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "controller/ctlCliente.php",
            beforeSend: function () {
            },
            data: "type=save&nombres=" + $("#nombres").val() + "&apellidos=" + $("#apellidos").val() + "&cedula=" + $("#cedula").val() + "&genero=" + $("#genero").val() + "&edad=" + $("#edad").val(),
            success: function (respuesta) {
                var info = JSON.parse(respuesta);
                if (info.res === "Success") {
                    listaClientes();
                    alert("Operacion exitosa");
                    $("#dialog_cliente").dialog('close');
                } else {
                    alert("No se pudo almacenar");
                }

            },
            error: (jqXHR, textStatus, errorThrown) => {
                alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
                alert("verifique la ruta de archivo!");
            }
        });
    });

    $(document).on('click', '#ventas_realizadas', function () {
        $("#dialog_venta").dialog({
            draggable: false,
            resizable: false,
            width: "60%",
            title: "Ventas realizadas"
        });
    });

});

function listarMedicamentos() {
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
                    if (info[k].cantidad > 0) {
                        lista = lista + '<tr data-nombre="' + info[k].nombreInv + '" value="' + info[k].idInventario + '" onclick="agrega_venta(' + info[k].idInventario + ',' + info[k].cantidad + ',' + info[k].precio + ')">';
                        lista = lista + '<td>' + info[k].nombreInv + '</td>';
                        lista = lista + '<td>' + info[k].nombreLab + '</td>';
                        lista = lista + '<td>' + info[k].cantidad + '</td>';
                        lista = lista + '<td>' + info[k].precio + '</td>';
                        lista = lista + '</tr>';
                    }
                }
                $("#body_medicamentos").html(lista);
            } else {
                $("#body_medicamentos").html("<tr><td>No se encuentra informacion</td>></tr>");
            }
            $("#tbl_medicamentos").DataTable({
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

function agrega_venta(id, cantidad, precio) {
    var existe = $("tr[value='" + id + "'][class='tr_venta']");
    if (existe.length > 0) {
        alert('El medicamento elegido ya esta en la venta');
    } else {
        $("#body_venta").append("<tr value='" + id + "' class='tr_venta' data-precio='" + precio + "'> <td>" + $("tr[value=" + id + "]").data('nombre') + "</td> <td> <input type='number' onkeydown='return false' data-precio='" + precio + "'class='cantidad_venta' value='1' min='1' max='" + cantidad + "'> </td> <td data-unitario='" + precio + "' class='valor_medicamento'>" + precio + "</td> <td> <button class='btn_elimina btn btn-danger btn-sm' value='" + id + "'type='button'> X </button> </td> </tr>")
        arrInv.push(id);
        actualiza_total();
    }
}

function actualiza_total() {
    var total = 0;
    $('.valor_medicamento').each(function (i) {
        total += parseInt($(this).html());
    });
    $("#total_venta").html(total);
    if (total > 0) {
        $("#div_carrito").show(500);
    } else {
        $("#div_carrito").hide(500);
    }
}

function listaClientes() {
    $("#cliente option[value!='']").remove();
    $.ajax({
        type: 'post',
        url: "controller/ctlCliente.php",
        beforeSend: function () {

        },
        data: { type: 'list' },
        success: function (respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "";
            if (info.length > 0) {
                for (let k = 0; k < info.length; k++) {
                    $("#cliente").append("<option value='" + info[k].idCliente + "'>" + info[k].nombres + " " + info[k].apellidos + "</option>");
                }
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}

function detalle_venta(id){
    $("#vwhere").val(id);
    $("#formDetalle").submit();
}

function listarVentas() {
    $.ajax({
        type: 'post',
        url: "controller/ctlVenta.php",
        beforeSend: function () {
        },
        data: { type: 'list' },
        success: function (respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "";
            if (info.length > 0) {
                for (let k = 0; k < info.length; k++) {
                    lista = lista + '<tr class="tr_realizadas" onClick=detalle_venta('+ info[k].id+')>';
                    lista = lista + '<td>' + info[k].fecha + '</td>';
                    lista = lista + '<td>' + info[k].valor + '</td>';
                    lista = lista + '<td>' + info[k].cliente + '</td>';
                    lista = lista + '<td>' + info[k].empleado + '</td>';
                    lista = lista + '</tr>';
                }
                $("#body_ventas").html(lista);
            } else {
                $("#body_ventas").html("<tr><td>No se encuentra informacion</td></tr>");
            }
            $("#tbl_ventas").DataTable({
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