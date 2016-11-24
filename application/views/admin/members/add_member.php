<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Member</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Add Member</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- link -->
        <div class="row">
            <!-- member list -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow-gradient">
                    <div class="inner">
                        <h3><?php echo $member_total; ?> Members</h3>
                    </div>
                    <a href="<?php echo site_url("members/member_list") ?>" class="small-box-footer">See Member List &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- add new member -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua-gradient">
                    <div class="inner">
                        <h3>Add Member</h3>
                    </div>
                    <a href="<?php echo site_url("members/add_member") ?>" class="small-box-footer">Add Members &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- Remove list -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red-gradient">
                    <div class="inner">
                        <h3><?php echo $remove_total; ?> Members</h3>
                    </div>
                    <a href="<?php echo site_url("members/remove_list") ?>" class="small-box-footer">See Remove List &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- add member -->
        <div class="row">
            <div class="col-md-12">
                <!-- box -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Member</h3>
                    </div><!-- /.box-header -->
                    <?php $gl = $this->session->flashdata('globalmsg');
                    if (!empty($gl)) { ?>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <!-- notice -->
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('globalmsg') ?></h5>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- form -->
                    <?php echo form_open(site_url("members/add_member"), array("class" => "form-horizontal")) ?>
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
                                <div class="col-sm-4">
                                    <input class="form-control" id="input_mem_id" type="text" value="<?php echo set_value('mem_id'); ?>" placeholder="12345" name="mem_id" maxlength="5" required>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('mem_id'); ?>
                                </span>
                            </div>
                            <!-- first name -->
                            <?php 
                                if(form_error('first_name')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="input_first_name" class="col-sm-2 control-label">First Name<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="input_first_name" type="text" value="<?php echo set_value('first_name'); ?>" placeholder="First Name" name="first_name" maxlength="30" required>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('first_name'); ?>
                                </span>
                            </div>
                            <!-- last name -->
                            <?php 
                                if(form_error('last_name')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="input_last_name" class="col-sm-2 control-label">Last Name<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="input_last_name" type="text" value="<?php echo set_value('last_name'); ?>" placeholder="Last Name" name="last_name" maxlength="20" required>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('last_name'); ?>
                                </span>
                            </div>
                            <!-- gender -->
                            <?php 
                                if(form_error('gen')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="input_gen" class="col-sm-2 control-label">Gender <sup>*</sup></label>
                                <div class="col-sm-4">
                                    <div class="radio">
                                        <label>
                                            <input name="gen" value="Male" type="radio"  id="gen" /> Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="gen" value="Female" type="radio" id="gen" /> Female
                                        </label>
                                    </div>  
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('gen'); ?>
                                </span>
                            </div>
                            <!--  blood group -->
                            <?php 
                                if(form_error('bld_grp')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="input_bld_grp" class="col-sm-2 control-label">Blood Group<sup>*</sup></label>
                                <div class="col-sm-3">
                                    <select name="bld_grp" id="bld_grp" class="form-control selectpicker" data-bv-field="bld_grp">
                                        <option selected>Please Select</option>
                                        <option value="A -">A -</option>
                                        <option value="A +">A +</option>
                                        <option value="B -">B -</option>
                                        <option value="B +">B +</option>
                                        <option value="AB -">AB -</option>
                                        <option value="AB +">AB +</option>
                                        <option value="o -">o -</option>
                                        <option value="o +">o +</option>
                                    </select>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('bld_grp'); ?>
                                </span>
                            </div>
                            <!-- birth -->
                            <?php 
                                if(form_error('birth')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="input_birth" class="col-sm-2 control-label">Birth Date<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="birth" id="datepicker_birth" class="form-control pull-right" value="<?php echo set_value('birth'); ?>" placeholder="dd/mm/yy" required >
                                    </div>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('birth'); ?>
                                </span>
                            </div>
                            <hr />
                            <!-- area -->
                            <?php 
                                if(form_error('area')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="input_area" class="col-sm-2 control-label">Area/Town/City<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="input_area" type="text" value="<?php echo set_value('area'); ?>" placeholder="Area/Town/City" name="area" maxlength="40" required>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('area'); ?>
                                </span>
                            </div>
                            <!-- address -->
                            <?php 
                                if(form_error('add')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="input_add" class="col-sm-2 control-label">Address<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" id="input_add" placeholder="Address" name="add" rows="3" maxlength="200" required><?php echo set_value('add'); ?></textarea>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('add'); ?>
                                </span>
                            </div>
                            <!-- phone1 -->
                            <?php 
                                if(form_error('phn1')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="input_phn1" class="col-sm-2 control-label">Phone 1<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="input_phn1" type="text" value="<?php echo set_value('phn1'); ?>" placeholder="Phone Number" name="phn1" maxlength="15" required>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('phn1'); ?>
                                </span>
                            </div>
                            <!-- phone2 -->
                            <?php 
                                if(form_error('phn2')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="input_phn2" class="col-sm-2 control-label">Phone 2</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="input_phn2" type="text" value="<?php echo set_value('phn2'); ?>" placeholder="Phone Number (optional)" maxlength="15" name="phn2" >
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('phn2'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary">Add Member</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div><!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->