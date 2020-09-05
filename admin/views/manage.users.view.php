<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.js">  </script>

<script>
$(document).ready(function() {
    $('#datatableUsers').DataTable();
} );
</script>


  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 style="background-color: #90EE90; text-align:center;font-weight: bold;" ><?php echo $txtUsuariosRegistrados;?></h4>
            </div>
            <div class="card-body">
              <table id="datatableUsers" class="table table-bordered table-hover">
                <thead>
                <tr style="text-align:center">
                  <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID</th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-file-signature"></i>&nbsp<?php echo $txtuser;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-id-card-alt"></i>&nbsp<?php echo $txtRol;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-at"></i>&nbsp<?php echo $direccionEmail;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($usuarios as $usuario): ?>
                <tr>

                  <td style="text-align:center"><a href="./single.php?id=<?php echo $proyecto['id']; ?>"><?php echo utf8_encode($usuario['idusuario']);?></a></td>
                  <td style="font-size: 14px;font-weight: bold;"><?php echo utf8_encode($usuario['user']);?>&nbsp&nbsp<span class="flag-icon flag-icon-<?php echo $iso; ?>"></td>
                  <td style="font-size: 13px;font-weight: bold;"><?php echo utf8_encode($usuario['nomrol']);?>
                    &nbsp&nbsp<span class="flag-icon flag-icon-<?php echo $iso; ?>"></td>
                  <td style="font-size: 14px;font-weight: bold;"><?php echo utf8_encode($usuario['email']);?></td>
                  <td style="text-align:center"><a style="width:45px" class="btn btn-success btn-sm" href="#editUser_<?php echo $usuario['idusuario']; ?>" data-toggle="modal"><i class="fas fa-pencil-alt"></i></a>
                    <!-- <a class="btn btn-primary btn-sm" href="./single.php?id=<?php echo $usuario['idusuario']; ?> "><i class="fas fa-eye"></i></a> -->
                    <a style="width:45px" class="btn btn-danger btn-sm" onclick="if(confirm('Deseas continuar?')){
                      this.form.submit();}
                      else{ alert('Operacion Cancelada');
                      }" value="ELIMINAR DATOS" href="./admin/delete.php?id=<?php echo $proyecto['id']; ?>"><i class="fas fa-ban"></i></a></td>
                </tr>
                <?php include('modals.php'); ?>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
</html>
