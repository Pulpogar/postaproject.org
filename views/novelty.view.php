<?php
require_once 'Layouts/header.php';
?>

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

<div class="site-main-container">
		<div class="container no-padding">
				<div class="row">
						<div class="col-lg-12 post-list">
							<section class="top-post-area pt-12">						
							<div class="relavent-story-post-wrap mt-30">							
								<?php if ($cantidadNovedades == 0) { ?>
								<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp&nbsp<?php echo $txtNovedadesPublicadas00 ?></h4>
								<?php } elseif ($cantidadNovedades == 1) { ?>
									<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp&nbsp<?php echo $cantidadNovedades ?>&nbsp<?php echo $txtNovedadesPublicadas1 ?></h4>
									<?php } elseif ($cantidadNovedades > 1) { ?>
										<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp&nbsp<?php echo $cantidadNovedades ?>&nbsp<?php echo $txtNovedadesPublicadas2 ?></h4>
									<?php } ?>								
								<div class="relavent-story-list-wrap">								
								<?php
								foreach ($novedade as $novedad):?>								
										<div class="single-relavent-post row align-items-center">
												<div class="col-lg-3 post-left">
													<div class="feature-img relative">
														<div class="imagecover"></div>
														<a href="single-novelty.php?id=<?php echo $novedad['id']; ?>"><img class="image-fit2" src="images_novedades/<?php echo utf8_encode(utf8_decode($novedad['imgRepresentativa'])) ?>" alt="">
													</div>
													<!-- <ul class="tags">
														<li><a href="#"><?php echo utf8_encode(utf8_decode($idioma)) ?></a></li>
													</ul> -->
												</div>
												<div class="col-lg-9">
													<a href="single-novelty.php?id=<?php echo $novedad['id']; ?>#disqus_thread">
														<h4 style="width:100%"><?php echo utf8_encode(utf8_decode($novedad['titulo'])) ?></h4></a>													
														<ul class="meta">
															<li><a href="#"><span class="ti-user"></span>&nbsp<b><strong><?php echo $autor ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($novedad['createdBy'])) ?></a></li>
															<li><span class="ti-calendar"></span>&nbsp<b><strong><?php echo $publicado ?></strong></b>&nbsp<?php echo fecha($novedad['createdAt']) ?></li>												
														</ul>
														<?php $var = $novedad['resumen'];
															$cortado = substr($var, 0, 350);?>
															<p class="excert" style="text-align:justify; color: black;font-size: 15px">
														<?php echo utf8_encode(utf8_decode($cortado))?>...<a href="single-novelty.php?id=<?php echo $novedad['id']; ?>"><?php echo $leerMas; ?></a>
												</div>
											</div>
								<?php endforeach;?>										
								</div>
							</div>
						</div>
				</div>
		</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<?php require 'Layouts/footer.php' ?>