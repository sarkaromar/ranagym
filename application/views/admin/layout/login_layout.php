<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->settings->info->site_name ?></title>
        
        <link rel="icon" href="<?php echo base_url(); ?>theme/admin/icon.png" type="image/gif" sizes="32x32"> 
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/extra/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/extra/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/plugins/iCheck/square/blue.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/css/custom.css">
        
        <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>theme/admin/extra/html5shiv.min.js"></script>
        <script src="<?php echo base_url(); ?>theme/admin/extra/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page" style="background-image:url('theme/admin/images/login.jpg'); background-size: cover;">
        <?php $gl = $this->session->flashdata('globalmsg'); ?>
        <?php if(!empty($gl)) :?>
            <!-- global message -->
            <div class="container projects-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success"><b><span class="glyphicon glyphicon-ok"></span></b> <?php echo $this->session->flashdata('globalmsg') ?></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php echo $content; ?>
        <script src="<?php echo base_url(); ?>theme/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo base_url(); ?>theme/admin/bootstrap/js/bootstrap.min.js"></script> 
        <script src="<?php echo base_url(); ?>theme/admin/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%'
                });
            });
        </script>
    </body>
</html>