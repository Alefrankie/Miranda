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
	<!--===== ANUNCIO ==================================================-->
	<div class="anuncio-container">
		<div class="anuncio-abierto">
			<img loading="lazy" src="img/anuncios/anuncio.jpg" alt="">
		</div>
	</div>
	<!--===== NAVEGACIÓN ==================================================-->
	<nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">RIF G-20000169-0</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><i class="fa fa-home page-scroll"></i> INICIO</a></li>
					<li><a href="#alcalde" class="page-scroll">Alcalde</a></li>
					<li><a href="#turismo" class="page-scroll">Turismo</a></li>
					<li><a href="#noticias" class="page-scroll">Noticias</a></li>
					<li><a href="#institutos" class="page-scroll">Institutos</a></li>
					<li><a href="#tf-testimonials" class="page-scroll">Dirección General</a></li>
					<li><a href="<?php echo RUTA_URL; ?>/usuarios/login/" class="page-scroll"><i class="fa fa-user"></i> Iniciar Sesión</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!--===== FONDO ===========================================-->
	<div class="inicio" id="inicio">
		<div class="svg-hero" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
				<path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
			</svg></div>
	</div>
	<!--===== ALCALDE =========================================-->
	<section id="alcalde" class="contenedor">
		<img loading="lazy" src="<?php echo RUTA_URL ?>/img/Alcalde/Pablo Acosta ORIG.png" id="alcalde-animado">
		<div class="alcalde-texto">
			<h4>Alcalde Mirandino</h4>
			<h2><strong>Pablo Acosta</strong></h2>
			<h5></h5>
			<p>Mirandino de Corazón, trabajando por el bienestar de las parroquias del municipio Miranda.</p>
			<p><span class="far fa-dot-circle"></span><strong> Alcalde</strong> - del Municipio Miranda el dia -- del Mes -- en el año ----</p>
			<p><span class="far fa-dot-circle"></span><strong> Su Gestión</strong> - Trabajar por proteger nuestra soberanía nacional</p>
			<p><span class="far fa-dot-circle"></span><strong> Su Meta</strong> - proteger el legado de nuestro comandante Chavez.</p>
		</div>
	</section>

	<!--===== Sitios Turísticos =======================================-->
	<div id="turismo">
		<div class="contenido-turismo contenedor">
			<h2 class="color-letras">Sítios <strong>Turísticos Municipales</strong></h2>

			<div id="team" class="owl-carousel owl-theme row">
				<div class="item">
					<a href="https://www.flickr.com/photos/gigigonzalez/3507759920"><img loading="lazy" src="<?php echo RUTA_URL ?>/img/team/ventanas.jpg" alt="..." target="_blank"></a>
					<div class="caption">
						<h3>Casa de las 100 Ventanas</h3>
						<p>En la ciudad de Santa Ana de Coro, una de las mas antiguas del continente americano fundada en 1527 por el colono español Juan de Ampíes.</p>
					</div>
				</div>
				<div class="item">
					<a href="https://venezuelatuya.com/occidente/medanos.htm"><img loading="lazy" src="<?php echo RUTA_URL ?>/img/team/medanos.png" alt="..." width=330px height=330px target="_blank"></a>
					<div class="caption">
						<h3>Parque Médanos de Coro</h3>
						<p>Forman parte de un parque nacional, establecido para protegerlos. Es una parada obligada para todos los turistas, que se divierten ascendiéndolos y revolcándose por sus laderas.</p>
					</div>
				</div>

				<div class="item">
					<a href="https://iamvenezuela.com/2017/02/iglesia-de-san-clemente/"><img loading="lazy" src="<?php echo RUTA_URL ?>/img/team/IglesiaSan-Clemente.jpg" alt="..." width=330px height=330px></a>
					<div class="caption">
						<h3>Iglesia San Clemente</h3>
						<p>Patrimonio de la Humanidad por la Unesco (1993). Su arquitectura sobria y monumental, narra la historia de un país modesto durante la colonia y profundamente religioso.</p>
					</div>
				</div>

				<div class="item">
					<a href="https://iglesiasdevenezuela.wordpress.com/2011/10/15/catedral-de-coro/"><img loading="lazy" src="<?php echo RUTA_URL ?>/img/team/catedral.jpg" alt="..." width=330px height=330px></a>
					<div class="caption">
						<h3>Iglesia Catedral</h3>
						<p>Fue la primera diócesis del continente (por bula papal de 1531), territorio donde ejerce funciones un obispo, por lo cual su templo tiene categoría de catedral. Su construcción se inició en 1583 y se extendió por lo menos unos 50 años más.</p>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!--===== NOTICIAS MUNICIPALES ============================================-->

	<div class="section-news contenedor">
		<h2>Conoce la Gestión Municipal <strong>Noticias</strong></h2>
		<small><em>Visita las noticias de ultimo momento acerca de la gestión de desarrollo de nuestro municipio en el trabajo por la soberanía nacional..</em></small>

		<div class="section-news__main">
			<div class="section-news__left-frame">
				<img class="section-news__thumbnail-img" loading="lazy" src="<?php echo RUTA_URL ?>/img/new/pag1.jpg" />

				<img class="section-news__thumbnail-img" loading="lazy" src="<?php echo RUTA_URL ?>/img/new/pag2.jpg" />
			</div>

			<div class="section-news__right-frame">
				<iframe src="https://www.youtube.com/embed/FC_yhKPAG9E" class="section-news__thumbnail-video"></iframe>
			</div>
		</div>
		<a class="section-news__button" href="<?php echo RUTA_URL; ?>/noticias/"">Ver Más</a>
	</div>

	<!--===== INSTITUTOS AUTÓNOMOS ==========================================-->

	<!-- Re ubicar los institutos Autónomos -->

	<div id="institutos">
		<div class="contenedor">
			<h2 class="color-letras">Institutos <strong>Autónomos</strong></h2>
			<div id="clients" class="owl-carousel owl-theme">

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/HaciendaMunicipal.jpeg" alt="" />
					<a><strong>Hacienda Municipal</strong></a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/OficinaMunicipal.jpeg" alt="" />
					<a><strong>Oficina Municipal</strong></a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/SecretariaDeAmbiente.jpeg" alt="" />
					<a><strong>Secretaria De Ambiente</strong></a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/OficinaDeProyecto.jpeg" alt="" />
					<a><strong>Oficina De Proyecto</strong></a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/IMUM.jpeg" alt="" />
					<a><strong>Instituto de la mujer</strong></a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/src=" <?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg" alt="">
					<a href="secciones/institutos/bomberos.php">Cuerpo de Bomberos</a>
				</div>
				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/src=" <?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg" alt="">
					<a href="secciones/institutos/fondesmiranda.php">FONDES Miranda</a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-matadero-municipal.jpg">
					<a href="secciones/institutos/matadero-municipal.php">Matadero Municipal</a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg" alt="">
					<a href="secciones/institutos/patrimonio.php">Patrimonio Municipal</a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg" alt="">
					<a href="secciones/institutos/terminal.php">Terminal Pasajeros</a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg" alt="">
					<a href="secciones/institutos/mercado.php">Mercados Municipales</a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg" alt="">
					<a href="secciones/institutos/imtt.php">IMTT</a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg" alt="">
					<a href="secciones/institutos/imaud.php">IMAUD</a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg" alt="">
					<a href="secciones/institutos/imudemi.php">IMUDEMI</a>
				</div>

				<div class="item">
					<img loading="lazy" src="<?php echo RUTA_URL ?>/img/institutos/instituto-bomberos.jpg" alt="">
					<a href="secciones/institutos/inhamir.php">INHAMIR</a>
				</div>
			</div>
		</div>
		<div class="svg-hero" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
				<path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
			</svg></div>
	</div>
	</div>
	<!--===== DIRECCIÓN DE LA ALCALDíA =================================================-->
	<div id="tf-testimonials">
		<div class="contenido-dirección contenedor">
			<h2 class="color-letras"><strong></strong> Dirección de la Alcaldía de Miranda</h2>
			<div id="testimonial" class="owl-carousel owl-theme">
				<div class="item">
					<a href="#">
						<h1> <strong><span class="color2">Dirección de Despacho</span></strong></h1>
					</a>
					<p>Esta sede se encuentra ubicada en la <strong>Avenida Miranda con calle Urdaneta, edificio Ayuntamiento</strong> Coro, estado Falcón</p>
				</div>

				<div class="item">
					<a href="#" !--Dir/s_hacienda.php--> <h1> <strong><span class="color2"> Secretaria de Hacienda Municipal</span></strong></h1></a>
					<p>Esta sede de la alcaldía de miranda se encuentra ubicada en la <strong> Calle Norte, con Avenida Los Médanos</strong> de Coro, estado Falcón.</p>
				</div>

				<div class="item">
					<a href="#">
						<h1> <strong><span class="color2">Secretaria de Desarrollo Económico</span></strong></h1>
					</a>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>

				<div class="item">
					<a href="#">
						<h1> <strong><span class="color2">Secretaria de Turismo, Educación y Cultura </span></strong></h1>
					</a>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>

				<div class="item">
					<a href="#" !--Dir/s_territorial.php--> <h1> <strong><span class="color2"> Secretaria Territorial Municipal</span></strong></h1></a>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>
				<div class="item">
					<a href="#" !--Dir/s_política.php--> <h1> <strong><span class="color2"> Secretaria Política Municipal</span></strong></h1></a>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>
				<div class="item">
					<a href="#" !--Dir/s_social.php--> <h1> <strong><span class="color2"> Secretaria Social Municipal</span></strong></h1></a>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>
				<div class="item">
					<a href="#" !--Dir/s_ambiente.php--> <h1> <strong><span class="color2"> Secretaria de Ambiente Municipal</span></strong></h1></a>
					<p>Información <strong>de Interés</strong> a los usuarios acerca de esta dirección de la Alcaldía Bolivariana del municipio Miranda</p>
				</div>
			</div>
		</div>
	</div>
	<!-- <table class="data-base-table">
		<p><?php echo $datos['titulo']; ?></p>
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
				<th><a href="<?php echo RUTA_URL; ?>/paginas/agregar/">Insertar</a></th>
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
	</table> -->
	<!--===== FOOTER =======================================-->
	<?php require RUTA_APP . '/views/inc/footer.php'; ?>

	<!--===== Javascripts ================================================== -->
	<script src="https://platform-api.sharethis.com/js/sharethis.js#property=5cc87df64b94860012b42e5b&product=custom-share-buttons"></script>
	<script src="<?php echo RUTA_URL; ?>/js/jquery.1.11.1.js"></script>
	<script src="<?php echo RUTA_URL; ?>/js/bootstrap.js"></script>
	<script src="<?php echo RUTA_URL; ?>/js/SmoothScroll.js"></script>
	<script src="<?php echo RUTA_URL; ?>/js/owl.carousel.js"></script>
	<script src="<?php echo RUTA_URL; ?>/js/main.js"></script>
	<script src="<?php echo RUTA_URL; ?>/js/all.min.js"></script>
</body>

</html>