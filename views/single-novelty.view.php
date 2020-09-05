<?php require 'Layouts/header.php';?>	

<?php
if (isset($_SESSION["language"]))
    
{
$idioma=$_SESSION["language"]; 
}

switch ($idioma){
    case "es":
        //echo "PAGE ES";
        $disqusLang = "es_AR	";
        break;
    case "en":
        //echo "PAGE EN";
        $disqusLang = "en_US";
        break;
    case "br":
        //echo "PAGE BR";
        $disqusLang = "pt_BR";
		break;
	case "it":
        //echo "PAGE IT";
        $disqusLang = "it";
        break;    
    default:
        //echo "PAGE EN - Setting Default";
        $disqusLang = "es_AR";
        break;
}
?>

<body><br>
<div class="site-main-container">
	<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12 post-list">
							<div class="single-post-wrap">
								<strong><b><p class="excert" style="text-align:justify; color: black;font-size: 20px">	
								<h3><?php echo utf8_encode(utf8_decode($novedad['titulo'])) ?></h3></p></strong></b>
									<?php if (isset($_SESSION['loggedin'])) { ?><?php } ?>
									<div class="form-group form-inline"> 										
										<ul class="meta mt-20">
											<li><a href="#"><span class="ti-user"></span>&nbsp<b><strong><?php echo $autor ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($novedad['createdBy'])) ?></a></li>
											<li><span class="ti-calendar"></span>&nbsp<b><strong><?php echo $publicado ?></strong></b>&nbsp<?php echo fecha($novedad['createdAt']) ?></li>
											<li><a href="#"><p class="excert" style="color: #3c8dbc; font-size: 13px"><span class="ti-cloud-up"></span>&nbsp<b><strong><?php echo $subidoPor ?></strong></b>&nbsp<?php echo utf8_encode(utf8_decode($novedad['uploadedBy'])) ?></a></p></li>
										</ul>
									</div>
									<p class="excert" style="text-align:justify; color: black;font-size: 15px">						
									<?php echo html_entity_decode(utf8_encode(utf8_decode($novedad['contenido']))) ?></p>
							</div>
						</div>
					</div>
				</div>
	</section>
</div>
</body>
</html>

<?php require 'Layouts/footer.php';?>