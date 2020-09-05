<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.js"></script>

<?php include('layouts/head.php'); ?>


<body class="hold-transition sidebar-mini layout-fixed">
 <?php include('layouts/navbar.php'); ?>    

  <div id="areas" class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
              <h4 style="background-color: #90EE90; text-align:center;font-weight: bold;" ><?php echo $txtAreasRegistradas;?></h4>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID</th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-file-signature"></i>&nbsp<?php echo $txtArea;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-clipboard-check"></i>&nbsp<?php echo $txtEstado;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?>
                  <button id="myBtn" type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#addArea"><i class="fas fa-plus"></i></button>
                  </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($areas as $area): ?>
                <tr>

                  <td><a href="./single.php?id=<?php echo $area['id']; ?>"><?php echo utf8_encode($area['id']);?></a></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo  utf8_encode(utf8_decode($area['es']));?>&nbsp&nbsp<span class="flag-icon flag-icon-<?php echo $iso; ?>"></td>
                  <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode($area['nomestado']);?></td>
                  <td>
                    <a href="#editArea_<?php echo $area['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal">
                    <i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="if(confirm('Deseas continuar?')){
                      this.form.submit();}
                      else{ alert('Operacion Cancelada');
                      }" value="ELIMINAR DATOS" href="./admin/delete.php?id=<?php echo $area['id']; ?>"><i class="fas fa-ban"></i></a></td>
                </tr>
                <?php include('modals.area.php'); ?>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include('layouts/footer.php'); ?>    
  <?php include('layouts/scripts.php'); ?>    

  <script>
$(document).ready(function() {
    $('#example2').DataTable();
} );
</script>
