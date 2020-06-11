<?php
if (empty($_SESSION['SESSION_USER'])) {
    redireccionar("/usuarios/login");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/styles.css">
</head>
<header class="fondo-gradiente">
    <nav id="nav">
        <div class="logo ">
            <a href="#""><strong>RIF G-20000169-0</strong></a>
			</div>
			<div class=" enlaces">
                <a href="/Miranda/usuarios/dashboard/" class="page-scroll">Inicio</a>
                <a href="#footer" class="page-scroll">Contact us</a>
        </div>
    </nav>
</header>

<body>
    <!--===== SECCIÓN DE REGISTRO=====-->
    <div class="body-login">
        <div class="wave">
            <img src="<?php echo RUTA_URL ?>/img/usuarios/wave.png">
            <img src="<?php echo RUTA_URL ?>/img/usuarios/bg.svg">
        </div>
        <div class="usuarios">
            <img src="<?php echo RUTA_URL ?>/img/usuarios/avatar.svg">
            <form id="form">
                <p>Registro</p>
                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-user"></i>
                        <h3 id="h3-name">Nombre</h3>
                    </div>
                    <input type="text" name="a_name" id="name" class="input">
                </div>

                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-user"></i>
                        <h3 id="h3-lastName">Apellido</h3>
                    </div>
                    <input type="text" name="a_lastName" id="lastName" class="input">
                </div>

                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-user"></i>
                        <h3 id="h3-usuario">Usuario</h3>
                    </div>
                    <input type="text" name="an_user" id="user" class="input">
                </div>

                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-lock"></i>
                        <h3 id="h3-contraseña">Contraseña</h3>
                    </div>
                    <input type="password" name="a_pass" id="pass" class="input">
                </div>

                <button type="submit">Registrar</button>
                <div class="warnings" id="warnings">
                    <h5>

                    </h5>
                </div>
            </form>
        </div>
    </div>

    <!--===== Javascript ===================================== -->
    <!-- <script src="<?php echo RUTA_URL ?>/js/usuarios.js"></script> -->
    <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
    <script src="<?php echo RUTA_URL ?>/js/register.js"></script>
</body>

</html>