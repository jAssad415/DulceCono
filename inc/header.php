<?php require_once 'functions.php'; ?>
<?php require_once 'database.php'; ?>
<?php
session_start();
ob_start();//Evitar erro de header
/**Validação de usuário**/
if (!isset($_SESSION["loginUsername"]) || !isset($_SESSION["loginPassword"])) {
    header("Location: login.php");
    exit;
} else {

}
?>
<?php
/**Validação de tempo**/
$_SESSION["Tempo"] = time() + 60 * 2;

if (isset($_SESSION["Tempo"])) {
    if ($_SESSION["Tempo"] < time()) {
        session_unset();
        echo "¡Se le agotó el tiempo!";
//Redireciona para login
        header("Location:login.php");
    } else {
//Seta mais tempo 60 segundos
        $_SESSION["sessiontime"] = time() + 60;
    }
} else {
    session_unset();
}
$name_user = $_SESSION["loginUsername"];
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dulce Cono</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">

    <!-- Icons-->
    <link rel="stylesheet" href="css/fontastic.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>

    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">

    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.blue.css" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script src="js/lodash.js"></script>
    <!-- Javascript-->
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<div class="page">
    <!-- Main Navbar-->
    <header class="header">
        <nav class="navbar">
            <!-- Search Box-->
            <div class="search-box">
                <button class="dismiss"><i class="icon-close"></i></button>
                <form id="searchForm" action="#" role="search">
                    <input type="search" placeholder="Você está procurando por..." class="form-control">
                </form>
            </div>
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <!-- Navbar Header-->
                    <div class="navbar-header">
                        <!-- Navbar Brand --><a href="index.php" class="navbar-brand d-none d-sm-inline-block">
                            <div class="brand-text d-none d-lg-inline-block"><strong style="font-size:0.95em;">Dulce Cono</strong></div>
                            <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                    </div>
                    <!-- Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        
                        <!-- Logout    -->
                        <li class="nav-item"><a href="login.php" class="nav-link logout"> <span style="font-size: 0.84em" class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="img/avatar-<?php echo find_id($name_user); ?>.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h4><?php echo $_SESSION["loginUsername"] ?></h4>
                    <p style="font-size: .8em; text-align: center"><?php echo find_acc($name_user); ?></p>
                </div>
            </div>
            <!--          <img id='logo' style="display:block; margin-left: auto; margin-right: auto" src="img/logo-monaco.png" width="65%" class="rounded" alt="">-->
            <!-- Sidebar Navidation Menus--><span class="heading"></span>
            <ul class="list-unstyled">
                <li><a href="index.php"> <i class="icon-presentation"></i>Dashboard </a></li>


                <li><a href="#exampledropdownDropdown_cst" aria-expanded="false" data-toggle="collapse"> <i class="far fa-address-card"></i>Clientes </a>
                    <ul id="exampledropdownDropdown_cst" class="collapse list-unstyled ">
                        <li><a href="input_cli.php"><ion-icon name="checkbox-outline"></ion-icon> Registrar</a></li>
                        <li><a href="report_cli.php"><ion-icon name="checkbox-outline"></ion-icon> Información</a></li>
                        <!--                        <li><a href="#">Update</a></li>-->
                    </ul>
                </li>
                <li><a href="#exampledropdownDropdown_for" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-kaaba"></i>Proveedores </a>
                    <ul id="exampledropdownDropdown_for" class="collapse list-unstyled ">
                        <li><a href="input_for.php"><ion-icon name="checkbox-outline"></ion-icon> Registrar</a></li>
                        <li><a href="report_for.php"><ion-icon name="checkbox-outline"></ion-icon> Información</a></li>
                        <!--                        <li><a href="#">Update</a></li>-->
                    </ul>
                </li>
                <li><a href="#exampledropdownDropdown_prod" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-box"></i>Productos </a>
                    <ul id="exampledropdownDropdown_prod" class="collapse list-unstyled ">
                        <li><a href="input_prd.php"><ion-icon name="checkbox-outline"></ion-icon> Registrar</a></li>
                        <li><a href="report_prd.php"><ion-icon name="checkbox-outline"></ion-icon> Informe</a></li>
                    </ul>
                </li>
                <li><a href="#exampledropdownDropdown_fin" aria-expanded="false" data-toggle="collapse"> <i class="icon-home"></i>Almacenes </a>
                    <ul id="exampledropdownDropdown_fin" class="collapse list-unstyled ">
                        <li><a href="input_alm.php"><ion-icon name="checkbox-outline"></ion-icon> Registrar</a></li>
                        <li><a href="report_alm.php"><ion-icon name="checkbox-outline"></ion-icon> Informe</a></li>
                        <!--                        <li><a href="#">Update</a></li>-->
                    </ul>
                </li>
                <li><a href="#exampledropdownDropdown_pur" aria-expanded="false" data-toggle="collapse"> <i class="icon-presentation"></i>Compras </a>
                    <ul id="exampledropdownDropdown_pur" class="collapse list-unstyled ">
                        <li><a href="input_cpr.php"><ion-icon name="checkbox-outline"></ion-icon> Cadastrar</a></li>
                        <li><a href="report_cpr.php"><ion-icon name="checkbox-outline"></ion-icon> Relatório</a></li>
                        <!--                        <li><a href="#">Update</a></li>-->
                    </ul>
                </li><li><a href="#exampledropdownDropdown_pjt" aria-expanded="false" data-toggle="collapse"> <i class="icon-padnote"></i>Orçamentos </a>
                    <ul id="exampledropdownDropdown_pjt" class="collapse list-unstyled ">
                        <li><a href="input_orc.php"><ion-icon name="checkbox-outline"></ion-icon> Cadastrar</a></li>
                        <li><a href="report_orc.php"><ion-icon name="checkbox-outline"></ion-icon> Relatório</a></li>
                        <!--                        <li><a href="#">Update</a></li>-->
                    </ul>
                </li>
                <li><a href="charts.php"> <i class="fa fa-bar-chart"></i>Gráficos </a></li>
            <span class="heading" style="font-family: 'Bai Jamjuree'"><i class="fas fa-tasks"></i> Config</span>
            <ul class="list-unstyled">
                <li><a href="#exampledropdownDropdown_cfg" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-cogs"></i>Configurações </a>
                    <ul id="exampledropdownDropdown_cfg" class="collapse list-unstyled ">
                        <li><a href="parametros.php"><ion-icon name="checkbox-outline"></ion-icon> Parâmetros</a></li>
                    </ul>
                </li>
                <li><a href="login.php"> <i class="icon-screen"></i>Trocar Usuário </a></li>
            </ul>
        </nav>

        