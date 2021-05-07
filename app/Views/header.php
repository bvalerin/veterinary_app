<?php
$user_session = session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veterinaria del sur</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/Css/fonts.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/Css/css/all.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/Css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/Css/responsive.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/Css/adminlte.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/Css/select2-bootstrap4-theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/Css/select2.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?php echo base_url(); ?>/Img/logo.png" alt="AdminLTELogo" height="250" width="250">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item dropdown" id="nav_usuario">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo base_url(); ?>/img/undraw_profile.svg" width="30" height="30" class="img-fluid img-circle">
                        <span>Dr.<?php echo $user_session->nombre; ?> <?php echo $user_session->apellido; ?></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>/veterinarios/profile""><i class=" fas fa-user"></i> Informacion</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>/veterinarios/cambio_password"><i class="fas fa-key"></i> Cambiar contraseña</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>/veterinarios/logout"><i class=" fas fa-user-times"></i> Cerrar sesion</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->