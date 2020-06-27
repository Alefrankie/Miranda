<?php
if (empty($_SESSION['SESSION_USER'])) {
    redireccionar("/usuarios/login");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Modificar Usuario</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo RUTA_URL ?>/img/logo-footer.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/styles.css">
</head>
<header class="fondo-gradiente">
    <nav id="nav">
        <div class="logo ">
            <a href="#""><strong><?php echo ($_SESSION['SESSION_USER'])?></strong></a>
			</div>
			<div class=" enlaces">
                <a href="/Miranda/usuarios/dashboard/" class="page-scroll">Regresar</a>
        </div>
    </nav>
</header>

<body>
    <div class="body-login">
        <div class="wave">
            <!-- <img src="<?php echo RUTA_URL; ?>/img/usuarios/data-update.svg" alt="name_user"> -->
            <img src="<?php echo RUTA_URL ?>/img/usuarios/flora.svg">
        </div>
        <div class="usuarios">
            <img src="<?php echo RUTA_URL ?>/img/usuarios/avatar.svg">
            <form id="form">
                <p>Modificar</p>
                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-fingerprint"></i>
                        <!-- <h3 id="h3-nombre">Nombre</h3> -->
                    </div>
                    <input type="text" name="an_id" id="an_id" class="input" placeholder="ID" value="<?php echo $data['an_id'] ?>" autocomplete="off" readonly>
                </div>
                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-user"></i>
                        <!-- <h3 id="h3-nombre">Nombre</h3> -->
                    </div>
                    <input type="text" name="a_name" id="name" class="input" placeholder="Nombre" value="<?php echo $data['a_name'] ?>" autocomplete="off">
                </div>
                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-user"></i>
                        <!-- <h3 id="h3-apellido">Apellido</h3> -->
                    </div>
                    <input type="text" name="a_lastName" id="lastName" class="input" placeholder="Apellido" value="<?php echo $data['a_lastName'] ?>" autocomplete="off">
                </div>
                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-user"></i>
                        <!-- <h3 id="h3-usuario">Usuario</h3> -->
                    </div>
                    <input type="text" name="an_user" id="user" class="input" value="<?php echo $data['an_user'] ?>" placeholder="Usuario" autocomplete="off">
                </div>

                <div class="input-div">
                    <div class="head-input">
                        <i class="fas fa-lock"></i>
                        <!-- <h3 id="h3-contraseña">Contraseña</h3> -->
                    </div>
                    <input type="password" name="a_pass" id="pass" class="input" placeholder="Contraseña" value="<?php echo $data['a_pass'] ?>" autocomplete="off">
                </div>

                <div class="forgot-password">
                </div>
                <button type="submit" value="Iniciar">Modificar data</button>
                <div class="warnings" id="warnings">
                    <h5>

                    </h5>
                </div>
            </form>
        </div>

        <!--===== Javascript ===================================== -->
        <script src="<?php echo RUTA_URL ?>/js/modify.js"></script>
        <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
</body>

</html>