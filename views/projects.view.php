<?php
require_once 'Layouts/header.php' ?>

<head>
	<link href="https://fonts.googleapis.com/css?family=Lexend+Mega&display=swap" rel="stylesheet">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148932330-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-148932330-1');
	</script>
</head>


<?php  $proyectos = obtener_proyecto($blog_config['proyectos_por_pagina'], $conexion, 1);?>

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
								$sql= "SELECT * FROM proyectos where estado = $estado order by fecha desc";
								$proyectos = obtener_proyecto($blog_config['proyectos_por_pagina'], $conexion, 1, $sql);
								$cant_proyectos = count($proyectos);
								$contador = 0;
								$text = "<br>";
							
                                
                                
                                
                                ?>


<div class="site-main-container">
		<div class="container no-padding">
				<div class="row">
						<div class="col-lg-12 post-list"><br>
<section class="top-post-area pt-12">						
							<form action="<?php echo RUTA; ?>/search.php" method="get" name="busqueda" class="buscar">
							<div class="input-group input-group-lg">					
							<input type="text" class="form-control border border-secondary" name="busqueda" placeholder='<?php echo $placeSearch ?>' style="text-align: center;font-size: 18px" aria-label="Recipient's username" aria-describedby="basic-addon2"
							onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $placeSearch ?>'">
								<div class="input-group-append">
									<button class="btn btn-secondary" type="submit"><i class="ti-search"></i></button>
								</div>
							</div>
						</form>
							<div class="relavent-story-post-wrap mt-30">
								<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-list-thumb-alt"></i>&nbsp<?php echo $cant_proyectos ?>&nbsp<?php echo $pRecientemente ?></h4>
								<div class="relavent-story-list-wrap">
								<?php foreach ($proyectos as $proyecto): ?>	
									<?php $area = obtenerCampoMultilenguaje($conexion, 'areas', 'id', $proyecto['area'],$_SESSION["language"]);
									$idioma = obtenerCampoMultilenguaje($conexion, 'idiomas', 'id', $proyecto['idioma'],$_SESSION["language"]);
									$dificultad = obtenerCampoMultilenguaje($conexion, 'dificultades', 'id', $proyecto['dificultad'],$_SESSION["language"]);
									
									?>
										<div class="single-relavent-post row align-items-center">
											<div class="col-lg-5 post-left">
												<div class="feature-img relative">
													<div class="imagecover"></div>
													<a href="single-project.php?id=<?php echo $proyecto['id']; ?>#disqus_thread"><img class="image-fit2" src="images/<?php echo utf8_encode(utf8_decode($proyecto['thumb'])) ?>" alt="">
												</div>
												<ul class="tags">
													<li><a href="#"><?php echo utf8_encode(utf8_decode($idioma)) ?></a></li>
												</ul>
											</div>
											<div class="col-lg-7">
												<a href="single-project.php?id=<?php echo $proyecto['id']; ?>#disqus_thread">
												<!-- <p style="text-align:justify;font-size: 15px"><?php echo utf8_encode(utf8_decode($proyecto['titulo'])) ?></p></a> -->
													<h4 style="width:100%"><?php echo utf8_encode(utf8_decode($proyecto['titulo'])) ?></h4></a>
													
														<ul class="meta">
												<li><a href="#"><span class="ti-user"></span>&nbsp<b><strong><?php echo $autor ?></strong></b>&nbsp<?php echo utf8_encode($proyecto['autorProyecto']) ?></a></li>
												<li><span class="ti-calendar"></span>&nbsp<b><strong><?php echo $publicado ?></strong></b>&nbsp<?php echo fecha($proyecto['fecha']) ?></li>
												<li><a href="#"><span class="ti-alert"></span>&nbsp<b><strong><?php echo $complejidad ?></strong></b>&nbsp<?php echo utf8_encode($dificultad) ?></a></li>
												<li><a href="#"><span class="ti-cloud-up"></span>&nbsp<b><strong><?php echo $subidoPor ?></strong></b>&nbsp<?php echo utf8_encode($proyecto['autorSubida']) ?></a></li>
												<!-- <li><span class="ti-eye"></span>&nbsp<b><strong><?php echo $visto ?></strong></b>&nbsp</li> -->
												</ul>
												<?php $var = $proyecto['extracto'];
													$cortado = substr($var, 0, 350);?>
													<p class="excert" style="text-align:justify; color: black;font-size: 15px">
													<?php echo utf8_encode(utf8_decode($cortado))?>...<a href="single.php?id=<?php echo $proyecto['id']; ?>#disqus_thread"><?php echo $leerMas; ?></a>
												<!-- <?php if (isset($_SESSION['loggedin'])) { ?>
														<div style="text-align:right"><a style="font-size:11px" class="btn btn-info btn-sm" href="error-no-disponible.php"><i class="ti-layers"></i>&nbsp<?php echo $clonarProyecto ?></a></div>
													<?php } ?> -->
												</p>
											</div>
										</div>	
										<?php endforeach; ?>								
								</div>
							</div>
						</div>
				</div>
			</div>
</div>
	<br>
	<br>
	<?php require 'Layouts/footer.php' ?>