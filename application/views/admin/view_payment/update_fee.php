<div class="content-wrapper">
    <section class="content-header">
        <h1>Update Fee</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Update Fee</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- link -->
        <div class="row">
            <!-- add fee -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua-gradient">
                    <div class="inner">
                        <h3>Add Fee</h3>
                    </div>
                    <a href="<?php echo site_url("view_payment/add_fee") ?>" class="small-box-footer">Add Fee &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- fee report -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow-gradient">
                    <div class="inner">
                        <h3>Fee Report</h3>
                    </div>
                    <a href="<?php echo site_url("view_payment/fee_report") ?>" class="small-box-footer">Fee Report &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- update fee -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua-gradient">
                    <div class="inner">
                        <h3>Update Fee</h3>
                    </div>
                    <a href="<?php echo site_url("view_payment/update_fee") ?>" class="small-box-footer">Update Fee &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- fee report -->
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a aria-expanded="true" href="#mem_id" data-toggle="tab">Update Fee by ID</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="mem_id">
                                <?php echo form_open(site_url("view_payment/update_fee"), array("class" => "form-horizontal")) ?>
                                    <div class="box-body">
                                        <!-- member id -->
                                        <?php 
                                            if(form_error('mem_id')){ 
                                                echo "<div class='form-group has-error' >";
                                            }else{    
                                                echo "<div class='form-group' >";
                                            } 
                                        ?>
                                            <label for="input_mem_id" class="col-sm-2 control-label">Member ID<sup>*</sup></label>
                                            <div class="col-sm-3">
                                                <input class="form-control" id="input_mem_id" type="text" value="<?php echo set_value('mem_id'); ?>" placeholder="12345" name="mem_id" maxlength="5" required>
                                            </div>
                                            <span class="help-block">
                                                <?php echo form_error('mem_id'); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <div class="form-group">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary">See Report & Update</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>