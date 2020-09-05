// function mostrarMensaje1(){
// 	alert('Bienvenido al curso JavaScript de aprenderaprogramar.com');
// 	}


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

