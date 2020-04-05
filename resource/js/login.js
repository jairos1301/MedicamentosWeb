'use strict'

function validarLogin(fl,tipo) {
    fl.type.value = tipo;
    if (tipo === "con") {
        if (fl.usuario.value !== "" && fl.password.value !== "") {
            fl.submit();
        } else {
            Swal.fire({
                title: 'Cuidado!',
                text: 'Ingrese toda la información.',
                icon: 'warning',
                showConfirmButton: false,
                timer: 1500
            });
        }
    } else {
        fl.submit();
    }
}   