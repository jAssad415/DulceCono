<?php
require_once('inc/functions.php');
ob_start();
add_pvd();
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
    
    <!-- Mostrar mensaje de sesión -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?> mt-3">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo
                unset($_SESSION['type']); // Limpiar el tipo después de mostrarlo
            ?>
        </div>
    <?php endif; ?>

    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Proveedores - Registrar</li>
        </ul>
    </div>
    <!-- Forms Section-->
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a
                                            href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="input_for.php" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4" style="font-family: 'Oswald', sans-serif; letter-spacing: 0.1em; font-size: 2em"><i style="color: darkgray" class="fas fa-kaaba"></i></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-horizontal">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="">ID Proveedor</label>
                                            <input type="text" class="form-control" name="prv_id_proveedor" placeholder="000<?php echo last() + 1?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="">Nombre</label>
                                            <input type="text" class="form-control" name="prv_nombre" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">CUIT</label>
                                            <input id="text" type="text" class="form-control" name="prv_cuit" required onkeypress="$(this).mask('00-00000000-00')">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Dirección</label>
                                            <input type="text" class="form-control" name="prv_direccion">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Código Postal</label>
                                            <input type="text" class="form-control" name="prv_codigo_postal">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Provincia</label>
                                            <input type="text" class="form-control" name="prv_provincia">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="campo1">Municipio</label>
                                            <input type="text" class="form-control" name="prv_municipio">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="">Teléfono</label>
                                            <input type="text" class="form-control" name="prv_telefono" onkeypress="$(this).mask('(00) 0000-000000')">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">E-mail</label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <input type="email" class="form-control" name="prv_email">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="">País</label>
                                            <input type="text" class="form-control" name="prv_pais">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-10">
                                            <a href="report_for.php" style="font-family: 'Bai Jamjuree'; font-size: 1em" class="btn btn-secondary" role="button">Cancelar</a>
                                            <button id="save" style="font-family: 'Bai Jamjuree'; font-size: 1em" type="submit" class="btn btn-primary"><span id="button"> Registrar</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include(FOOTER_TEMPLATE); ?>
