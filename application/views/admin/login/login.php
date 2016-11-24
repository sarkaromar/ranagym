<div class="login-box">
    <div class="login-logo">
        <!-- page header -->
        <a href="<?php echo base_url(); ?>"><b style="color:#fff;font-size:60px;"><?php echo $this->settings->info->site_name ?></b></a>
    </div>
    <div class="login-box-body" style="box-shadow: 0px 0px 20px 5px;">
        <!-- notice -->
        <p class="login-box-msg">Hi Admin!</p>
        <!-- form -->
        <?php echo form_open(site_url("login/loginCheck")) ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="<?php echo lang("ctn_179") ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="pass" class="form-control" placeholder="<?php echo lang("ctn_180") ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> &nbsp; Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
                </div>
            </div>
        <?php echo form_close() ?>
        <!-- <a href="<?php //echo site_url("login/forgotpw") ?>"><?php //echo lang("ctn_181") ?></a> -->
        <h4>Email: super_admin@test.com</h4>
        <h4>Pass: super_admin</h4>
    </div>
</div>