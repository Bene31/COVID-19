<?php
if(!isset($_SESSION['usuario_covid_logado'])){
    echo '<meta http-equiv="refresh" content="0; URL='."$url_base".'/login"/>';
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel administrativo - COVID 19</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $url_base ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $url_base ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $url_base ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo $url_base ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo $url_base ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url_base ?>/assets/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo $url_base ?>/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo $url_base ?>/assets/css/dropzone.css">
    <link rel="stylesheet"
        href="<?php echo $url_base ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo $url_base ?>/assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo $url_base ?>/assets/plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url_base ?>/assets/css/style.css">
    <style type="text/css">
        div#add_foto, button#button_finalizar{display: none;}
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
 
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-tie"></i> <?php echo $_SESSION['usuario_covid_logado']['nome'];?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"></span>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo $url_base ?>/login/logout" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i> Sair do sistema
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer"></a>
                    </div>
                </li>
            </ul>
        </nav>