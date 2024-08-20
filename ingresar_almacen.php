<?php
require_once('inc/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asegúrate de que los índices existen antes de usarlos
    $almacen = ['dir_almacen' => isset($_POST['dir_almacen']) ? $_POST['dir_almacen'] : ''];

    if (add_almacen($almacen)) {
        // Redirige o muestra un mensaje de éxito
        header('Location: report_alm.php');
        exit;
    } else {
        // Muestra un mensaje de error
        echo "Error al agregar el almacen.";
    }
}
?>