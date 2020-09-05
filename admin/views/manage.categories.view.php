<?php ?>

  <div class="content-wrapper">
  <!-- <div class="card-header">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 style="font-weight: bold"><?php echo $txtGestionandoCategorias;?></h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus"></i>&nbsp;<?php echo $txtAgregarCategoria;?></button>&nbsp;
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#addSubcategory"><i class="fas fa-plus"></i>&nbsp;<?php echo $txtAgregarSubcategoria;?></button>
            </ol>
          </div>
        </div>
      </div>
    </section>
    </div> -->

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
              <h4 style="background-color: #90EE90; text-align:center;font-weight: bold;" ><?php echo $txtCategoriasRegistradas;?></h4>
              <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus"></i>&nbsp;<?php echo $txtAgregarCategoria;?></button>&nbsp;
              <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#addSubcategory"><i class="fas fa-plus"></i>&nbsp;<?php echo $txtAgregarSubcategoria;?></button>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #DCDCDC"><i class="fas fa-sitemap"></i></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID</th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-file-signature"></i>&nbsp<?php echo $txtNombreCat;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-clipboard-check"></i>&nbsp<?php echo $txtEstado;?></th>
                  <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $acciones;?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($categorias as $categoria): ?>
                <tr>
                  <td style="background-color: #DCDCDC">Cat.</td>
                  <td style="background-color: #DCDCDC"><?php echo utf8_encode($categoria['id']);?></td>
                  <td style="font-size: 15px;font-weight: bold;background-color: #DCDCDC"><?php echo utf8_encode(utf8_decode($categoria['es']));?>&nbsp&nbsp<span class="flag-icon flag-icon-<?php echo $iso; ?>"></td>
                  <td style="font-size: 15px;font-weight: bold;background-color: #DCDCDC"><?php echo utf8_encode(utf8_decode($categoria['txtEstado']));?></td>
                  <td style="background-color: #DCDCDC"><a href="#editcat_<?php echo $categoria['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal">
                  <i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="if(confirm('Deseas continuar?')){
                      this.form.submit();}
                      else{ alert('Operacion Cancelada');
                      }" value="ELIMINAR DATOS" href="./admin/delete.php?id=<?php echo $proyecto['id']; ?>"><i class="fas fa-ban"></i></a></td>

                    <?php foreach($subcategorias as $subcategoria):
                      if ($categoria['id']==($subcategoria['idcategoria'])){ ?>
                      <tr>
                        <td>Sub.</td>
                        <td><?php echo utf8_encode(utf8_decode($subcategoria['idsub']));?></td>
                        <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($subcategoria['nombEs']));?>&nbsp&nbsp<span class="flag-icon flag-icon-<?php echo $iso; ?>"></td>
                        <td style="font-size: 15px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($subcategoria['es']));?></td>
                        <td><a href="#editsub_<?php echo $subcategoria['idsub']; ?>" class="btn btn-success btn-sm" data-toggle="modal">
                        <i class="fas fa-pencil-alt"></i></a>
                        <a class="btn btn-danger btn-sm" onclick="if(confirm('Deseas continuar?')){
                        this.form.submit();}
                        else{ alert('Operacion Cancelada');
                        }" value="ELIMINAR DATOS" href="./admin/delete.php?id=<?php echo $proyecto['id']; ?>"><i class="fas fa-ban"></i></a></td>
                      </tr>
                    <?php } ?>
                      <?php include('Modals/subcategorias.modals.php'); ?>
                    <?php endforeach; ?>
                    <?php include('Modals/categorias.modals.php'); ?>
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

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
