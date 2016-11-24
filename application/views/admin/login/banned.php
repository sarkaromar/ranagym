<div class="form-login">
    <h2 class="form-login-heading-error"><?php echo lang("error_2") ?></h2>
    <div class="login-wrap">
        <div class="form-group has-feedback">
            <div class="centered">
                <?php $bm = $this->session->flashdata('banned_msg'); ?>
                <?php if (!empty($bm)) : ?>
                    <?php echo $this->session->flashdata('banned_msg') ?>
                <?php endif; ?>
            </div>
        </div>
        <button class="btn btn-danger" onclick="window.history.back()" ><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo lang("ctn_135") ?></button>
    </div>
</div>