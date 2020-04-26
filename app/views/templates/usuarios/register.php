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
                <form action="" method="POST" id="formulario">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">

                    <input type="text" name="apellido" class="form-control" placeholder="Apellido">

                    <input type="text" name="usuario" class="form-control" placeholder="Nombre de Usuario">

                    <input type="password" name="password" class="form-control" placeholder="Contraseña">

                    <input type="email" name="email" class="form-control" placeholder="correo@example.com">

                    <div class="radio-buttons">
                        <input REQUIRED type="radio" name="t_user" value="admin" />
                        <p><strong>Administrador </strong></p>

                        <input REQUIRED type="radio" name="t_user" value="usuario" />
                        <p><strong>Empleado</strong></p>
                    </div>

                    <button type="submit" value="Iniciar">Registrarse</button>
                </form>
            </div>

            <div class="no-account">
                <a href="/Miranda/usuarios/login">¿Ya tienes Cuenta? Inicia Sesión</a>
            </div>
        </div>
    </section>
    <?php require RUTA_APP . '/views/inc/footer-institutos.php'; ?>

    <!--===== Javascript ===================================== -->
    <!-- <script src="<?php echo RUTA_URL ?>/js/usuarios.js"></script> -->
    <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
</body>

</html>