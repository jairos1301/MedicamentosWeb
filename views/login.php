
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="resource/css/login.css" rel="stylesheet" type="text/css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="resource/jquery/jquery.js"></script>
<script type="text/javascript" src="resource/js/login.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
    <div id="formContent">
        <h3 class="fadeIn">Bienvenidos!!</h3>
        <!-- Login Form -->
        <form name="formularioLogin" method="POST" action="controller/ctlLogin.php">
            <input type="text" id="txtUsuario" class="fadeIn second" name="usuario" placeholder="Usuario">
            <input type="text" id="txtPassword" class="fadeIn third" name="password" placeholder="Password">
            <input type="text" name="type" style="display: none;">
            <input type="button" id="btnLogin" class="fadeIn fourth" value="Login" onclick="validarLogin(formularioLogin,'con')">
        </form>
    </div>
</div>