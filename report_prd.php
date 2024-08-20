<?php
require_once('inc/functions.php');

// Obtener todos los productos
$products = find_all_products(); // Asegúrate de que esta función obtenga todos los productos

// Agrupar productos por almacén
$products_by_almacen = [];
foreach ($products as $product) {
    $almacen_id = $product['tbl_almacenes_id_almacen'];
    if (!isset($products_by_almacen[$almacen_id])) {
        $products_by_almacen[$almacen_id] = [];
    }
    $products_by_almacen[$almacen_id][] = $product;
}
?>


<?php include(HEADER_TEMPLATE); ?>
    <div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <img id='logo' src="img/logo.png" alt="" width="10%"/>
            <div class="container-fluid">
                <h2 id='logo' style="font-family: 'Oswald', sans-serif; letter-spacing: 0.1em; font-size: 0.8em" class="no-margin-bottom"></h2>
            </div>
        </div>
    </header>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Productos - Informe</li>
        </ul>
    </div>
    <section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a>
                                <a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4" style="font-family: 'Oswald', sans-serif; letter-spacing: 0.1em; font-size: 1em">
                            <i style="font-size: 1.2em" class="fas fa-pen-square"></i> INFORME
                        </h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <div style="width:98%">
                            <?php foreach ($products_by_almacen as $almacen_id => $products_in_almacen) : ?>
                                <!-- Tarjeta para cada almacén -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h4 class="card-title">Almacén: <?php echo get_almacen_address($almacen_id); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><ion-icon size="large" name="menu"></ion-icon></th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th style="text-align: center">CATEGORÍA</th>
                                                    <th style="text-align: center">FABRICANTE</th>
                                                    <th style="text-align: center">STOCK</th>
                                                    <th style="text-align: center">COSTO</th>
                                                    <th style="text-align: center">ESTADO</th>
                                                    <th style="text-align: center">ALMACÉN</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($products_in_almacen as $product) : ?>
                                                    <tr>
                                                        <th style="vertical-align: middle" scope="row">000<?php echo $product['id_prd']; ?></th>
                                                        <td style="vertical-align: middle"><?php echo $product['desc_prd']; ?></td>
                                                        <td style="vertical-align: middle; text-align:center"><?php echo $product['cat_prd']; ?></td>
                                                        <td style="vertical-align: middle; text-align:center"><?php echo $product['fabr_prd']; ?></td>
                                                        <td style="vertical-align: middle; text-align:center"><?php echo $product['stock_prd']; ?></td>
                                                        <td style="vertical-align: middle; text-align:right"><?php echo $product['costo_prd']; ?></td>
                                                        <td style="vertical-align: middle; text-align:center"><?php echo $product['estado_prd']; ?></td>
                                                        <td style="vertical-align: middle; text-align:center"><?php echo get_almacen_address($product['tbl_almacenes_id_almacen']); ?></td>
                                                        <td style="vertical-align: middle" class="action">
                                                            <div>
                                                                <a id="btn-edit" href="edit_prd.php?id_prd=<?php echo $product['id_prd']; ?>" class="btn btn-warning btn-sm">
                                                                    <i class="material-icons md-18">insert_comment</i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Espacio entre tarjetas -->
                                <br>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<?php require('modals/modal.php') ?>
<?php include(FOOTER_TEMPLATE); ?>
