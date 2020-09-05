<?php
require 'Layouts/header.php';
?>	

<head>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style>
        body{width:100%}
        .row{padding:20px}
    </style>


<script> 

window.onload = function() {
	<p>
   <a href='#' id='volver-arriba'>Volver arriba </a>
</p>
};

</script>

</head>


<?php 

if (isset($_SESSION["language"]))
    
{
$idioma=$_SESSION["language"]; 
}

switch ($idioma){
    case "es":
        //echo "PAGE ES";
        $disqusLang = "es_AR	";
        break;
    case "en":
        //echo "PAGE EN";
        $disqusLang = "en_US";
        break;
    case "br":
        //echo "PAGE BR";
        $disqusLang = "pt_BR";
		break;
	case "it":
        //echo "PAGE IT";
        $disqusLang = "it";
        break;    
    default:
        //echo "PAGE EN - Setting Default";
        $disqusLang = "es_AR";
        break;
}

?>
<body>

	<script id="dsq-count-scr" src="//postaproject.disqus.com/count.js" async></script>

		<div class="site-main-container">
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								
								
								<?php $area = obtenerCampoPorID($conexion, 'areas', 'id', $proyecto_test['area']);
									$idioma = obtenerCampoMultilenguaje($conexion, 'idiomas', 'id', $proyecto_test['idioma'],$_SESSION["language"]);
									$dificultad = obtenerCampoMultilenguaje($conexion, 'dificultades', 'id', $proyecto_test['dificultad'],$_SESSION["language"]);							
								?>
								<!-- <div class="content-wrap">									 -->
								<strong><b><p class="excert" style="text-align:justify; color: black;font-size: 20px">								 
								<h3><?php echo utf8_encode(utf8_decode($proyecto_test['titulo'])) ?></h3></p></strong></b>
									<?php if (isset($_SESSION['loggedin'])) { ?>
										<!-- <div style="text-align:right"><a style="font-size:13px" class="btn btn-success btn-sm" href="error-no-disponible.php"><i class="ti-layers"></i>&nbsp<?php echo $clonarProyecto ?></a></div> -->
									<?php } ?>

									<div class="form-group form-inline"> 										
										<ul class="meta mt-20">
											<li><a href="#"><span class="ti-user"></span>&nbsp<b><strong><?php echo $autor ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($proyecto_test['autorProyecto'])) ?></a></li>
											<li><span class="ti-calendar"></span>&nbsp<b><strong><?php echo $publicado ?></strong></b>&nbsp<?php echo fecha($proyecto_test['fecha']) ?></li>
											<li><a href="#"><span class="ti-alert"></span>&nbsp<b><strong><?php echo $complejidad ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($dificultad)) ?></a></li>
											<li><a href="#"><p class="excert" style="color: #3c8dbc; font-size: 13px"><span class="ti-cloud-up"></span>&nbsp<b><strong><?php echo $subidoPor ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($proyecto_test['autorSubida'])) ?></a></p></li>
											<!-- <?php if ($proyecto_test['lastUpdate']!=NULL) { ?>
												<li><p class="excert" style="color: green; background-color: white, font-size: 13px"><span class="ti-calendar"></span>&nbsp<b><strong><?php echo $ultimaActualizacionProyecto ?></strong></b>&nbsp<?php echo fecha($proyecto_test['lastUpdate']) ?></b></p></li>
											<?php } ?> -->
											<?php if ($proyecto_test['visitas']!=0) { ?>
												<li><span class="ti-eye"></span>&nbsp<b><strong><?php echo $visto ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($proyecto_test['visitas'])) ?>&nbsp<b><strong><?php echo $veces ?></strong></b></li>
											<?php } ?>
										</ul>
									</div>
									<!-- </div> -->
									
									<blockquote><p class="excert" style="text-align:justify; color: black;font-size: 16px">
									<?php echo utf8_encode(utf8_decode($proyecto_test['extracto'])) ?></p></blockquote>
									
									<!-- <div class="container no-padding"> -->
										<div class="row">
												<div class="popular-post-wrap">
													<div class="row mt-20 medium-gutters">
														<div class="col-lg-6 single-popular-post">
															<div class="feature-img-wrap relative">
																<div class="feature-img relative">
																	<div class="imagecover"></div>
																		<div class="img-hover-zoom img-hover-zoom--brightness">
																			<div class="ex2">
																			<a href="./images/<?php echo $proyecto_test['thumb']; ?>"><img class="image-fit" src="images/<?php echo utf8_encode(utf8_decode($proyecto['thumb'])) ?>" alt=""></a>
																			<br>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															</div>	
															</div>										
									</div>
									<br>
									<div class="popular-post-wrap" style="padding: 0px">
									<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtHabilidades ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">
									<?php echo utf8_encode(utf8_decode($proyecto_test['habilidades']))?></p>
									

									<div class="popular-post-wrap" style="padding: 0px">      
									<br><h4 style="width:100%" class="title2"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp<?php echo $txtTecnologia ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">						
									<?php echo utf8_encode(utf8_decode($proyecto_test['herramientas'])) ?></p>
									

									<div class="popular-post-wrap" style="padding: 0px">			        
									<br><h4 style="width:100%" class="title2"><i class="fa fa-cogs"  aria-hidden="true"></i>&nbsp<?php echo $txtMateriales ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">						
									<?php echo utf8_encode(utf8_decode($proyecto_test['materiales'])) ?></p>		
												
									<div class="popular-post-wrap" style="padding: 0px">			
									<br><h4 style="width:100%" class="title2"><i class="fa fa-list-ol"></i>&nbsp<?php echo $txtOrganizacionInicial ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">
									<?php echo utf8_encode(utf8_decode($proyecto_test['organizacionIni'])) ?></p>

									<div class="popular-post-wrap" style="padding: 0px">
									<br><h4 class="title2"><i class="ti-layout-accordion-list"></i>&nbsp<?php echo $txtDesarrolloProyecto ?></h4>
									</div>
									<div class="content"><?php echo htmlspecialchars_decode($proyecto_test['desarrollo']);?></div>
									

										<?php if ($proyecto_test['otherfiles'] != null) {?>
											<div class="popular-post-wrap" style="padding: 0px">      
												<br><h4 style="width:100%" class="title2"><i class="ti-save" aria-hidden="true"></i>&nbsp<?php echo $txtArchivosNecesarios ?></h4>
											</div>
											<p class="excert" style="text-align:justify; color: black;font-size: 15px">						
											<?php echo $txtDescargarArchivos ?></p>			
											<h5 style="text-align:left"><i class="fa fa-download">&nbsp</i><a href="<?php echo utf8_encode(utf8_decode($proyecto_test['otherfiles'])) ?>" target="_blank"><?php echo $txtLinkDescargarArchivos ?></a></h5>
										<?php } ?>
									
<br><br>



				</div>
			</div>
		</section>
	</div>
	
	<?php
require 'Layouts/header.php';
?>

</body>
</html>

    <!-- include libries(jQuery, bootstrap) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>