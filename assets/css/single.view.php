<?php
require 'Layouts/header.php';
?>	

		<div class="site-main-container">
			<!-- Start top-post Area -->
			<!-- <section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row"> -->
						<!-- <div class="col-lg-12">
							<div class="hero-nav-area">
								<h1 class="text-white">Image Post</h1>
								<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="#">Post Types </a><span class="lnr lnr-arrow-right"></span><a href="image-post.html">Image Post </a></p>
							</div>
						</div> -->
						<!-- <div class="col-lg-12">
							<div class="news-tracker-wrap">
								<h6><span><?php echo $noticias ?></span><a href="#"> Astronomy Binoculars A Great Alternative</a></h6>
							</div>
						</div> -->
					<!-- </div>
				</div>
			</section> -->
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								
								
								<?php $area = obtenerCampoPorID($conexion, 'areas', 'id', $proyecto['area']);
									$idioma = obtenerCampoPorID($conexion, 'idiomas', 'id', $proyecto['idioma']);
									$dificultad = obtenerCampoPorID($conexion, 'dificultades', 'id', $proyecto['dificultad']);									
								?>
								<!-- <div class="content-wrap">									 -->
									<a href="#"><h3><?php echo utf8_encode($proyecto['titulo']) ?></h3></a>
									<?php if (isset($_SESSION['loggedin'])) { ?>
										<div style="text-align:right"><a style="font-size:13px" class="btn btn-success btn-sm" href="error-no-disponible.php"><i class="ti-layers"></i>&nbsp<?php echo $clonarProyecto ?></a></div>
									<?php } ?>
									<div class="form-group form-inline"> 										
										<!-- <ul class="tags mt-10">
											<li><a href="#"><?php echo utf8_encode($area) ?></a></li>											
										</ul> -->
										<ul class="meta mt-20">
											<li><a href="#"><span class="ti-user"></span>&nbsp<b><strong><?php echo $autor ?></strong></b>&nbsp<?php echo utf8_encode($proyecto['autorProyecto']) ?></a></li>
											<li><span class="ti-calendar"></span>&nbsp<b><strong><?php echo $publicado ?></strong></b>&nbsp<?php echo fecha($proyecto['fecha']) ?></li>
											<li><a href="#"><span class="ti-alert"></span>&nbsp<b><strong><?php echo $complejidad ?></strong></b>&nbsp<?php echo utf8_encode($dificultad) ?></a></li>
											<li><a href="#"><span class="ti-cloud-up"></span>&nbsp<b><strong><?php echo $subidoPor ?></strong></b>&nbsp<?php echo utf8_encode($proyecto['autorSubida']) ?></a></li>
											<li><span class="ti-eye"></span>&nbsp<b><strong><?php echo $visto ?></strong></b>&nbsp<?php echo utf8_encode($proyecto['visitas']) ?>&nbsp<b><strong><?php echo $veces ?></strong></b></li>
										</ul>
									</div>
									<!-- </div> -->
									
									<div class="feature-img-thumb relative">
										<div style="width: 100%; margin: 0 auto;" class="col-lg-10 col-md-12 col-sm-12 form-inline no-padding">
										<!-- <div class="overlay overlay-bg"></div> -->
										<img class="img-fluid" src="images/<?php echo utf8_encode($proyecto['thumb']) ?>" alt="">
									</div></div><br>
									
									<div style="width: 100%; margin: 0 auto;" class="col-lg-10 col-md-12 col-sm-12 form-inline no-padding">
									<?php if ($proyecto['video'] != null) {?>
										<div class="embed-responsive embed-responsive-16by9">
											<?php
												$url = $proyecto['video'];
												preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
												// preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $urls, $matches2);
												$id = $matches[1];
												// $ids = $matches2;
												// $width = '800px';
												// $height = '450px';
											?>
										<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
										frameborder="0" allowfullscreen></iframe>
										</div>
									<?php } ?>
									</div>
									<br><br>
									<blockquote><?php echo utf8_encode($proyecto['extracto']) ?></blockquote>
									<br>
									
									<div class="popular-post-wrap" style="padding: 0px">
									<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtHabilidades ?></h4>
									</div>
									<?php echo utf8_encode($proyecto['habilidades']) ?>
									

									<div class="popular-post-wrap" style="padding: 0px">      
									<br><h4 style="width:100%" class="title2"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp<?php echo $txtTecnologia ?></h4>
									</div>						
									<?php echo utf8_encode($proyecto['herramientas']) ?>
									

									<div class="popular-post-wrap" style="padding: 0px">			        
									<br><h4 style="width:100%" class="title2"><i class="fa fa-cogs"  aria-hidden="true"></i>&nbsp<?php echo $txtMateriales ?></h4>
									</div>						
									<?php echo utf8_encode($proyecto['materiales']) ?>			
												
									<div class="popular-post-wrap" style="padding: 0px">			
									<br><h4 style="width:100%" class="title2"><i class="fa fa-list-ol"></i>&nbsp<?php echo $txtOrganizacionInicial ?></h4>
									</div>
									<?php echo utf8_decode($proyecto['organizacionIni']) ?>

									<div class="popular-post-wrap" style="padding: 0px">
									<br><h4 class="title2"><i class="ti-layout-accordion-list"></i>&nbsp<?php echo $txtDesarrolloProyecto ?></h4>
									</div>
									<?php foreach($etapas as $etapa): ?>
											<b><strong><?php echo $nro_etapa ?>&nbsp<?php echo ($etapa['idetapa']) ?>&nbsp-&nbsp<?php echo utf8_encode($etapa['titulo']); ?></strong></b>
											<br><?php echo utf8_encode($etapa['texto']); ?><br><br>
										<?php endforeach; ?>
									
									<?php foreach($imagenes as $imagen): ?>
										<?php if ($imagen['nombre'] != null) {?>
										<br>
											<div class="popular-post-wrap" style="padding: 0px">
												<h4 class="title2"><i class="ti-gallery"></i>&nbsp<?php echo $txtImagenesProyecto ?></h4>
											</div>
										<?php } break ?>
									<?php endforeach; ?>

									<?php foreach($imagenes as $imagen): ?>
									<?php if ($imagen['nombre'] != null) {?>
										<div class="feature-img-thumb relative" style="text-align:center">
											<div style="width: 100%; margin: 0 auto;" class="col-lg-10 col-md-12 col-sm-12 form-inline no-padding">						
												<img src="./images/<?php echo $imagen['nombre']; ?>" alt="">
											</div>
										</div>
									<br>
									<?php } ?>
									<?php endforeach; ?>
									
									<?php foreach($videos as $video): ?>
										<?php if ($video['enlace'] != null) {?>
										<br>
											<div class="popular-post-wrap" style="padding: 0px">
												<h4 class="title2"><i class="ti-video-clapper"></i>&nbsp<?php echo $txtVideosProyecto ?></h4>
											</div>
										<?php } break ?>
									<?php endforeach; ?>

									<?php foreach($videos as $video): ?>
									<?php if ($video['enlace'] != null) {?>
											<?php
												$link = $video['enlace'];
												preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $link, $matches);
												// preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $urls, $matches2);
												$id = $matches[1];
												// $ids = $matches2;
												// $width = '800px';
												// $height = '450px';
											?>
										<div style="width: 100%; margin: 0 auto;" class="col-lg-10 col-md-12 col-sm-12 form-inline no-padding">
										<div class="embed-responsive embed-responsive-16by9">
										<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
										frameborder="0" allowfullscreen></iframe>
										</div></div>
										<br>
										<?php } ?>
									<?php endforeach; ?>
									

									
										<?php if ($proyecto['otherfiles'] != null) {?>
											<div class="popular-post-wrap" style="padding: 0px">      
												<br><h4 style="width:100%" class="title2"><i class="ti-save" aria-hidden="true"></i>&nbsp<?php echo $txtArchivosNecesarios ?></h4>
											</div>						
											<?php echo $txtDescargarArchivos ?>				
											<br><br><h5 style="text-align:left"><i class="fa fa-download">&nbsp</i><a href="<?php echo utf8_encode($proyecto['otherfiles']) ?>" target="_blank"><?php echo $txtLinkDescargarArchivos ?></a></h5>
										<?php } ?>
									


								<div class="navigation-wrap justify-content-between d-flex">
									<a class="prev" href="error-no-disponible.php"><span class="lnr lnr-arrow-left"></span><?php echo $AnteriorProyecto ?></span></a>
									<a class="next" href="error-no-disponible.php"><?php echo $SiguienteProyecto ?><span class="lnr lnr-arrow-right"></span></a>
								</div>
								
								<div class="comment-sec-area">
									<div class="container">
										<div class="row flex-column">
											<!-- <h6>05 <?php echo $comentarios ?></h6>
											<div class="comment-list">
												<div class="single-comment justify-content-between d-flex">
													<div class="user justify-content-between d-flex">
														<div class="thumb">
															<img src="img/blog/c1.jpg" alt="">
														</div>
														<div class="desc">
															<h5><a href="#">Emilly Blunt</a></h5>
															<p class="date">December 4, 2017 at 3:12 pm </p>
															<p class="comment">
																Never say goodbye till the end comes!
															</p>
														</div>
													</div>
													<div class="reply-btn">
														<a href="" class="btn-reply text-uppercase"><?php echo $responder ?></a>
													</div>
												</div>
											</div>
											<div class="comment-list left-padding">
												<div class="single-comment justify-content-between d-flex">
													<div class="user justify-content-between d-flex">
														<div class="thumb">
															<img src="img/blog/c2.jpg" alt="">
														</div>
														<div class="desc">
															<h5><a href="#">Emilly Blunt</a></h5>
															<p class="date">December 4, 2017 at 3:12 pm </p>
															<p class="comment">
																Never say goodbye till the end comes!
															</p>
														</div>
													</div>
													<div class="reply-btn">
														<a href="" class="btn-reply text-uppercase"><?php echo $responder ?></a>
													</div>
												</div>
											</div>
											<div class="comment-list">
												<div class="single-comment justify-content-between d-flex">
													<div class="user justify-content-between d-flex">
														<div class="thumb">
															<img src="img/blog/c3.jpg" alt="">
														</div>
														<div class="desc">
															<h5><a href="#">Emilly Blunt</a></h5>
															<p class="date">December 4, 2017 at 3:12 pm </p>
															<p class="comment">
																Never say goodbye till the end comes!
															</p>
														</div>
													</div>
													<div class="reply-btn">
														<a href="" class="btn-reply text-uppercase"><?php echo $responder ?></a>
													</div>
												</div>
											</div> -->
										</div>
									</div>
								</div>
							<!-- </div> -->
							<br>
							<br>
							<div class="comment-form">
								<h4><?php echo $nuevoComentario ?></h4>
								<form>
									<div class="form-group form-inline">
										<div class="form-group col-lg-6 col-md-12 name">
											<input type="text" class="form-control" id="name" placeholder="<?php echo $nombre ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $nombreCompleto ?>'">
										</div>
										<div class="form-group col-lg-6 col-md-12 email">
											<input type="email" class="form-control" id="email" placeholder="<?php echo $escribeEmail ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $escribeEmail ?>'">
										</div>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="subject" placeholder="<?php echo $asunto ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $asunto ?>'">
									</div>
									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="message" placeholder="<?php echo $comentario ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $comentario ?>'" required=""></textarea>
									</div>
									<a href="#" class="primary-btn text-uppercase"><?php echo $nuevoComentario ?></a>
								</form>
							</div>
						</div>
						<!-- End single-post Area -->
					</div>
					<!-- <div class="col-lg-4">
						<div class="sidebars-area">
							<div class="single-sidebar-widget editors-pick-widget">
								<h6 class="title">Editor’s Pick</h6>
								<div class="editors-pick-post">
									<div class="feature-img-wrap relative">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img class="img-fluid" src="img/e1.jpg" alt="">
										</div>
										<ul class="tags">
											<li><a href="#">Travel</a></li>
										</ul>
									</div>
									<div class="details">
										<a href="image-post.html">
											<h4 class="mt-20">A Discount Toner Cartridge Is
											Better Than Ever.</h4>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
										</ul>
										<p class="excert">
											Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
										</p>
									</div>
									<div class="post-lists">
										<div class="single-post d-flex flex-row">
											<div class="thumb">
												<img src="img/e2.jpg" alt="">
											</div>
											<div class="detail">
												<a href="image-post.html"><h6>Help Finding Information
												Online is so easy</h6></a>
												<ul class="meta">
													<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
													<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
												</ul>
											</div>
										</div>
										<div class="single-post d-flex flex-row">
											<div class="thumb">
												<img src="img/e3.jpg" alt="">
											</div>
											<div class="detail">
												<a href="image-post.html"><h6>Compatible Inkjet Cartr
												world famous</h6></a>
												<ul class="meta">
													<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
													<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
												</ul>
											</div>
										</div>
										<div class="single-post d-flex flex-row">
											<div class="thumb">
												<img src="img/e4.jpg" alt="">
											</div>
											<div class="detail">
												<a href="image-post.html"><h6>5 Tips For Offshore Soft
												Development </h6></a>
												<ul class="meta">
													<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
													<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="single-sidebar-widget ads-widget">
								<img class="img-fluid" src="img/sidebar-ads.jpg" alt="">
							</div>
							<div class="single-sidebar-widget newsletter-widget">
								<h6 class="title">Newsletter</h6>
								<p>
									Here, I focus on a range of items
									andfeatures that we use in life without
									giving them a second thought.
								</p>
								<div class="form-group d-flex flex-row">
									<div class="col-autos">
										<div class="input-group">
											<input class="form-control" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" type="text">
										</div>
									</div>
									<a href="#" class="bbtns">Subcribe</a>
								</div>
								<p>
									You can unsubscribe us at any time
								</p>
							</div>
							<div class="single-sidebar-widget most-popular-widget">
								<h6 class="title">Most Popular</h6>
								<div class="single-list flex-row d-flex">
									<div class="thumb">
										<img src="img/m1.jpg" alt="">
									</div>
									<div class="details">
										<a href="image-post.html">
											<h6>Help Finding Information
											Online is so easy</h6>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
										</ul>
									</div>
								</div>
								<div class="single-list flex-row d-flex">
									<div class="thumb">
										<img src="img/m2.jpg" alt="">
									</div>
									<div class="details">
										<a href="image-post.html">
											<h6>Compatible Inkjet Cartr
											world famous</h6>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
										</ul>
									</div>
								</div>
								<div class="single-list flex-row d-flex">
									<div class="thumb">
										<img src="img/m3.jpg" alt="">
									</div>
									<div class="details">
										<a href="image-post.html">
											<h6>5 Tips For Offshore Soft
											Development </h6>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
										</ul>
									</div>
								</div>
								<div class="single-list flex-row d-flex">
									<div class="thumb">
										<img src="img/m4.jpg" alt="">
									</div>
									<div class="details">
										<a href="image-post.html">
											<h6>5 Tips For Offshore Soft
											Development </h6>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="single-sidebar-widget social-network-widget">
								<h6 class="title">Social Networks</h6>
								<ul class="social-list">
									<li class="d-flex justify-content-between align-items-center fb">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-facebook" aria-hidden="true"></i>
											<p>983 Likes</p>
										</div>
										<a href="#">Like our page</a>
									</li>
									<li class="d-flex justify-content-between align-items-center tw">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-twitter" aria-hidden="true"></i>
											<p>983 Followers</p>
										</div>
										<a href="#">Follow Us</a>
									</li>
									<li class="d-flex justify-content-between align-items-center yt">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-youtube-play" aria-hidden="true"></i>
											<p>983 Subscriber</p>
										</div>
										<a href="#">Subscribe</a>
									</li>
									<li class="d-flex justify-content-between align-items-center rs">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-rss" aria-hidden="true"></i>
											<p>983 Subscribe</p>
										</div>
										<a href="#">Subscribe</a>
									</li>
								</ul>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</section>
		<!-- End latest-post Area -->
	</div>
	
	<?php
require 'Layouts/header.php';
?>
	<!-- <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/easing.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/mn-accordion.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/main.js"></script> -->
</body>
</html>