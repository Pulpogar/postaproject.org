<?php
require_once 'Layouts/header.php' ?>

<head>
		<link href="https://fonts.googleapis.com/css?family=Lexend+Mega&display=swap" rel="stylesheet"> 	
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

<div class="site-main-container">
		<div class="container no-padding">
				<div class="row">
						<div class="col-lg-12 post-list">
<section class="top-post-area pt-12">						
							<div class="relavent-story-post-wrap mt-30">							
								<?php if ($cant_proyectos == 0) { ?>
								<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp&nbsp<?php echo $txtPublicadosPorTi0 ?></h4>
								<?php } elseif ($cant_proyectos == 1) { ?>
									<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp&nbsp<?php echo $cant_proyectos ?>&nbsp<?php echo $txtPublicadosPorTi1 ?></h4>
									<?php } elseif ($cant_proyectos > 1) { ?>
										<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp&nbsp<?php echo $cant_proyectos ?>&nbsp<?php echo $txtPublicadosPorTi2 ?></h4>
									<?php } ?>								
								<div class="relavent-story-list-wrap">
								
								<?php
								if($proyectos){						
								foreach ($proyectos as $proyecto): ?>	
									<?php $area = obtenerCampoMultilenguaje($conexion, 'areas', 'id', $proyecto['area'], $_SESSION["language"]);
									$idioma = obtenerCampoMultilenguaje($conexion, 'idiomas', 'id', $proyecto['idioma'],$_SESSION["language"]);
									$dificultad = obtenerCampoMultilenguaje($conexion, 'dificultades', 'id', $proyecto['dificultad'],$_SESSION["language"]);
									
									?>
										<div class="single-relavent-post row align-items-center">
											<div class="col-lg-5 post-left">
												<div class="feature-img relative">
													<div class="imagecover"></div>
													<a href="single.php?id=<?php echo $proyecto['id']; ?>#disqus_thread"><img class="image-fit2" src="images/<?php echo utf8_encode($proyecto['thumb']) ?>" alt="">
												</div>
												<ul class="tags">
													<!-- <li><a href="#"><?php echo utf8_encode(utf8_decode($idioma)) ?></a></li> -->
												</ul>
											</div>
											<div class="col-lg-7">
											<a href="edit.php?id=<?php echo $proyecto['id']; ?>" class="btn btn-success" role="button"><i class="far fa-edit"></i>&nbsp;<?php echo $txtEditarEsteProyecto ?></a><br><br>

												<a href="single.php?id=<?php echo $proyecto['id']; ?>#disqus_thread">
													<h4 style="width:100%"><?php echo utf8_encode(utf8_decode($proyecto['titulo'])) ?></h4></a>
													
														<ul class="meta">
												<li><a href="#"><span class="ti-user"></span>&nbsp<b><strong><?php echo $autor ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($proyecto['autorProyecto'])) ?></a></li>
												<li><span class="ti-calendar"></span>&nbsp<b><strong><?php echo $publicado ?></strong></b>&nbsp<?php echo fecha($proyecto['fecha']) ?></li>
												<li><a href="#"><span class="ti-alert"></span>&nbsp<b><strong><?php echo $complejidad ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($dificultad)) ?></a></li>
												<li><a href="#"><span class="ti-cloud-up"></span>&nbsp<b><strong><?php echo $subidoPor ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($proyecto['autorSubida'])) ?></a></li>
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
										<?php endforeach;
										} else {?>
										<br><br>
											<p class="excert" style="text-align:center;;font-size: 15px"><b><strong><?php echo $_SESSION['nombre']?></b></strong><?php echo $txtNoHasPublicado ?>
											<br><br><br></p>
								
											<?php }?>
																		
								</div>
							</div>
						</div>
				</div>
			</div>
</div>
	<br>
	<br>
	<?php require 'Layouts/footer.php' ?>