<?php
if (empty($_SESSION['SESSION_USER'])) {
    redireccionar("/usuarios/login");
}
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="<?php echo RUTA_URL ?>/img/logo-footer.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/styles.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/bootstrap.min.css">
</head>
<header class="fondo-gradiente">
    <nav id="nav">
        <div class="logo">
            <a href="#" style="text-transform:uppercase;"><strong id="t_user"><?php echo $data['t_user']; ?></strong></a>
        </div>
        <div class="enlaces" id="enlaces">
            <a href="<?php echo RUTA_URL; ?>/"><i class="fa fa-home"></i> INICIO</a>
            <a href="#data-update"><i class="fa fa-user"></i> ACTUALIZAR DATOS</a>
            <a href="#data-base" id="enlace_BuscarUsuario"><i class="fas fa-search"></i></i> BUSCAR USUARIO</a>
            <a href="#personal-card"><i class="fa fa-link"></i> FICHA PERSONAL</a></<a>
            <a href="<?php echo RUTA_URL; ?>/noticias"><i class="fa fa-link"></i> NOTICIAS</a></<a>
            <a href="<?php echo RUTA_URL; ?>/usuarios/closeSession"><i class="fas fa-power-off"></i> CERRAR SESIÓN</a></<a>
        </div>
    </nav>
</header>

<body>
    <!-- <div class="preloader">
        <div class="lds-default">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> -->

    <div class="data-update contenedor" id="data-update">
        <h2>Bienvenido <?php echo $_SESSION['SESSION_USER'] ?></h2>

        <form id="dashboard_perfil" class="data-update__form">
            <img class="newsImages" id="photo" src="<?php echo RUTA_URL ?>/img/usuarios/avatar.svg" alt="name_user">
            <div class="labelsImages" id="labelInputPhotoPerfil">
                <label for="inputPhotoPerfil" style="font-size: 30px;">Cambiar</label>
            </div>
            <input id="inputPhotoPerfil" type="file" name="imagen" accept=".jpg,.png">
        </form>

        <div class="svg-bottom" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </div>

    <div class="data-base-users" id="data-base">
        <div class="svg-top" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 271.49,-50.00 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
        <h2>BUSCAR EMPLEADO</h2>
        <form action="../admin/buscar/p_buscar.php" method="post" target="_blank">
            <!-- <label for="cedula">Cédula:</label> -->
            <!-- <input type="text" REQUIRED placeholder="Cedula" name="cedula" id="cedula" />
            <input class="form-button" type="submit" class="button" value="BUSCAR" />
            <input class="form-button" type="submit" class="button" value="TODOS" /> -->
            <a class="form-button" href="<?php echo RUTA_URL; ?>/usuarios/register">Registrar Usuario</a>
        </form>
        <br>
        <br>
        <br>
        <br>

        <table class="table container text-center table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Privilegios</th>
                    <th>Estado</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="contenido">
                <!--
                    Este contenido es GENERADO POR JS, se encuentra en el archivo dashboard.js
                 -->
            </tbody>
        </table>

        <div class="svg-bottom" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </div>

    <div class="personal-card contenedor" id="personal-card">
        <div class="body-login">
            <div class="wave">
                <img src="<?php echo RUTA_URL; ?>/img/usuarios/data-update.svg" alt="name_user">
            </div>
            <div class="usuarios">
                <img src="<?php echo RUTA_URL ?>/img/usuarios/avatar.svg">
                <form id="form">
                    <p>Actualización</p>
                    <div class="input-div">
                        <div class="head-input">
                            <i class="fas fa-user"></i>
                            <!-- <h3 id="h3-nombre">Nombre</h3> -->
                        </div>
                        <input type="text" name="nombre" id="nombre" class="input" placeholder="Nombre" value="<?php echo $data['nombre']; ?>" autocomplete="off">
                    </div>
                    <div class="input-div">
                        <div class="head-input">
                            <i class="fas fa-user"></i>
                            <!-- <h3 id="h3-apellido">Apellido</h3> -->
                        </div>
                        <input type="text" name="apellido" id="apellido" class="input" placeholder="Apellido" value="<?php echo $data['apellido']; ?>" autocomplete="off">
                    </div>
                    <div class="input-div">
                        <div class="head-input">
                            <i class="fas fa-user"></i>
                            <!-- <h3 id="h3-usuario">Usuario</h3> -->
                        </div>
                        <input type="text" name="user" id="user" class="input" placeholder="Usuario" autocomplete="off">
                    </div>

                    <div class="input-div">
                        <div class="head-input">
                            <i class="fas fa-lock"></i>
                            <!-- <h3 id="h3-contraseña">Contraseña</h3> -->
                        </div>
                        <input type="password" name="pass" id="password" class="input" placeholder="Contraseña" autocomplete="off">
                    </div>

                    <div class="forgot-password">
                    </div>
                    <button type="submit" value="Iniciar">Actualizar data</button>
                    <div class="warnings" id="warnings">
                        <h5>

                        </h5>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="managementHomePage contenedor" id="managementHomePage" style="margin: 50 0px;">

        <div>
            <h2>Anuncio</h2>
            <form id="announcementHomepage_FORM" class="announcement__form" enctype="multipart/form-data">
                <img class="newsImages" id="announcement" src="<?php echo RUTA_URL ?>/img/usuarios/avatar.svg">
                <div class="labelsImages" id="labelInputAnnouncement">
                    <label for="inputAnnouncement" style="font-size: 30px;">Cambiar</label>
                </div>
                <input class="inputNews" id="inputAnnouncement" name="announcement" type="file"  accept=".jpg,.png" >
            </form>
        </div>

        <div>
            <h2>Noticia 1</h2>
            <form id="news1Homepage_FORM" class="news__form" enctype="multipart/form-data">
                <img class="newsImages" id="news1" src="<?php echo RUTA_URL ?>/img/usuarios/avatar.svg" alt="name_user">
                <div class="labelsImages" id="labelInputNews1">
                    <label for="inputNews1" style="font-size: 30px;">Cambiar</label>
                </div>
                <input class="inputNews" id="inputNews1" name="news1" type="file" accept=".jpg,.png">
            </form>
        </div>

        <div>
            <h2>Noticia 2</h2>
            <form id="news2Homepage_FORM" class="news__form" enctype="multipart/form-data">
                <img class="newsImages" id="news2" src="<?php echo RUTA_URL ?>/img/usuarios/avatar.svg" alt="name_user">
                <div class="labelsImages" id="labelInputNews2">
                    <label for="inputNews2" style="font-size: 30px;">Cambiar</label>
                </div>
                <input class="inputNews" id="inputNews2" name="news2" type="file" accept=".jpg,.png">
            </form>
        </div>

    </div>

    <div>
        <div class="footer-body" style="text-align: center;">
            <div class="footer-social">
                <a class="icon icon-facebook fab fa-facebook"></a>
                <a class="icon icon-instagram fab fa-instagram"></a>
                <a class="icon icon-twitter fab fa-twitter"></a>
                <a class="icon icon-whatsapp fab fa-whatsapp"></a>
                <a class="icon icon-youtube fab fa-youtube"></a>
            </div>

            <div>
                <p>Copyright © 2019-2020. Developed with <a href="#">AJMA</a></p>
            </div>
        </div>
    </div>

    <!--===== Javascript ===================================== -->
    <script src="<?php echo RUTA_URL ?>/js/dashboard.js"></script>
    <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
</body>

</html>