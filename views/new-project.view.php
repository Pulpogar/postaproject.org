<?php require 'Layouts/header.php';?>

<!DOCTYPE html>

<html>

<head>

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

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 50; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var etapa = 1;
	var fieldHTML = '<div class="form-group"><input style="background-color:#ecedf0" type="text" class="form-control" name="field_name[]" placeholder="<?php echo $plhTituloEtapa ?>" onblur="this.placeholder = "<?php echo $plhTituloEtapa ?>"><textarea class="form-control mb-10" rows="15" placeholder="<?php echo $plhNuevasEtapas ?>" required="" name="field_name[]"' + 
	'value=""/><a href="javascript:void(0);" class="remove_button" title="Eliminar etapa"><input style="float: right;" type="button" id="btAdd" value="<?php echo $btnEliminarEtapa ?>" class="btn btn-danger" /><br></a></div>'; //New input field html

	
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }

    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

$(document).ready(function(){
    var maxFieldV = 50; //Input fields increment limitation
	var addButtonNewVideo = $('.add_buttonV'); //Add button selector
	var wrapper2 = $('.videofield_wrapper'); //Input field wrapper
	
	// var videofieldHTML = '<div class="form-group"><input type="text" class="form-control" name="field_name[]" placeholder="<?php echo $plhVideoRepresentativo ?>" onblur="this.placeholder = "<?php echo $plhVideoRepresentativo ?>">' + 
	// '<a href="javascript:void(0);" class="remove_button" title="Eliminar etapa"><input style="float: right;" type="button" id="btAddV" value="Eliminar video" class="btn btn-danger" /><br></a></div>';

	var videofieldHTML = '<div id="padre" class="input-group"><input type="text" class="form-control" name="url_video[]" placeholder="<?php echo $plhVideoRepresentativo ?>" onblur="this.placeholder = "<?php echo $plhVideoRepresentativo ?>">' + '<div id="padre" class="input-group-append">' + 
	'<a href="javascript:void(0);" class="remove_button" title="Eliminar video"><input style="float: right;" type="button" id="btRemV" value="<?php echo $btnEliminar ?>" class="btn btn-danger"/></div></div><br id="br">';
	
	
	var v = 1; //Initial field counter is 1
		$(addButtonNewVideo).click(function(){ //Once add button is clicked
			if(v < maxFieldV){ //Check maximum number of input fields
				v++; //Increment field counter
				$(wrapper2).append(videofieldHTML); // Add field html
			}

		});
		$(wrapper2).on('click', '.remove_button', function(e){ //Once remove button is clicked
			e.preventDefault();
			// $(this).parent('div').remove(); //Remove field html
			var div = document.getElementById('padre');
			var br = document.getElementById('br');
			div.remove(); // Removes the div with the 'div-02' id
			br.remove();
			z--; //Decrement field counter
		});
	});

$(window).load(function(){

$(function() {
 $('#thumb').change(function(e) {
	 addImage(e); 
	});

	function addImage(e){
	 var file = e.target.files[0],
	 imageType = /image.*/;
   
	 if (!file.type.match(imageType))
	  return;
 
	 var reader = new FileReader();
	 reader.onload = fileOnload;
	 reader.readAsDataURL(file);
	}
 
	function fileOnload(e) {
	 var result=e.target.result;
	 $('#imgSalida').attr("src",result);
	}
   });
 });

</script>

<script>
      function crearDin(){
         
         var padre = document.getElementById("padre");
         var input = document.createElement("INPUT");         
         input.type = 'textarea';

         padre.appendChild(input);
      } 
      window.onload = function(){
         
         var btnAdd = document.getEmentById("btn_agregar");   
         btnAdd.onclick = crearDin;
	  }      

   </script>

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
													<!-- <div class="form-group col-lg-6 col-md-12 email">
													<input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
													</div> -->
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
																	// $conexion = mysqli_connect("localhost", "c1510706_dbposta", "zemasa82VO", "c1510706_dbposta");

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
														<!-- <div class="col-lg-4 col-md-12 name">
															<h4 style="width:100%" class="title2"><i class="ti-alarm-clock"></i>&nbsp<?php echo $txtTiempoEstimadoRealizacion ?></h4>
																
														</div> -->
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
														<textarea class="form-control mb-10" rows="15" name="field_name[]" 
														placeholder='<?php echo $plhDesarrolloProyecto ?>' 
														onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhDesarrolloProyecto ?>'" 
														></textarea>					
													</div>
												</div>
																					
												<a href="javascript:void(0);" class="add_button" title="Agregar etapa"><input style="float: right;" type="button" id="btAdd" value='<?php echo $btnAgregarEtapa ?>' class="btn btn-success" /></p></a><br>

												<div class="popular-post-wrap" style="padding: 0px">
												<br><h4 class="title2"><i class="ti-gallery"></i>&nbsp<?php echo $txtImagenesProyecto ?></h4></div>

												<label style="font-size: 13px" for="uploadFile" class="btn btn-secondary btn-block btn-outlined"><?php echo $btnSeleccioneImagen ?></label>
													<input type="file" name="uploadFile[]" id="uploadFile" accept="image/*" style="display: none" multiple>


												<!-- <div class="form-group">
														<input type="file" id="uploadFile" name="uploadFile[]" multiple/>
														<br/> -->

														

												<div id="image_preview">
													<br><br>
													<h6 style="color:#a2a1a1;text-align:center"><?php echo $plhCargarImagenes ?></h6>
													<br>
													<br>
													<br>
												</div> <br>

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

  





  $("#uploadFile").change(function(){

     $('#image_preview').html("");

     var total_file=document.getElementById("uploadFile").files.length;


     for(var i=0;i<total_file;i++)

     {

      $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");

     }


  });


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
									<!-- End popular-post Area -->	
								</div>
							</div>
						</div>
					</section>
					<!-- End latest-post Area -->


		</body>

<br>
<?php require 'Layouts/footer.php';?>