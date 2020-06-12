<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo RUTA_URL ?>/img/logo-footer.png" type="image/x-icon">
    <title>Empleado</title>
</head>

<body>

    <div class="responsive-header visible-xs visible-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-section">
                        <div class="profile-image">
                            <img src="../empleados/fotos/<?php echo $conexion['cedula']; ?>.jpg" alt="Volton">
                        </div>
                        <div class="profile-content">
                            <h3 class="profile-title"><?php echo $conexion['nombres']; ?></h3>
                            <p class="profile-description">EMPLEADO</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
            <div class="main-navigation responsive-menu">
                <ul class="navigation">
                    <li><a href="#top"><i class="fa fa-home"></i>INICIO</a></li>
                    <li><a href="#about"><i class="fa fa-user"></i>ACTUALIZAR DATOS</a></li>
                    <li><a href="#projects"><i class="fa fa-newspaper-o"></i>CARNET</a></li>
                    <li><a href="#projects2"><i class="fa fa-newspaper-o"></i>CONSTANSIA DE TRABAJO</a></li>
                    <li><a href="#projects3"><i class="fa fa-newspaper-o"></i>CONSTANSIA IPP</a></li>

                    <form action="../db/close.php" method="post" class="cerrarsesion">
                        <input type="submit" class="button" value="SALIR" />
                    </form>
                </ul>
            </div>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar-menu hidden-xs hidden-sm">
        <div class="top-section">
            <div class="profile-image">
                <img src="../empleados/fotos/<?php echo $conexion['cedula']; ?>.jpg" alt="Volton">
            </div>
            <h3 class="profile-title"><?php echo $conexion['nombres']; ?></h3>
            <p class="profile-description"><?php echo $conexion['cargo']; ?></p>
        </div> <!-- top-section -->



        <div class="main-navigation">
            <ul class="navigation">
                <li><a href="#top"><i class="fa fa-home"></i>INICIO</a></li>
                <li><a href="#about"><i class="fa fa-user"></i>ACTUALIZAR DATOS</a></li>
                <li><a href="#projects"><i class="fa fa-newspaper-o"></i>CARNET</a></li>
                <li><a href="#projects2"><i class="fa fa-newspaper-o"></i>CONSTANCIA DE TRABAJO</a></li>
                <li><a href="#projects3"><i class="fa fa-newspaper-o"></i>CONSTANCIA IPP</a></li>

                <form action="../db/close.php" method="post" class="cerrarsesion">
                    <input type="submit" class="button" value="SALIR" />
                </form>
                <!--fin de la informacion -->

            </ul>
        </div> <!-- .main-navigation -->
        <!--<ul> 
               		<div class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul> -->
    </div> <!-- .social-icons -->
    </div> <!-- .sidebar-menu -->


    <div class="banner-bg" id="top">
        <div class="banner-overlay">
            <!--<div class="welcome-text">
            	<br><br><br>
                <h2>ALCALDIA BOLIVARIANA DEL MUNICIPIO MIRANDA</h2>
                <h5>UN MUNICIPIO HECHO ALCALDE, <strong>VIVE LA EXPERIENCIA</strong> DE UN <strong>EXTRAORDINARIO PAISAJE</strong></h5>
            </div>-->
        </div>
    </div>


    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="fluid-container">
            <div class="content-wrapper">

                <!--INICIO -->
                <div class="page-section">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="widget-title">Usted es identificado como Empleado por lo que el sistema le permite iterar los siguientes privilegios:</h4>

                            <ul>
                                </br>
                                <li class="fa fa-user"><i class="widget-title"> Actualizacion de datos de Inicio de Sesion.</i></li>
                                </br>
                                <li class="fa fa-newspaper-o"><i class="widget-title"> Imprimir su Carnet de Identificacion como Empleado.</i></li>
                                </br>
                                <li class="fa fa-newspaper-o"><i class="widget-title"> Generar su constancia de trabajo.</i></li>
                                </br>
                                <li class="fa fa-newspaper-o"><i class="widget-title"> Generar su constacia de solicitud de IPP.</i></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr><br />
                <!-- PERFIL -->
                <div class="page-section" id="about">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="widget-title">Actualizar Datos</h4>


                            <!--informacion del perfil -->
                            <form method="POST" action="../fotos/resivir.php" enctype="multipart/form-data" autocomplete="off" class="fotos">
                                <h2>FOTO DE PERFIL:</h2>
                                <div class="profile-image2">
                                    <img src="../empleados/fotos/<?php echo $conexion['cedula']; ?>.jpg" alt="Volton">
                                </div>
                                <input readonly="readonly" type="text" name="cedula" value="<?php echo $conexion['cedula']; ?>" />
                                <input type="file" name="foto" accept="image/*" value="examinar">
                                <input type="submit" class="button" name="enviar" value="Actualizar">
                            </form>

                            <form action="../empleados/p_modificar.php?idempleados=<?php echo $conexion['idempleados']; ?>" method="post" class="contact-constancia">
                                <br>
                                <h2>DATOS DE SESION:</h2>
                                <br><br>
                                <h3>USUARIO: <input type="text" REQUIRED placeholder="Usuario..." name="user" value="<?php echo $conexion['user']; ?>" /> </h3>
                                <br>
                                <br>
                                <h3>PASSWORD: <input type="password" REQUIRED placeholder="Contraseña..." name="pass" value="<?php echo $conexion['pass']; ?>" /></h3>

                                <br><br>

                                <input type="submit" class="button" value="Actualizar" />
                            </form>


                        </div>
                    </div>
                </div>


                <!-- CARNET -->
                <hr>
                <div class="page-section" id="projects">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="widget-title">Carnet</h4>
                        </div>

                        <!--inicio de la informacion -->
                        <form action="../../../../pdf/carnet.php" method="post" class="contact-constancia" target="_blank">
                            <br><br>
                            <h4><br><br>VERIFIQUE SUS DATOS ANTES DE IMPRIMIR</h4>
                            <br>
                            <table id="keywords2" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <h3> NOMBRES </h3>
                                    </td>
                                    <td>
                                        <h3> <span class="sub-key"> <input readonly="readonly" type="text" name="nombres" value="<?php echo $conexion['nombres']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>APELLIDOS </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key"> <input readonly="readonly" type="text" name="apellidos" value="<?php echo $conexion['apellidos']; ?>" /> </span> </h3>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h3>CEDULA </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key"> <input readonly="readonly" type="number" name="cedula" value="<?php echo $conexion['cedula']; ?>" /> </span> </h3>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h3>DIRECCION </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key"> <input readonly="readonly" type="text" name="departamento" value="<?php echo $conexion['departamento']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>OFICINA </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key"> <input readonly="readonly" type="text" name="oficina" value="<?php echo $conexion['oficina']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>CARGO </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key"> <input readonly="readonly" type="text" name="cargo" value="<?php echo $conexion['cargo']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                            </table>

                            <input type="submit" class="button" value="Imprimir" />
                        </form>

                        <!--fin de la informacion -->
                    </div>
                </div>





                <!-- CONSTANCIA DE TRABAJO -->
                <hr>
                <div class="page-section" id="projects2">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="widget-title">Constancia de Trabajo</h4>
                        </div>

                        <!--inicio de la informacion -->
                        <form action="../../../../pdf/Constanciatrabajo.php" method="post" class="contact-constancia" target="_blank">
                            <br><br>
                            <h4><br><br>VERIFIQUE SUS DATOS ANTES DE IMPRIMIR</h4>
                            <br>
                            <h2>DATOS PERSONALES:</h2>
                            <br>
                            <table id="keywords2" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <h3> NOMBRES </h3>
                                    </td>
                                    <td>
                                        <h3> <span class="sub-key2"> <input readonly="readonly" type="text" name="nombres" value="<?php echo $conexion['nombres']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>APELLIDOS </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key2"> <input readonly="readonly" type="text" name="apellidos" value="<?php echo $conexion['apellidos']; ?>" /> </span> </h3>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h3>CEDULA </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key2"> <input readonly="readonly" type="number" name="cedula" value="<?php echo $conexion['cedula']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>HIJOS </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key2"> <input readonly="readonly" type="number" name="n_hijos" value="<?php echo $conexion['n_hijos']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                            </table>

                            <br>
                            <h2>DATOS LABORALES:</h2>
                            <br>
                            <table id="keywords2" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <h3> CARGO </h3>
                                    </td>
                                    <td>
                                        <h3> <span class="sub-key"> <input readonly="readonly" type="text" name="cargo" value="<?php echo $conexion['cargo']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>AÑOS DE SERVICIO </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key"> <input readonly="readonly" type="text" name="servicio" value="<?php echo $conexion['servicio']; ?>" /> </span> </h3>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h3>FECHA DE INGRESO </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key"> <input readonly="readonly" type="text" name="f_ingreso" value="<?php echo $conexion['f_ingreso']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>FECHA DE ASIGNACION DE CARGO </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key"> <input readonly="readonly" type="text" name="f_asignacion" value="<?php echo $conexion['f_asignacion']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>SUELDO </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key"> <input readonly="readonly" type="text" name="sueldo" value="<?php echo $conexion['sueldo']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <h4>SELECCIONE FECHA ACTUAL ANTES DE IMPRIMIR</h4>
                            <br>
                            <h3>
                                <select REQUIRED class="fecha" name="mes">
                                    <option>MES...</option>
                                    <option>Enero</option>
                                    <option>Febrero</option>
                                    <option>Marzo</option>
                                    <option>Abril</option>
                                    <option>Mayo</option>
                                    <option>Junio</option>
                                    <option>Julio</option>
                                    <option>Agosto</option>
                                    <option>Septiembre</option>
                                    <option>Octubre</option>
                                    <option>Noviembre</option>
                                    <option>Diciembre</option>
                                </select>

                                <select REQUIRED class="fecha" name="dia">
                                    <option>DIA...</option>
                                    <!-- <option>uno (1)</option> -->
                                    <option>dos (2)</option>
                                    <option>tres (3)</option>
                                    <option>cuatro (4)</option>
                                    <option>cinco (5)</option>
                                    <option>seis (6)</option>
                                    <option>siete (7)</option>
                                    <option>ocho (8)</option>
                                    <option>nueve (9)</option>
                                    <option>diez (10)</option>
                                    <option>once (11)</option>
                                    <option>doce (12)</option>
                                    <option>trece (13)</option>
                                    <option>catorce (14)</option>
                                    <option>quince (15)</option>
                                    <option>dieciseis (16)</option>
                                    <option>diecisiete (17)</option>
                                    <option>dieciocho (18)</option>
                                    <option>diecinueve (19)</option>
                                    <option>veinte (20)</option>
                                    <option>veintiuno (21)</option>
                                    <option>veintidos (22)</option>
                                    <option>veintitres (23)</option>
                                    <option>veinticuatro (24)</option>
                                    <option>veinticinco (25)</option>
                                    <option>veintiseis (26)</option>
                                    <option>veintisiete (27)</option>
                                    <option>veintiocho (28)</option>
                                    <option>veintenueve (29)</option>
                                    <option>treinta (30)</option>
                                </select>
                                <style>
                                    select {
                                        margin-left: 10%;
                                    }
                                </style>
                            </h3>
                            <br>
                            <br>
                            <input type="submit" class="button" value="Imprimir" />
                        </form>



                        <!--fin de la informacion -->
                    </div>
                </div>

                <!-- IPP -->
                <hr>
                <div class="page-section" id="projects3">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="widget-title">Constancia IPP</h4>
                        </div>

                        <!--inicio de la informacion -->
                        <form action="../../../../pdf/IPP.php" method="post" class="contact-constancia" target="_blank">
                            <br><br>
                            <h4><br><br>VERIFIQUE SUS DATOS ANTES DE IMPRIMIR</h4>
                            <br>
                            <table id="keywords2" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <h3> NOMBRES </h3>
                                    </td>
                                    <td>
                                        <h3> <span class="sub-key3"> <input readonly="readonly" type="text" name="nombres" value="<?php echo $conexion['nombres']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>APELLIDOS </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key3"> <input readonly="readonly" type="text" name="apellidos" value="<?php echo $conexion['apellidos']; ?>" /> </span> </h3>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h3>CEDULA </h3>
                                    </td>
                                    <td>
                                        <h3><span class="sub-key3"> <input readonly="readonly" type="number" name="cedula" value="<?php echo $conexion['cedula']; ?>" /> </span> </h3>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <h4>SELECCIONE ANTES DE IMPRIMIR</h4>
                            <br>
                            <h3>SERVICIO:
                                <select REQUIRED class="fecha" name="servicio">
                                    <option>SELECCIONE...</option>
                                    <option>ODONTOLOGIA</option>
                                    <option>PEDIATRIA</option>
                                    <option>PSICOLOGIA</option>
                                </select>
                                <style>
                                    select {
                                        margin-left: 10%;
                                    }
                                </style>
                            </h3>
                            <br>

                            <h3>FECHA ACTUAL: <input REQUIRED type="date" name="fecha">
                                <style>
                                    select {
                                        margin-left: 10%;
                                    }
                                </style>
                                <br>
                            </h3>

                            <input type="submit" class="button" value="Imprimir" />

                        </form>



                    </div>
                </div>

            </div>
        </div>

        <hr>
        <div class="row" id="footer">
            <div class="col-md-12 text-center">
                <?php include '../../../inc/footer.php'; ?>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="../../js/vendor/jquery-1.10.2.min.js"></script>
    <script src="../../js/min/plugins.min.js"></script>
    <script src="../../js/min/main.min.js"></script>

</body>

</html>