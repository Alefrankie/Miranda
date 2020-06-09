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
        <div class="logo ">
            <a href="#" style="text-transform:uppercase;"><strong id="t_user"><?php echo $datos['t_user']; ?></strong></a>
        </div>
        <div class=" enlaces">
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
        <img src="<?php echo RUTA_URL; ?>/img/usuarios/data-update.svg" alt="user">

        <form id="dashboard_perfil" class="data-update__form" action="<?php echo RUTA_URL; ?>/usuarios/test" method="POST" enctype="multipart/form-data" autocomplete="off">
            <h3>Actualiza tus Datos</h3>
            <img id="photo" src="data:image/png;base64,<?php echo base64_encode(stripslashes($datos['imagen'])); ?>" alt="user">
            <input type="file" name="imagen" accept="image/*">
            <!-- <input type="text" name="user" id="user" class="input">
            <input type="text" name="pass" id="pass" class="input"> -->
            <input class="form-button" type="submit" class="button" name="enviar" value="Actualizar">
        </form>

        <div class="svg-bottom" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </div>

    <!-- BASE DE DATOS SOLO ES VISIBLE SI ERES ADMINISTRADOR -->
    <div class="data-base-users" id="data-base">
        <div class="svg-top" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 271.49,-50.00 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
        <h2>BUSCAR EMPLEADO</h2>
        <form action="../admin/buscar/p_buscar.php" method="post" target="_blank">
            <label for="cedula">Cédula:</label>
            <input type="text" REQUIRED placeholder="Cedula" name="cedula" id="cedula" />
            <input class="form-button" type="submit" class="button" value="BUSCAR" />
            <input class="form-button" type="submit" class="button" value="TODOS" />
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
        <h2>Ficha del Empleado</h2>
        <form action="../empleados/guardar.php" method="post" class="contact-form">

            <h3>DATOS PERSONALES: </h3>
            <input type="number" REQUIRED placeholder="CEDULA..." name="cedula" />
            <input type="text" REQUIRED placeholder="NOMBRES..." name="nombres" />
            <input type="text" REQUIRED placeholder="APELLIDOS..." name="apellidos" />
            <input type="number" placeholder="NUMERO DE HIJOS..." name="n_hijos" />

            <h3>INFORMACIÓN DE CONTACTO:</h3>
            <input type="number" placeholder="TELÉFONO..." name="telefono" />
            <input type="text" placeholder="CORREO..." name="correo" />
            <input type="text" REQUIRED placeholder="DIRECCIÓN..." name="direccion" />

            <h3>DATOS LABORALES:</h3>
            <select REQUIRED name="departamento">
                <option selected>DEPARTAMENTO...</option>
                <option>SECRETARIA SOCIAL MUNICIPAL</option>
                <option>SECRETARIA DE HACIENDA MUNICIPAL</option>
                <option>SECRETARIA POLÍTICA MUNICIPAL</option>
                <option>SECRETARIA DE AMBIENTE MUNICIPAL</option>
                <option>SECRETARIA TERRITORIAL MUNICIPAL</option>
                <option>SECRETARIA DE DESARROLLO ECONÓMICO COMUNAL</option>
                <option>SECRETARIA DE TURISMO, EDUCACIÓN Y CULTURA MUNICIPAL</option>
                <option>COORDINACIÓN DE INFORMÁTICA Y ESTADÍSTICA</option>
                <option>OFICINA DE ADMINISTRACIÓN DEL TALENTO HUMANO</option>
                <option>SINDICATURA</option>
            </select>

            <input REQUIRED type="text" placeholder="OFICINA..." name="oficina">

            <input REQUIRED type="text" placeholder="CARGO..." name="cargo">

            <select REQUIRED placeholder="CATEGORÍA..." name=categoria>
                <option selected>NIVEL DE ESTUDIO...</option>
                <option>BACHILLER</option>
                <option>T.S.U</option>
                <option>UNIVERSITARIO</option>
                <option>MAESTRÍA</option>
                <option>DOCTORADO</option>
            </select>

            <select REQUIRED placeholder="CONDICIÓN..." name="condicion">
                <option selected>CONDICIÓN...</option>
                <option>DIRECTIVO</option>
                <option>CONTRATADO</option>
                <option>FIJO</option>
            </select>

            <input type="number" REQUIRED placeholder="SUELDO..." name="sueldo" />
            <input type="number" REQUIRED placeholder="AÑOS DE SERVICIO..." name="servicio" />

            <h3>FECHA DE INGRESO:</h3>
            <input type="date" REQUIRED placeholder="FECHA DE INGRESO..." name="f_ingreso" />

            <h3>FECHA ASIGNACIÓN DE CARGO:</h3>
            <input type="date" REQUIRED placeholder="FECHA ASIGNACIÓN DE CARGO..." name="f_asignado" />

            <input type="submit" class="button" value="Actualizar Datos" />
            <hr>
        </form>
    </div>


    <?php require RUTA_APP . '/views/inc/footer.php'; ?>

    <!--===== Javascript ===================================== -->
    <script src="<?php echo RUTA_URL ?>/js/dashboard.js"></script>
    <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
</body>

</html>