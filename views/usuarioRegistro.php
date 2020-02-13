<body>
    <div class="container-fluid">
        <div>
            <form action="">
                <h2 class="mt-3 text-white">Registrarse:</h2>
            <hr class="bg-white">
                <div class="row container-fluid">
                <div class="col-4">
                    <h4 class="text-white ">Cedula</h4>
                    <input type="text" id="txtIdUsuario" style="display: none">
                    <input class="form-control" type="number" id="txtCedulaU">
                    <h4 class="text-white mt-3">Nombre</h4>
                    <input class="form-control" type="text" id="txtNombreU">
                    <h4 class="text-white mt-3">Apellido</h4>
                    <input class="form-control" type="text" id="txtApellidosU">
                    <h4 class="text-white mt-3">Edad</h4>
                    <input class="form-control" type="number"  id="txtEdadU">
                    <h4 class="text-white mt-3">Genero</h4>
                    <select class="form-control" id="selGenero">
                        <option value="0">---SELECCIONE---</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                </div>
                <div class="col-4">
                    <h4 class="text-white ">Correo</h4>
                    <input class="form-control" type="email" class="campos" id="txtCorreoU">
                    <h4 class="text-white mt-3">Usuario</h4>
                    <input class="form-control" type="text" class="campos" id="txtNicknameU">
                    <h4 class="text-white mt-3">Contraseña</h4>
                    <input class="form-control" type="password" class="campos" id="txtPass1">
                    <h4 class="text-white mt-3">Verifique su Contraseña</h4>
                    <input class="form-control" type="password" class="campos" id="txtPass2">
                    <h4 class="text-white mt-3">Finca</h4>
                    <select  class="form-control" id="selFincasU">
                        <option value="0">Seleccione una Opcion</option>
                    </select>
                </div>
                </div>
            </form>
            <div>
                <input class="col-2 btn btn-primary mt-4 ml-4" type="button" value="Guardar" id="btnGuardarUsuario" onclick=" location.href = 'index.php?page=finca'">
                <input class="col-2 btn btn-primary mt-4 ml-4" type="button" value="Atras"  onclick=" location.href = 'index.php?page=login'">
            </div>
        </div>
    </div>
</body>