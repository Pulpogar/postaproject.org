<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.js"></script>


  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 style="background-color: #90EE90; text-align:center;font-weight: bold;" ><?php echo $txtproyectosValidados;?></h4>
            </div>
            <div class="card-body">
              <table id="datatablesProjeV" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID</th>
                  <th style="background-color: #DCDCDC;text-align:center"><i class="fas fa-globe-americas"></i>&nbsp<?php echo$txtIdiomaProyecto;?>&nbsp-&nbsp<i class="fas fa-file-signature"></i>&nbsp<?php echo $txtTituloProyecto;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-cloud-upload-alt"></i>&nbsp<?php echo $subidoPor;?></th>
                  <th style="background-color: #DCDCDC;text-align:center"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($proyectos as $proyecto):
                  $iso = obtenerISO ($conexion, 'idiomas','id',$proyecto['idioma']);
                ?>
                <tr>
                  <td><a href="./single.php?id=<?php echo $proyecto['id']; ?>"><?php echo utf8_encode($proyecto['id']);?></a></td>
                  <td style="font-size: 14px;font-weight: bold;"><span class="flag-icon flag-icon-<?php echo $iso; ?>"></span>&nbsp&nbsp<?php echo utf8_encode(utf8_decode($proyecto['titulo']));?></td>
                  <td style="font-size: 13px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($proyecto['autorSubida']));?></td>
                  <td><a class="btn btn-success btn-sm" href="../edit-project.php?id=<?php echo $proyecto['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-primary btn-sm" href="../single-project.php?id=<?php echo $proyecto['id']; ?> "><i class="fas fa-eye"></i></a>
                    <a class="btn btn-warning btn-sm" href="error-no-disponible.php"><i class="far fa-clone"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="if(confirm('Deseas continuar?')){
                      this.form.submit();}
                      else{ alert('Operacion Cancelada');
                      }" value="ELIMINAR DATOS" href="./admin/delete.php?id=<?php echo $proyecto['id']; ?>"><i class="fas fa-ban"></i></a></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h4 style="background-color: #FFA07A; text-align:center;  font-weight: bold;"><?php echo $txtproyectosPendientes;?></h4>
            </div>
            <div class="card-body">
              <table id="datatablesProjeNV" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID</th>
                  <th style="background-color: #DCDCDC;text-align:center"><i class="fas fa-globe-americas"></i>&nbsp<?php echo$txtIdiomaProyecto;?>&nbsp-&nbsp<i class="fas fa-file-signature"></i>&nbsp<?php echo $txtTituloProyecto;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-cloud-upload-alt"></i>&nbsp<?php echo $subidoPor;?></th>
                  <th style="background-color: #DCDCDC;text-align:center"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($pendientes as $pendiente):
                  $iso = obtenerISO ($conexion, 'idiomas','id',$pendiente['idioma']);
                ?>
                <tr>
                  <td><a href="./single.php?id=<?php echo $proyecto['id']; ?>"><?php echo utf8_encode($pendiente['id']);?></a></td>
                  <td style="font-size: 14px;font-weight: bold;"><span class="flag-icon flag-icon-<?php echo $iso; ?>"></span>&nbsp&nbsp<?php echo utf8_encode($pendiente['titulo']);?></td>
                  <td style="font-size: 13px;font-weight: bold;"><?php echo utf8_encode($pendiente['autorSubida']);?></td>
                  <td><a class="btn btn-success btn-sm" href="edit-project.php?id=<?php echo $proyecto['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-primary btn-sm" href="./single-project.php?id=<?php echo $proyecto['id']; ?> "><i class="fas fa-eye"></i></a>
                    <a class="btn btn-secondary btn-sm" href="error-no-disponible.php"><i class="fas fa-check-circle"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="if(confirm('Deseas continuar?')){
                      this.form.submit();}
                      else{ alert('Operacion Cancelada');
                      }" value="ELIMINAR DATOS" href="./admin/delete.php?id=<?php echo $proyecto['id']; ?>"><i class="fas fa-ban"></i></a></td>
                </tr>
                <?php endforeach; ?>
              </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
$(document).ready(function() {
    $('#datatablesProjeV').DataTable();
    $('#datatablesProjeNV').DataTable();
} );
</script>