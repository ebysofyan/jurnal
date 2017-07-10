<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hello World</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bs/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</head>
<body>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url() ?>bow" style="margin-left: 85px;">Jurnal Umum
                        &nbsp; <i
                                class="fa fa-circle-o-notch"></i></a>
                </div>
                <ul class="nav navbar-nav navbar-right" style="margin-right: 85px;">
                    <li class="<?php echo ($menu == 'jurnal') ? 'active' : '' ?>"><a
                                href="<?php echo site_url() ?>main">Jurnal &nbsp; <i
                                    class="fa fa-file-o"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Selamat Datang,
                            <b><?php echo $this->session->userdata('USERNAME') ?></b>
                            &nbsp; <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url() ?>user/profile">Profile <i class="fa fa-user pull-right"
                                                                                  style="padding: 6px;"></i></a></li>
                            <li><a href="<?php echo site_url() ?>user/dologout">Logout <i
                                            class="fa fa-sign-out pull-right" style="padding: 6px;"></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <div class="row">

