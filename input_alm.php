<?php
require_once('inc/functions.php');
?>
<?php include(HEADER_TEMPLATE); ?>

    <div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <img id='logo' src="img/logo.png" alt="" width="10%"/>
            <!-- <img id='logoRight' style="display:block; margin-left: auto; margin-right: auto; float: right"
                src="img/logo-monaco.png" width="14%" class="rounded" alt=""> -->
            <div class="container-fluid">
                <h2 id='logo' style="font-family: 'Oswald', sans-serif; letter-spacing: 0.1em; font-size: 0.8em" class="no-margin-bottom"></h2>
            </div>
        </div>
    </header>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Almacenes - Registrar </li>
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
                                            href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Editar</a>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="ingresar_almacen.php" enctype="multipart/form-data"
                              accept-charset="utf-8">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4" style="font-family: 'Oswald', sans-serif; letter-spacing: 0.1em; font-size: 1em"><i style="font-size: 2em" class="icon-home"></i></h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal">
                                    <div class="row">
                                        <div class="form-group col-md-1">
                                            <label for="">ID Almacen</label>
                                            <input type="text" class="form-control" placeholder="0<?php echo last_alm() + 1?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Dirección</label>
                                            <input type="text" class="form-control" name="dir_almacen">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-10">
                                            <a href="report_fin.php" style="font-family: 'Bai Jamjuree'; font-size: 1em" class="btn btn-secondary" role="button">Cancelar</a>
                                            <button id="save" type="submit" style="font-family: 'Bai Jamjuree'; font-size: 1em" class="btn btn-primary" ><span
                                                        id="button"> Registrar</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
<?php require('modals/modal.php') ?>
<?php include(FOOTER_TEMPLATE); ?>