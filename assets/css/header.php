<?php
require 'requirelanguage.php';
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>POSTA Project</title>
		<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> -->
		<link href="https://fonts.googleapis.com/css?family=PT+Serif&display=swap" rel="stylesheet"> 
		<!-- <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">  -->
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="./css/linearicons.css">
		<link rel="stylesheet" href="./css/font-awesome.min.css">
		<link rel="stylesheet" href="./vendors/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="./css/bootstrap.css">
		<link rel="stylesheet" href="./css/flag-icon.css">
		<link rel="stylesheet" href="./css/magnific-popup.css">
		<link rel="stylesheet" href="./css/nice-select.css">
		<link rel="stylesheet" href="./css/animate.min.css">
		<link rel="stylesheet" href="./css/owl.carousel.css">
		<!-- <link rel="stylesheet" href="./css/jquery-ui.css"> -->
		<link rel="stylesheet" href="./css/main.css">
		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	</head>


	<header>			
			<!-- <div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
							<ul>
								<li><a href="tel:+440 012 3654 896"><span class="lnr lnr-phone-handset"></span><span>+440 012 3654 896</span></a></li>
								<li><a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span><span>support@colorlib.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->
			<div class="logo-wrap">
				<div class="container">
					<div class="row">
						<!-- <div class="col-lg-12 post-list"> -->
							<!-- <div class="popular-post-wrap">															 -->
								<!-- <div class="row mt-20 medium-gutters"> -->
									<div class="col-lg-5 col-md-4 col-sm-3 single-popular-post no-padding">
									</div>	
									<div class="col-lg-2 col-md-3 col-sm-3 logo-left no-padding">
										<a href="index.php"><img class="img-fluid" src="<?php echo $logo; ?>" alt=""></a>
									</div>	
									<div class="col-lg-2 col-md-1 col-sm-1 ingle-popular-post no-padding">
									</div>

									<?php if (!isset($_SESSION['loggedin'])) {	?>							
									<div id="menu" class="d-flex justify-content-center col-lg-3 col-md-3 col-sm-3 form-inline no-padding">				
									<a style="color:black;font-size: 13px"  href="login.php"><i class="ti-unlock"></i>&nbsp&nbsp<?php echo $acceder; ?></a>&nbsp|&nbsp
										<a style="color:black;font-size: 13px" href="register.php"><i class="ti-id-badge"></i>&nbsp&nbsp<?php echo $registrarse; ?></a>
											<!-- <div class="dropdown closed"> -->
											&nbsp<button style="font-size: 14.5px" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" type="button" name="ddmIdioma" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?php echo $cambiarIdioma; ?></button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
														<a href="changelanguage.php?language=es">
														<button style="font-size: 13px" class="dropdown-item" type="button" onclick="location.reload(true)"><span class="flag-icon flag-icon-es"></span>&nbsp&nbsp<?php echo $spanish; ?></button>      
														</a>
														<a href="changelanguage.php?language=en">
														<button style="font-size: 14px" class="dropdown-item" type="button" onclick="location.reload(true)";><span class="flag-icon flag-icon-um"></span>&nbsp&nbsp<?php echo $english; ?></button>
														</a>
														<a href="changelanguage.php?language=it">
														<button style="font-size: 14px" class="dropdown-item" type="button" onclick="location.reload(true)"><span class="flag-icon flag-icon-it"></span>&nbsp&nbsp<?php echo $italian; ?></button>
														</a>
														<a href="changelanguage.php?language=br">
														<button style="font-size: 14px" class="dropdown-item" type="button" onclick="location.reload(true)"><span class="flag-icon flag-icon-br"></span>&nbsp&nbsp<?php echo $portuguese; ?></button>
														</a>									
													</div>										
									</div>
									<?php } else {	?>	
									<div class="d-flex justify-content-center col-lg-3 col-md-4 col-sm-5 form-inline no-padding">
											<h6 style="color:black;font-size: 12px"><i class="ti-face-smile"></i>&nbsp<?php echo $bienvenido; ?></h6>&nbsp
											<div class="inline-form">
											<div class="btn-group">
											<!-- <div class="dropdown closed"> -->
											<button style="font-size: 11.5px" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" type="button" name="ddmConectado" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?php echo utf8_encode($_SESSION['nombre'])?>&nbsp</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
													<?php if (!isset($_SESSION["admin"])) {	?>	
														<a href="error-no-disponible.php">
														<button style="font-size: 13px" class="dropdown-item" type="button"><i class="ti-id-badge"></i>&nbsp&nbsp<?php echo $MiPerfil; ?></button>      
														</a>
														<?php } else {	?>	
															<a href="admin.index.php">
																<button style="font-size: 13px" class="dropdown-item" type="button"><i class="ti-briefcase"></i>&nbsp&nbsp<?php echo $MiPanel; ?></button>      
															</a>
														<?php } ?>

														<a href="error-no-disponible.php">
														<button style="font-size: 14px" class="dropdown-item" type="button"><i class="ti-email"></i>&nbsp&nbsp<?php echo $mis_mensajes; ?></button>      
														</a>
														<a href="error-no-disponible.php">
														<button style="font-size: 14px" class="dropdown-item" type="button"><i class="ti-notepad"></i>&nbsp&nbsp<?php echo $mis_proyectos; ?></button>      
														</a>
														<a href="error-no-disponible.php">
														<button style="font-size: 14px" class="dropdown-item" type="button"><i class="ti-panel"></i>&nbsp&nbsp<?php echo $mis_opciones; ?></button>      
														</a>
														<a href="logout.php">
														<button style="font-size: 14px" class="dropdown-item" type="button" onclick="window.location.replace()"><i class="ti-power-off"></i>&nbsp&nbsp<?php echo $cerrarSesion; ?></button>      
														</a>						
													</div>
											</div>
											<div class="btn-group">
											<button style="font-size: 12px" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" type="button" name="ddmIdioma" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?php echo $banderita; ?></button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
														<a href="changelanguage.php?language=es">
														<button style="font-size: 13px" class="dropdown-item" type="button" onclick="window.location.replace()"><span class="flag-icon flag-icon-es"></span>&nbsp&nbsp<?php echo $spanish; ?></button>      
														</a>
														<a href="changelanguage.php?language=en">
														<button style="font-size: 13px" class="dropdown-item" type="button" onclick="window.location.replace()";><span class="flag-icon flag-icon-um"></span>&nbsp<?php echo $english; ?></button>
														</a>
														<a href="changelanguage.php?language=it">
														<button style="font-size: 13px" class="dropdown-item" type="button" onclick="window.location.replace()"><span class="flag-icon flag-icon-it"></span>&nbsp<?php echo $italian; ?></button>
														</a>
														<a href="changelanguage.php?language=br">
														<button style="font-size: 13px" class="dropdown-item" type="button" onclick="window.location.replace()"><span class="flag-icon flag-icon-br"></span>&nbsp<?php echo $portuguese; ?></button>
														</a>									
													</div>	
												</div>
												</div>
											<?php } ?>
									</div>				
								</div>
						</div>
			</div>
			<div class="container main-menu" id="main-menu">			
				<div class="d-flex justify-content-center">
					<nav id="nav-menu-container" class="shift">
						<ul class="nav-menu">
							<li class="menu-active"><a href="index.php"><p style="font-size: 18px"><i class="ti-home"></i>&nbsp&nbsp<?php echo $inicio; ?></p></a></li>
							<li class="menu-has-children"><a href="projects.php"><p style="font-size: 18px"><i class="ti-clipboard"></i>&nbsp&nbsp<?php echo $txtproyectos; ?></p></a>
							<ul>
								<!-- <li ><a href="standard-post.html">Standard Post</a></li> -->
								<li><a href="projects.php"><p style="font-size: 18px"><i class="ti-eye"></i>&nbsp&nbsp<?php echo $verProyectos; ?></p></a></li>
								<li><a href="new-project.php"><p style="font-size: 18px"><i class="ti-pencil-alt"></i>&nbsp&nbsp<?php echo $crearProyecto; ?></p></a></li>
								<!-- <li><a href="validate.php"><i class="ti-cloud-up"></i> Validar un proyecto</a></li> -->
								<li><a href="editor.php"><i class="ti-eye"></i> Editar un proyecto</a></li>
								<!-- <li><a href="gallery-post.html">Gallery Post</a></li>
								<li><a href="video-post.html">Video Post</a></li>
								<li><a href="audio-post.html">Audio Post</a></li> -->
							</ul>
						</li>
						<li><a href="community.php"><p style="font-size: 18px"><i class="ti-world"></i>&nbsp&nbsp<?php echo $comunidad; ?></p></a></li>
						<li><a href="credits.php"><p style="font-size: 18px"><i class="ti-announcement"></i>&nbsp&nbsp<?php echo $creditos; ?></p></a></li>
						<!-- <li><a href="error-no-disponible.php"><p style="font-size: 18px"><i class="ti-help-alt"></i>&nbsp&nbsp<?php echo $ayuda; ?></p></a></li> -->
						
						<!-- <li><a href="contact.html">Contacto</a></li> -->
					</ul>
					</nav><!-- #nav-menu-container -->
					<!-- <div class="navbar-right">
						<form class="Search">
							<input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder=<?php echo $placeSearch ?>>
							<label for="Search-box" class="Search-box-label">
								<span class="lnr lnr-magnifier"></span>
							</label>
							<span class="Search-close">
								<span class="lnr lnr-cross"></span>
							</span>
						</form>
					</div> -->
				</div>
			</div>
        </header>
        
        <script src="./js/vendor/jquery-2.2.4.min.js"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
		<!-- <script src="js/vendor/bootstrap.min.js"></script> -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		<script src="./js/easing.min.js"></script>
		<script src="./js/hoverIntent.js"></script>
		<script src="./js/superfish.min.js"></script>
		<script src="./js/jquery.ajaxchimp.min.js"></script>
		<script src="./js/jquery.magnific-popup.min.js"></script>
		<script src="./js/mn-accordion.js"></script>
		<script src="./js/jquery-ui.js"></script>
		<script src="./js/jquery.nice-select.min.js"></script>
		<script src="./js/owl.carousel.min.js"></script>
		<script src="./js/mail-script.js"></script>
		<script src="./js/main.js"></script>