
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-plus-square"></i>&nbsp;Título del proyecto</h5>
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

            <div class="input-group mb-2">
              <div class="input-group-prepend">
              </div>
              <input type="text" class="form-control" id="titulo" name="titulo" maxlength="75" required="" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder='<?php echo $plhTituloProyecto ?>'
              onKeyDown="contar(75, 'contadorTitulo', 'titulo')" onKeyUp="contar(75, 'contadorTitulo', 'titulo')">
            </div>
            </div>
            <div style="text-align:center">
              <button type="submit" name="agregar" onclick="toastr.success('Hi! I am success message.');" class="btn btn-secondary"><i class="far fa-save"></i>&nbsp;Guardar y continuar</button>
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
