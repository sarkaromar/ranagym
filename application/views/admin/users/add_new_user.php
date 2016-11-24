<div class="content-wrapper">
    <section class="content-header">
        <h1>Add New User</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Add New User</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- link -->
        <div class="row">
            <!-- User list -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow-gradient">
                    <div class="inner">
                        <h3>Total <?php echo $total; ?> User</h3>
                    </div>
                    <a href="<?php echo site_url("users/user_list") ?>" class="small-box-footer">See List &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- add user -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua-gradient">
                    <div class="inner">
                        <h3>Add User</h3>
                    </div>
                    <a href="<?php echo site_url("users/add_new_user") ?>" class="small-box-footer">Add User &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- form -->
        <div class="row">
            <div class="col-md-12">
                <!-- box -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New User Form</h3>
                    </div><!-- /.box-header -->
                    <?php $gl = $this->session->flashdata('globalmsg');
                    if (!empty($gl)) { ?>
                        <!-- notice -->
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('globalmsg') ?></h5>
                        </div>
                    <?php } ?>
                    <!-- form -->
                    <?php echo form_open(site_url("users/add_new_user"), array("class" => "form-horizontal")) ?>
                        <div class="box-body">
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
                                    <input class="form-control" id="input_first_name" type="text"  value="<?php echo set_value('first_name'); ?>" placeholder="First Name" name="first_name" required>
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
                                <label for="input_last_name" class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="inputLastName" type="text" value="<?php echo set_value('last_name'); ?>" placeholder="Last Name (optional)" name="last_name">
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('last_name'); ?>
                                </span>
                            </div>
                            <!-- email -->
                            <?php 
                                if(form_error('email')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="inputemail" class="col-sm-2 control-label">Email<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="inputemail" type="email" value="<?php echo set_value('email'); ?>" placeholder="example@gmail.com" name="email" required>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('email'); ?>
                                </span>
                            </div>
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
                                    <input class="form-control" id="input_area" type="text" value="<?php echo set_value('area'); ?>" placeholder="Area/Town/City" name="area" required>
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
                                <label for="inputadd" class="col-sm-2 control-label">Address<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" id="inputadd" placeholder="Address" name="add" rows="3" required><?php echo set_value('add'); ?></textarea>
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
                                <label for="inputphn1" class="col-sm-2 control-label">Phone 1<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="inputphn1" type="text" value="<?php echo set_value('phn1'); ?>" placeholder="Phone Number" name="phn1" required>
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
                                <label for="inputphn2" class="col-sm-2 control-label">Phone 2</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="inputphn2" type="text" value="<?php echo set_value('phn2'); ?>" placeholder="Phone Number 2 (optional)" name="phn2">
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('phn2'); ?>
                                </span>
                            </div>
                            <!-- username -->
                            <?php 
                                if(form_error('username')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="inputusername" class="col-sm-2 control-label">User Name<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="inputusername" type="text" value="<?php echo set_value('username'); ?>" placeholder="User Name" name="username" required>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('username'); ?>
                                </span>
                            </div>
                            <!-- pass -->
                            <?php 
                                if(form_error('password')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="inputPassword" class="col-sm-2 control-label">Password<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="inputPassword" type="password" value="" placeholder="Password" name="password" required>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('password'); ?>
                                </span>
                            </div>
                            <!-- con pass -->
                            <?php 
                                if(form_error('con_password')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="inputConassword" class="col-sm-2 control-label">Confirm Password<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="inputConassword" type="password" value="" placeholder="Confirm Password" name="con_password" required>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('con_password'); ?>
                                </span>
                            </div>
                            <!--  level -->
                            <?php 
                                if(form_error('user_level')){ 
                                    echo "<div class='form-group has-error' >";
                                }else{    
                                    echo "<div class='form-group' >";
                                } 
                            ?>
                                <label for="inputuserlevel" class="col-sm-2 control-label">Level<sup>*</sup></label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="user_level">
                                        <option value="0">Manager</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Super Admin</option>
                                    </select>
                                </div>
                                <span class="help-block">
                                    <?php echo form_error('user_level'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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