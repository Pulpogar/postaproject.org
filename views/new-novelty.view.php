<?php require 'Layouts/header.php';?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<script src="../function.js">
</script>

<body>
  <section class="top-post-area pt-10">
    <div class="container no-padding">
      <div class="row">
    <div class="col-lg-12">
      <div class="news-tracker-wrap" style="background:#94e8eb">
        <h2><span style="color:#14686b"><i class="fas fa-plus"></i>&nbsp;<?php echo $txtAgregarNovedad ?></h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="latest-post-area pb-120">
  <div class="container no-padding">
    <div class="row">
      <div class="col-lg-12 post-list">
        <div class="popular-post-wrap"><br>
          <form id="postForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" class="formulario" method="post">
            <div class="form-group">
              <h4 class="title2"><i class="ti-align-left"></i>&nbsp<?php echo $tituloNovedad ?></h4>
              <div class="d-flex justify-content-end form-inline">
                <h6 style="color:black;font-size: 11px"><?php echo $maximo ?> 75 / <?php echo $caracteresRestantes ?></h6>
                <input style="text-align:right;font-size: 13px"disabled size="1" value="75" id="contadorNovedad"> </div>
                <input type="text" class="form-control" id="tituloNovedad" name="tituloNovedad" maxlength="75" required="" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder='<?php echo $plhTituloProyecto ?>'
                onKeyDown="contar(75, 'contadorNovedad', 'tituloNovedad')" onKeyUp="contar(75, 'contadorNovedad', 'tituloNovedad')">                
                <br>
				<h4 class="title2"><i class="ti-image"></i>&nbsp<?php echo $imgRepNovedad ?></h4>
				<input type="file" name="imgRepNovelty" accept="image/x-png,image/gif,image/jpeg"/>
				<br><br>
				<div class="form-group">
					<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $textoResumenNovedad ?></h4>
						<div class="d-flex justify-content-end form-inline">
							<h6 style="color:black;font-size: 11px"><?php echo $maximo ?> 350 / <?php echo $caracteresRestantes ?></h6>
							<input style="text-align:right;font-size: 13px"disabled size="1" value="350" id="contadorResumen"> </div>						
							<textarea id="resumenNovedad" class="form-control mb-10" rows="5" name="resumenNovedad" placeholder='<?php echo $plhTituloProyecto ?>' minlength="50" maxlength="350" onKeyDown="contar(350, 'contadorResumen', 'extracto')" onKeyUp="contar(350)" required="">
							</textarea>												
						</div>
				</div>
				<h4 class="title2"><i class="ti-align-left"></i>&nbsp<?php echo $desarrolloNovedad ?></h4>
				<textarea id="summernote" class="form-control mb-10" rows="20" name="desarrolloNovedad" placeholder='<?php echo $plhResumenProyecto ?>'
                  onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhResumenProyecto ?>'" minlength="500" onKeyDown="contar(350, 'contadorResumen', 'extracto')" onKeyUp="contar(350)" required=""></textarea>
                </div><br>
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
</body>

<?php require 'Layouts/footer.php';?>

<script type="text/javascript">
$(document).ready(function() {
  $('#summernote').summernote({
    height: "750px",
    styleWithSpan: false
  });
});
function postForm() {
  $('textarea[name="desarrolloNovedad"]').html($('#summernote').code());
}
</script>
