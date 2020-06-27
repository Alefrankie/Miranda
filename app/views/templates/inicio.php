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
	<title><?php echo NOMBRESITIO; ?></title>
	<link rel="shortcut icon" href="<?php echo RUTA_URL ?>/img/logo-footer.png" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/styles.css">
	<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/owl.carousel.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/owl.theme.css" rel="stylesheet" media="screen">
</head>

<body>
	<!-- ===== ANUNCIO ==================================================-->
	<div class="anuncio-container">
		<div class="anuncio-abierto">
			<!-- <img id="announcement" loading="lazy" src="img/anuncios/anuncio.jpg"> -->
			<img id="announcement" loading="lazy">
		</div>
	</div>
	<!--===== NAVEGACIÓN ==================================================-->
	<header>
		<nav id="nav">
			<div class="logo">
				<a href="#"><strong>RIF G-20000169-0</strong></a>
			</div>

			<div class="enlaces" id="enlaces">
				<a href="#"><i class="fa fa-home page-scroll"></i> Inicio</a>
				<a href="#alcalde" class="page-scroll"><i class="fas fa-hat-cowboy"></i>Alcalde</a>
				<a href="#turismo" class="page-scroll"><i class="fas fa-plane"></i>Turismo</a>
				<a href="#noticias" class="page-scroll"><i class="fas fa-newspaper"></i>Noticias</a>
				<a href="#institutos" class="page-scroll"><i class="fas fa-warehouse"></i>Institutos</a>
				<a href="#tf-testimonials" class="page-scroll"><i class="fas fa-street-view"></i>Dirección General</a>
				<a href="<?php echo $destino ?>" class="page-scroll"><i class="fa fa-user"></i> <?php echo ($dataSession) ?></a>
			</div>

			<div class="icon-burger" id="icon-burger">
				<span><i class="fas fa-bars"></i></span>
			</div>
		</nav>
	</header>

	<!--===== FONDO ===========================================-->
	<div class="inicio" id="inicio">
		<div class="svg-bottom" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
				<path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
			</svg></div>
	</div>

	<!--===== ALCALDE =========================================-->
	<section class="alcalde contenedor" id="alcalde">
		<div class="imagen-alcalde">
			<img loading="lazy" src="<?php echo RUTA_URL ?>/img/Alcalde/Pablo Acosta ORIG.png" id="alcalde-animado">
		</div>
		<div class="alcalde-texto">
			<h4>Alcalde Mirandino</h4>
			<h2><strong>Pablo Acosta</strong></h2>
			<h5></h5>
			<p>Mirandino de Corazón, trabajando por el bienestar de las parroquias del municipio Miranda.</p>
			<p><span class="far fa-dot-circle"></span><strong> Alcalde</strong> del Municipio Miranda desde 2011 por el Partido Socialista Unido de Venezuela (PSUV)</p>
			<p><span class="far fa-dot-circle"></span><strong> Su Gestión</strong> - Trabajar por proteger nuestra soberanía nacional.</p>
			<p><span class="far fa-dot-circle"></span><strong> Su Meta</strong> - proteger el legado de nuestro comandante Chavez.</p>
		</div>
	</section>

	<!--===== Sitios Turísticos =======================================-->
	<div class="turismo contenedor" id="turismo">
		<div class="svg-top" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
				<path d="M0.00,49.98 C150.00,150.00 271.49,-50.00 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #fff;"></path>
			</svg></div>
		<h2>Sítios<strong> Turísticos Municipales</strong></h2>
		<div class="team owl-carousel owl-theme row">
			<div class="item">
				<div class="turismo-imagen">
					<a href="https://www.flickr.com/photos/gigigonzalez/3507759920" target="_blank"><img loading="lazy" src="<?php echo RUTA_URL ?>/img/team/ventanas.jpg"></a>
				</div>
				<h3>Casa de las 100 Ventanas</h3>
				<p>En la ciudad de Santa Ana de Coro, una de las mas antiguas del continente americano fundada en 1527 por el colono español Juan de Ampíes.</p>
			</div>
			<div class="item">
				<div class="turismo-imagen">
					<a href="https://venezuelatuya.com/occidente/medanos.htm" target="_blank"><img loading="lazy" src="<?php echo RUTA_URL ?>/img/team/medanos.png"></a>
				</div>
				<h3>Parque Médanos de Coro</h3>
				<p>Forman parte de un parque nacional, establecido para protegerlos. Es una parada obligada para todos los turistas, que se divierten ascendiéndolos y revolcándose por sus laderas.</p>
			</div>

			<div class="item">
				<div class="turismo-imagen">
					<a href="https://iamvenezuela.com/2017/02/iglesia-de-san-clemente/" target="_blank"><img loading="lazy" src="<?php echo RUTA_URL ?>/img/team/IglesiaSan-Clemente.jpg"></a>
				</div>
				<h3>Iglesia San Clemente</h3>
				<p>Patrimonio de la Humanidad por la Unesco (1993). Su arquitectura sobria y monumental, narra la historia de un país modesto durante la colonia y profundamente religioso.</p>
			</div>

			<div class="item">
				<div class="turismo-imagen">
					<a href="https://iglesiasdevenezuela.wordpress.com/2011/10/15/catedral-de-coro/" target="_blank"><img loading="lazy" src="<?php echo RUTA_URL ?>/img/team/catedral.jpg"></a>
				</div>
				<h3>Iglesia Catedral</h3>
				<p>Fue la primera diócesis del continente (por bula papal de 1531), territorio donde ejerce funciones un obispo, por lo cual su templo tiene categoría de catedral. Su construcción se inició en 1583 y se extendió por lo menos unos 50 años más.</p>
			</div>
		</div>
		<div class="svg-bottom" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
				<path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
			</svg></div>
	</div>
	<!--===== NOTICIAS MUNICIPALES ============================================-->

	<div class="section-news contenedor" id="noticias">
		<h2>Conoce la Gestión Municipal <strong>Noticias</strong></h2>
		<small><em>Visita las noticias de ultimo momento acerca de la gestión de desarrollo de nuestro municipio en el trabajo por la soberanía nacional..</em></small>

		<div class="section-news__main">
			<div class="section-news__left-frame">
				<!-- <img id="news1" loading="lazy" src="<?php echo RUTA_URL ?>/img/noticias/Noticia2.jpg" /> -->
				<!-- <img id="news2" loading="lazy" src="<?php echo RUTA_URL ?>/img/noticias/Noticia3.jpg" /> -->
				<img id="news1" loading="lazy" src="" />
				<img id="news2" loading="lazy" src="" />
			</div>

			<div class="section-news__right-frame">
				<iframe src="https://www.youtube.com/embed/FC_yhKPAG9E"></iframe>
			</div>
		</div>
		<a class="section-news__button" href="<?php echo RUTA_URL; ?>/Noticias">Ver Mas</a>
	</div>

	<!--===== INSTITUTOS AUTÓNOMOS ==========================================-->
	<div class="institutos contenedor" id="institutos">
		<div class="svg-top" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
				<path d="M0.00,49.98 C150.00,150.00 271.49,-50.00 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #fff;"></path>
			</svg></div>
		<h2>Institutos <strong>Autónomos</strong></h2>
		<div id="clients" class="owl-carousel owl-theme">
			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/HaciendaMunicipal.jpeg" />
				<a><strong>Hacienda Municipal</strong></a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/OficinaMunicipal.jpeg" />
				<a><strong>Oficina Municipal</strong></a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/SecretariaDeAmbiente.jpeg" />
				<a><strong>Secretaria De Ambiente</strong></a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/OficinaDeProyecto.jpeg" />
				<a><strong>Oficina De Proyecto</strong></a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/IMUM.jpeg" />
				<a><strong>Instituto de la mujer</strong></a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg">
				<a href="secciones/institutos/bomberos.php">Cuerpo de Bomberos</a>
			</div>
			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg">
				<a href="secciones/institutos/fondesMiranda.php">FONDES Miranda</a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-matadero-municipal.jpg">
				<a href="secciones/institutos/matadero-municipal.php">Matadero Municipal</a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/patrimonio.jpg">
				<a href="secciones/institutos/patrimonio.php">Patrimonio Municipal</a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg">
				<a href="secciones/institutos/terminal.php">Terminal Pasajeros</a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg">
				<a href="secciones/institutos/mercado.php">Mercados Municipales</a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg">
				<a href="secciones/institutos/imtt.php">IMTT</a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg">
				<a href="secciones/institutos/imaud.php">IMAUD</a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg">
				<a href="secciones/institutos/imudemi.php">IMUDEMI</a>
			</div>

			<div class="item">
				<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg">
				<a href="secciones/institutos/inhamir.php">INHAMIR</a>
			</div>
		</div>
		<div class="svg-bottom" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
				<path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
			</svg></div>
	</div>
	<!--===== DIRECCIÓN DE LA ALCALDíA =================================================-->
	<div id="tf-testimonials" class="contenedor">
		<div class="contenido-dirección">
			<h2 class="color-letras"><strong></strong> Dirección de la Alcaldía de Miranda</h2>
			<div id="testimonial" class="owl-carousel owl-theme">
				<div class="item">
					<h1> <strong><span class="color2">Dirección de Despacho</span></strong></h1>
					<p>Esta sede se encuentra ubicada en la <strong>Avenida Miranda con calle Urdaneta, edificio Ayuntamiento</strong> Coro, estado Falcón</p>
				</div>

				<div class="item">
					<h1> <strong><span class="color2"> Secretaria de Hacienda Municipal</span></strong></h1>
					<p>Esta sede de la alcaldía de Miranda se encuentra ubicada en la <strong> Calle Norte, con Avenida Los Médanos</strong> de Coro, estado Falcón.</p>
				</div>

				<div class="item">
					<h1> <strong><span class="color2">Secretaria de Desarrollo Económico</span></strong></h1>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>

				<div class="item">
					<h1> <strong><span class="color2">Secretaria de Turismo, Educación y Cultura </span></strong></h1>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>

				<div class="item">
					<h1> <strong><span class="color2"> Secretaria Territorial Municipal</span></strong></h1>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>
				<div class="item">
					<h1> <strong><span class="color2"> Secretaria Política Municipal</span></strong></h1>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>
				<div class="item">
					<h1> <strong><span class="color2"> Secretaria Social Municipal</span></strong></h1>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>
				<div class="item">
					<h1> <strong><span class="color2"> Secretaria de Ambiente Municipal</span></strong></h1>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>
			</div>
		</div>
	</div>

	<!--===== FOOTER =======================================-->
	<?php require RUTA_APP . '/views/inc/footer.php'; ?>

	<!--===== Javascripts ================================================== -->

	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5cc87df64b94860012b42e5b&product=custom-share-buttons"></script>
	<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/jquery.1.11.1.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/owl.carousel.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/all.min.js"></script>
</body>

</html>