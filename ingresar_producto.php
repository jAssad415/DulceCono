<?php
require_once('inc/functions.php'); // Asegúrate de que esta línea incluye la definición de la función add_product

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asegúrate de que los índices existen antes de usarlos
    $product = [
        'desc_prd' => isset($_POST['desc_prd']) ? $_POST['desc_prd'] : '',
        'cat_prd' => isset($_POST['cat_prd']) ? $_POST['cat_prd'] : '',
        'fabr_prd' => isset($_POST['fabr_prd']) ? $_POST['fabr_prd'] : '',
        'stock_prd' => isset($_POST['stock_prd']) ? $_POST['stock_prd'] : 0,
        'costo_prd' => isset($_POST['costo_prd']) ? $_POST['costo_prd'] : 0,
        'estado_prd' => isset($_POST['estado_prd']) ? $_POST['estado_prd'] : 'Activo',
        'tbl_almacenes_id_almacen' => isset($_POST['tbl_almacenes_id_almacen']) ? $_POST['tbl_almacenes_id_almacen'] : '',
        'minimo_prd' => isset($_POST['minimo_prd']) ? $_POST['minimo_prd'] : 0,
        'name_pvd' => isset($_POST['name_pvd']) ? $_POST['name_pvd'] : ''
    ];

    // Llama a la función add_product para insertar el producto
    if (add_product($product)) {
        // Redirige o muestra un mensaje de éxito
        header('Location: report_prd.php');
        exit;
    } else {
        // Muestra un mensaje de error
        echo "Error al agregar el producto.";
    }
}
?>
