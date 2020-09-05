<?php
require 'Layouts/header.php';
?>	

<head>

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
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="news-tracker-wrap" style="background:#94e8eb">
								<h5><span style="color:#14686b"><i class="fas fa-bullhorn"></i>&nbsp;<?php echo $noticias ?></span><a href="./single.php?id=<?php echo $novedad['id']; ?>">&nbsp;<?php echo $novedad['titulo']?></a></h5>
							</div>
							<br>
						</div>
					</div>
				</div>
			</section>

			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12 post-list">
							<div class="single-post-wrap">								
								
								<?php $area = obtenerCampoMultilenguaje($conexion, 'areas', 'id', $proyecto['area'], $_SESSION["language"]);
									$idioma = obtenerCampoMultilenguaje($conexion, 'idiomas', 'id', $proyecto['idioma'],$_SESSION["language"]);
									$dificultad = obtenerCampoMultilenguaje($conexion, 'dificultades', 'id', $proyecto['dificultad'],$_SESSION["language"]);							
								?>
								<strong><b><p class="excert" style="text-align:justify; color: black;font-size: 20px">								 
								<h3><?php echo utf8_encode(utf8_decode($proyecto['titulo'])) ?></h3></p></strong></b>
									<?php if (isset($_SESSION['loggedin'])) { ?><?php } ?>


									<div class="my-fixed-item">
										<?php 
										if (isset($_SESSION['loggedin'])){
										if (($_SESSION['rol'] == 1)) {
											if ($_SESSION["admin"] = TRUE) { ?>
											<h6 style="text-align:right"><a  class="btn btn-success btn-sm" href="edit.php?id=<?php echo $proyecto['id']; ?>"><i class="ti-pencil"></i>&nbsp</a><br>
											<a class="btn btn-info btn-sm" href="error-no-disponible.php"><i class="ti-layers"></i>&nbsp</a><br>
											<a class="btn btn-danger btn-sm" href="./admin/delete.php?id=<?php echo $proyecto['id']; ?>"><i class="ti-trash"></i>&nbsp</a></h6>
										<?php }}
										if ($_SESSION['rol'] == 5) {
											?>
											<h6 style="text-align:right"><a  class="btn btn-success btn-sm" href="translate.php?id=<?php echo $proyecto['id']; ?>"><i class="ti-world"></i>&nbsp<?php echo $traducir; ?></a><br>
											<!-- <a class="btn btn-info btn-sm" href="error-no-disponible.php"><i class="ti-layers"></i>&nbsp</a><br>
											<a class="btn btn-danger btn-sm" href="./admin/delete.php?id=<?php echo $proyecto['id']; ?>"><i class="ti-trash"></i>&nbsp</a></h6> -->
										<?php }} ?>
									</div>


									<div class="form-group form-inline"> 										
										<!-- <ul class="tags mt-10">
											<li><a href="#"><?php echo utf8_encode(utf8_decode($area)) ?></a></li>											
										</ul> -->
										<ul class="meta mt-20">
											<li><a href="#"><span class="ti-user"></span>&nbsp<b><strong><?php echo $autor ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($proyecto['autorProyecto'])) ?></a></li>
											<li><span class="ti-calendar"></span>&nbsp<b><strong><?php echo $publicado ?></strong></b>&nbsp<?php echo fecha($proyecto['fecha']) ?></li>
											<li><a href="#"><span class="ti-alert"></span>&nbsp<b><strong><?php echo $complejidad ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($dificultad)) ?></a></li>
											<li><a href="#"><p class="excert" style="color: #3c8dbc; font-size: 13px"><span class="ti-cloud-up"></span>&nbsp<b><strong><?php echo $subidoPor ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($proyecto['autorSubida'])) ?></a></p></li>
											<!-- <?php if ($proyecto['lastUpdate']!=NULL) { ?>
												<li><p class="excert" style="color: green; background-color: white, font-size: 13px"><span class="ti-calendar"></span>&nbsp<b><strong><?php echo $ultimaActualizacionProyecto ?></strong></b>&nbsp<?php echo fecha($proyecto['lastUpdate']) ?></b></p></li>
											<?php } ?> -->
											<?php if ($proyecto['visitas']!=0) { ?>
												<li><span class="ti-eye"></span>&nbsp<b><strong><?php echo $visto ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($proyecto['visitas'])) ?>&nbsp<b><strong><?php echo $veces ?></strong></b></li>
											<?php } ?>
										</ul>
									</div>
									<!-- </div> -->
									
									<blockquote><p class="excert" style="text-align:justify; color: black;font-size: 16px">
									<?php echo utf8_encode(utf8_decode($proyecto['extracto'])) ?></p></blockquote>
									
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
																			<a href="./images/<?php echo $proyecto['thumb']; ?>"><img class="image-fit" src="images/<?php echo utf8_encode(utf8_decode($proyecto['thumb'])) ?>" alt=""></a>
																			<br>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
																									

														<div class="col-lg-6 col-md-12 name">
														<?php if ($proyecto['video'] != null) {?>
															<?php
													$mystring =  $proyecto['video'];
													$findme   = 'watch';
													$pos = strpos($mystring, $findme);
													if ($pos !== false) {
														$link = $proyecto['video'];
														preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $link, $matches);								
														$id = $matches[1];													
														?>								
														
																 																					
																<div class="embed-responsive embed-responsive-16by9">
																<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
																frameborder="0" allowfullscreen></iframe>
																</div>
																
														
														
													<?php } else { ?>
															<!-- <?php
																$link = $video['enlace'];
																preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $link, $matches);								
																$id = $matches[1];	
															?>
															<div class="col-lg-6 col-md-12 name">
															
															?>	 																					
																<div class="embed-responsive embed-responsive-16by9">
																<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
																frameborder="0" allowfullscreen></iframe>
																</div>
															</div> -->
														<?php } ?>														
														<?php } ?>
														<br>
														</div><br>
									</div>
									<br>
									<div class="popular-post-wrap" style="padding: 0px">
									<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtHabilidades ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">
									<?php echo utf8_encode(utf8_decode($proyecto['habilidades']))?></p>
									

									<div class="popular-post-wrap" style="padding: 0px">      
									<br><h4 style="width:100%" class="title2"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp<?php echo $txtTecnologia ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">						
									<?php echo utf8_encode(utf8_decode($proyecto['herramientas'])) ?></p>
									

									<div class="popular-post-wrap" style="padding: 0px">			        
									<br><h4 style="width:100%" class="title2"><i class="fa fa-cogs"  aria-hidden="true"></i>&nbsp<?php echo $txtMateriales ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">						
									<?php echo utf8_encode(utf8_decode($proyecto['materiales'])) ?></p>		
												
									<div class="popular-post-wrap" style="padding: 0px">			
									<br><h4 style="width:100%" class="title2"><i class="fa fa-list-ol"></i>&nbsp<?php echo $txtOrganizacionInicial ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">
									<?php echo utf8_encode(utf8_decode($proyecto['organizacionIni'])) ?></p>

									<div class="popular-post-wrap" style="padding: 0px">
									<br><h4 class="title2"><i class="ti-layout-accordion-list"></i>&nbsp<?php echo $txtDesarrolloProyecto ?></h4>
									</div>
									<?php foreach($etapas as $etapa): ?>
											<p class="excert" style="text-align:justify; color: black;font-size: 15px">
											<b><strong><?php echo $nro_etapa ?>&nbsp<?php echo ($etapa['idetapa']) ?>&nbsp-&nbsp<?php echo utf8_encode(utf8_decode($etapa['titulo'])); ?></strong></b></p>
											<p class="excert" style="text-align:justify; color: black;font-size: 15px">
											<br><?php echo utf8_encode(utf8_decode($etapa['texto'])); ?></p><br><br>
										<?php endforeach; ?>
									
									<?php foreach($imagenes as $imagen): ?>
										<?php if ($imagen['nombre'] != null) {?>
										<br>
											<div class="popular-post-wrap" style="padding: 0px">
												<h4 class="title2"><i class="ti-gallery"></i>&nbsp<?php echo $txtImagenesProyecto ?></h4>
											</div>
										<?php } break ?>
									<?php endforeach; ?>

									
									
									<div class="row">	
									<?php
										$contador = 0;
										$text = "<br>";
									?>
									<?php foreach($imagenes as $imagen): ?>
									<?php if ($imagen['nombre'] != null) {?>
										
										
												
										<!-- <div class="popular-post-wrap">
													<div class="row mt-20 medium-gutters"> -->
														<div class="col-lg-6 single-popular-post">
														<?php if ($contador >= 2) {
															echo utf8_encode(utf8_decode($text));
															}
														?>
															<div class="feature-img-wrap relative">
																<div class="feature-img relative">
																	<div class="imagecover"></div>
																		<div class="img-hover-zoom img-hover-zoom--brightness">
																			<div class="ex2">
																				<a href="./images/<?php echo $imagen['nombre']; ?>"><img class="image-fit" src="images/<?php echo utf8_encode(utf8_decode($imagen['nombre'])) ?>" alt=""></a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
													<!-- </div></div> -->
									<?php } ?>
									<?php $contador ++;?>
									<?php endforeach; ?>
									</div>
									

									<!-- <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
											<div class="modal-footer" style="text-align:center;font-size:13px">
											<h6 style="text-align:right;font-size:14px"><?php echo $scrollImagen ?></h6>
													<div><a href="./images/<?php echo $imagen['nombre']; ?>" target="_blank"><?php echo $verCompleta ?></a></div>
													<button class="btn btn-secondary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button"><?php echo $cerrar ?></button>
												</div>
												<div class="modal-body mb-0 p-0">
													<img src="./images/<?php echo $imagen['nombre']; ?>" alt="" style="width:100%">
												</div>
												
											</div>
										</div>
									</div> -->


									<?php foreach($videos as $video): ?>
										<?php if ($video['enlace'] != null) {?>
										<br>
											<div class="popular-post-wrap" style="padding: 0px">
												<h4 class="title2"><i class="ti-video-clapper"></i>&nbsp<?php echo $txtVideosProyecto ?></h4>
											</div>
										<?php } break ?>
									<?php endforeach; ?>
									<div class="row">
									<?php
										$contador = 0;
										$text = "<br>";
									?>
									<?php foreach($videos as $video): ?>
									
										<?php if ($video['enlace'] != null) {?>
												<?php
													$mystring =  $video['enlace'];
													$findme   = 'watch';
													$pos = strpos($mystring, $findme);
													if ($pos !== false) {
														$link = $video['enlace'];
														preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $link, $matches);								
														$id = $matches[1];													
														?>										
														<div class="col-lg-6 col-md-12 name">
															<?php if ($contador >= 2) {
															echo utf8_encode(utf8_decode($text));
															}
															?>	 																					
																<div class="embed-responsive embed-responsive-16by9">
																<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
																frameborder="0" allowfullscreen></iframe>
																</div>
																<?php $contador ++;?>
														</div>
														
													<?php } else { ?>
															<!-- <?php
																$link = $video['enlace'];
																preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $link, $matches);								
																$id = $matches[1];	
															?>
															<div class="col-lg-6 col-md-12 name">
															<?php if ($contador >= 2) {
															echo utf8_encode($text);
															}
															?>	 																					
																<div class="embed-responsive embed-responsive-16by9">
																<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
																frameborder="0" allowfullscreen></iframe>
																</div>
															</div> -->
														<?php } ?>														
														<?php } ?>
														
									<?php endforeach; ?>
									</div>

									
										<?php if ($proyecto['otherfiles'] != null) {?>
											<div class="popular-post-wrap" style="padding: 0px">      
												<br><h4 style="width:100%" class="title2"><i class="ti-save" aria-hidden="true"></i>&nbsp<?php echo $txtArchivosNecesarios ?></h4>
											</div>
											<p class="excert" style="text-align:justify; color: black;font-size: 15px">						
											<?php echo $txtDescargarArchivos ?></p>			
											<h5 style="text-align:left"><i class="fa fa-download">&nbsp</i><a href="<?php echo utf8_encode(utf8_decode($proyecto['otherfiles'])) ?>" target="_blank"><?php echo $txtLinkDescargarArchivos ?></a></h5>
										<?php } ?>
									
<br><br>
								
								<div class="comment-sec-area">
									<div class="container">
										<div class="row flex-column">
										</div>
									</div>
								</div>
														
							<div class="comment-form">

							<button class="btn btn-secondary" id="disqus-button"><?php echo $mostrarcomentarios ?></button>

<div id="disqus-container" style="display: none">
	<div id="disqus_thread"></div>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
</div>


						</div>						
				</div>
			</div>
		</section>
	</div>
</body>
</html>

<?php require 'Layouts/footer.php';?>

<script>
    /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
        */
    var disqus_config = function () {
        this.language = "<?php echo $disqusLang ?>";
		this.page.url = window.location.href;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.url = window.location.href; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    (function() {  // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://postaproject.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
    // Hide and show the container div upon click where you have placed Disqus
    var isHidden = true;
    var doc = window.document;
    var button = doc.getElementById('disqus-button');
    var container = doc.getElementById('disqus-container');
    button.onclick = function (event) {
        container.style.display = isHidden ? 'block' : 'none'
        button.innerHTML = isHidden ? '<?php echo $ocultarcomentarios ?>' : '<?php echo $mostrarcomentarios ?>';
        isHidden = !isHidden;
    }
</script>			
<script id="dsq-count-scr" src="https://postaproject.disqus.com/count.js" async></script>
