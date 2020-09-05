<?php session_start();
require '../admin/config.php';
require '../functions.php';
require '../requirelanguage.php';

$conexion = conexion($bd_config);

// Comprobamos si la session esta iniciada, sino, redirigimos.
// comprobarSessionAdmin();
// comprobarSessionActiva();


// if ( isset( $_SESSION['logged'] ) ) {

//    // Sesión activa
// }
// else{

//    // Sesión inactiva
//    header("Location: /login.php");
// }

if (!$conexion) {
  header("Location: ../error.php");
}

$sql = "SELECT rol.*, est.es as 'nomestado' FROM roles rol INNER JOIN estados est ON rol.estado = est.idestado";
$roles = obtenerRegistros($conexion, $sql);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../dist/css/flag-icon.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script language="JavaScript" type="text/javascript" src="../js/ajax.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.js">  </script>
    
</head>


  <div id="roles" class="content-wrapper">
  <div class="card-header">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 style="font-weight: bold"><?php echo $txtGestionandoRoles;?></h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">            
            <button id="myBtn" type="button" class="btn btn-success"  data-toggle="modal" data-target="#addRol"><i class="fas fa-plus"></i>&nbsp;<?php echo $txtAgregarRol;?></button>
          </ol>
          </div>
        </div>
      </div>
    </section>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
              <h4 style="background-color: #90EE90; text-align:center;font-weight: bold;" ><?php echo $txtRolesRegistrados;?></h4>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID</th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-file-signature"></i>&nbsp<?php echo $txtRol;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-clipboard-check"></i>&nbsp<?php echo $txtEstado;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($roles as $rol): ?>
                <tr>

                  <td><a href="./single.php?id=<?php echo $proyecto['id']; ?>"><?php echo utf8_encode($rol['id']);?></a></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo  utf8_encode(utf8_decode($rol['es']));?>&nbsp&nbsp<span class="flag-icon flag-icon-<?php echo $iso; ?>"></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode($rol['nomestado']);?></td>
                  <td>
                    <a href="#edit_<?php echo $rol['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal">
                    <i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="if(confirm('Deseas continuar?')){
                      this.form.submit();}
                      else{ alert('Operacion Cancelada');
                      }" value="ELIMINAR DATOS" href="./admin/delete.php?id=<?php echo $rol['id']; ?>"><i class="fas fa-ban"></i></a></td>
                </tr>
                <!-- <?php include('roles.modals.php'); ?> -->
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="../plugins/jquery/jquery.min.js"></script>
<script src="../dist/js/adminlte.js"></script>

<div class="modal fade" id="addRol" style="overflow-y: scroll;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-plus"></i>&nbsp;<?php echo $txtAgregarRol;?></h4>
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