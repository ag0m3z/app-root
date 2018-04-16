<?php
use core\Session;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="src/css/app.css">
    <link rel="stylesheet" href="src/css/skins.css">
</head>
<body class="skin-siac fixed  sidebar-mini">

<header class="main-header">
    <!-- Logo -->
    <a href="#" onclick="location.reload()" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SIAC</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><i class="fa fa-balance-scale"></i> SIAC</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar  navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"></span>
        </a>
        <div class="navbar-custom-menu ">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown hidden ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-clock-o animated flip  "></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa text-green fa-bold"></i> Baño</a></li>
                        <li><a href="#"><i class="fa text-green fa-cutlery"></i> Comida</a></li>
                        <li><a href="#"><i class="fa text-warning fa-eye"></i> Ver Estados</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o animated  flip  "></i>
                        <span id="alert_bell" class="label label-danger">0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header text-bold">Existencias Bajas</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul id="list_bell" class="menu">
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="Pantalla Completa"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class=" user user-menu">
                    <a href="#" >
                        <i class="fa fa-user"></i> <?=Session::get('DataLogin','nombre') ?>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

</header>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active"><a href="#" ><i class="fa fa-dashboard  "></i> <span>Dashboard</span></a></li>

            <li><a href="#" id="menu_mesas" ><i class="fa fa-bullseye"></i> <span>Mesas</span></a></li>
            <li><a href="#" ><i class="fa fa-bicycle"></i> <span> Pedidos</span></a></li>
            <li><a href="#" ><i class="fa fa-dollar"></i> <span>Caja</span></a></li>
            <li><a href="#" ><i class="fa fa-money"></i> <span>Compras</span></a></li>
            <li><a href="#" ><i class="fa fa-table"></i> <span>Inventario</span></a></li>
            <li><a href="#" ><i class="fa fa-line-chart"></i> <span>Reportes</span></a></li>
            <li><a href="#" ><i class="fa fa-list-alt"></i> <span>Catalogos</span></a></li>

            <li><a href="#" ><i class="fa fa-gears"></i> <span>Configuración</span></a></li>
            <li><a href="#" id="menu_salir" ><i class="fa fa-close text-red"></i><span>Salir</span> </a> </li>
        </ul>
    </section>
</aside>

<div class="wrapper">
    <div class="content-wrapper">
        <section id="app-root" class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <?=var_dump($_SESSION)?>
                    </div>
                </div>
            </div>

        </section>
    </div>

</div>

<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="plugins/jQueryUI/jquery-ui2.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="src/js/iKroAnimate.js"></script>
<script src="src/js/app-theme.js"></script>
<script src="src/js/app.js"></script>

</body>
</html>