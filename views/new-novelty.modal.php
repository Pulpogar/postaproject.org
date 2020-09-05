<head>
<!-- include libraries(jQuery, bootstrap) -->
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<!-- Modal -->
<div class="modal fade" id="new-novelty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>&nbsp;<?php echo $txtAgregarNovedad;?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="d-flex justify-content-end form-inline">
			<h6 style="color:black;font-size: 12px"><?php echo $maximo ?> 75 / <?php echo $caracteresRestantes ?></h6>
			<input style="text-align:right;font-size: 13px"disabled size="1" value="75" id="contadorTitulo"> </div>
        <p style="text-align:justify">
          <form method="POST" action="new-project-tittle.php">

          <div class="form-group">
            <input style="background-color:#ecedf0" type="text" class="form-control" name="titulo-novedad" required=""
            placeholder='<?php echo $txtTituloNovedad ?>' onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $txtTituloNovedad ?>'"><br>
						<textarea id="summernote" name="content" class="form-control mb-10" rows="15"></textarea>					
          </div>
          <div class="summernote">summernote 1</div>
            </div>
            <div style="text-align:center">
              <button type="submit" name="agregar" onclick="toastr.success('Hi! I am success message.');" class="btn btn-success"><i class="far fa-save"></i>&nbsp;<?php echo $btnGuardarCambios ?></button>
            </div>
          </form>
          <br><br>
        </div>
      </div>
    </div>

<script>
	function contar(maxleng, idcontador, idcomponente) {
		var max = maxleng;
		var cadena = document.getElementById(idcomponente).value;
		var longitud = cadena.length;

			if(longitud <= max) {
				 document.getElementById(idcontador).value = max-longitud;
			} else {
				 document.getElementById(idcomponente).value = cadena.substr(0, max);
			}
   }
</script>

<script type="text/javascript">

$(document).ready(function() {
  $('.summernote').summernote();
});

$(document).ready(function() {
	$('#summernote').summernote({
    height: "300px",
    dialogsInBody: true,
		styleWithSpan: false
	});
});
function postForm() {

	$('textarea[name="content"]').html($('#summernote').code());
}

</script>