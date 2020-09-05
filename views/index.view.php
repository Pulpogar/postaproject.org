<?php
require_once 'Layouts\header.php';
require_once 'admin\config.php';
require_once './functions.php';
?>

<head><link rel="stylesheet" href="./assets/css/estilos.css"></head>

<body>

<script>

$(function(){
  var $img = $('.image-fit');

  // Handle responsive images with srcset
  $img.each(function(){
    // Polyfill srcset and sizes
    picturefill({ elements: this });

    // Polyfill object-fit property
    objectFitImages(this);
  });
})
</script>

<?php
$estado = 1;
$inicio = 1;
$sql = "SELECT * FROM proyectos where estado = $estado order by fecha desc";
// $proyectos = obtener_proyecto($blog_config['proyectos_por_pagina'], $conexion, 1, $sql);
$cant_proyectos = count($proyectos);
$contador = 0;
$text = "<br>";
// var_dump($lang);
?>
<div class="site-main-container">

			<section class="top-post-area pt-12">
			<br>
				<div class="container no-padding">
					<form action="./search.php" method="get" name="busqueda" class="buscar">
						<div class="input-group input-group-lg">
						<input type="text" class="form-control border border-secondary" name="busqueda" placeholder='<?php echo $placeSearch ?>' style="text-align: center;color: black; font-size: 18px" aria-label="Recipient's username" aria-describedby="basic-addon2"
						onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $placeSearch ?>'">
							<div class="input-group-append">
								<button class="btn btn-secondary" type="submit"><i class="ti-search"></i></button>
							</div>
						</div>
					</form>
					<br>
					<div style="width: 100%; margin: 0 auto;" class="col-lg-8 col-md-12 col-sm-12 form-inline no-padding">
						<div class="embed-responsive embed-responsive-16by9" >
								<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/<?php echo $video ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
									frameborder="0" allow="accelerometer autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
						</div>
					</div>
				</div>
				</div>
			</section>
			<br>
			<div class="container no-padding">
				<div class="row">
						<div class="col-lg-12 post-list">
							<div class="popular-post-wrap">
								<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp<?php echo $cant_proyectos ?>&nbsp<?php echo $pRecientemente ?></h4>
								<div class="row mt-20 medium-gutters">
								<?php 
$contador = 0;
$text = "<br>";
?>

								<?php


foreach ($proyectos as $proyecto):


    ?>

									<?php

    $area = obtenerCampoMultilenguaje($conexion, 'areas', 'id', $proyecto['area'], $_SESSION["language"]);
    $idioma = obtenerCampoMultilenguaje($conexion, 'idiomas', 'id', $proyecto['idioma'], $_SESSION["language"]);
    $dificultad = obtenerCampoMultilenguaje($conexion, 'dificultades', 'id', $proyecto['dificultad'], $_SESSION["language"]);

    ?>
										<!-- <div class="row mt-20 medium-gutters"> -->
											<div class="col-lg-4 single-popular-post">
											<?php if ($contador >= 3) {
        echo utf8_encode($text);
    }
    ?>
													<div class="feature-img-wrap relative">
														<div class="feature-img relative">

															<div class="imagecover"></div>
															<a href="single-project.php?id=<?php echo $proyecto['id']; ?>#disqus_thread"><img class="image-fit2" src="images/<?php echo utf8_encode(utf8_decode($proyecto['thumb'])) ?>" alt="">
														</div>
														<ul class="tags">
															<li><?php echo utf8_encode(utf8_decode($idioma)) ?></a></li>
														</ul>
													</div>
													<div class="details">
														<a href="single-project.php?id=<?php echo $proyecto['id']; ?>#disqus_thread">
															<h4><?php echo utf8_encode(utf8_decode($proyecto['titulo'])); ?>
															<!-- <?php if ($proyecto['idRolSubida'] == 1) {?>
																<i style="color: blue" class="fas fa-check-circle"></i>
															<?php }?> -->
															</h4>
														</a>

	<!-- Set rating -->
	<script type='text/javascript'>
														$(document).ready(function(){
															$('#rating_<?php echo $proyecto['id']; ?>').barrating('set',<?php echo $rating; ?>);
														});

														</script>



														<ul class="meta">
															<li><span class="lnr lnr-user"></span><?php echo utf8_encode(utf8_decode($proyecto['autorProyecto'])) ?></a></li>
															<li><span class="lnr lnr-calendar-full"></span><?php echo utf8_encode(utf8_decode($proyecto['fecha'])) ?></a></li>
															<li><span class="ti-alert"></span>&nbsp&nbsp<?php echo utf8_encode(utf8_decode($dificultad)) ?> </a></li>
														</ul>
														<?php
    $var = $proyecto['extracto'];
    $cortado = substr($var, 0, 200);?>
														<p class="excert" style="text-align:justify; color: black;font-size: 14px">
														<?php echo utf8_encode(utf8_decode($cortado)) ?>...<a href="single.php?id=<?php echo $proyecto['id']; ?>#disqus_thread"><?php echo $leerMas; ?></a>
														<!-- <?php echo utf8_encode(utf8_decode($proyecto['extracto'])) ?> -->
														</p>
													</div>
												</div>
												<?php $contador++;?>

												<?php endforeach;?>



								</div>

							</div>
							<br>
							<?php require './paginacion.php';?>
							</div>
							</div>

						</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		</body>
</html>

<?php require 'Views/Layouts/footer.php';?>

	<script src="./js/rating.js" type="text/javascript"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-148932330-1');
	</script>


