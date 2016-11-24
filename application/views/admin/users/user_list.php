<div class="content-wrapper">
    <section class="content-header">
        <h1>Users List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Users List</li>
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
        <!-- User list -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- box header -->
                    <div class="box-header">
                        <h3 class="box-title">Users List</h3>
                        <div class="box-tools">
                            <?php echo $this->pagination->create_links();  ?>
                        </div>
                    </div>
                    <!-- box content -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone 1</th>
                                    <th>User Level</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($user_lists as $list) : ?>
                                <tr>
                                    <td><?php echo $list->id; ?></td>
                                    <td><?php echo $list->username; ?></td>
                                    <td><?php echo $list->first_name . ' ' . $list->last_name; ?></td>
                                    <td><?php echo $list->email; ?></td>
                                    <td><?php echo $list->phn1; ?></td>
                                    <td>
                                        <?php if($list->user_level == 0){
                                            echo '<span class="label label-primary">Manager</span>';
                                        }elseif($list->user_level == 1){
                                            echo '<span class="label label-warning">Admin</span>';
                                        }elseif($list->user_level == 2){
                                            echo '<span class="label label-success">Sup Admin</span>';
                                        }elseif($list->user_level == -1){
                                            echo '<span class="label label-danger">Banned</span>';
                                        }  ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('users/user_details/' . $list->id) ?>" data-toggle="tooltip" title="Details" data-original-title="Details"><i class="fa  fa-file-text"></i></a> | 
                                        <?php if($list->user_level == -1){ 
                                            echo '<a data-toggle="modal" href="#active' . $list->id . '" title="Active" data-original-title="Active">
                                                    <i class="fa fa-check-square text-green" data-toggle="tooltip" title="" data-original-title="Active"></i>
                                                 </a> |';
                                        }else{
                                            echo '<a data-toggle="modal" href="#banned' . $list->id . '" title="Inctive" data-original-title="Banned">
                                                    <i class="fa fa-close text-red" data-toggle="tooltip" title="" data-original-title="Banned"></i>
                                                </a> |';
                                        } ?>
                                        <a data-toggle="modal" href="#delete<?php echo $list->id; ?>" title="Delete" data-original-title="Delete">
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
                                                <h4 class="modal-title">Are you sure want to Active this Account?</h4>
                                            </div>
                                            <?php echo form_open(site_url("users/user_active")); ?>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputuser_level"> Active as<sup>*</sup></label>
                                                                <select class="form-control" name="as" required>
                                                                    <option selected>Please Select</option>
                                                                    <option value="0">Manager</option>
                                                                    <option value="1">Admin</option>
                                                                    <option value="2">Super Admin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required />
                                                    <button type="submit" class="btn btn-primary btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Active</button>
                                                    <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                </div>
                                            <?php echo form_close(); ?> 
                                        </div>
                                    </div>
                                </div>
                                <!-- banned modal -->
                                <div class="modal fade" id="banned<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                <h4 class="modal-title">Are you sure want to banned this Account?</h4>
                                            </div>
                                            <?php echo form_open(site_url("users/user_banned")); ?>
                                                <div class="modal-body">
                                                    <p>Banned users can't log into their account!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required/>
                                                    <button type="submit" class="btn btn-danger btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Banned</button>
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
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                <h4 class="modal-title">Are you sure want to delete this Account?</h4>
                                            </div>
                                            <?php echo form_open(site_url("users/user_delete")); ?>
                                                <div class="modal-body">
                                                    <p>This account will delete permanently!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required/>
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
                </div>  
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->