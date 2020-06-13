<?php
if (empty($_SESSION['SESSION_USER'])) {
	$dataSession = " Iniciar Sesión";
	$destino = RUTA_URL . "/Usuarios/login/";
	$tipoUser = "RIF G-20000169-0";
} else {
	$dataSession = $_SESSION['SESSION_USER'];
	$destino = RUTA_URL . "/Usuarios/dashboard/";
	$tipoUser = $datos["t_user"];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Noticias</title>
	<link rel="shortcut icon" href="<?php echo RUTA_URL ?>/img/logo-footer.png" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/styles.css">
</head>

<body>
	<!-- ===== NAVEGACIÓN ================================================== -->
	<header>
		<nav id="nav">
			<div class="logo">
				<a href="#" id="Admin"><strong><?php echo $tipoUser ?></strong></a>
			</div>

			<div class="enlaces" id="enlaces">
				<a href="/Miranda"><i class="fa fa-home page-scroll"></i> Inicio</a>
				<a href="<?php echo RUTA_URL ?>/noticias/postNews/"><i class="fas fa-cloud-upload-alt"></i> Publicar Noticia</a>
				<!-- <a href="#footer" class="page-scroll">Contact us</a> -->
				<a href="<?php echo $destino ?>" class="page-scroll"><i class="fa fa-user"></i> <?php echo ($dataSession) ?></a>

			</div>

			<div class="icon-burger" id="icon-burger">
				<span><i class="fas fa-bars"></i></span>
			</div>
		</nav>
	</header>
	<!--===== INICIO =====-->
	<div class="inicio-noticias">

		<div class="svg-bottom" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
				<path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
			</svg></div>
	</div>

	<!--===== SECCIÓN PRINCIPAL =============-->
	<section class="main-section" id="sección-principal">
		<!-- <article class="articulo">
			<div class="cabecera-articulo">
				<div class="thumbnail">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/usuarios/avatar.svg" alt="X">
				</div>
				<a href="#">Admin</a>

			
			</div>
			<div class="gallery">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/anuncios/anuncio23042020_1.png" alt="" class="imagen" />
			</div>
			<div class="footer-article">
				<p>"Reparación y Mantenimiento de la Red de Semáforos de la Ciudad de SANTA ANA DE CORO.".</p>
			</div>
		</article> -->

	</section>

	<div class="botón-volver">
		<a href="#"><i class="fas fa-angle-up"></i></a>
	</div>
	<?php require RUTA_APP . '/views/inc/footer-institutos.php'; ?>

	<!--===== Javascript ===================================== -->
	<script src="https://platform-api.sharethis.com/js/sharethis.js#property=5cc87df64b94860012b42e5b&product=custom-share-buttons"></script>
	<script src="<?php echo RUTA_URL ?>/js/noticias_script.js"></script>
	<script src="<?php echo RUTA_URL ?>/js/all.min.js"></script>
</body>

</html>