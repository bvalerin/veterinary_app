<?php
$user_session = session();
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="<?= base_url() ?>/Img/logos.jpeg" class="brand-image img-circle elevation-6" style="opacity: .8">
        <span class="brand-text font-weight-light">Veterinaria del sur</span>
        <i class="nav-icon fas fa-cat"></i>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-header">Clientes</li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/clientes" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Clientes
                        </p>
                    </a>
                </li>

                <li class="nav-header">Agenda</li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/agendamiento/indexTotal" class="nav-link">
                        <i class="nav-icon fas fa-calendar-plus"></i>
                        <p>
                            Agendamiento del dia
                        </p>
                    </a>
                </li>

                <li class="nav-header">Usuario</li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/veterinarios" class="nav-link">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Veterinarios
                        </p>
                    </a>
                </li>

                <li class="nav-header">Animal</li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/razas" class="nav-link">
                        <i class="nav-icon fas fa-paw"></i>
                        <p>
                            Razas
                        </p>
                    </a>
                </li>

                <li class="nav-header">Servicios</li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/servicios" class="nav-link">
                        <i class="nav-icon fas fa-file-medical-alt"></i>
                        <p>
                            Servicios
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">