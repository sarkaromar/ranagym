<div class="content-wrapper">
    <section class="content-header">
        <h1>Payment Settings</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Payment Settings</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- app settings -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua-gradient">
                    <div class="inner">
                        <h3>Settings</h3>
                    </div>
                    <a href="<?php echo site_url("app_settings") ?>" class="small-box-footer">See Settings &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- pay settings -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <h3>Payment</h3>
                    </div>
                    <a href="<?php echo site_url("app_settings/pay_settings") ?>" class="small-box-footer">See Settings &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- black ip list -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red-gradient">
                    <?php if(empty($total)) : ?>
                    <div class="inner">
                        <h3>No IP address</h3>
                    </div>
                    <?php else: ?>
                    <div class="inner">
                        <h3><?php echo $total; ?> IP</h3>
                    </div>
                    <?php endif; ?>
                    <a href="<?php echo site_url("app_settings/ip_black_list") ?>" class="small-box-footer">See List &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php $gl = $this->session->flashdata('globalmsg');
                if (!empty($gl)) {
                    ?>
                    <!-- notice -->
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('globalmsg') ?></h5>
                    </div>
                <?php } ?>
                <!-- box -->
                <div class="box box-default">
                    <?php echo form_open_multipart(site_url("app_settings/pay_settings"), array("class" => "form-horizontal")) ?>
                    <div class="box-header with-border">
                        <h3 class="box-title">Payment Settings</h3>
                        <button type="submit" class="btn btn-success pull-right">Update Settings</button>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- admission fee -->
                        <div class="form-group">
                            <label for="adm_amount" class="col-sm-2 control-label">Admission Fee (BDT)</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="adm_amount" name="adm_amount" placeholder="1234567" value="<?php echo $this->settings->info->adm_amount; ?>" maxlength="7" required>
                                <span class="help-block">Amount of admission fee</span>
                            </div>
                        </div>
                        <!-- monthly fee -->
                        <div class="form-group">
                            <label for="month_amount" class="col-sm-2 control-label">Monthly Fee (BDT)</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="month_amount" name="month_amount" placeholder="1234567" value="<?php echo $this->settings->info->month_amount ?>" maxlength="7" required>
                                <span class="help-block">Amount of monthly fee.</span>
                            </div>
                        </div>
                    </div>
                <?php echo form_close() ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->