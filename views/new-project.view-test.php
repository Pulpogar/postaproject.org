<?php require 'Layouts/header.php';?>

<!DOCTYPE html>

<html>

<head>
	<link href="Views/dist/summernote.css" rel="stylesheet">
</head>

<script src="./function.js"></script>

<style type="text/css">

input[type=file]{

  display: inline;

}

#image_preview{

  border: 1px solid black;

  padding: 10px;

}

#image_preview img{

  width: 200px;

  padding: 5px;

}

</style>

<script>
	function myFunction() {
		var userLang = "<?php echo $_SESSION["language"]; ?>"; 
		var Langauges={
			"br":{
			"AvisoNuevoProyecto":'Prezado usuário, carregar um projeto é um processo simples e intuitivo, mas requer aproximadamente 30 a 60 minutos, já que os processos envolvidos devem ser cuidadosamente detalhados para facilitar a compreensão daqueles que desejam implementá-lo. Tenha em mente que antes de enviar para publicá-lo, você pode salvar os rascunhos para não perder as informações que você já carregou. Muito obrigado pela sua contribuição!',
			"GuardadoExitosamente":'Projeto salvo corretamente. Muito obrigado pela sua contribuição!'
			},
			"en":{
			"AvisoNuevoProyecto":'Dear user, loading a project is a simple and intuitive process, but it requires approximately 30 to 60 minutes, since the processes involved must be carefully detailed in order to facilitate the understanding of those who want to implement it. Keep in mind that before sending to publish it, you can save the drafts so as not to lose the information that you have already loaded. Thank you very much for your input!',
			"GuardadoExitosamente":'Project saved correctly. Thank you very much for your contribution!'
			},
			"es":{
			"AvisoNuevoProyecto":'Estimado usuario: cargar un proyecto es un proceso simple e intuitivo, pero requiere aproximadamente entre 30 y 60 minutos, ya que deben detallarse cuidadosamente los procesos involucrados a fin de facilitar la comprensión de quienes quieran implementarlo. Tenga en cuenta que antes de enviar a publicarlo, puede guardar los borradores para no perder la información que ya ha cargado. ¡Muchas gracias por su aporte!',
			"GuardadoExitosamente":'Proyecto guardado correctamente. ¡Muchas gracias por tu aporte!'
			},
			"it":{
			"AvisoNuevoProyecto":'Caro utente, caricare un progetto è un processo semplice e intuitivo, ma richiede circa 30-60 minuti, poiché i processi coinvolti devono essere accuratamente dettagliati per facilitare la comprensione di coloro che vogliono implementarlo. Tieni presente che prima di inviare a pubblicarlo, puoi salvare le bozze in modo da non perdere le informazioni che hai già caricato. Grazie mille per il tuo contributo!',
			"GuardadoExitosamente":'Progetto salvato correttamente. Grazie mille per il tuo contributo!'
			}
		}
		alert(Langauges[userLang]["AvisoNuevoProyecto"] );
	}
</script>

<script>
	function myFunction2() {
		var userLang = "<?php echo $_SESSION["language"]; ?>"; 
		var Langauges={
			"br":{
			"GuardadoExitosamente":'Projeto salvo corretamente. Muito obrigado pela sua contribuição!'
			},
			"en":{
			"GuardadoExitosamente":'Project saved correctly. Thank you very much for your contribution!'
			},
			"es":{
			"GuardadoExitosamente":'Proyecto guardado correctamente. ¡Muchas gracias por tu aporte!'
			},
			"it":{
			"GuardadoExitosamente":'Progetto salvato correttamente. Grazie mille per il tuo contributo!'
			}
		}
		alert(Langauges[userLang]["GuardadoExitosamente"]);
		window.location = 'index.php';
	}
</script>
		<body onload=myFunction();>
					<section class="latest-post-area pb-120">
						<div class="container no-padding">
							<div class="row">
								<div class="col-lg-12 post-list">
									<div class="popular-post-wrap">
									<h2 style="text-align:center"><i class="ti-pencil-alt"></i>&nbsp<?php echo $crearProyecto ?></h2> <br>											
											<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" class="formulario" method="post">
												<div class="form-group">				
													<h4 class="title2"><i class="ti-align-left"></i>&nbsp<?php echo $txtTituloProyecto ?></h4>
													<div class="d-flex justify-content-end form-inline">
														<h6 style="color:black;font-size: 11px"><?php echo $maximo ?> 75 / <?php echo $caracteresRestantes ?></h6>
														<input style="text-align:right;font-size: 13px"disabled size="1" value="75" id="contadorTitulo"> </div>
													<input id="titulo" required="" name="titulo" type="text" class="form-control" name="tittle" placeholder='<?php echo $plhTituloProyecto ?>' minlength="4" maxlength="75" onKeyDown="contar(75, 'contadorTitulo', 'titulo')" onKeyUp="contar(75, 'contadorTitulo', 'titulo')" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhTituloProyecto ?>'">
												</div>
												
												<div class="form-group">
													<h4 class="title2"><i class="ti-user"></i>&nbsp<?php echo $txtAutorProyecto ?></h4>
													<input type="text" class="form-control" id="autorProyecto" name="autorProyecto" minlength="4" placeholder='<?php echo $plhAutorProyecto ?>' required="" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhAutorProyecto ?>'">
												</div>
												<div class="form-group">
													<h4 class="title2"><i class="ti-image"></i>&nbsp<?php echo $txtImgenRepresentativa ?></h4>
													<label style="font-size: 13px" for="thumb" class="btn btn-success btn-block btn-outlined"><?php echo $btnSeleccioneImagen ?></label>
													<input type="file" name="thumb" id="thumb" required="" accept="image/*" style="display: none">
   													<img class="img-fluid" id="imgSalida" src="" />													
												</div>
												<div class="form-group">
													<h4 class="title2"><i class="ti-video-clapper"></i>&nbsp<?php echo $txtVideoRepresentativo ?></h4>
													<input type="text" class="form-control" name="video" id="video" placeholder='<?php echo $plhVideoRepresentativo ?>' onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhVideoRepresentativo ?>'">
												</div>
												<div class="form-group">
													<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtResumenProyecto ?></h4>
													<div class="d-flex justify-content-end form-inline">
														<h6 style="color:black;font-size: 11px"><?php echo $maximo ?> 350 / <?php echo $caracteresRestantes ?></h6>
														<input style="text-align:right;font-size: 13px"disabled size="1" value="350" id="contadorResumen"> </div>						
														<textarea id="extracto" class="form-control mb-10" rows="5" name="extracto" placeholder='<?php echo $plhResumenProyecto ?>' 
														onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhResumenProyecto ?>'" minlength="50" maxlength="350" onKeyDown="contar(350, 'contadorResumen', 'extracto')" onKeyUp="contar(350)" required=""></textarea>
													
												</div>
												
												<div class="row">
														<div class="col-lg-6 col-md-12 name">
															<h4 style="width:100%" class="title2"><i class="ti-world"></i>&nbsp<?php echo $txtIdiomaProyecto ?></h4>
															<select class="form-control" name="idioma" id="idioma">
																<?php
																// $conexion = mysqli_connect("localhost", "root", "", "dbposta");
																$conexion = mysqli_connect("localhost",  $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
																$query = $conexion->query("SELECT * FROM idiomas");
											
																echo '<option value="0">'. $cmbSeleccioneIdioma .'</option>';
											
																while ( $row = $query->fetch_assoc() )
																{
																	if ($_SESSION["language"]=="es"){
																		echo '<option value="' . $row['id']. '">' . utf8_encode($row['es']) . '</option>' . "\n";
																	}
																	elseif (($_SESSION["language"]=="en")) {
																		echo '<option value="' . $row['id']. '">' . utf8_encode($row['en']) . '</option>' . "\n";
																	}
																	elseif (($_SESSION["language"]=="br")) {
																		echo '<option value="' . $row['id']. '">' . utf8_encode($row['br']) . '</option>' . "\n";
																	}
																	elseif (($_SESSION["language"]=="it")) {
																		echo '<option value="' . $row['id']. '">' . utf8_encode($row['it']) . '</option>' . "\n";
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

																	echo '<option value="0">'. $cmbSeleccioneDificultad .'</option>';

																	while ( $row = $query->fetch_assoc() )
																	{
																		if ($_SESSION["language"]=="es"){
																			echo '<option value="' . $row['id']. '">' . utf8_encode($row['es']) . '</option>' . "\n";
																		}
																		elseif (($_SESSION["language"]=="en")) {
																			echo '<option value="' . $row['id']. '">' . utf8_encode($row['en']) . '</option>' . "\n";
																		}
																		elseif (($_SESSION["language"]=="br")) {
																			echo '<option value="' . $row['id']. '">' . utf8_encode($row['br']) . '</option>' . "\n";
																		}
																		elseif (($_SESSION["language"]=="it")) {
																			echo '<option value="' . $row['id']. '">' . utf8_encode($row['it']) . '</option>' . "\n";
																		}
																	} ?>
															</select>
															<br> 
														</div>
													</div>
														
												<div class="form-group">
													<h4 class="title2"><i class="fa fa-hashtag"></i>&nbsp<?php echo $txtPalabraClave ?></h4>
													<input type="text" class="form-control" id="tags" name="tags" required="" placeholder='<?php echo $plhPalabraClave ?>' onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhPalabraClave ?>'">
												</div>
												<div class="form-group">
													<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtHabilidades ?></h4>
													<textarea class="form-control mb-10" rows="5" id="habilidades" name="habilidades" required="" placeholder='<?php echo $plhHabilidades ?>'
															onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhHabilidades ?>'" 
															></textarea>

												
													<div class="form-group">           
															<h4 style="width:100%" class="title2"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp<?php echo $txtTecnologia ?></h4>
															<textarea class="form-control mb-10" rows="5" name="herramientas" required="" placeholder='<?php echo $plhTecnologia ?>'
															onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhTecnologia ?>'" 
															></textarea>
													</div>
													<div class="form-group">             
													<h4 style="width:100%" class="title2"><i class="fa fa-cogs"></i>&nbsp<?php echo $txtMateriales ?></h4>
															<textarea class="form-control mb-10" rows="5" id="materiales" name="materiales" required="" placeholder='<?php echo $plhMateriales ?>'
															onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhMateriales ?>'" 
															></textarea>
													</div>
												
												<div class="form-group">
													<h4 class="title2"><i class="fa fa-list-ol"></i>&nbsp<?php echo $txtOrganizacionInicial ?></h4>
													<textarea class="form-control mb-10" rows="5" id="organizacionIni" name="organizacionIni" required="" placeholder='<?php echo $plhOrganizacionInicial ?>' 
													onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhOrganizacionInicial ?>'" 
													></textarea>
												</div>
												<div class="form-group">
													<h4 class="title2"><i class="ti-layout-accordion-list"></i>&nbsp<?php echo $txtDesarrolloProyecto ?></h4>
													<div class="field_wrapper">
													<input style="background-color:#ecedf0" type="text" class="form-control" name="field_name[]" required="" placeholder='<?php echo $plhTituloEtapa ?>' onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhTituloEtapa ?>'">
														<textarea id="summernote" class="form-control mb-10" rows="15" name="desarrollo" 
														placeholder='<?php echo $plhDesarrolloProyecto ?>' 
														onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhDesarrolloProyecto ?>'" 
														></textarea>					
													</div>
												</div>
												
<script type="text/javascript">

  $('form').ajaxForm(function()
   {
    // alert("Uploaded SuccessFully");
	// alert($proyectoGuardadoOk);
	alert(messagesDictionary[userLang]["GuardadoExitosamente"]);
    window.location = 'index.php';
   }); 

</script>

														
												<div class="form-group">
													<h4 class="title2"><i class="ti-save"></i>&nbsp<?php echo $txtArchivosNecesarios ?></h4>
													<input type="text" class="form-control" id="otherfiles" name="otherfiles" minlength="4" placeholder='<?php echo $plhArchivosNecesarios ?>' onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhArchivosNecesarios ?>'">
												</div>										
												<br><br>
												<!-- <br><br><a href="#" style="text-align:center" class="primary-btn text-uppercase"><i class="ti-save"></i>&nbsp<?php echo $btnGuardarProyecto ?></a>&nbsp -->
												<div style="text-align:center">
												<input class="btn btn-secondary" type="submit" value="<?php echo $btnGuardarProyecto ?>">
												
												</div>
												</form>	
												
										</div>
									</div>	
								</div>
							</div>
						</div>
					</section>

		</body>

<br>
<?php require 'Layouts/footer.php';?>

<script src="Views/dist/summernote.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('#summernote').summernote({
		height: "300px",
		styleWithSpan: false
	});
});
function postForm() {

	$('textarea[name="content"]').html($('#summernote').code());
}
</script>