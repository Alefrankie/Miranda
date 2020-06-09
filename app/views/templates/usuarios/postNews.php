<?php
if (empty($_SESSION['SESSION_USER'])) {
    $dataSession = " Iniciar Sesión";
    $destino = RUTA_URL . "/Usuarios/login/";
} else {
    $dataSession = $_SESSION['SESSION_USER'];
    $destino = RUTA_URL . "/Usuarios/dashboard/";
}
?>

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
                <a href="/Miranda"><i class="fa fa-home page-scroll"></i> Inicio</a>
                <a href="<?php echo RUTA_URL; ?>/noticias"><i class="fa fa-link"></i> NOTICIAS</a></<a>
                <a href="<?php echo  RUTA_URL; ?>/usuarios/dashboard" class="page-scroll"><i class="fa fa-user"></i> <?php echo ($dataSession) ?></a>
        </div>
    </nav>
</header>

<body>
    <!--===== SECCIÓN DE PUBLICAR=====-->
    <div class="body-login">
        <div class="wave">
            <img src="<?php echo RUTA_URL ?>/img/usuarios/wave.png">
            <img src="<?php echo RUTA_URL ?>/img/noticias/newsFondo.png">
        </div>
        <div class="usuarios" >
            <img id="photoNews" src="<?php echo RUTA_URL ?>/img/noticias/newsIcon.png">
            <form id="form" action="<?php echo RUTA_URL ?>/Noticias/uploadNews" method="POST" enctype="multipart/form-data">
                <p><?php echo $dataSession?></p>
                <div class="input-div">
                    <div class="head-input">
                        <i class="far fa-newspaper"></i>
                        <input type="file" name="news" accept="image/*" class="input">
                    </div>
                </div>
                <div class="input-div">
                    <input type="text" name="description" id="description" class="input" value="" autocomplete="off" placeholder="Descripción">
                </div>
                <button type="submit" value="Iniciar"><i class="fas fa-cloud-upload-alt"></i>Publicar Noticia</button>
                <div class="warnings" id="warnings">
                    <h5>
                       
                    </h5>
                </div>
            </form>
        </div>
    </div>

    <!--===== Javascript ===================================== -->
    <!-- <script src="<?php echo RUTA_URL ?>/js/usuarios.js"></script> -->
    <script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
    <script src="<?php echo RUTA_URL ?>/js/uploadNews.js"></script>
</body>

</html>