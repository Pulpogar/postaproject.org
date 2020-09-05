      <div class="modal fade" id="editUser_<?php echo $usuario['idusuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-pencil-alt"></i>&nbsp;<?php echo $txtEditarUsuario;?></h4>
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" enctype="multipart/form-data" method="post">

              <input type="hidden" name="id" value="<?php echo $usuario['idusuario']; ?>">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">

            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span style="width: 200px;" class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtuser;?></span>
              </div>
              <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
              value="<?php echo utf8_encode(utf8_decode($usuario['user'])) ?>">
            </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span style="width: 200px;" class="input-group-text" id="inputGroup-sizing-default"><?php echo $direccionEmail;?></span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                  value="<?php echo utf8_encode(utf8_decode($usuario['email'])) ?>">
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span style="width: 200px;" class="input-group-text" id="inputGroup-sizing-default"><?php echo $nombre;?></span>
                  </div>
                  <input style="width: 50%;" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                  value="<?php echo utf8_encode(utf8_decode($usuario['nombre'])) ?>">
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span style="width: 200px;" class="input-group-text" id="inputGroup-sizing-default"><?php echo $apellido;?></span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                  value="<?php echo utf8_encode(utf8_decode($usuario['apellido'])) ?>">
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span style="width: 200px;" class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtRol;?></span>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01">
  <?php
																// $conexion = mysqli_connect("localhost", "root", "", "dbposta");
																$conexion = mysqli_connect("localhost",  $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
																$query = $conexion->query("SELECT * FROM roles");
											
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

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span style="width: 200px;" class="input-group-text" id="inputGroup-sizing-default"><?php echo $nacionalidad;?></span>
                  </div>
                  <select class="form-control" name="nacionalidad" id="nacionalidad">
														<?php
															$conexion = mysqli_connect("localhost", $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
													
															$query = $conexion->query("SELECT * FROM paises");

															// echo '<option value="0">'. $nacionalidad .'</option>';

															while ( $row = $query->fetch_assoc() )
															{
																echo '<option value="' . $row['idpais']. '">' . utf8_encode(utf8_decode($row['nombre'])) . '</option>' . "\n";
															} ?>
													</select> 

                </div>
<br>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" style="width: 200px;background:#1E969B;color:white" id="inputGroup-sizing-default"><?php echo $txtCambiarEstadoA;?></span>
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