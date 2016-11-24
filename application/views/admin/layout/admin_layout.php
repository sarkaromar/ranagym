<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php if (isset($title['title'])) echo $title['title'] ?> || <?php echo $this->settings->info->site_name; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="author" content="Mostafijur Rahman Rana">
        
        <link rel="icon" href="<?php echo base_url(); ?>theme/admin/icon.png" type="image/gif" sizes="32x32"> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/extra/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <?php echo $cssincludes ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/admin/css/custom.css">

        <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>theme/admin/extra/html5shiv.min.js"></script>
        <script src="<?php echo base_url(); ?>theme/admin/extra/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="sidebar-mini skin-blue fixed">
        <div class="wrapper">
            <!-- header  -->
            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo site_url(); ?>" class="logo">
                    <span class="logo-mini"><b><?php echo $this->settings->info->site_name ?></b></span>
                    <span class="logo-lg"><b><?php echo $this->settings->info->site_name ?></b></span>
                </a>
                <!-- header navbar -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- user account -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url(); ?>uploads/admin/img/profile/<?php echo $this->user->info->avatar ?>" class="user-image" alt="<?php echo $this->user->info->avatar ?>">
                                    <span class="hidden-xs"><?php echo $this->user->info->first_name . ' ' . $this->user->info->last_name ?> &nbsp; As &nbsp;
                                        <?php if($this->user->info->user_level == 0){
                                            echo '<span class="label label-primary">Manager</span>';
                                        }elseif($this->user->info->user_level == 1){
                                            echo '<span class="label label-warning">Admin</span>';
                                        }elseif($this->user->info->user_level == 2){
                                            echo '<span class="label label-success">Super Admin</span>';
                                        } ?>
                                    </span>        
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>uploads/admin/img/profile/<?php echo $this->user->info->avatar ?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $this->user->info->first_name . ' ' . $this->user->info->last_name ?>
                                            <small><?php echo $this->user->info->email ?></small>
                                            <b><?php echo $this->user->info->username ?></b>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo site_url("my_profile") ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url("login/logout/" . $this->security->get_csrf_hash()) ?>" class="btn btn-default btn-flat"><?php echo lang("ctn_149") ?></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column -->
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <!-- dashboard -->
                        <li class="<?php if (isset($activeLink['dashboard']['dashboard'])) echo "active" ?>">
                            <a href="<?php echo site_url(); ?>" >
                                <i class="fa fa-fw fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- members -->
                        <li class="<?php if (isset($activeLink['members']['members'])) echo "active" ?>">
                            <a href="<?php echo site_url("members/member_list") ?>" >
                                <i class="fa fa-fw fa-users"></i>
                                <span>Gym Members</span>
                            </a>
                        </li>
                        <!-- payment -->
                        <li class="<?php if (isset($activeLink['pay']['pay'])) echo "active" ?>">
                            <a href="<?php echo site_url("view_payment/add_fee") ?>" >
                                <i class="fa fa-fw fa-money"></i>
                                <span>View Payment</span>
                            </a>
                        </li>
                        <!-- users -->
                        <li class="<?php if (isset($activeLink['users']['users'])) echo "active" ?>">
                            <a href="<?php echo site_url("users/user_list") ?>" >
                                <i class="fa fa-fw fa-users"></i>
                                <span>Site Users</span>
                            </a>
                        </li>
                        <!-- profile -->
                        <li class="<?php if (isset($activeLink['my_profile']['my_profile'])) echo "active" ?>" >
                            <a href="<?php echo site_url("my_profile") ?>" >
                                <i class="fa fa-fw fa-user"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <?php if($this->user->loggedin && $this->user->info->user_level == 2) : ?>
                        <!-- site settings -->
                        <li class="<?php if (isset($activeLink['app_settings']['app_settings'])) echo "active" ?>" >
                            <a href="<?php echo site_url("app_settings") ?>" >
                                <i class="fa fa-fw fa-wrench"></i>
                                <span>Application Settings</span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </section>
            </aside>
            <?php echo $content; ?>
            <footer class="main-footer">
                <strong>Developed by</strong> <a href="http://www.mostafijur-rahman.com/" target="_blank" >Mostafijur Rahman</a> || &nbsp;<strong>Version</strong> 1.0.0
                <marquee style="color: red; font-size: 16px; font-weight: 600; margin: 0px; padding: 0px;">It's a demo version of this software, If you want to buy this software please contact with me. Phone - +880 1914-088-503</marquee>
            </footer>
        </div>
        <!-- ./wrapper -->
        <script src="<?php echo base_url(); ?>theme/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo base_url(); ?>theme/admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>theme/admin/dist/js/app.min.js"></script>
        <?php echo $jsincludes; ?> <br />
        <script src="<?php echo base_url(); ?>theme/admin/dist/js/demo.js"></script>
    </body>
</html>