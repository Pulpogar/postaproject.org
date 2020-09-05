<?php require 'Layouts/header.php';
var_dump($novedad);
?>

<body>
					<section class="latest-post-area pb-120">
						<div class="container no-padding">
							<div class="row">
								<div class="col-lg-12 post-list">
									<div class="popular-post-wrap">
									<h2 style="text-align:center"><i class="far fa-edit"></i>&nbsp<?php echo $txtEditarProyecto ?></h2> <br>											
											<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" class="formulario" method="post">
											<div class="row">
												<div class="col-lg-9 col-md-12 name">
													<div class="form-group">				
														<h4 class="title2"><i class="ti-align-left"></i>&nbsp<?php echo $txtTituloProyecto ?></h4>
														<div class="d-flex justify-content-end form-inline"></div>
														<input id="titulo" required="" name="titulo" type="text" class="form-control" name="tittle" value="<?php echo utf8_encode(utf8_decode($novedad['titulo'])) ?>">
													</div>
												</div>
												<div class="col-lg-3 col-md-12 name">
												<div class="form-group">				
													<h4 class="title2"><i class="ti-align-left"></i>&nbsp<?php echo $txtTituloProyecto ?></h4>
															<select class="form-control" name="idioma" id="idioma">
																<?php
																// $conexion = mysqli_connect("localhost", "root", "", "dbposta");
																$conexion = mysqli_connect("localhost",  $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
																$query = $conexion->query("SELECT * FROM idiomas");
											
																// echo '<option value="0">'. $cmbSeleccioneIdioma .'</option>';
																echo '<option selected="selected" value="'. utf8_encode(utf8_decode($proyecto['idioma'])).'</option>';
											
																while ( $row = $query->fetch_assoc() )
																{
																	if ($_SESSION["language"]=="es"){
																		echo '<option value="' . $row['id']. '">' . utf8_encode(utf8_decode($row['es'])) . '</option>' . "\n";
																	}
																	elseif (($_SESSION["language"]=="en")) {
																		echo '<option value="' . $row['id']. '">' . utf8_encode(utf8_decode($row['en'])) . '</option>' . "\n";
																	}
																	elseif (($_SESSION["language"]=="br")) {
																		echo '<option value="' . $row['id']. '">' . utf8_encode(utf8_decode($row['br'])) . '</option>' . "\n";
																	}
																	elseif (($_SESSION["language"]=="it")) {
																		echo '<option value="' . $row['id']. '">' . utf8_encode(utf8_decode($row['it'])) . '</option>' . "\n";
																	}
																} ?>
															</select>
												</div>
												</div>
												</div>
											
												<div class="form-group">
													<h4 class="title2"><i class="ti-user"></i>&nbsp<?php echo $txtAutorProyecto ?></h4>
													<input type="text" class="form-control" id="autorProyecto" name="autorProyecto" minlength="4" value="<?php echo utf8_decode($novedad['contenido']) ?>">
												</div>
												<div style="text-align:center">
													<input class="btn btn-info" type="submit" value="<?php echo $btnGuardarCambios ?>">
												</div>
											</form>													
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
<?php require 'Views/Layouts/footer.php';?>
</body>
</html>
