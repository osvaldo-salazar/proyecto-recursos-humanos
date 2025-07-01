<?php
ini_set('display_errors',1);
error_reporting(0);
session_start();
ini_set('default_charset', 'utf-8');
?>

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
<div id="layout-wrapper">

<header id="page-topbar">
    <div class="d-flex">
        <div class="navbar-brand-box text-center">
            <a href="main.php" class="logo logo-light">
                <span class="logo-sm">
                    <img src="assets/images/logo.png" alt="" height="32">
                </span>
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="" height="50">
                </span>
            </a>
            <a href="main.php" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="assets/images/logo.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="" height="32">
                </span>
            </a>
        </div>

        <div class="navbar-header">    
            <button type="button" class="button-menu-mobile waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button> 
            <div class="d-flex ms-auto">
                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input form-control" placeholder="Search">
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user me-2" src="assets/images/users/avatar-1.jpg" alt="Header Avatar"> 
                        <span class="d-none d-md-inline-block ms-1"><?php echo $_SESSION['nomUsuario'] ?><i class="mdi mdi-chevron-down"></i> </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item text-danger" href="index.php"><i class="dripicons-power-off font-size-16 align-middle me-1 text-danger"></i> Cerrar Sesi¨®n</a>
                    </div>
                </div>

            </div>
        </div>    
    </div>    
</header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">

                            <li class="menu-title">IACSA-CAEP</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-shopping-bag"></i>
                                    <span>Empleados</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                <li><a href="crear-empleados.php">Crear Empleados</a></li>
                                <li><a href="lista-empleados.php">Listas Empleados</a></li>
                                </ul>
                            </li>

                            <?php if($_SESSION["tipo"] ==1){ ?>

                            <li class="menu-title">Configuraciones</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-card"></i>
                                    <span>Administrar</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="crearDepartamentos.php">Departamentos</a></li>
                                    <li><a href="crearPuesto.php">Puestos</a></li>
                                    <li><a href="gradoAcademico.php">Grados Acad¨¦micos</a></li>
                                    <li><a href="categoria.php">Categor¨ªas</a></li>
                                    <li><a href="subcategoria.php">Sub Categor¨ªas</a></li>
                                    <li><a href="toeic.php">Toeic</a></li>
                                </ul>
                            </li>

                            <?php } ?>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

