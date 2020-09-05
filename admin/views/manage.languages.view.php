<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.js"></script>


  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
              <h4 style="background-color: #90EE90; text-align:center;font-weight: bold;" ><?php echo $txtIdiomasRegistrados;?></h4>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID</th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-file-signature"></i>&nbsp<?php echo $txtIdiomas;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-clipboard-check"></i>&nbsp<?php echo $txtEstado;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?>
                  <button id="myBtn" type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#addLanguage"><i class="fas fa-plus"></i></button>
                  </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($idiomas as $idioma): ?>
                <tr>

                  <td><a href="./single.php?id=<?php echo $proyecto['id']; ?>"><?php echo utf8_encode($idioma['id']);?></a></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo  utf8_encode(utf8_decode($idioma['es']));?>&nbsp&nbsp<span class="flag-icon flag-icon-<?php echo $iso; ?>"></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode($idioma['nomestado']);?></td>
                  <td>
                  <a href="#edit_<?php echo $idioma['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal">
                  <i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="if(confirm('Deseas continuar?')){
                      this.form.submit();}
                      else{ alert('Operacion Cancelada');
                      }" value="ELIMINAR DATOS" href="./admin/delete.php?id=<?php echo $proyecto['id']; ?>"><i class="fas fa-ban"></i></a></td>
                </tr>
                <?php include('Modals/idiomas.modals.php'); ?>
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