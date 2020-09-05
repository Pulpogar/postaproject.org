		<!--================ Start Footer Area =================-->
		<footer class="footer-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6  col-md-12 col-sm-12">
          <div class="single-footer-widget">
          <br>
          <br>
            <h6 style="color:white">&nbsp&nbsp&nbsp&nbsp<?php echo $sobrePosta ?></h6>
              <p style="color:white;padding: 15px;">
                <?php echo $txtSobrePosta ?>
              </p>
          </div>
        </div>
        <div class="col-lg-6  col-md-12 col-sm-12">
          <div class="single-footer-widget">
                    <br><br>
            <h6 style="color:white;">&nbsp&nbsp&nbsp&nbsp<?php echo $newsletter ?></h6>
            <p style="color:white">&nbsp&nbsp&nbsp&nbsp<?php echo $alDia ?>.</p>
            <!-- <div class="" id="mc_embed_signup"> -->
              
              <form action="./newsletter.php" method="post" class="form-inline">

                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend no-padding">
                      <span style="font-size:11px" class="input-group-text" id=""><?php echo $nombre_apellido ?></span>
                    </div>
                  <input id="nombre" name="nombre" type="text" class="form-control" required="">
                  <input id="apellido" name="apellido" type="text" class="form-control" required="">
                </div>
              <!-- </div> -->    
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm"><?php echo $escribeEmail ?>:</span>
                    </div>
                    <input type="text" id="newsEmail" required="" name="newsEmail" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    <!-- <h6 style="text-align:right"><a  class="btn btn-success btn-sm" href="./newsletter.php"><?php echo $btnEnviar ?>&nbsp<i class="ti-share"></i></a><br> -->
                    <button type="submit" class="btn-success btn btn-sm"><?php echo $btnEnviar ?>&nbsp<i class="ti-share"></i></button>
                  </div>                 
                </div>                
                <!-- <div class="info"></div> -->
              </form>
              <h6 style="color:white">&nbsp&nbsp&nbsp&nbsp<?php echo $contacto ?>&nbsp<a style="color:white" href = "mailto: info@postaproject.org"> info@postaproject.org</a></h6>
              </div>
            </div>
          </div>
		</div>
	  <!-- </div> -->
    <!-- <div class="footer-bottom row align-items-center"> -->
    <br>
				<!-- <p class="footer-text m-2 col-lg-12 col-md-12" style="text-align:center"> -->
        <p style="font-size:9px;text-align:center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        &nbsp&nbsp&nbsp&nbsp&nbspPostaproject.org &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-check-circle" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      <!-- </div> -->
    </div>

  </footer>
  <!--================ End Footer Area =================-->