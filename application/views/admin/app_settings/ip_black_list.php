<div class="content-wrapper">
    <section class="content-header">
        <h1>IP Black List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">IP Black List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- link -->
        <div class="row">
            <!-- app settings -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua-gradient">
                    <div class="inner">
                        <h3>Settings</h3>
                    </div>
                    <a href="<?php echo site_url("app_settings") ?>" class="small-box-footer">See Settings &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- pay settings -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <h3>Payment</h3>
                    </div>
                    <a href="<?php echo site_url("app_settings/pay_settings") ?>" class="small-box-footer">See Settings &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- black ip list -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red-gradient">
                    <?php if(empty($total)) : ?>
                    <div class="inner">
                        <h3>No IP address</h3>
                    </div>
                    <?php else: ?>
                    <div class="inner">
                        <h3><?php echo $total; ?> IP</h3>
                    </div>
                    <?php endif; ?>
                    <a href="<?php echo site_url("app_settings/ip_black_list") ?>" class="small-box-footer">See List &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- list -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <?php if(empty($ip_lists)) : ?>
                    <!-- box header -->
                    <div class="box-header">
                        <h3 class="box-title">No record found!</h3>
                        <button data-toggle="modal" href="#add_ip" type="submit" class="btn btn-danger pull-right">Add IP address</button>
                        <!-- add ip -->
                        <div class="modal fade" id="add_ip" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Add new IP</h4>
                                    </div>
                                    <?php echo form_open(site_url("app_settings/add_black_ip")); ?>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="input_ip"> IP Address<sup>*</sup></label>
                                                        <input class="form-control" id="input_ip" name="IP" type="text" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="input_reason"> Reason<sup>*</sup></label>
                                                        <textarea class="form-control" id="input_reason" name="reason" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger btn-icon" ><i class="fa fa-fw fa-check-square-o"></i> Add IP Address</button>
                                            <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                        </div>
                                    <?php echo form_close(); ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <!-- box header -->
                    <div class="box-header">
                        <h3 class="box-title">IP Black List</h3>
                        <div class="box-tools">
                            <?php echo $this->pagination->create_links();  ?>
                        </div>
                        <button data-toggle="modal" href="#add_ip" type="submit" class="btn btn-danger pull-right">Add IP address</button>
                        <!-- add ip -->
                        <div class="modal fade" id="add_ip" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Add new IP</h4>
                                    </div>
                                    <?php echo form_open(site_url("app_settings/add_black_ip")); ?>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="input_ip"> IP Address<sup>*</sup></label>
                                                        <input class="form-control" id="input_ip" name="IP" type="text" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="input_reason"> Reason<sup>*</sup></label>
                                                        <textarea class="form-control" id="input_reason" name="reason" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger btn-icon" ><i class="fa fa-fw fa-check-square-o"></i> Add IP Address</button>
                                            <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                        </div>
                                    <?php echo form_close(); ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- box content -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Sl.</th>
                                    <th>IP Address</th>
                                    <th>Reason</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($ip_lists as $list) : ?>
                                <tr>
                                    <td><?php echo $list->id; ?></td>
                                    <td><?php echo $list->IP; ?></td>
                                    <td><?php echo $list->reason; ?></td>
                                    <td><?php $date = nice_date($list->date, 'd-M-Y'); echo $date; ?></td>
                                    <td>
                                        <a data-toggle="modal" href="#delete<?php echo $list->id; ?>" title="Delete" data-original-title="Delete">
                                            <i class="fa fa-trash text-red" data-toggle="tooltip" title="" data-original-title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- delete modal -->
                                <div class="modal fade" id="delete<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title"> Are you sure want to delete this IP address?</h4>
                                            </div>
                                            <?php echo form_open(site_url("app_settings/delete_black_ip")); ?>
                                                <div class="modal-body">
                                                    <p>This address will be remove from list!</p>
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