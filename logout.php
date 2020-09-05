<?php
    session_start();
    require 'admin/config.php';
    require 'functions.php';

    $conexion = conexion($bd_config);
    $idLog = obtener_max_id($conexion, 'logs', 'idlog');

    $statement = $conexion->prepare('INSERT INTO logs (idlog, idusuario, username, rol, actionLog, descriptionLog, dateLog) VALUES (:idlog, :idusuario, :username, :rol, :actionLog, :descriptionLog, now())');
    $statement->execute(array(
        ':idlog' => $idLog,
        ':idusuario' => $_SESSION['id'],
        ':username' => $_SESSION['user'],
        ':rol' => $_SESSION['rol'],							
        ':actionLog' => "LOGOUT",
        ':descriptionLog' => utf8_encode(utf8_decode("Cierre de sesión"))
        ));

    session_unset();
    session_destroy();
    header("Location: index.php");
?>