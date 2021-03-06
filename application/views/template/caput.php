<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Zafishop | <?=$title?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link href="<?php echo base_url() ?>aset/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
          <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/bootstrap-datepicker3.css">
        <link href="<?php echo base_url() ?>aset/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>aset/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>aset/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>aset/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>aset/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url() ?>aset/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url() ?>aset/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url() ?>aset/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url() ?>aset/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url() ?>aset/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>aset/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url() ?>aset/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />


        <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/jquery-ui.css">

        <style>
            .ui-autocomplete-loading {
              background: url('<?php echo base_url() ?>aset/ui-anim_basic_16x16.gif') no-repeat right center
            }
        </style>



        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
        <!-- DATATABLES -->


        <!-- <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/bootstrap-datepicker3.css">

        <script src="<?php echo base_url() ?>aset/js/jquery-2.2.3.min.js"></script>
        <script src="<?php echo base_url() ?>aset/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>aset/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>aset/js/respond.min.js"></script>
        <script src="<?php echo base_url() ?>aset/js/jquery-ui.js"></script>
        <script src="<?php echo base_url() ?>aset/locales/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>
        <script src="<?php echo base_url() ?>aset/js/bootstrap-datepicker.min.js"></script>
 -->
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.html">
                            <img src="<?php echo base_url() ?>aset/img/logo_new.png" alt="logo" class="logo-default" height="75" width="170" style="margin-top: auto; margin-bottom: auto">
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- END TODO DROPDOWN -->
                            <li class="droddown dropdown-separator">
                                <span class="separator"></span>
                            </li>
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar9.jpg">
                                    <span class="username username-hide-mobile">Nick</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?=site_url()?>/login">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                    <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                    <div class="hor-menu hor-menu-light">
                        <ul class="nav navbar-nav">
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="javascript:;"> Home
                                    <span class="arrow"></span>
                                </a>
                                
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown active">
                                <a href="javascript:;"> Master Data
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class=" ">
                                        <a href="<?=site_url()?>/akunsatu" class="nav-link  "> Data kelompok akun </a>
                                    </li>
                                    <li class=" ">
                                        <a href="<?=site_url()?>/akundua" class="nav-link  "> Data akun </a>
                                    </li>
                                    <li class=" ">
                                        <a href="<?=site_url()?>/saldoawal" class="nav-link  "> Data saldo awal </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="<?=site_url()?>/jurnal"> Jurnal
                                    <span class="arrow"></span>
                                </a>
                            </li>

                            <li class="menu-dropdown classic-menu-dropdown">
                                <a href="javascript:;"> Laporan
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class=" ">
                                        <a href="layout_mega_menu_light.html" class="nav-link  "> Laporan Rugi Laba </a>
                                    </li>
                                    <li class=" ">
                                        <a href="layout_top_bar_light.html" class="nav-link  "> Laporan Arus Kas </a>
                                    </li>
                                    <li class=" ">
                                        <a href="layout_fluid_page.html" class="nav-link  "> Laporan Perubahan Modal </a>
                                    </li>
                                    <li class=" ">
                                        <a href="layout_fluid_page.html" class="nav-link  "> Laporan Neraca </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->