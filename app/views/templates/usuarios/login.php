<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/styles.css">
</head>
<header class="fondo-gradiente">
    <nav id="nav">
        <div class="logo ">
            <a href="#""><strong>RIF G-20000169-0</strong></a>
			</div>
			<div class=" enlaces">
                <a href="<?php echo RUTA_URL; ?>/" class="page-scroll">Inicio</a>
                <a href="#footer" class="page-scroll">Contact us</a>
        </div>
    </nav>
</header>

<body>
    <section class="usuarios">
        <img src="<?php echo RUTA_URL ?>/img/usuarios/login.svg">
        <div class="usuarios-contenedor-formulario">
            <div class="card">
                <h1> <strong><span>Alcaldía Miranda</span></strong></h1>
                <form action="<?php echo RUTA_URL; ?>/usuarios/dashboard" method="POST" id="formulario">
                    <input REQUIRED type="user" name="user" class="form-control" placeholder="Indique su usuario">

                    <input REQUIRED type="password" name="pass" class="form-control" placeholder="Indique su clave">

                    <div class="radio-buttons">
                        <input REQUIRED type="radio" name="t_user" value="ADMINISTRADOR" id="admin" />
                        <p><strong>Administrador </strong></p>

                        <input REQUIRED type="radio" name="t_user" value="EMPLEADO" id="empleado" />
                        <p><strong>Empleado</strong></p>
                    </div>
                    <button type="submit" value="Iniciar">Iniciar Sesión</button>
                </form>
            </div>
            <div class="no-account">
                <a href="/miranda/usuarios/register/<?php echo $datos ?>">¿No tienes Cuenta? Registrate</a>
            </div>
        </div>
        <div class="admin-privileges">
            <div class="admin-privileges-footer">
                <p>Copyright © 2019-2020.</p>
            </div>
        </div>
    </section>

    <!--===== Javascript ===================================== -->
    <script src="<?php echo RUTA_URL ?>/js/usuario.js"></script>
    <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
</body>

</html>