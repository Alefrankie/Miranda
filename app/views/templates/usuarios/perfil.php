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
                <a href="#"><i class="fa fa-user"></i> ACTUALIZAR DATOS</a>
                <a href="#"><i class="fas fa-search"></i></i> BUSCAR EMPLEADO</a>
                <a href="#"><i class="fa fa-link"></i> FICHAS DE EMPLEADOS</a></<a>
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


    <div class="page-tittle">
        <h1>ALCALDÍA BOLIVARIANA DEL MUNICIPIO MIRANDA</h1>
        <h2>UN MUNICIPIO HECHO ALCALDE, <strong>VIVE LA EXPERIENCIA</strong> DE UN <strong>EXTRAORDINARIO PAISAJE</strong></h2>
    </div>
    <hr>

    <div class="admin-privileges">
        <h3>Usted es identificado como Administrador General por lo que el sistema le permite iterar los siguientes privilegios:</h3>
        <p>Actualiza sus Datos de Sesión y Foto de administrador.</p>
        <p>Realizar una búsqueda de empleados por su documento de identidad.</p>
        <p>Consultar los departamentos Adscritos a la Dirección de Despacho.</p>
        <p>Consultar los departamentos Adscritos a la Dirección General</p>
        <p>Registrar Nuevo Empleado a las Dependencias Adscritas.</p>

    </div>
    <hr>

    <!-- PERFIL -->

    <div class="data-update">
        <h4>Actualizar Datos de Sesión</h4>
        <form method="POST" action="../fotos/recibir.php" enctype="multipart/form-data" autocomplete="off" class="fotos">
            <h2>FOTO DE PERFIL:</h2>
            <img src="<?php echo RUTA_URL; ?>/img/usuarios/profile.png" alt="user">
            <input readonly="readonly" type="text" name="cedula" value="" />
            <input type="file" name="foto" accept="image/*" value="examinar">
            <input type="submit" class="button" name="enviar" value="Actualizar">
        </form>

        <form action="" method="POST">
            <h3>DATOS DE SESIÓN:</h3>
            <input type="text" REQUIRED placeholder="Usuario..." name="user" value="" />
            <input type="password" REQUIRED placeholder="Contraseña..." name="pass" value="" />
        </form>
    </div>
    <hr>

    <!-- BUSCAR EMPLEADOS SOLO ES VISIBLE SI ERES ADMINISTRADOR - ARREGLAR CON JS-->
    <div class="search-employees">
        <h2>BUSCAR EMPLEADO</h2>
        <form action="../admin/buscar/p_buscar.php" method="post" class="buscar" target="_blank">
            <input type="text" REQUIRED placeholder="CÉDULA..." name="cedula" />
            <input type="submit" class="button" value="BUSCAR" />
        </form>
    </div>
    <hr>
    <!-- BASE DE DATOS SOLO ES VISIBLE SI ERES ADMINISTRADOR - ARREGLAR CON JS-->
    <div class="data-base-users">
        <table class="table">
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
    </div>
    <hr>

    <!-- REGISTRAR EMPLEADOS SOLO ES VISIBLE SI ERES ADMINISTRADOR - ARREGLAR CON JS-->
    <div class="data-personal">
        <h2>Ficha del Empleado</h2>
        <form action="../empleados/guardar.php" method="post" class="contact-form">
            <h3>DATOS DE SESIÓN:</h3>
            <input type="text" REQUIRED placeholder="USUARIO..." name="user" />
            <input type="password" REQUIRED placeholder="CONTRASEÑA..." name="pass" />

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

    <?php require RUTA_APP . '/views/inc/footer-institutos.php'; ?>

    <!--===== Javascript ===================================== -->
    <script src="<?php echo RUTA_URL ?>/js/usuario.js"></script>
    <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
</body>

</html>