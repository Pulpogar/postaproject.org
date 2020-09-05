<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.js"></script>


  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 style="background-color: #90EE90; text-align:center;font-weight: bold;" ><?php echo $txtUsuariosSuscriptos;?></h4>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #DCDCDC"><i class="fas fa-file-signature"></i>&nbsp<?php echo $nombre;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-id-card-alt"></i>&nbsp<?php echo $apellido;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-at"></i>&nbsp<?php echo $direccionEmail;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $txtFecha;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($suscriptores as $suscriptor): ?>
                <tr>
                  <td style="font-size: 14px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($suscriptor['nombre']));?>&nbsp&nbsp</td>
                  <td style="font-size: 14px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($suscriptor['apellido']));?></td>
                  <td style="font-size: 14px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($suscriptor['email']));?></td>
                  <td style="font-size: 14px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($suscriptor['fechaAlta']));?></td>
                  <td><a class="btn btn-success btn-sm" href="edit.php?id=<?php echo $proyecto['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-primary btn-sm" href="./single.php?id=<?php echo $proyecto['id']; ?> "><i class="fas fa-eye"></i></a>
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
