<div class="content-wrapper">
    <section class="content-header">
        <h1>Active Member List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Active Member List</li>
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
        <!-- member list -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <?php if(empty($member_lists)) : ?>
                    <!-- box header -->
                    <div class="box-header">
                        <h3 class="box-title">No record found!</h3>
                    </div>
                    <?php else: ?>
                    <!-- box header -->
                    <div class="box-header">
                        <h3 class="box-title">Active Member List</h3>
                        <div class="box-tools">
                            <?php echo $this->pagination->create_links();  ?>
                        </div>
                    </div>
                    <!-- box content -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Mem ID</th>
                                    <th>Name</th>
                                    <th>Area</th>
                                    <th>Address</th>
                                    <th>Phone 1</th>
                                    <th>Phone 2</th>
                                    <th>Action</th>
                                </tr>
                            <?php foreach($member_lists as $list) : ?>
                                <tr>
                                    <td><?php echo $list->mem_id; ?></td>
                                    <td><?php echo $list->first_name . ' ' . $list->last_name; ?></td>
                                    <td><?php echo $list->area; ?></td>
                                    <td><?php echo $list->add; ?></td>
                                    <td><?php echo $list->phn1; ?></td>
                                    <td><?php echo $list->phn2; ?></td>
                                    <td>
                                        <a data-toggle="modal" href="#update<?php echo $list->id ?>" title="Update" data-original-title="Update">
                                            <i class="fa fa-file-text text-green" data-toggle="tooltip" title="" data-original-title="Update"></i>
                                        </a> | 
                                        <a data-toggle="modal" href="#remove<?php echo $list->id ?>" title="Remove" data-original-title="Remove">
                                            <i class="fa fa-fw fa-user-times text-red" data-toggle="tooltip" title="" data-original-title="Remove"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- update modal -->
                                <div class="modal fade" id="update<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Update Information</h4>
                                            </div>
                                            <?php echo form_open(site_url("members/update_member")); ?>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!-- member id -->
                                                            <div class="form-group">
                                                                <label for="input_mem_id" class="control-label">Member ID<sup>*</sup></label>
                                                                <input class="form-control" id="input_mem_id" type="text" value="<?php echo $list->mem_id; ?>" placeholder="#01" name="mem_id" required>
                                                            </div>
                                                            <!-- first name -->
                                                            <div class="form-group">
                                                                <label for="input_first_name" class="control-label">First Name<sup>*</sup></label>
                                                                <input class="form-control" id="input_first_name" type="text" value="<?php echo $list->first_name; ?>" placeholder="First Name" name="first_name" required>
                                                            </div>
                                                            <!-- last name -->
                                                            <div class="form-group">
                                                                <label for="input_last_name" class="control-label">Last Name<sup>*</sup></label>
                                                                <input class="form-control" id="input_last_name" type="text" value="<?php echo $list->last_name; ?>" placeholder="Last Name" name="last_name" required>
                                                            </div>
                                                            <!-- gender -->
                                                            <div class="form-group">
                                                                <label for="input_gen" class="control-label">Gender <sup>*</sup></label>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input name="gen" value="male" type="radio"  id="gen" /> Male &nbsp;
                                                                    </label>
                                                                    <label>
                                                                        <input name="gen" value="female" type="radio" id="gen" /> Female
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!-- blood group -->
                                                            <div class="form-group">
                                                                <label for="input_bld_grp" class="control-label">Blood Group<sup>*</sup></label>
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
                                                            <!-- birth -->
                                                            <div class="form-group">
                                                                <label for="input_birth" class="control-label">Birth Date<sup>*</sup></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" name="birth" id="datepicker_birth" class="form-control pull-right" value="<?php echo $list->birth; ?>" placeholder="dd/mm/yy" required >
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <!-- area -->
                                                            <div class="form-group">
                                                                <label for="input_area" class="control-label">Area/Town/City<sup>*</sup></label>
                                                                <input class="form-control" id="input_area" type="text" value="<?php echo $list->area; ?>" placeholder="Area/Town/City" name="area" required>
                                                            </div>
                                                            <!-- address -->
                                                            <div class="form-group">
                                                               <label for="input_add" class="control-label">Address<sup>*</sup></label>
                                                               <textarea class="form-control" id="input_add" placeholder="Address" name="add" rows="3" required><?php echo $list->add; ?></textarea>
                                                            </div>
                                                            <!-- phone1 -->
                                                            <div class="form-group">
                                                                <label for="input_phn1" class="control-label">Phone 1<sup>*</sup></label>
                                                                <input class="form-control" id="input_phn1" type="text" value="<?php echo $list->phn1; ?>" placeholder="Phone Number (01)" name="phn1" required>
                                                            </div>
                                                            <!-- phone2 -->
                                                            <div class="form-group">
                                                                <label for="input_phn2" class="control-label">Phone 2</label>
                                                                <input class="form-control" id="input_phn2" type="text" value="<?php echo $list->phn2; ?>" placeholder="Phone Number (optional)" name="phn2" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required />
                                                    <button type="submit" class="btn btn-success btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Update</button>
                                                    <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                </div>
                                            <?php echo form_close(); ?> 
                                        </div>
                                    </div>
                                </div>
                                <!-- remove modal -->
                                <div class="modal fade" id="remove<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Are you sure want to remove this member?</h4>
                                            </div>
                                            <?php echo form_open(site_url("members/remove_member")); ?>
                                                <div class="modal-body">
                                                    <p>This member will be available in remove list.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required />
                                                    <button type="submit" class="btn btn-danger btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Remove</button>
                                                    <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                </div>
                                            <?php echo form_close(); ?> 
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>  
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->