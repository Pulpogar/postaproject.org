<?php session_start();
require 'config.php';
require 'functions.php';
require 'requirelanguage.php';

$conexion = conexion($bd_config);


if (!$conexion) {
  header("Location: ../error.php");
}

$sql = "SELECT idi.*, est.es as 'nomestado' FROM idiomas idi INNER JOIN estados est ON idi.estado = est.idestado";
$idiomas = obtenerRegistros($conexion, $sql);

?>


  <script language="JavaScript" type="text/javascript" src="./js/ajax.js"></script>

</head>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-weight: bold"><?php echo $txtGestionandoIdiomas;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./index.php"><?php echo $irInicio;?></a></li>
              <li class="breadcrumb-item active"><?php echo $txtGestionandoIdiomas;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
<!--             <div class="card-header">
              <h4 style="text-align:center;font-weight: bold;" ><?php echo $txtUsuariosRegistrados;?></h4>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID</th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-file-signature"></i>&nbsp<?php echo $txtIdiomas;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-clipboard-check"></i>&nbsp<?php echo $txtEstado;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($idiomas as $idioma): ?>
                <tr>

                  <td><a href="./single.php?id=<?php echo $idioma['id']; ?>"><?php echo utf8_encode($idioma['id']);?></a></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode($idioma['es']);?>&nbsp&nbsp<span class="flag-icon flag-icon-<?php echo $iso; ?>"></td>
                  <!-- <td style="text-align: center"><span class="flag-icon flag-icon-<?php echo $iso; ?>"></span></td> -->
                  <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode($idioma['nomestado']);?></td>
                  <td><a class="btn btn-success btn-sm"  data-toggle="modal" data-target="#addRol" href="edit.php?id=<?php echo $idioma['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="if(confirm('Deseas continuar?')){
                      this.form.submit();}
                      else{ alert('Operacion Cancelada');
                      }" value="ELIMINAR DATOS" href="./admin/delete.php?id=<?php echo $idioma['id']; ?>"><i class="fas fa-ban"></i></a></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
<!--                 <tfoot>
                <tr>
                  <th>ID</th>
                  <th><?php echo $txtIdiomas;?></th>
                  <th><?php echo $txtEstado;?></th>
                  <th><?php echo $acciones;?></th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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