<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.js"></script>


  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
              <h4 style="background-color: #90EE90; text-align:center;font-weight: bold;" ><?php echo $txtNovedadesRegistradas;?></h4>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID</th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-atlas"></i></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-file-signature"></i>&nbsp<?php echo $txtTitulo;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-clipboard-check"></i>&nbsp<?php echo $txtCreadaPor;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-clipboard-check"></i>&nbsp<?php echo $txtFecha;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($novedades as $novedad): ?>
                <tr>

                  <td><a href="./single.php?id=<?php echo $proyecto['id']; ?>"><?php echo utf8_encode($novedad['id']);?></a></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode($novedad['idioma']);?></td>
                  <td style="font-size: 15px;font-weight: bold;width:40%"><?php echo  utf8_encode(utf8_decode($novedad['titulo']));?>&nbsp&nbsp<span class="flag-icon flag-icon-<?php echo $iso; ?>"></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode($novedad['createdBy']);?></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode($novedad['createdAt']);?></td>

                  <td>
                  <a href="../edit-novelty.php?id=<?php echo $novedad['id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <a class="btn btn-primary btn-sm" href="../single-novelty.php?id=<?php echo $novedad['id']; ?> "><i class="fas fa-eye"></i></a>
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
        </div>
      </div>
    </section>
  </div>

  <script>
$(document).ready(function() {
    $('#example2').DataTable();
} );
</script>