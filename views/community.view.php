<?php
	require 'Layouts/header.php'; 
	require_once './functions.php';
?>

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

<body>

<div class="site-main-container">
			<div class="container no-padding">
							

				<div class="row">

						<div class="col-lg-12 post-list">
						<div class="popular-post-wrap">
			<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp<?php echo $comunidadBuscaTecnologías ?></h4>
			</div>	
							<div class="popular-post-wrap">
								<!-- <h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp<?php echo $pRecientemente ?></h4>															 -->
								<div class="row mt-20 medium-gutters">
									<div style="width: 100%; margin: 0 auto;" class="col-lg-6 col-md-12 col-sm-12 form-inline no-padding">		
										<p>¿Tienes una discapacidad?<br>
										¿Estás buscando un dispositivo que mejore tu calidad de vida?<br>
										En POSTA puedes encontrarlo.
										Mira este video y descubre cómo buscar y replicar dispositivos que se adapten a tu necesidad. 
										</p><br>
										<p>POSTA ES UNA COMUNIDAD<br>
										¿Replicaste un dispositivo?<br>
										Comparte tu experiencia para que otras personas se animen a hacerlo también.<br>
										Piensa que quién ideó este dispositivo tiene las mejores intenciones. Tu devolución constructiva es muy importante para esa persona y para esta comunidad.
										</p><br>
										<p>¿No encontraste lo que buscabas?<br>
										Puedes ingresar al foro y contar cuáles son tus necesidades para que creadores a lo largo del mundo puedan inspirarse a diseñar nuevas tecnologías. 
										</p><br>
										A POSTA lo armamos entre todos. 
									</div>
									<div style="width: 100%; margin: 0 auto;" class="col-lg-6 col-md-12 col-sm-12 form-inline no-padding">		
									<div class="embed-responsive embed-responsive-16by9" >						
											<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/<?php echo $video ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
											frameborder="0" allow="accelerometer autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</div><br>								
										<a href="./forum.php" class="btn btn-success btn-block btn-outlined" role="button"><?php echo $accederAlForo ?></a>
									</div>
								</div>
							</div>																	
						</div>								
				</div>	
				<div class="row">
						<div class="col-lg-12 post-list">
						<div class="popular-post-wrap">
			<h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp<?php echo $comunidadCreaTecnologías ?></h4>
			</div>	
							<div class="popular-post-wrap">
								<!-- <h4 style="text-align: center;text-transform: uppercase" class="title"><i class="ti-layout-grid3-alt"></i>&nbsp<?php echo $pRecientemente ?></h4>															 -->
								<div class="row mt-20 medium-gutters">
									<div style="width: 100%; margin: 0 auto;" class="col-lg-6 col-md-12 col-sm-12 form-inline no-padding">		
									<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad ducimus sequi voluptatem quod tenetur nemo modi ratione dolores cum, suscipit reprehenderit ullam officiis ab provident deserunt! Commodi ad animi natus!
										Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad ducimus sequi voluptatem quod tenetur nemo modi ratione dolores cum, suscipit reprehenderit ullam officiis ab provident deserunt! Commodi ad animi natus!
										</p>
									</div>
									<div style="width: 100%; margin: 0 auto;" class="col-lg-6 col-md-12 col-sm-12 form-inline no-padding">		
										<div class="embed-responsive embed-responsive-16by9" >						
											<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/<?php echo $video2 ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
											frameborder="0" allow="accelerometer autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>																	
						</div>								
				</div>						
			</div>
</div>
</body>
</html>

<?php require 'Views/Layouts/footer.php';?>