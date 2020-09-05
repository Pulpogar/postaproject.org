      <div class="modal fade" id="addArea" style="overflow-y: scroll;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-plus"></i>&nbsp;<?php echo  $txtAgregarArea;?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">

            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-es"></span></span>
              </div>
              <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-it"></span></span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-us"></span></span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-br"></span></span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;<?php echo $btnCerrar;?></button>
              <button type="button" class="btn btn-primary">&nbsp;<?php echo $btnGuardarCambios;?></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="editArea_<?php echo $area['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-pencil-alt"></i>&nbsp;<?php echo $txtEditarArea;?></h4>
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" enctype="multipart/form-data" method="post">

              <input type="hidden" name="id" value="<?php echo $area['id']; ?>">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">

            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-es"></span></span>
              </div>
              <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
              value="<?php echo utf8_encode(utf8_decode($area['es'])) ?>">
            </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-it"></span></span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                  value="<?php echo utf8_encode(utf8_decode($area['it'])) ?>">
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-us"></span></span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                  value="<?php echo utf8_encode(utf8_decode($area['en'])) ?>">
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-br"></span></span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                  value="<?php echo utf8_encode(utf8_decode($area['br'])) ?>">
                </div>
<br>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" style="background:#1E969B;color:white" id="inputGroup-sizing-default"><?php echo $txtCambiarEstadoA;?></span>
                  </div>
                  
                  <select class="custom-select" id="inputGroupSelect01">
  <?php
																// $conexion = mysqli_connect("localhost", "root", "", "dbposta");
																$conexion = mysqli_connect("localhost",  $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
																$query = $conexion->query("SELECT * FROM estados");
											
																echo '<option selected="selected" value="'.$row['estado'].'</option>';
											
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
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;<?php echo $btnCerrar;?></button>
              <button type="button" class="btn btn-primary">&nbsp;<?php echo $btnGuardarCambios;?></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->