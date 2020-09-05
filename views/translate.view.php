<?php
require 'Layouts/header.php';
?>
<script src="./function.js"></script>

		<div class="site-main-container">
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								
								
								<?php $area = obtenerCampoPorID($conexion, 'areas', 'id', $proyecto['area']);
									$idioma = obtenerCampoMultilenguaje($conexion, 'idiomas', 'id', $proyecto['idioma'],$_SESSION["language"]);
									$dificultad = obtenerCampoMultilenguaje($conexion, 'dificultades', 'id', $proyecto['dificultad'],$_SESSION["language"]);							
								?>
								<!-- <div class="content-wrap">								 -->
								<strong><b><p class="excert" style="text-align:justify; color: black;font-size: 20px">
								<div class="popular-post-wrap" style="padding: 0px">
									<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtTituloProyecto ?></h4>
									</div>
								 
								<h3><?php echo utf8_encode($proyecto['titulo']) ?></h3></p></strong></b>
								<input id="titulo" required="" name="titulo" type="text" class="form-control" name="tittle" placeholder='<?php echo $escribirTraduccion ?>' minlength="4" maxlength="75" onKeyDown="contar(75, 'contadorTitulo', 'titulo')" onKeyUp="contar(75, 'contadorTitulo', 'titulo')" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $escribirTraduccion ?>'">
								
									<?php if (isset($_SESSION['loggedin'])) { ?>
										<!-- <div style="text-align:right"><a style="font-size:13px" class="btn btn-success btn-sm" href="error-no-disponible.php"><i class="ti-layers"></i>&nbsp<?php echo $clonarProyecto ?></a></div> -->
									<?php } ?>


									<br>
									<!-- </div> -->
									<div class="popular-post-wrap" style="padding: 0px">
									<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtTituloProyecto ?></h4>
									</div>
									<blockquote><p class="excert" style="text-align:justify; color: black;font-size: 16px">
									<?php echo utf8_encode($proyecto['extracto']) ?></p></blockquote>
									<textarea id="extracto" class="form-control mb-10" rows="5" name="extracto" placeholder='<?php echo $escribirTraduccion  ?>' 
									onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $escribirTraduccion ?>'" minlength="50" maxlength="350" onKeyDown="contar(350, 'contadorResumen', 'extracto')" onKeyUp="contar(350)" required=""></textarea>
									
									<!-- <div class="container no-padding"> -->
										<div class="row">
												<div class="popular-post-wrap">
													<div class="row mt-20 medium-gutters">
														<!-- 																						 -->

														
									</div>
									
									<div class="popular-post-wrap" style="padding: 0px">
									<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtHabilidades ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">
									<?php echo utf8_encode($proyecto['habilidades'])?></p>
									<textarea class="form-control mb-10" rows="5" id="habilidades" name="habilidades" required="" placeholder='<?php echo $escribirTraduccion  ?>'
															onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $escribirTraduccion ?>'" 
															></textarea>
									

									<div class="popular-post-wrap" style="padding: 0px">      
									<br><h4 style="width:100%" class="title2"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp<?php echo $txtTecnologia ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">						
									<?php echo utf8_encode($proyecto['herramientas']) ?></p>

									<textarea class="form-control mb-10" rows="5" name="herramientas" required="" placeholder='<?php echo $escribirTraduccion ?>'
									onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $escribirTraduccion ?>'" 
									></textarea>
									

									<div class="popular-post-wrap" style="padding: 0px">			        
									<br><h4 style="width:100%" class="title2"><i class="fa fa-cogs"  aria-hidden="true"></i>&nbsp<?php echo $txtMateriales ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">						
									<?php echo utf8_encode($proyecto['materiales']) ?></p>

									<textarea class="form-control mb-10" rows="5" name="herramientas" required="" placeholder='<?php echo $escribirTraduccion ?>'
									onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $escribirTraduccion ?>'" 
									></textarea>		
												
									<div class="popular-post-wrap" style="padding: 0px">			
									<br><h4 style="width:100%" class="title2"><i class="fa fa-list-ol"></i>&nbsp<?php echo $txtOrganizacionInicial ?></h4>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">
									<?php echo utf8_encode($proyecto['organizacionIni']) ?></p>

									<textarea class="form-control mb-10" rows="5" name="herramientas" required="" placeholder='<?php echo $escribirTraduccion ?>'
									onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $escribirTraduccion ?>'" 
									></textarea>
<br>
									<?php foreach($etapas as $etapa): ?>
											<p class="excert" style="text-align:justify; color: black;font-size: 15px">
											<h4 class="title2"><i class="ti-layout-accordion-list"></i>&nbsp<?php echo $nro_etapa ?>&nbsp<?php echo ($etapa['idetapa']) ?>&nbsp-&nbsp<?php echo utf8_encode($etapa['titulo']); ?></strong></b></h4>
											<p class="excert" style="text-align:justify; color: black;font-size: 15px">
											<?php echo utf8_encode($etapa['texto']); ?></p>
											<textarea class="form-control mb-10" rows="10" name="herramientas" required="" placeholder='<?php echo $escribirTraduccion ?>'
									onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $escribirTraduccion ?>'" 
									></textarea>
										<?php endforeach; ?>				

										<?php if ($proyecto['otherfiles'] != null) {?>
											<div class="popular-post-wrap" style="padding: 0px">      
												<br><h4 style="width:100%" class="title2"><i class="ti-save" aria-hidden="true"></i>&nbsp<?php echo $txtArchivosNecesarios ?></h4>
											</div>
											<p class="excert" style="text-align:justify; color: black;font-size: 15px">						
											<?php echo $txtDescargarArchivos ?></p>			
											<h5 style="text-align:left"><i class="fa fa-download">&nbsp</i><a href="<?php echo utf8_encode($proyecto['otherfiles']) ?>" target="_blank"><?php echo $txtLinkDescargarArchivos ?></a></h5>
										<?php } ?>
									
<br><br>
<script>
/**
 * Disqus loader which verifies the existence of `#disqus_thread` on 
 * the web page and then prepares the disqus embed script to hook in 
 * the document
 */
function load_disqus( disqus_shortname ) {
  // Prepare the trigger and target
  var disqus_trigger = jQuery('#disqus_trigger'),
      disqus_target = jQuery('#disqus_thread');

  // Load script asynchronously only when the trigger and target exist
  if(disqus_target && disqus_trigger) {
    jQuery.ajaxSetup({ cache:true });
    jQuery.getScript('//' + disqus_shortname + '.disqus.com/embed.js');
    jQuery.ajaxSetup({ cache:false });
    disqus_trigger.remove();
    console.log('Disqus loaded.');
  }
}
</script>
<div id="disqus_thread"></div>
  <button id="diqus_loader" onclick="load_disqus('your_disqus_shortname')">Post a Comment</button>
</div>

								
								<div class="comment-sec-area">
									<div class="container">
										<div class="row flex-column">
										
											
										</div>
									</div>
								</div>
				
														
							
				</div>
			</div>
		</section>
	</div>
	
	<?php
require 'Layouts/header.php';
?>
</body>
</html>