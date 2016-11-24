<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Fee</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Add Fee</li>
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
        <?php $gl = $this->session->flashdata('globalmsg'); $gl_tab = $this->session->flashdata('globalmsg_tab');
        if (!empty($gl)) { ?>
        <!-- notice -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('globalmsg') ?></h5>
            </div>
        </div>
        <?php } ?>
        <?php if (!empty($gl_tab)) { ?>
        <!-- notice -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('globalmsg_tab') ?></h5>
            </div>
        </div>
        <?php } ?>
        <!-- fee -->
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="<?php if(!empty($gl_tab)){ echo""; }else{ echo"active"; } ?>"><a aria-expanded="true" href="#month" data-toggle="tab">Monthly Fee</a></li>
                            <li class="<?php if(!empty($gl_tab)){ echo"active"; }else{ echo""; } ?>"><a aria-expanded="false" href="#adm" data-toggle="tab">Admission Fee</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- monthly fee tab -->
                            <div class="tab-pane <?php if(!empty($gl_tab)){ echo""; }else{ echo"active"; } ?>" id="month">
                                <?php echo form_open(site_url("view_payment/add_mothly_fee"), array("class" => "form-horizontal")) ?>
                                    <div class="box-body">
                                        <!-- current fee -->
                                        <div class="form-group">
                                            <label for="mon_fee" class="col-sm-2 control-label">Monthly Fee</label>
                                            <div class="col-sm-2">
                                                <input type="hidden" name="mon_fee" value="<?php echo $this->settings->info->month_amount; ?>" required>
                                                <label for="fee" class="control-label">BDT <?php echo $this->settings->info->month_amount; ?></label>
                                            </div>
                                        </div>
                                        <!-- member id -->
                                        <?php 
                                            if(form_error('mem_id')){ 
                                                echo "<div class='form-group has-error' >";
                                            }else{    
                                                echo "<div class='form-group' >";
                                            } 
                                        ?>
                                            <label for="mem_id" class="col-sm-2 control-label">Member ID<sup>*</sup></label>
                                            <div class="col-sm-2">
                                                <input class="form-control" id="mem_id" type="text" placeholder="12345" name="mem_id" maxlength="5" required>
                                            </div>
                                            <span class="help-block">
                                                <?php echo form_error('mem_id'); ?>
                                            </span>
                                        </div>
                                        <!--  month -->
                                        <?php 
                                            if(form_error('month')){ 
                                                echo "<div class='form-group has-error' >";
                                            }else{    
                                                echo "<div class='form-group' >";
                                            } 
                                        ?>
                                            <label for="input_month" class="col-sm-2 control-label">Month<sup>*</sup></label>
                                            <div class="col-sm-2">
                                                <select name="month" class="form-control selectpicker" required>
                                                    <option selected>Please select</option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                    
                                                </select>
                                            </div>
                                            <span class="help-block">
                                                <?php echo form_error('month'); ?>
                                            </span>
                                        </div>
                                        <!-- year -->
                                        <?php 
                                            if(form_error('year')){ 
                                                echo "<div class='form-group has-error' >";
                                            }else{    
                                                echo "<div class='form-group' >";
                                            } 
                                        ?>
                                            <label for="year" class="col-sm-2 control-label">Year<sup>*</sup></label>
                                            <div class="col-sm-2">
                                                <input class="form-control" id="year" type="text" placeholder="2016" value="<?php echo date('Y'); ?>" name="year" maxlength="4" required>
                                            </div>
                                            <span class="help-block">
                                                <?php echo form_error('year'); ?>
                                            </span>
                                        </div>
                                        <!-- Amount -->
                                        <?php 
                                            if(form_error('amount')){ 
                                                echo "<div class='form-group has-error' >";
                                            }else{    
                                                echo "<div class='form-group' >";
                                            } 
                                        ?>
                                            <label for="amount" class="col-sm-2 control-label">Amount (BDT)</label>
                                            <div class="col-sm-2">
                                                <input class="form-control" id="amount" type="text" value="<?php echo $this->settings->info->month_amount; ?>" placeholder="Paid Amount" name="mon_paid" maxlength="7" >
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" id="amount" type="text" value="0" placeholder="Due amount" name="mon_due" maxlength="7" >
                                            </div>
                                            <span class="help-block">
                                                <?php echo form_error('amount'); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <div class="form-group">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary">Add Fee</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                            <!-- admission fee tab -->
                            <div class="tab-pane <?php if(!empty($gl_tab)){ echo"active"; }else{ echo""; } ?>" id="adm">
                                <?php echo form_open(site_url("view_payment/add_adm_fee"), array("class" => "form-horizontal")) ?>
                                    <div class="box-body">
                                        <!-- fee -->
                                        <div class="form-group">
                                            <label for="adm_fee" class="col-sm-2 control-label">Admission Fee</label>
                                            <div class="col-sm-2">
                                                <input type="hidden" name="adm_fee" value="<?php echo $this->settings->info->adm_amount; ?>" required>
                                                <label for="adm_fee" class="control-label">BDT <?php echo $this->settings->info->adm_amount; ?></label>
                                            </div>
                                        </div>
                                        <!-- member id -->
                                        <?php 
                                            if(form_error('mem_id')){ 
                                                echo "<div class='form-group has-error' >";
                                            }else{    
                                                echo "<div class='form-group' >";
                                            } 
                                        ?>
                                            <label for="input_mem_id" class="col-sm-2 control-label">Member ID<sup>*</sup></label>
                                            <div class="col-sm-2">
                                                <input class="form-control" id="input_mem_id" type="text" placeholder="12345" name="mem_id" maxlength="5" required>
                                            </div>
                                            <span class="help-block">
                                                <?php echo form_error('mem_id'); ?>
                                            </span>
                                        </div>
                                        <!-- Amount -->
                                        <?php 
                                            if(form_error('amount')){ 
                                                echo "<div class='form-group has-error' >";
                                            }else{    
                                                echo "<div class='form-group' >";
                                            } 
                                        ?>
                                            <label for="amount" class="col-sm-2 control-label">Amount (BDT)</label>
                                            <div class="col-sm-2">
                                                <input class="form-control" id="amount" type="text" value="<?php echo $this->settings->info->adm_amount; ?>" placeholder="Paid Amount" name="adm_paid" maxlength="7" >
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" id="amount" type="text" value="0" placeholder="Due amount" name="adm_due" maxlength="7" >
                                            </div>
                                            <span class="help-block">
                                                <?php echo form_error('amount'); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <div class="form-group">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary">Add Fee</button>
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