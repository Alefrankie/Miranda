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
                <a href="/Miranda" class="page-scroll">Inicio</a>
                <a href="#footer" class="page-scroll">Contact us</a>
        </div>
    </nav>
</header>

<body>
    <!--===== SECCIÓN DE REGISTRO=====-->
    <section class="usuarios">
        <img src="<?php echo RUTA_URL ?>/img/usuarios/register.svg">
        <div class="register-contenedor-formulario">
            <div class="card">
                <h1> <strong><span>Alcaldía Miranda</span></strong></h1>
                <img src="<?php echo RUTA_URL ?>/img/usuarios/profile.png" alt="">
                <form action="<?php echo RUTA_URL; ?>/usuarios/register" method="POST" id="formulario">
                    <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre" autocomplete="off">

                    <input id="apellido" type="text" name="apellido" class="form-control" placeholder="Apellido" autocomplete="off">

                    <input id="user" type="text" name="user" class="form-control" placeholder="Nombre de Usuario" autocomplete="off">

                    <input id="pass" type="password" name="pass" class="form-control" placeholder="Contraseña" autocomplete="off">

                    <button type="submit" value="Iniciar">Registrar</button>
                </form>
            </div>
        </div>
    </section>
    <?php require RUTA_APP . '/views/inc/footer-institutos.php'; ?>

    <!--===== Javascript ===================================== -->
    <!-- <script src="<?php echo RUTA_URL ?>/js/usuarios.js"></script> -->
    <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
    <script src="<?php echo RUTA_URL ?>/js/register.js"></script>
</body>

</html>