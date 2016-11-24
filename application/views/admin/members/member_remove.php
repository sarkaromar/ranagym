<div class="content-wrapper">
    <section class="content-header">
        <h1>Remove List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Remove List</li>
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
            <!-- remove list -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red-gradient">
                    <div class="inner">
                        <h3><?php echo $remove_total; ?> Members</h3>
                    </div>
                    <a href="<?php echo site_url("members/remove_list") ?>" class="small-box-footer">See Remove List &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- remove list -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <?php if(empty($remove_lists)) : ?>
                    <!-- box header -->
                    <div class="box-header">
                        <h3 class="box-title">No record found!</h3>
                    </div>
                    <?php else: ?>
                    <!-- box header -->
                    <div class="box-header">
                        <h3 class="box-title">Remove List</h3>
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
                            <?php foreach($remove_lists as $list) : ?>
                                <tr>
                                    <td><?php echo $list->mem_id; ?></td>
                                    <td><?php echo $list->first_name . ' ' . $list->last_name; ?></td>
                                    <td><?php echo $list->area; ?></td>
                                    <td><?php echo $list->add; ?></td>
                                    <td><?php echo $list->phn1; ?></td>
                                    <td><?php echo $list->phn2; ?></td>
                                    <td>
                                        <a data-toggle="modal" href="#active<?php echo $list->id ?>" title="Active" data-original-title="Active">
                                            <i class="fa fa-fw fa-mail-reply text-green" data-toggle="tooltip" title="" data-original-title="Active"></i>
                                        </a> | 
                                        <a data-toggle="modal" href="#delete<?php echo $list->id ?>" title="Delete" data-original-title="Delete">
                                            <i class="fa fa-trash text-red" data-toggle="tooltip" title="" data-original-title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- active modal -->
                                <div class="modal fade" id="active<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Are you sure want to active this member?</h4>
                                            </div>
                                            <?php echo form_open(site_url("members/active_member")); ?>
                                                <div class="modal-body">
                                                    <p>This member will be available in member list.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required />
                                                    <button type="submit" class="btn btn-success btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Active</button>
                                                    <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                </div>
                                            <?php echo form_close(); ?> 
                                        </div>
                                    </div>
                                </div>
                                <!-- delete modal -->
                                <div class="modal fade" id="delete<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Are you sure want to delete this member?</h4>
                                            </div>
                                            <?php echo form_open(site_url("members/delete_member")); ?>
                                                <div class="modal-body">
                                                    <p>This member will be delete permanently!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required />
                                                    <button type="submit" class="btn btn-danger btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Delete</button>
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
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->