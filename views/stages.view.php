<?php require_once 'Layouts/header.php';?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <title>Callbacks</title> -->
  <link rel="stylesheet" href="./dist/jquery-steps.css">
  <!-- Demo stylesheet -->
  <link rel="stylesheet" href="./css/style.css">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        
        <script src="./function.js"></script>
        <link href="./css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
        <link href="./css/tagsinput.css" media="all" rel="stylesheet" type="text/css"/>

        <link href="./js/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>

        

        <script src="./js/plugins/piexif.js" type="text/javascript"></script>
        <script src="./js/plugins/sortable.js" type="text/javascript"></script>
        <script src="./js/fileinput.js" type="text/javascript"></script>
        <script src="./js/locales/fr.js" type="text/javascript"></script>
        <script src="./js/locales/es.js" type="text/javascript"></script>
        <script src="./js/themes/fas/theme.js" type="text/javascript"></script>
        <script src="./js/themes/explorer-fas/theme.js" type="text/javascript"></script>
        <link rel="stylesheet" href="./css/flag-icon.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
        <script src="./dist/jquery-steps.js"></script>
        <script src="./js/tagsinput.js"></script>




</head>
<body>

<div class="site-main-container">
<div id="demo">
<br>
<div class="container no-padding">
        <div class="popular-post-wrap">
    <div class="step-app">
    <br>
      <ul class="step-steps">
        <li style="font-size:14px"><a href="#tab1"><span class="number">1</span><?php echo $txtInfoBasica ?></a></li>
        <li style="font-size:13px"><a href="#tab4"><span class="number">2</span><?php echo $txtInfoComplementaria ?></a></li>
        <li style="font-size:13px"><a href="#tab2"><span class="number">3</span><?php echo $txtDesarrollo ?></a></li>
        <li style="font-size:14px"><a href="#tab3"><span class="number">4</span><?php echo $txtSubirImagenes ?></a></li>
        <li style="font-size:14px"><a href="#tab5"><span class="number">5</span><?php echo $txtFinalizar ?></a></li>
      </ul>
      <div class="step-content">
        <div class="step-tab-panel" id="tab1">
            <br>
            <div class="form-group">				
													<h4 class="title2"><i class="ti-align-left"></i>&nbsp<?php echo $txtTituloProyecto ?></h4>
													<div class="d-flex justify-content-end form-inline">
														<h6 style="color:black;font-size: 11px"><?php echo $maximo ?> 75 / <?php echo $caracteresRestantes ?></h6>
														<input style="text-align:right;font-size: 13px"disabled size="1" value="75" id="contadorTitulo"> </div>
													<input id="titulo" required="" name="titulo" type="text" class="form-control" name="tittle" placeholder='<?php echo $plhTituloProyecto ?>' minlength="4" maxlength="75" onKeyDown="contar(75, 'contadorTitulo', 'titulo')" onKeyUp="contar(75, 'contadorTitulo', 'titulo')" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhTituloProyecto ?>'">
													<!-- <div class="form-group col-lg-6 col-md-12 email">
													<input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
													</div> -->
												</div>
            <br>

            <div class="form-group">
				<h4 class="title2"><i class="ti-user"></i>&nbsp<?php echo $txtAutorProyecto ?></h4>
				<input type="text" class="form-control" id="autorProyecto" name="autorProyecto" minlength="4" placeholder='<?php echo $plhAutorProyecto ?>' required="" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhAutorProyecto ?>'">
			</div>

            <div class="form-group">
				<h4 class="title2"><i class="ti-image"></i>&nbsp<?php echo $txtImgenRepresentativa ?></h4>
			</div>

            <div class="file-loading">
				<input id="imgRep" name="imgRep" type="file">
                <!-- <input id="imgRep" name="imgRep" type="file" multiple> -->

			</div>

            <br>

            <div class="row">
                <div class="col-lg-6 col-md-12 name">
                    <h4 style="width:100%" class="title2"><i class="ti-world"></i>&nbsp<?php echo $txtIdiomaProyecto ?></h4>            
                    <select class="form-control" name="idioma" id="idioma">
                        <?php
                        // $conexion = mysqli_connect("localhost", "root", "", "dbposta");

                        $conexion = mysqli_connect("localhost",  $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
                        $query = $conexion->query("SELECT * FROM idiomas");											
                        echo '<option value="0">'. $cmbSeleccioneIdioma .'</option>';											
                            while ( $row = $query->fetch_assoc() )
                            {
                                if ($_SESSION["language"]=="es"){
                                    ?> <?php echo '<option value="' . $row['id']. '">' . utf8_encode($row['es']) . '</option>' . "\n";
                                }
                                elseif (($_SESSION["language"]=="en")) {
                                    echo '<option value="' . $row['id']. '">' . utf8_encode($row['en']) . '</option>' . "\n";
                                }
                                elseif (($_SESSION["language"]=="br")) {
                                    echo '<option value="' . $row['id']. '">' . utf8_encode($row['br']) . '</option>' . "\n";
                                }
                                elseif (($_SESSION["language"]=="it")) {
                                    echo '<option value="' . $row['id']. '">' . utf8_encode($row['it']) . '</option>' . "\n";
                                }
                                } ?>
                    </select>
                </div>
                <div class="col-lg-6 col-md-12 name">
                    <h4 style="width:100%" class="title2"><i class="ti-alert"></i>&nbsp<?php echo $txtDificultadProyecto ?></h4>
                    <select class="form-control" name="dificultad" id="dificultad">
                        <?php
                        $conexion = mysqli_connect("localhost",  $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
                        // $conexion = mysqli_connect("localhost", "c1510706_dbposta", "zemasa82VO", "c1510706_dbposta");
                        $query = $conexion->query("SELECT * FROM dificultades");
                        echo '<option value="0">'. $cmbSeleccioneDificultad .'</option>';
                            while ( $row = $query->fetch_assoc() )					
                            {
                                if ($_SESSION["language"]=="es"){
                                    echo '<option value="' . $row['id']. '">' . utf8_encode($row['es']) . '</option>' . "\n";
                                }
                                elseif (($_SESSION["language"]=="en")) {
                                    echo '<option value="' . $row['id']. '">' . utf8_encode($row['en']) . '</option>' . "\n";
                                }
                                elseif (($_SESSION["language"]=="br")) {
                                    echo '<option value="' . $row['id']. '">' . utf8_encode($row['br']) . '</option>' . "\n";
                                }
                                elseif (($_SESSION["language"]=="it")) {
                                    echo '<option value="' . $row['id']. '">' . utf8_encode($row['it']) . '</option>' . "\n";
                                }
                                } ?>
                    </select><br>
            </div>
        
        </div> <!-- =====FIN DIV ROW===== -->
        <div class="form-group">
			<h4 class="title2"><i class="ti-align-justify"></i>&nbsp<?php echo $txtResumenProyecto ?></h4>			
			<textarea id="extracto" class="form-control mb-10" rows="5" name="extracto" placeholder='<?php echo $plhResumenProyecto ?>' 
			onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhResumenProyecto ?>'" minlength="50" maxlength="350" onKeyDown="contar(350, 'contadorResumen', 'extracto')" onKeyUp="contar(350)" required=""></textarea>							
		</div> <!-- =====FIN DIV RESUMEN PROYECTO===== -->
        <div class="form-group">
		    <h4 class="title2"><i class="fa fa-list-ol"></i>&nbsp<?php echo $txtOrganizacionInicial ?></h4>
			<textarea class="form-control mb-10" rows="8" id="organizacionIni" name="organizacionIni" required="" placeholder='<?php echo $plhOrganizacionInicial ?>' 
			onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhOrganizacionInicial ?>'" 
			></textarea>
		</div>
        </div> <!-- =====FIN ETAPA UNO===== --> 

        <div class="step-tab-panel" id="tab2">
          <form name="frmInfo" id="frmInfo">
            <br>
                <h4 style="text-align:center"class="title2"><i class="ti-layout-accordion-list"></i>&nbsp<?php echo $txtDesarrolloProyecto ?></h4>
                <h4 class="title2"><?php echo $txtDesarrolloEtapa ?>1</h4>		      
                <div class="field_wrapper">
                    <input type="text" class="form-control" name="field_name" placeholder='<?php echo $plhTituloEtapa ?>' onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhTituloEtapa ?>'"><br>
                    <textarea value="" class="form-control mb-10" rows="12" name="field_name" placeholder='<?php echo $plhDesarrolloProyecto ?>' 
                    onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhDesarrolloProyecto ?>'" >
                    </textarea>
                <div>
                <!-- <h4 style="text-align:center"class="title2"><i class="ti-gallery"></i>&nbsp<?php echo $txtImagenesProyecto ?></h4> -->
                <h4 class="title2"><?php echo $txtImagenesEtapa ?>1</h4>
                <div id="imagenes">
                <div class="file-loading">
				  <input id="images" name="images" type="file" multiple>
			    </div>
                </div><br>      
            </div>
            </form>
        </div>

          <div id="etapa"></div>
          <br>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 single-popular-post no-padding"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 single-popular-post no-padding">        
                <button class="btn btn-outline-success btn-block btn-sm" onclick="AñadirEtapa()"><?php echo $btnAgregarEtapa ?></button>
                <button class="btn btn-outline-danger btn-block btn-sm" onclick="EliminarEtapa()"><?php echo $btnEliminarEtapa ?></button>                    
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 single-popular-post no-padding"></div>
          </div>
        </div> <!-- =====FIN ETAPA DOS===== -->       

        <div class="step-tab-panel" id="tab3">
        <br>
        <h4 style="text-align:center"class="title2"><i class="ti-gallery"></i>&nbsp<?php echo $txtImagenesProyecto ?></h4>
        <h4 class="title2"><?php echo $txtImagenesEtapa ?>1</h4>
        

        <div id="imagenes">
            <div class="file-loading">
				  <input id="images" name="images" type="file" multiple>
			</div>
        </div><br>


        <div id="imagenes"></div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 single-popular-post no-padding"></div>
                    <div class="col-lg-6 col-md-6 col-sm-12 single-popular-post no-padding"> 
                        <button class="btn btn-outline-success btn-block btn-sm" onclick="AñadirImagenes()"><?php echo $btnAgregarImagenes ?></button>
                        <button class="btn btn-outline-danger btn-block btn-sm" onclick="EliminarImagenes()"><?php echo $btnEliminarImagenes ?></button>                    
                    </div>
                <div class="col-lg-3 col-md-3 col-sm-12 single-popular-post no-padding"></div>
            </div>
        </div> 
        <!-- =====FIN ETAPA TRES===== -->

        <div class="step-tab-panel" id="tab4">
        <br>
          <form name="frmLogin" id="frmLogin">
            <div class="form-group">
			    <h4 class="title2"><i class="ti-tag"></i>&nbsp<?php echo $txtPalabraClave ?></h4>
				<input type="text" data-role="tagsinput" class="form-control" id="tags" name="tags" placeholder='<?php echo $plhPalabraClave ?>' onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhPalabraClave ?>'">
			</div>
			<div class="form-group">
				<h4 class="title2"><i class="ti-ruler-pencil"></i>&nbsp<?php echo $txtHabilidades ?></h4>
				<textarea class="form-control mb-10" rows="8" id="habilidades" name="habilidades"  placeholder='<?php echo $plhHabilidades ?>'
				onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhHabilidades ?>'" 
				></textarea>
			</div>
            <div class="form-group">           
				<h4 style="width:100%" class="title2"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp<?php echo $txtTecnologia ?></h4>
				<textarea class="form-control mb-10" rows="8" id="herramientas" name="herramientas"  placeholder='<?php echo $plhTecnologia ?>'
				onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhTecnologia ?>'" 
				></textarea>
			</div>
			<div class="form-group">             
				<h4 style="width:100%" class="title2"><i class="fa fa-cogs"></i>&nbsp<?php echo $txtMateriales ?></h4>
				<textarea class="form-control mb-10" rows="8" id="materiales" name="materiales"  placeholder='<?php echo $plhMateriales ?>'
				onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $plhMateriales ?>'" 
			    ></textarea>
			</div>
          </form>
        </div>
        <div class="step-tab-panel" id="tab5">
          <!-- <h3>Tab5</h3> -->
          <form name="frmMobile" id="frmMobile">
            <!-- Mobile No:<br> -->
            <!-- <input type="text" name="txtMobileNum"> -->
          </form>
        </div>
      </div>
      <div class="step-footer">
        <div class="float-left">
            <button data-direction="prev" class="btn btn-secondary"><i class="ti-hand-point-left"></i>&nbsp<?php echo $btnPasoAnterior ?></button>
        </div>
        <div class="float-right">
            <button data-direction="next" class="btn btn-secondary"><?php echo $btnSiguientePaso ?>&nbsp<i class="ti-hand-point-right"></i></button>
            <button data-direction="finish" class="btn btn-success"><i class="ti-check-box"></i>&nbsp<?php echo $btnFinalizar ?></button>
        </div>
      </div>
    </div><br><br>
  </div>
<br>
</div>
<?php require 'Layouts/header.php';?>




  <script>
    var frmInfo = $('#frmInfo');
    var frmInfoValidator = frmInfo.validate();

    var frmLogin = $('#frmLogin');
    var frmLoginValidator = frmLogin.validate();

    var frmMobile = $('#frmMobile');
    var frmMobileValidator = frmMobile.validate();

    $('#demo').steps({
      onChange: function (currentIndex, newIndex, stepDirection) {
        // step2
        if (currentIndex === 1) {
          if (stepDirection === 'forward') {
            return frmInfo.valid();
          }
          if (stepDirection === 'backward') {
            frmInfoValidator.resetForm();
          }
        }
        // step4
        if (currentIndex === 3) {
          if (stepDirection === 'forward') {
            return frmLogin.valid();
          }
          if (stepDirection === 'backward') {
            frmLoginValidator.resetForm();
          }
        }
        // step5
        if (currentIndex === 4) {
          if (stepDirection === 'forward') {
            return frmMobile.valid();
          }
          if (stepDirection === 'backward') {
            frmMobileValidator.resetForm();
          }
        }
        return true;
      },
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
  </script>
</body>
</html>


        <script>
    $('#imgRep').fileinput({
        theme: 'fas',
        async: false,
        language: 'es',
        uploadUrl: 'uploadRepImg.php',
        allowedFileExtensions: ['jpeg','jpg','png','gif'],
        maxFileSize: 2048
    });
        on('filepreupload', function(event, data, previewId, index) {
        alert('The description entered is:\n\n' + ($('#description').val() || ' NULL'));
    });
    
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
</script>

<script>
    $('#images').fileinput({
        theme: 'fas',
        async: false,
        language: 'es',
        uploadUrl: 'uploadStage.php',
        allowedFileExtensions: ['jpeg','jpg','png','gif'],
        maxFileSize: 2048
    });
        on('filepreupload', function(event, data, previewId, index) {
        alert('The description entered is:\n\n' + ($('#description').val() || ' NULL'));
    });
    
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
</script>

<script>
    $('#images2').fileinput({
        theme: 'fas',
        async: false,
        language: 'es',
        uploadUrl: 'uploadStage.php',
        allowedFileExtensions: ['jpeg','jpg','png','gif'],
        maxFileSize: 2048
    });
        on('filepreupload', function(event, data, previewId, index) {
        alert('The description entered is:\n\n' + ($('#description').val() || ' NULL'));
    });
    
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
</script>

<script>
    $('#images3').fileinput({
        theme: 'fas',
        async: false,
        language: 'es',
        uploadUrl: 'uploadStage.php',
        allowedFileExtensions: ['jpeg','jpg','png','gif'],
        maxFileSize: 2048
    });
        on('filepreupload', function(event, data, previewId, index) {
        alert('The description entered is:\n\n' + ($('#description').val() || ' NULL'));
    });
    
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
</script>

<script>
    $('#images4').fileinput({
        theme: 'fas',
        async: false,
        language: 'es',
        uploadUrl: 'uploadStage.php',
        allowedFileExtensions: ['jpeg','jpg','png','gif'],
        maxFileSize: 2048
    });
        on('filepreupload', function(event, data, previewId, index) {
        alert('The description entered is:\n\n' + ($('#description').val() || ' NULL'));
    });
    
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
</script>

<script>
    $('#images5').fileinput({
        theme: 'fas',
        async: false,
        language: 'es',
        uploadUrl: 'uploadStage.php',
        allowedFileExtensions: ['jpeg','jpg','png','gif'],
        maxFileSize: 2048
    });
        on('filepreupload', function(event, data, previewId, index) {
        alert('The description entered is:\n\n' + ($('#description').val() || ' NULL'));
    });
    
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 50; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
	  var wrapper = $('.field_wrapper'); //Input field wrapper
	  var etapa = 1;
	  var x = 1;
	// var fieldHTML = '<div class="form-group"><input style="background-color:#ecedf0" type="text" class="form-control" name="field_name[]" placeholder="<?php echo $plhTituloEtapa ?>" onblur="this.placeholder = "<?php echo $plhTituloEtapa ?>"><textarea class="form-control mb-10" rows="15" placeholder="<?php echo $plhNuevasEtapas ?>" required="" name="field_name[]"' + 
	// 'value=""/><br><h4 class="title2">'+ x +'</h4><input type="file" id="uploadFile" name="uploadFile[x][]" multiple/><br><a href="javascript:void(0);" class="remove_button" title="Eliminar etapa"><input style="float: right;" type="button" id="btAdd" value="<?php echo $btnEliminarEtapa ?>" class="btn btn-danger" /><br></a></div>'; //New input field html

	
     //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
      if(x < maxField){ //Check maximum number of input fields
        x++; //Increment field counter
        var fieldHTML = '<div class="form-group"><h4 class="title2"><i class="ti-layout-media-left-alt"></i>&nbsp<?php echo $txtDesarrolloProyecto ?>'+ x +'</h4><input type="text" class="form-control" name="field_name[]" placeholder="<?php echo $plhTituloEtapa ?>" onblur="this.placeholder = "<?php echo $plhTituloEtapa ?>"><br><textarea class="form-control mb-10" rows="15" placeholder="<?php echo $plhNuevasEtapas ?>" required="" name="field_name[]"' + 
        'value=""/><br><a href="javascript:void(0);" class="remove_button" title="Eliminar etapa"><input disabled style="float: right;" type="button" id="btAdd" value="<?php echo $btnEliminarEtapa ?>'+ x +'" class="btn btn-danger btn-block" /><br><br></a></div>'; //New input field html
              $(wrapper).append(fieldHTML); // Add field html
        }

    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
        document.form.button.innerHTML = new Date();
        alert(x);

    });
});
</script>

        <script>
              var i = 1;
              function AñadirEtapa() {
                  i = i + 1;
                  var div = document.getElementById("etapas");
                  var h4 = document.createElement('h4');
                  var txt = document.createElement('input');
                  var br = document.createElement('br');
                  var commentText = document.createElement('textarea');

                  // var icon = document.createElement('icon');
                  // icon.className = 'ti-layout-accordion-list';                  
                  div = document.createElement('div');
                  div.setAttribute("id", 'etapa' + i);
                //   div.className = 'form-group';
                  txt.className = 'form-control';
                  txt.placeholder = '<?php echo $plhTituloEtapa ?>';
                  h4.className = 'title2';
                  // icon.appendChild(br);
                  // icon.appendChild(h4);
                  h4.innerHTML = '<?php echo $txtDesarrolloEtapa ?>'+i;
                  commentText.className = 'form-control';
                  commentText.id = 'inputText';
                  commentText.rows = '12';
                  commentText.placeholder = '<?php echo $plhDesarrolloProyecto ?>';                  
                  div.appendChild(h4);
                  div.appendChild(txt);
                  div.appendChild(br);
                  div.appendChild(commentText);
                  document.getElementById("etapa").appendChild(div);
                  //document.getElementById(i).placeholder = "Escribe tu tarea o deber que tengas que hacer";
              }
              function EliminarEtapa() {
                  var ultimo = document.getElementById('etapa' + i);
                  document.getElementById("etapa").removeChild(ultimo);

                  i = i - 1;
              }
        </script>

<script>
              var i = 1;
              function AñadirImagenes() {
                  i = i + 1;
                  var div = document.getElementById("imagenes");
                  var h4 = document.createElement('h4');
                  var txt = document.createElement('input');
                  var br = document.createElement('br'); 
                  divPadre = document.createElement('div');                
                  div = document.createElement('div');
                  divPadre.setAttribute("id", 'imagenes' + i);
                  txt.setAttribute("id", 'images' + i);
                  txt.setAttribute("name", 'images' + i);
                  txt.setAttribute('type', 'file');
                  txt.setAttribute('multiple','');
                  div.className = 'file-loading';
                  h4.className = 'title2';
                  h4.innerHTML = '<?php echo $txtImagenesEtapa ?>'+i;
                  div.className = 'file-loading';
                  divPadre.appendChild(div);
                  div.appendChild(h4);
                  div.appendChild(br);
                  div.appendChild(txt);
                  document.getElementById("imagenes").appendChild(divPadre);
                  document.getElementById(i).placeholder = "Escribe tu tarea o deber que tengas que hacer";
              }
              function EliminarImagenes() {
                  var ultimo = document.getElementById('imagenes' + i);
                  document.getElementById("imagenes").removeChild(ultimo);

                  i = i - 1;
              }
        </script>




