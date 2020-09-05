<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#datatableRoles').DataTable();
  } );
</script>



<div id="roles" class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
              <h4 style="background-color: #90EE90; text-align:center;font-weight: bold;" ><?php echo $txtRolesRegistrados;?></h4>
              </div>
            <div class="card-body">
              <table id="datatableRoles" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID</th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-file-signature"></i>&nbsp<?php echo $txtRol;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-clipboard-check"></i>&nbsp<?php echo $txtEstado;?></th>
                  <th style="background-color: #DCDCDC;width:20%"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?>
                    <button id="myBtn" type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#addRol"><i class="fas fa-plus"></i></button>
                  </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($roles as $rol): ?>
                <tr>
                  <td><a href="./single.php?id=<?php echo $proyecto['id']; ?>"><?php echo utf8_encode($rol['id']);?></a></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($rol['es']));?>&nbsp&nbsp<span class="flag-icon flag-icon-<?php echo $iso; ?>"></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode($rol['nomestado']);?></td>
                  <td>
                    <a href="#editRol_<?php echo $rol['id']; ?>" class="btn btn-info btn-sm" data-toggle="modal">
                    <i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="if(confirm('Deseas continuar?')){
                      this.form.submit();}
                      else{ alert('Operacion Cancelada');
                      }" value="ELIMINAR DATOS" href="./admin/delete.php?id=<?php echo $rol['id']; ?>"><i class="fas fa-ban"></i></a></td>
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

<div class="modal fade" id="addRol" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><i class="fas fa-plus"></i>&nbsp;<?php echo $txtAgregarRol;?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>  
                <div class="modal-body">
                    <form id="contact_form" action="views/add-rol.php" method="POST">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-es"></span></span>
                    </div>
                    <input id="nombreRolEs" name="nombreRolEs" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                </div>
                				
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-it"></span></span>
                  </div>
                  <input required="true" id="nombreRolIt" name="nombreRolIt" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-us"></span></span>
                  </div>
                  <input id="nombreRolEn" name="nombreRolEn" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $txtIdiomaEnIdioma;?>&nbsp;<span class="flag-icon flag-icon-br"></span></span>
                  </div>
                  <input id="nombreRolPt" name="nombreRolPt" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;<?php echo $btnCerrar;?></button>
                    <button type="button" class="btn btn-primary" id="submitForm">&nbsp;<?php echo $btnGuardarCambios;?></button>
                </div>
            </div>
        </div>
    </div>

    <script>
$(document).ready(function () {
    $("#contact_form").on("submit", function(e) {
        var formURL = $(this).attr("action");
        var postData = $(this).serializeArray();      
              $.ajax({
                  url: formURL,
                  type: "POST",
                  data: postData,
                  success: function(data, textStatus, jqXHR) {
                      $('#addRol .modal-header .modal-title').html("Result");
                      $('#addRol .modal-body').html(data);
                      $("#submitForm").remove();
                  },
                  error: function(jqXHR, status, error) {
                      console.log(status + ": " + error);
                  }
              });
              e.preventDefault();
          });
     
    $("#submitForm").on('click', function() {
        $("#contact_form").submit();
    });
});
</script>






