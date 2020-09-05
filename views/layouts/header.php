<?php require 'requirelanguage.php'; ?>
<?php require 'head.php'; ?>

<!DOCTYPE html>
	<header>
			<div class="logo-wrap">
				<div class="container">
					<div class="row">
									<div class="col-lg-5 col-md-4 col-sm-3 single-popular-post no-padding">
									</div>
									<div class="col-lg-2 col-md-3 col-sm-3 logo-left no-padding">
										<a href="index.php"><img class="img-fluid" src="<?php echo $logo; ?>" alt=""></a>
									</div>
									<div class="col-lg-2 col-md-1 col-sm-1 ingle-popular-post no-padding">
									</div>
									<?php if (!isset($_SESSION['loggedin'])) {?>
									<div id="menu" class="d-flex justify-content-center col-lg-3 col-md-3 col-sm-3 form-inline no-padding">
									<a style="color:black;font-size: 13px"  href="login.php"><i class="ti-unlock"></i>&nbsp&nbsp<?php echo $acceder; ?></a>&nbsp|&nbsp
										<a style="color:black;font-size: 13px" href="register.php"><i class="ti-id-badge"></i>&nbsp&nbsp<?php echo $registrarse; ?></a>
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
									<?php } else {?>
									<div class="d-flex justify-content-center col-lg-3 col-md-4 col-sm-5 form-inline no-padding">
											<h6 style="color:black;font-size: 12px"><i class="ti-face-smile"></i>&nbsp<?php echo $bienvenido; ?></h6>&nbsp
											<div class="inline-form">
											<div class="btn-group">
											<button style="font-size: 11.5px" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" type="button" name="ddmConectado" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?php echo utf8_encode($_SESSION['nombre']) ?>&nbsp</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
													<?php if (!isset($_SESSION["admin"])) {?>
														<a href="myprofile.php">
														<button style="font-size: 13px" class="dropdown-item" type="button"><i class="ti-id-badge"></i>&nbsp&nbsp<?php echo $MiPerfil; ?></button>
														</a>
														<?php } else {?>
															<a href="myprofile.php">
																<button style="font-size: 13px" class="dropdown-item" type="button"><i class="ti-id-badge"></i>&nbsp&nbsp<?php echo $MiPerfil; ?></button>
															</a>
															<a href="./admin/admin.index.php">
																<button style="font-size: 13px" class="dropdown-item" type="button"><i class="ti-briefcase"></i>&nbsp&nbsp<?php echo $MiPanel; ?></button>
															</a>
														<?php }?>

														<a href="error-no-disponible.php">
														<!-- <button style="font-size: 14px" class="dropdown-item" type="button"><i class="ti-email"></i>&nbsp&nbsp<?php echo $mis_mensajes; ?></button> -->
														</a>
														<a href="myprojects.php">
														<button style="font-size: 14px" class="dropdown-item" type="button"><i class="ti-notepad"></i>&nbsp&nbsp<?php echo $mis_proyectos; ?></button>
														</a>
														<a href="error-no-disponible.php">
														<!-- <button style="font-size: 14px" class="dropdown-item" type="button"><i class="ti-panel"></i>&nbsp&nbsp<?php echo $mis_opciones; ?></button> -->
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
											<?php }?>
									</div>
								</div>
						</div>
			</div>
			<div class="container main-menu" id="main-menu">
				<div class="d-flex justify-content-center">
					<nav class="shift">
						<ul class="nav-menu">
							<li class="menu-active"><a href="index.php"><p style="font-size: 18px">&nbsp&nbsp<i class="fas fa-home"></i>&nbsp&nbsp<?php echo $inicio; ?>&nbsp&nbsp</p></a></li>
							<li class="menu-has-children"><a href="projects.php" id="dropdown"><p style="font-size: 18px">&nbsp&nbsp<i class="ti-clipboard"></i>&nbsp&nbsp<?php echo $txtproyectos; ?>&nbsp<i class="ti-angle-down"></i></p></a>
							<ul>
								<li><a href="projects.php"><p style="font-size: 18px"><i class="ti-eye"></i>&nbsp&nbsp<?php echo $verProyectos; ?></p></a></li>
								<li><a href="new-project.php"><p style="font-size: 18px"><i class="ti-pencil-alt"></i>&nbsp&nbsp<?php echo $crearProyecto; ?></p></a></li>
								<li><a href="admin/Views/new.novelty.view.php"><p style="font-size: 18px"><i class="ti-pencil-alt"></i>&nbsp&nbsp<?php echo $crearProyecto; ?>(test)</p></a></li>

								<!-- Button trigger modal -->
								<a><button type="button" class="btn btn-primary btn-block btn-outlined" data-toggle="modal" data-target="#exampleModal">
  									Crear nuevo proyecto (beta)
								</button></a>
							</ul>
						</li>
						<li><a href="community.php" id="dropdown"><p style="font-size: 18px"><i class="fas fa-users"></i>&nbsp&nbsp<?php echo $comunidad; ?>&nbsp<i class="ti-angle-down"></i></p></a>
							<ul>
								<li><a href="community.php"><p style="font-size: 18px"><i class="fas fa-users"></i>&nbsp&nbsp<?php echo $comunidad; ?></p></a>
								<li><a href="forum.php"><p style="font-size: 18px"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp&nbsp<?php echo $foro; ?></p></a></li>
								<li><a href="novelty.php"><p style="font-size: 18px"><i class="fas fa-bullhorn"></i>&nbsp&nbsp<?php echo $novedades; ?></p></a></li>
								<?php if (isset($_SESSION["admin"])) {?>
									<li><a href="new-novelty.php"><p style="font-size: 18px"><i class="fas fa-bullhorn"></i>&nbsp&nbsp<?php echo $txtCrearNovedad; ?></p></a></li>
								<?php }?>
							</ul>
						</li>
						<li><a href="credits.php"><p style="font-size: 18px"><i class="ti-announcement"></i>&nbsp&nbsp<?php echo $creditos; ?></p></a></li>
					</ul>
					</nav>
				</div>
			</div>
        </header>

		<?php include('./Modals/proyectos.modals.php'); ?>

<?php require 'scripts.php'; ?>