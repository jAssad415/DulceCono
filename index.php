<?php require_once 'config.php'; ?>
<?php require_once 'inc/database.php';?>
<?php require_once 'inc/functions.php';?>
<?php require_once DBAPI; ?>
<?php include(HEADER_TEMPLATE); ?>

    <div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <img id='logo' src="img/logo.png" alt="" width="10%" />
            <!-- <img id='logoRight' style="display:block; margin-left: auto; margin-right: auto; float: right" src="img/logo-monaco.png" width="14%" class="rounded" alt=""> -->
            <div class="container-fluid">
                <h2 id='logo' style="font-family: 'Oswald', sans-serif; letter-spacing: 0.1em; font-size: 0.8em" class="no-margin-bottom"></h2>
            </div>
        </div>
    </header>


    <!-- Dashboard Counts Section-->
    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-violet"><i class="icon-user"></i></div>
                        <div class="title"><span>Total<br>Clientes</span>
                            <div class="progress">
                                <div role="progressbar" style="width: ; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                            </div>
                        </div>
                        <div class="number"><strong></strong></div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-red"><i class="icon-padnote"></i></div>
                        <div class="title" ><span>Despesas<br>Vencidas</span>
                            <div class="progress">
                                <div role="progressbar" style="width: %; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                            </div>
                        </div>
                        <div class="number"><strong></strong></div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-orange"><i class="icon-check"></i></div>
                        <div class="title"><span>Despesas<br>à Vencer</span>
                            <div class="progress">
                                <div role="progressbar" style="width: %; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                            </div>
                        </div>
                        <div class="number"><strong></strong></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Header Section    -->
    <section class="dashboard-header">
        <div class="container-fluid">
            <div class="row">
                <!-- Statistics -->
                <div class="statistics col-lg-3 col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                        <div class="text"><strong></strong><br><small> PRODUTOS CADASTRADOS</small></div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                        <div class="text"><strong></strong><br><small> PRODUTOS ATIVOS</small></div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-orange"><i class="fa fa-pie-chart"></i></div>
                        <div class="text"><strong></strong><br><small> PRODUTOS INATIVOS</small></div>
                    </div>
                </div>
                <!-- Line Chart            -->
                <div class="chart col-lg-3 col-12">
                    <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                        <canvas id="lineCahrt"></canvas>
                    </div>
                </div>
                <div class="chart col-lg-3 col-12">
                    <!-- Bar Chart   -->
                    <div class="bar-chart has-shadow bg-white">
                        <div class="title"><strong class="text-violet">0</strong><br><small>Execução no prazo</small></div>
                        <canvas id="barChartHome"></canvas>
                    </div>
                    <!-- Numbers-->
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                        <div class="text"><strong>0</strong><br><small>ïndice de Sucesso</small></div>
                    </div>
                </div>
                <div class="statistics col-lg-3 col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                        <div class="text"><strong>0</strong><br><small> ORÇAMENTOS ABERTO</small></div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                        <div class="text"><strong>0</strong><br><small> VENDAS CONCRETIZADAS</small></div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-orange"><i class="fa fa fa-pie-chart"></i></div>
                        <div class="text"><strong>0</strong><br><small> ORÇAMENTOS EM ANDAMENTO</small></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section-->
    <section class="client no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Client Profile -->
                <div class="col-lg-4">
                    <div class="client card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="client-avatar"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle">
                                <div class="status bg-green"></div>
                            </div>
                            <div class="client-title">
                                <h3>Cleber Westembergue</h3><span>Web Developer</span><a href="#">Follow</a>
                            </div>
                            <div class="client-info">
                                <div class="row">
                                    <div class="col-4"><strong>20</strong><br><small>Photos</small></div>
                                    <div class="col-4"><strong>54</strong><br><small>Videos</small></div>
                                    <div class="col-4"><strong>235</strong><br><small>Tasks</small></div>
                                </div>
                            </div>
                            <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></div>
                        </div>
                    </div>
                </div>
                <!-- Total Overdue             -->
                <div class="col-lg-4">
                    <div class="overdue card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3>Meta Comercial</h3><small>Venda Anual</small>
                            <div class="number text-center">$ 4.800.000,00</div>
                            <div class="chart">
                                <canvas id="lineChart1">                               </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include(FOOTER_TEMPLATE); ?>