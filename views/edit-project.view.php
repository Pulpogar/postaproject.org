<?php
require 'Layouts/header.php';
?>

<?php 

if (isset($_SESSION["language"]))
    
{
$idioma=$_SESSION["language"]; 
}

switch ($idioma){
    case "es":
        //echo "PAGE ES";
        $disqusLang = "es_AR";
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
					<section class="latest-post-area pb-120">
						<div class="container no-padding">
							<div class="row">
								<div class="col-lg-12 post-list">
									<div class="popular-post-wrap">
									<h2 style="text-align:center"><i class="far fa-edit"></i>&nbsp<?php echo $txtEditarProyecto ?></h2> <br>											
											<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" class="formulario" method="post">
												<div class="form-group">				
													<h4 class="title2"><i class="ti-align-left"></i>&nbsp<?php echo $txtTituloProyecto ?></h4>
													<div class="d-flex justify-content-end form-inline"></div>
													<input id="titulo" required="" name="titulo" type="text" class="form-control" name="tittle" minlength="4" maxlength="75" value="<?php echo utf8_encode(utf8_decode($proyecto['titulo'])) ?>">
												</div>
												
												<div class="form-group">
													<h4 class="title2"><i class="ti-user"></i>&nbsp<?php echo $txtAutorProyecto ?></h4>
													<input type="text" class="form-control" id="autorProyecto" name="autorProyecto" minlength="4" value="<?php echo utf8_encode(utf8_decode($proyecto['autorProyecto'])) ?>">
												</div>
												<div class="form-group">
													<h4 class="title2"><i class="ti-image"></i>&nbsp<?php echo $txtImgenRepresentativa ?></h4>
													
												<div class="row">
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
														</div>
														<div class="col-lg-6 col-md-12 name">
															<?php if ($proyecto['video'] != null) {?><?php
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
														</div>
													
													<label style="font-size: 13px" for="thumb" class="btn btn-success btn-block btn-outlined"><?php echo $btnSeleccioneImagen ?></label>
													<input type="file" name="thumb" id="thumb" required="" accept="image/*" style="display: none">
   													<img class="img-fluid" id="imgSalida" src="" />													
												</div>
												<div class="form-group">
													<h4 class="title2"><i class="ti-video-clapper"></i>&nbsp<?php echo $txtVideoRepresentativo ?></h4>
													<input type="text" class="form-control" name="video" id="video" value="<?php echo utf8_encode(utf8_decode($proyecto['video'])) ?>">
												</div>
												<div class="form-group">
													<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtResumenProyecto ?></h4>
													<div class="d-flex justify-content-end form-inline"></div>						
														<textarea id="extracto" class="form-control mb-10" rows="5" name="extracto" minlength="50" maxlength="350" required=""><?php echo utf8_encode(utf8_decode($proyecto['extracto'])) ?></textarea>
													
												</div>
												
												<div class="row">
														<div class="col-lg-6 col-md-12 name">
															<h4 style="width:100%" class="title2"><i class="ti-world"></i>&nbsp<?php echo $txtIdiomaProyecto ?></h4>
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
															<br>
														</div>
														<div class="col-lg-6 col-md-12 name">
															<h4 style="width:100%" class="title2"><i class="ti-alert"></i>&nbsp<?php echo $txtDificultadProyecto ?></h4>
															<select class="form-control" name="dificultad" id="dificultad">
																<?php
																	$conexion = mysqli_connect("localhost",  $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
																	$query = $conexion->query("SELECT * FROM dificultades");

																	// echo '<option value="0">'. $cmbSeleccioneDificultad .'</option>';
																	echo '<option selected="selected" value="'. utf8_encode(utf8_decode($proyecto['dificultad'])).'</option>';


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
															<br> 
														</div>
													</div>
														
												<div class="form-group">
													<h4 class="title2"><i class="fa fa-hashtag"></i>&nbsp<?php echo $txtPalabraClave ?></h4>
													<input type="text" class="form-control" id="tags" name="tags" required="" value="<?php echo utf8_encode(utf8_decode($proyecto['tags'])) ?>">
												</div>
												<div class="form-group">
													<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtHabilidades ?></h4>
													<textarea class="form-control mb-10" rows="5" id="habilidades" name="habilidades" required=""><?php echo utf8_encode(utf8_decode($proyecto['habilidades'])) ?></textarea>
												<!-- </div>

												<div class="row">
													<div class="form-group col-lg-4 col-md-12 name">		
														<h4 style="width:100%" class="title2"><i class="ti-layout-grid3"></i>&nbsp<?php echo $txtAreaProyecto ?></h4>
														
													</div>                
													<div class="form-group col-lg-4 col-md-12 name">                                
														<h4 style="width:100%" class="title2"><i class="ti-view-list-alt"></i>&nbsp<?php echo $txtCategoria ?></h4>             

													</div>			
													<div class="form-group col-lg-4 col-md-12 name">
														<h4 style="width:100%" class="title2"><i class="ti-view-list-alt"></i>&nbsp<?php echo $txtSubCategoria ?></h4>
															
													</div>
												</div> -->
												
													<div class="form-group">           
															<h4 style="width:100%" class="title2"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp<?php echo $txtTecnologia ?></h4>
															<textarea class="form-control mb-10" rows="5" name="herramientas" required=""><?php echo utf8_encode(utf8_decode($proyecto['herramientas'])) ?></textarea>
													</div>
													<div class="form-group">             
													<h4 style="width:100%" class="title2"><i class="fa fa-cogs"></i>&nbsp<?php echo $txtMateriales ?></h4>
															<textarea class="form-control mb-10" rows="5" id="materiales" name="materiales" required=""><?php echo utf8_encode(utf8_decode($proyecto['materiales'])) ?></textarea>
													</div>
												
												<div class="form-group">
													<h4 class="title2"><i class="fa fa-list-ol"></i>&nbsp<?php echo $txtOrganizacionInicial ?></h4>
													<textarea class="form-control mb-10" rows="5" id="organizacionIni" name="organizacionIni" required=""><?php echo utf8_encode(utf8_decode($proyecto['organizacionIni'])) ?></textarea>
												</div>
												<div class="form-group">
													<h4 class="title2"><i class="ti-layout-accordion-list"></i>&nbsp<?php echo $txtDesarrolloProyecto ?></h4>
													<div class="field_wrapper">
													<?php foreach($etapas as $etapa): ?>
														<input style="background-color:#ecedf0" type="text" class="form-control" name="field_name[]" required="" value="<?php echo utf8_encode(utf8_decode($etapa['titulo'])); ?>">
														<textarea class="form-control mb-10" rows="15" name="field_name[]"><?php echo utf8_encode(utf8_decode($etapa['texto'])); ?></textarea>					
													<?php endforeach; ?>
													</div>
												</div>
									
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
									<?php } ?>
									<?php $contador ++;?>
									<?php endforeach; ?>
									</div>									
												<!-- <a href="javascript:void(0);" class="add_button" title="Agregar etapa"><input style="float: right;" type="button" id="btAdd" value='<?php echo $btnAgregarEtapa ?>' class="btn btn-success" /></p></a><br> -->

												<!-- <div class="popular-post-wrap" style="padding: 0px">
												<br><h4 class="title2"><i class="ti-gallery"></i>&nbsp<?php echo $txtImagenesProyecto ?></h4></div>

												<label style="font-size: 13px" for="uploadFile" class="btn btn-secondary btn-block btn-outlined"><?php echo $btnSeleccioneImagen ?></label>
													<input type="file" name="uploadFile[]" id="uploadFile" accept="image/*" style="display: none" multiple> -->


												<!-- <div class="form-group">
														<input type="file" id="uploadFile" name="uploadFile[]" multiple/>
														<br/> -->														

												<!-- <div id="image_preview">
													<br><br>
													<h6 style="color:#a2a1a1;text-align:center"><?php echo $plhCargarImagenes ?></h6>
													<br>
													<br>
													<br>
												</div> <br> -->

												<div class="popular-post-wrap" style="padding: 0px">
													<h4 class="title2"><i class="ti-video-clapper"></i>&nbsp<?php echo $txtVideosProyecto ?></h4>
													<div class="input-group mb-3">
														<input type="text" class="form-control" name="url_video[]" placeholder='<?php echo $plhVideoRepresentativo ?>' onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhVideoRepresentativo ?>'">
													<div class="input-group-append">
														<a href="javascript:void(0);" class="add_buttonV" title="Agregar video"><input style="float: right;" type="button" id="btAddV" value='<?php echo $btnAgregar ?>' class="btn btn-success" /></a>
														</div>
													</div>
												</div>
												<div class="videofield_wrapper">
												</div>
												
												<script type="text/javascript">

  





//   $("#uploadFile").change(function(){

//      $('#image_preview').html("");

//      var total_file=document.getElementById("uploadFile").files.length;


//      for(var i=0;i<total_file;i++)

//      {

//       $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");

//      }


//   });


//   $('form').ajaxForm(function()
//    {
//     // alert("Uploaded SuccessFully");
// 	// alert($proyectoGuardadoOk);
// 	alert(messagesDictionary[userLang]["GuardadoExitosamente"]);
//     window.location = 'index.php';
//    }); 


</script>

														
												<div class="form-group">
													<h4 class="title2"><i class="ti-save"></i>&nbsp<?php echo $txtArchivosNecesarios ?></h4>
													<input type="text" class="form-control" id="otherfiles" name="otherfiles" minlength="4" value="<?php echo utf8_encode(utf8_decode($proyecto['otherfiles'])) ?>">
												</div>										
												<br><br>
												<!-- <br><br><a href="#" style="text-align:center" class="primary-btn text-uppercase"><i class="ti-save"></i>&nbsp<?php echo $btnGuardarProyecto ?></a>&nbsp -->
												<div style="text-align:center">
												<input class="btn btn-secondary" type="submit" value="<?php echo $btnGuardarProyecto ?>">
												
												</div>
												</form>	
												
										</div>
									</div>
									<!-- End popular-post Area -->	
								</div>
							</div>
						</div>
					</section>
					<!-- End latest-post Area -->
					<?php require 'Views/Layouts/footer.php';?>
</body>
</html>
