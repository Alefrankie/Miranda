<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="<?php echo RUTA_URL ?>/img/logo-footer.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/styles.css">
</head>
<header class="fondo-gradiente">
    <nav id="nav">
        <div class="logo ">
            <a href="#""><strong><?php echo $datos['t_user']; ?></strong></a>
			</div>
			<div class=" enlaces">
                <a href="<?php echo RUTA_URL; ?>/"><i class="fa fa-home"></i> INICIO</a>
                <a href="#data-update"><i class="fa fa-user"></i> ACTUALIZAR DATOS</a>
                <a href="#"><i class="fas fa-search"></i></i> BUSCAR EMPLEADO</a>
                <a href="#"><i class="fa fa-link"></i> FICHA DE EMPLEADO</a></<a>
        </div>
    </nav>
</header>
<form action="../db/close.php" method="post" class="close-session">
    <input type="submit" class="button" value="SALIR" />
</form>

<body>
    <!-- Datos a colocar en la barra de navegación
    Si es administrador colocar el "general" pero desde el controlador
    Cedula
    Foto Usuario GENERAL
    crear una sidebar-->
    <!--
    <img src="/img/usuarios/profile.png" alt="user">

    <h3 class="">Aquí irá el nombre del administrador</h3>
    <p class="">ADMINISTRADOR GENERAL</p>
    <a href="#top"><i class="fa fa-home"></i>INICIO</a>
    <a href="#about"><i class="fa fa-user"></i>ACTUALIZAR DATOS</a>
    <a href="#buscar"><i class="fa fa-newspaper-o"></i>BUSCAR EMPLEADO</a>
    <a href="#projects"><i class="fa fa-newspaper-o"></i>DIRECCIÓN DEL DESPACHO</a>
    <a href="#projects2"><i class="fa fa-newspaper-o"></i>SECRETARIA GENERAL</a>
    <a href="#contact"><i class="fa fa-link"></i>REGISTRAR EMPLEADOS</a>
    <form action="../db/close.php" method="post" class="close-session">
        <input type="submit" class="button" value="SALIR" />
    </form> -->
    <!-- PERFIL -->

    <div class="data-update contenedor" id="data-update">
        <h2>Bienvenido NOMBRE DEL USUARIO</h2>
        <img src="<?php echo RUTA_URL; ?>/img/usuarios/data-update.svg" alt="user">
        <form class="data-update__form" action="../fotos/recibir.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <h3>Actualiza tus Datos</h3>
            <img class="form-img" src="<?php echo RUTA_URL; ?>/img/usuarios/profile.png" alt="user">

            <input type="file" name="photo" accept="image/*" value="Examinar">

            <label for="user">Usuario: </label>
            <input REQUIRED type="user" name="user" class="form-control" id="user" placeholder="Indique su usuario">

            <label for="pass">Contraseña: </label>
            <input REQUIRED type="password" name="pass" class="form-control" id="pass" placeholder="Indique su clave">

            <input class="form-button" type="submit" class="button" name="enviar" value="Actualizar">
        </form>

        <div class="svg-bottom" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </div>

    <!-- BASE DE DATOS SOLO ES VISIBLE SI ERES ADMINISTRADOR - ARREGLAR CON JS-->
    <div class="data-base-users">
        <div class="svg-top" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 271.49,-50.00 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
        <h2>BUSCAR EMPLEADO</h2>
        <form action="../admin/buscar/p_buscar.php" method="post" target="_blank">
            <label for="cedula">Cédula:</label>
            <input type="text" REQUIRED placeholder="Cedula" name="cedula" id="cedula" />
            <input class="form-button" type="submit" class="button" value="BUSCAR" />
            <input class="form-button" type="submit" class="button" value="TODOS" />
        </form>

        <a href="#">
            <table class="table">
        </a>
        <thead>
            <tr>
                <th>Id</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Usuario</th>
                <th>Contraseña</th>
            </tr>
        </thead>
        <?php foreach ($datos['usuarios'] as $usuario) : ?>
            <tbody>
                <tr>
                    <td><?php echo $usuario->id; ?></td>
                    <td><?php echo $usuario->cedula; ?></td>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td><?php echo $usuario->apellido; ?></td>
                    <td><?php echo $usuario->telefono; ?></td>
                    <td><?php echo $usuario->correo; ?></td>
                    <td><?php echo $usuario->user; ?></td>
                    <td><?php echo $usuario->password; ?></td>
                    <td><a href="<?php echo RUTA_URL; ?>/paginas/editar/<?php echo $usuario->id; ?>">Editar</a></td>
                    <td><a href="<?php echo RUTA_URL; ?>/paginas/borrar/<?php echo $usuario->id; ?>">Borrar</a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
            </table>
            <div class="svg-bottom" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
                </svg></div>
    </div>

    <div class="personal-card">
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


    <div class="admin-privileges contenedor">
        <h3>Usted es identificado como Administrador General por lo que el sistema le permite iterar los siguientes privilegios:</h3>
        <div class="admin-privileges__text">
            <p><span class="far fa-dot-circle"></span> Actualiza sus Datos de Sesión y Foto de administrador.</p>
            <p><span class="far fa-dot-circle"></span> Realizar una búsqueda de empleados por su documento de identidad.</p>
            <p><span class="far fa-dot-circle"></span> Consultar los departamentos Adscritos a la Dirección de Despacho.</p>
            <p><span class="far fa-dot-circle"></span> Consultar los departamentos Adscritos a la Dirección General</p>
            <p><span class="far fa-dot-circle"></span> Registrar Nuevo Empleado a las Dependencias Adscritas.</p>
        </div>

    </div>

    <?php require RUTA_APP . '/views/inc/footer-institutos.php'; ?>

    <!--===== Javascript ===================================== -->
    <script src="<?php echo RUTA_URL ?>/js/usuario.js"></script>
    <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
</body>

</html>