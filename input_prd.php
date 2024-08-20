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
            <li class="breadcrumb-item active">Productos - Registrar </li>
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
                        <form method="POST" action="ingresar_producto.php" enctype="multipart/form-data"
                              accept-charset="utf-8">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4" style="font-family: 'Oswald', sans-serif; letter-spacing: 0.1em; font-size: 1em"><i style="font-size: 2em; color: darkgray" class="fas fa-box"></i></h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal">
                                    <div class="row">
                                        <div class="form-group col-md-1">
                                            <label for="name">ID Producto</label>
                                            <input type="text" class="form-control" name="id_prd" placeholder="00<?php echo last_prd() + 1?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Descripción</label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="far fa-keyboard"></i></div>
                                                </div>
                                                <input type="text" class="form-control" name="desc_prd" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Registrado</label>
                                            <input type="text" class="form-control" name="" disabled>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Modificado</label>
                                            <input type="text" class="form-control" name="" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="">Fabricante</label>
                                            <input type="text" class="form-control" name="fabr_prd">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Categoria</label>
                                            <input type="text" class="form-control" name="cat_prd">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Proveedor</label>
                                            <select style="font-size: 1em" id="product" name="name_pvd" class="form-control">
                                                <option value="" selected>Selecionar</option>
                                                <?php foreach ($providers as $provider) : ?>
                                                    <option><?php echo $provider['name_pvd']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-1">
                                            <label for="">Mínimo</label>
                                            <input type="text" class="form-control" name="minimo_prd">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="">Actual</label>
                                            <input type="text" class="form-control" name="stock_prd">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="">Almacén</label>
                                            <select class="form-control" name="tbl_almacenes_id_almacen">
                                                <option value="" selected>Seleccionar</option>
                                                <?php
                                                $database = open_database(); // Conectar a la base de datos

                                                $sql = "SELECT id_almacen, dir_almacen FROM tbl_almacenes";
                                                $result = $database->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<option value="' . $row['id_almacen'] . '">' . $row['dir_almacen'] . '</option>';
                                                    }
                                                }

                                                close_database($database); // Cerrar la conexión a la base de datos
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Costo</label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                                </div>
                                                <input type="text" class="form-control" name="costo_prd" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Estado</label>
                                            <input value="Activo" placeholder="Ativo" type="text" class="form-control" name="estado_prd" disabled>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-10">
                                            <a href="report_prd.php" style="font-family: 'Bai Jamjuree'; font-size: 1em" class="btn btn-secondary" role="button">Cancelar</a>
                                            <button id="save" type="submit" style="font-family: 'Bai Jamjuree'; font-size: 1em" class="btn btn-primary" ><span
                                                        id="button"> Registrar</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
    </section>
<?php include(FOOTER_TEMPLATE); ?>