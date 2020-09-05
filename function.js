$(function(){

	// Lista de Categorias
	$.post( 'categorias.php' ).done( function(respuesta)
	{
		$( '#categorias' ).html( respuesta );
	});

	// lista de subcategorias
	$('#categorias').change(function()
	{
		var la_categoria = $(this).val();
		
	// Lista de Categorias
		$.post( 'subcategorias.php', { categoria: la_categoria} ).done( function( respuesta )
		{
			$( '#subcategorias' ).html( respuesta );
		});
	});
	
	// Lista de Categorias
	$( '#subcategorias' ).change( function()
	{
		var subcategoria = $(this).children('option:selected').html();
		// alert( 'Lista de Categorias de ' + subcategoria);
	});

})

function copiarDatos(){

	var link = document.getElementById("link").value;
	var texto = link;
	document.getElementById("textToEncode").innerHTML+= texto + "\n";
	document.getElementById("link").value = "";
	}
	
function limpiarDatos(){

	document.getElementById("textToEncode").value = "";
	
	}

	function contar(maxleng, idcontador, idcomponente) {
		var max = maxleng;
		var cadena = document.getElementById(idcomponente).value;
		var longitud = cadena.length;

			if(longitud <= max) {
				 document.getElementById(idcontador).value = max-longitud;
			} else {
				 document.getElementById(idcomponente).value = cadena.substr(0, max);
			}
   }
