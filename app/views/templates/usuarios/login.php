<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="shortcut icon" href="<?php echo RUTA_URL ?>/img/logo-footer.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/styles.css">
</head>
<header class="home-img">
    <a href="/Miranda">
        <img src="<?php echo RUTA_URL ?>/img/home.png">
    </a>

</header>

<body>
    <div class="body-login">
        <div class="wave">
            <img src="<?php echo RUTA_URL ?>/img/usuarios/wave.png">
            <img src="<?php echo RUTA_URL ?>/img/usuarios/bg.svg">
            <?php echo $validate ?>
        </div>
        <div class="usuarios">
            <img src="<?php echo RUTA_URL ?>/img/usuarios/avatar.svg">
            <form action="<?php echo RUTA_URL; ?>/usuarios/validate" method="POST" id="form">
                <p>Bienvenido</p>
                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-user"></i>
                        <h3 id="h3-usuario">Usuario</h3>
                    </div>
                    <input REQUIRED type="user" name="user" id="user" class="input">
                </div>

                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-lock"></i>
                        <h3 id="h3-contraseña">Contraseña</h3>
                    </div>
                    <input REQUIRED type="password" name="pass" id="password" class="input">
                </div>

                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" value="Iniciar">Iniciar Sesión</button>
                <h5 class="warnings" id="warnings"></h5>
            </form>
        </div>
    </div>


    <!--===== Javascript ===================================== -->
    <script src="<?php echo RUTA_URL ?>/js/login-validate.js"></script>
    <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
</body>

</html>