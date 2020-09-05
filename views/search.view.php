
<?php
require 'Layouts/header.php' ?>

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148932330-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-148932330-1');
	</script>
</head>

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

	<div class="contenedor"> 
		<!-- <h3 style="text-align:left"><?php echo $titulo; ?></h3><br> -->
		<?php foreach($resultados as $proyecto): ?>
			<?php 
				$categoria = obtenerCampoPorID($conexion, $lang, 'categorias', 'id', $proyecto['categoria']);
				$subcategoria = obtenerCampoPorID($conexion, $lang, 'subcategorias', 'id', $proyecto['subcategoria']);
				$area = obtenerCampoPorID($conexion, $lang, 'areas', 'id', $proyecto['area']);
				$idioma = obtenerCampoPorID($conexion, $lang, 'idiomas', 'id', $proyecto['idioma']);
				$dificultad = obtenerCampoPorID($conexion, $lang, 'dificultades', 'id', $proyecto['dificultad']);
			?>
		<?php endforeach; ?>

		<div class="container no-padding">
				<div class="row">
						<div class="col-lg-12 post-list">
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
					</form><br>
							<div class="popular-post-wrap">																							
							<?php if ($contador_resultados == 0) { ?>
								<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp&nbsp<?php echo $proyectosBusqueda0 ?></h4>
								<?php } elseif ($contador_resultados == 1) { ?>
									<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp&nbsp<?php echo $contador_resultados ?>&nbsp<?php echo $proyectosBusqueda1 ?></h4>
									<?php } elseif ($contador_resultados > 1) { ?>
										<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp&nbsp<?php echo $contador_resultados ?>&nbsp<?php echo $proyectosBusqueda2 ?></h4>
									<?php } ?>
								<div class="row mt-20 medium-gutters">
								<?php  $proyectos = obtener_proyecto($blog_config['proyectos_por_pagina'], $conexion, 1);
								$contador = 0;
								$text = "<br>";
								?>
								<?php foreach ($resultados as $proyecto): ?>	
									<?php $area = obtenerCampoPorID($conexion, $lang, 'areas', 'id', $proyecto['area']);
									$idioma = obtenerCampoPorID($conexion, $lang, 'idiomas', 'id', $proyecto['idioma']);
									$dificultad = obtenerCampoPorID($conexion, $lang, 'dificultades', 'id', $proyecto['dificultad']);
									
									?>
										<div class="col-lg-4 single-popular-post">
										<?php if ($contador >= 3) {
										echo utf8_encode($text);
										}
										?>
												<div class="feature-img-wrap relative">
													<div class="feature-img relative">
													
														<div class="imagecover"></div>
														<img class="image-fit" src="images/<?php echo utf8_encode($proyecto['thumb']) ?>" alt="">
													</div>
													<ul class="tags">
														<li><a href="#"><?php echo utf8_encode($idioma) ?></a></li>
													</ul>
												</div>
												<div class="details">
													<a href="single.php?id=<?php echo $proyecto['id']; ?>">
														<h4><?php echo utf8_encode($proyecto['titulo']) ?></h4>
													</a>
													<ul class="meta">
														<li><a href="#"><span class="lnr lnr-user"></span><?php echo utf8_encode($proyecto['autorProyecto']) ?></a></li>
														<li><span class="lnr lnr-calendar-full"></span><?php echo utf8_encode($proyecto['fecha']) ?></a></li>
														<li><a href="#"><span class="ti-alert"></span>&nbsp&nbsp<?php echo utf8_encode($dificultad) ?> </a></li>
														<li><a href="#"><span class="ti-world"></span>&nbsp&nbsp<?php echo utf8_encode($idioma) ?> </a></li>
													</ul>
													<?php $var = $proyecto['extracto'];
													$cortado = substr($var, 0, 250);?>
													<p class="excert" style="text-align:justify; color: black;font-size: 14px">
													<?php echo utf8_encode($cortado)?>...<a href="single.php?id=<?php echo $proyecto['id']; ?>"><?php echo $leerMas; ?>
												</div>
											</div>
											<?php $contador ++;?>
																						
											<?php endforeach; ?>
																	
								</div>
								
							</div>
							
							</div>
							</div>
					</div>
						<br>
						</div>


		</body>


		<?php require 'Layouts/header.php'; ?>


