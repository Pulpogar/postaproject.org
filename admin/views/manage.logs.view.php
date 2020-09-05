<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.js"></script>

<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 style="background-color: #90EE90; text-align:center;font-weight: bold;" ><?php echo $txtLogsRegistrados;?></h4>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="background-color: #DCDCDC"><i class="fas fa-tags"></i>&nbspID Log</th>
                    <th style="background-color: #DCDCDC"><i class="fas fa-file-signature"></i>&nbspUsername</th>
                    <th style="background-color: #DCDCDC"><i class="fas fa-at"></i>&nbsp<?php echo $txtAccion;?></th>
                    <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $txtDescripcion;?></th>
                    <th style="background-color: #DCDCDC"><i class="fas fa-exclamation-circle"></i>&nbsp<?php echo $txtFecha;?></th>
                  </tr>
                </thead>

                <tbody>
                <?php foreach($logs as $log): ?>
                  <tr>
                    <td style="font-size: 13px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($log['idlog']));?></td>
                    <td style="font-size: 13px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($log['username']));?></td>
                    <td style="font-size: 13px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($log['actionLog']));?></td>
                    <td style="font-size: 13px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($log['descriptionLog']));?></td>
                    <td style="font-size: 13px;font-weight: bold;"><?php echo utf8_encode(utf8_decode($log['dateLog']));?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>

<script>
  $(document).ready(function() {
      $('#example2').DataTable();
  } );
</script>

 
