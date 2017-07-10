<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hello World</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <!--    <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--assets/css/styles.css">-->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bs/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</head>
<body>

<div class="row" style="margin-top: 12%">
    <div class="col-md-4 col-md-offset-4">
        <?php echo $this->session->flashdata('msg') ?
            '<div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            ' . $this->session->flashdata('msg') . '
                        </div>
                        ' : '' ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Login Yaaa</h4>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url() ?>user/dologin" method="post">
                    <div class="form-group">
                        <label for="" class="control-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary pull-right" type="submit">Login <i class="fa fa-sign-in"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<footer></footer>
</html>