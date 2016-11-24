<div class="content-wrapper">
    <section class="content-header">
        <h1>User Details</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">User Details</li>
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
        <div class="row">
            <!-- profile left -->
            <div class="col-md-6">
                <?php $gl = $this->session->flashdata('globalmsg');
                    if (!empty($gl)) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('globalmsg') ?></h5>
                        </div>
                <?php } ?>
                <div class="box box-widget widget-user-2">
                    <div class="widget-user-header bg-blue">
                        <a data-toggle="modal" href="#up_info<?php echo $user->id; ?>">
                            <i class="fa fa-pencil-square-o" style="float:right; color:#fff;" data-toggle="tooltip" data-placement="left" title="" data-original-title="Upadte info"></i>
                        </a>
                        <a data-toggle="modal" href="#up_img<?php echo $user->id; ?>">
                            <i class="fa fa-picture-o" style="float:right; color:#fff;  margin-right: 8px;" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update Profile Image"></i>
                        </a>
                        <div class="widget-user-image">
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>uploads/admin/img/profile/<?php  echo $user->avatar;  ?>" alt="<?php echo $user->first_name . ' ' . $user->last_name; ?>">
                        </div>
                        <h3 class="widget-user-username"><?php echo $user->first_name . ' ' . $user->last_name; ?></h3>
                        <h5 class="widget-user-desc">
                            <?php echo $user->username; ?> - 
                            <?php if($user->user_level == 0){
                                echo '<span class="label label-primary">Manager</span>';
                            }elseif($user->user_level == 1){
                                echo '<span class="label label-warning">Admin</span>';
                            }elseif($user->user_level == 2){
                                echo '<span class="label label-success">Super Admin</span>';
                            }elseif($user->user_level == -1){
                                echo '<span class="label label-danger">Banned</span>';
                            } ?>
                        </h5>
                    </div>
                    <div class="box-footer no-padding">
                        <div class="box-body">
                            <strong><i class="fa fa-envelope margin-r-5"></i>  Email</strong>
                            <p class="text-muted"><?php echo $user->email; ?></p>
                            <hr>
                            <strong><i class="fa  fa-phone-square margin-r-5"></i> Phone</strong>
                            <p><?php echo $user->phn1; ?> <?php if(!empty($user->phn2)){ echo ","; } ?> <?php echo $user->phn2; ?></p>
                            <hr>
                            <strong><i class="fa fa-map-marker margin-r-5"></i> Area</strong>
                            <p class="text-muted"><?php echo $user->area; ?></p>
                            <hr>
                            <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
                            <p class="text-muted"><?php echo $user->add; ?></p>
                            <hr>
                            <strong><i class="fa  fa-briefcase margin-r-5"></i> Joined Date</strong>
                            <p><?php $date = nice_date($user->joined_date, 'd-M-Y'); echo $date; ?></p>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
            <!-- update modal -->
            <div class="modal fade" id="up_info<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"> Update Information</h4>
                        </div>
                        <?php echo form_open(site_url("users/update_info")); ?>
                            <div class="modal-body">
                                <!-- hidden id with hash -->
                                <input name="id" type="hidden" value="<?php echo $user->id; ?>" required> 
                                <!-- full name -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputFirstName"> First Name<sup>*</sup></label>
                                            <input class="form-control" id="inputFirstName" name="first_name" value="<?php echo $user->first_name; ?>" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputLastName"> Last Name</label>
                                            <input class="form-control" id="inputLastName" name="last_name" value="<?php echo $user->last_name;; ?>" type="text">
                                        </div>
                                    </div>
                                </div>
                                <!-- username and level -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputusername"> User Name<sup>*</sup></label>
                                            <input class="form-control" id="inputFirstName" name="username" value="<?php echo $user->username; ?>" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputuser_level"> User Level<sup>*</sup></label>
                                            <select class="form-control" name="user_level">
                                                <option selected>Please Select</option>
                                                <option value="0">Manager</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Super Admin</option>
                                                <option value="-1">Banned</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- email -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputemail"> Email<sup>*</sup></label>
                                            <input class="form-control" id="inputemail" name="email" value="<?php echo $user->email; ?>" type="email" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- phone 1 -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputphn">Phone 1<sup>*</sup></label>
                                            <input class="form-control" id="input_phn1" name="phn1" value="<?php echo $user->phn1; ?>" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- phone 2 -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputphn">Phone 2</label>
                                            <input class="form-control" id="input_phn2" name="phn2" value="<?php echo $user->phn2; ?>" type="text">
                                        </div>
                                    </div>
                                </div>
                                <!-- area -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input_area"> Area/Town/City<sup>*</sup></label>
                                            <input class="form-control" id="input_area" name="area" value="<?php echo $user->area; ?>" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- address -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputadd"> Address<sup>*</sup></label>
                                            <textarea class="form-control" id="inputadd" name="add" rows="3" required><?php echo $user->add; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
                                <button type="submit" class="btn btn-success btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Update</button>
                                <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                            </div>
                        <?php echo form_close(); ?> 
                    </div> 
                </div>
            </div> 
            <!-- image modal -->
            <div class="modal fade" id="up_img<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                            <h4 class="modal-title"> Update Profile Image</h4>
                        </div>
                        <?php echo form_open_multipart(site_url("users/update_image")); ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Image input <sup>*</sup></label>
                                            <input style="display:none;" type="hidden" name="id" value="<?php echo $user->id; ?>" required>
                                            <input type="file" name="pro_image" id="exampleInputFile" required>
                                            <p class="help-block">Image type: jpg, png and gif.</p> 
                                            <p class="help-block">Maximum resolution: &nbsp; 960*640</p> 
                                            <p class="help-block">Image file did not exceed 1MB.</p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Update</button>
                                <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                            </div>
                        <?php echo form_close(); ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->