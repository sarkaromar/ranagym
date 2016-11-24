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
                
                <?php if(!empty($mem_info)) : ?>
<!-- --------------------------------------- id base report --------------------------------------- -->
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> <?php echo $this->settings->info->site_name; ?>
                                    <small class="pull-right">Date: <?php echo date('d-M-Y'); ?></small>
                                </h2>
                            </div>
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <strong>General Information :</strong><br>
                                Member ID: <?php echo $mem_info->mem_id; ?><br />
                                Full Name: <?php echo $mem_info->first_name.' '.$mem_info->last_name; ?><br>
                                Joined Since: <?php $date = nice_date($mem_info->date, 'd-M-Y'); echo $date; ?> &nbsp; Status: &nbsp;<?php $s = $mem_info->status; if($s == 1){ echo "<b style='color:green'>Active</b>";}else{ echo "<b style='color:red'>Inactive</b>";} ?><br />
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <strong>Address :</strong><br>
                                Area: <?php echo $mem_info->area; ?><br>
                                <?php echo $mem_info->add; ?><br>
                                Phone:</b> <?php echo $mem_info->phn1; if(isset($mem_info->phn2)){ echo ", "; }else{" ";} echo $mem_info->phn2; ?><br>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <strong>Other Information :</strong><br>
                                Gender: <?php echo $mem_info->gen; ?><br />
                                Blood Group: <?php echo $mem_info->bld_grp; ?><br />
                                Birth Date: <?php $date = nice_date($mem_info->birth, 'd-M-Y'); echo $date; ?><br>
                            </div>
                        </div>
                        <!-- monthly row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive" style="margin-top: 15px;">
                                <p class="lead">Monthly Fee Report</p>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Payment Date</th>
                                            <th>Month</th>
                                            <th>Fee Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Due Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($mon_report as $list) : ?>
                                        <tr>
                                            <td><?php $date = nice_date($list->created, 'd-M-Y'); echo $date; ?></td>
                                            <td><?php echo $list->month; ?></td>
                                            <td><?php echo $list->mon_fee; ?></td>
                                            <td><?php echo $list->mon_paid; ?></td>
                                            <td><?php echo $list->mon_due; ?></td>
                                            <td>
                                                <a data-toggle="modal" href="#update<?php echo $list->mon_id ?>" title="Update" data-original-title="Update">
                                                    <i class="fa fa-fw fa-edit text-green" data-toggle="tooltip" title="" data-original-title="Update"></i>
                                                </a> | 
                                                <a data-toggle="modal" href="#delete<?php echo $list->mon_id ?>" title="Delete" data-original-title="Delete">
                                                    <i class="fa fa-trash text-red" data-toggle="tooltip" title="" data-original-title="Delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- update modal -->
                                        <div class="modal fade" id="update<?php echo $list->mon_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Update Information</h4>
                                                    </div>
                                                    <?php echo form_open(site_url("view_payment/update_mon_fee")); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <!-- admission paid -->
                                                                    <div class="form-group">
                                                                        <label class="control-label">Month Paid<sup>*</sup></label>
                                                                        <input class="form-control" type="text" value="<?php echo $list->mon_paid; ?>" placeholder="Month Paid" name="mon_paid" />
                                                                    </div>
                                                                    <!-- admission due -->
                                                                    <div class="form-group">
                                                                        <label class="control-label">Month Due<sup>*</sup></label>
                                                                        <input class="form-control" type="text" value="<?php echo $list->mon_due; ?>" placeholder="Month Due" name="mon_due" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input name="mon_id" type="hidden" value="<?php echo $list->mon_id; ?>" required />
                                                            <input name="mem_id" type="hidden" value="<?php echo $mem_info->mem_id; ?>" required />
                                                            <button type="submit" class="btn btn-success btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Update</button>
                                                            <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                        </div>
                                                    <?php echo form_close(); ?> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- delete modal -->
                                        <div class="modal fade" id="delete<?php echo $list->mon_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Are you sure want to Delete this row?</h4>
                                                    </div>
                                                    <?php echo form_open(site_url("view_payment/delete_mon_fee")); ?>
                                                        <div class="modal-body">
                                                            <p>This record will be delete forever.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input name="mon_id" type="hidden" value="<?php echo $list->mon_id; ?>" required />
                                                            <input name="mem_id" type="hidden" value="<?php echo $mem_info->mem_id; ?>" required />
                                                            <button type="submit" class="btn btn-danger btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Delete</button>
                                                            <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                        </div>
                                                    <?php echo form_close(); ?> 
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <tr>
                                            <th> </th>
                                            <th>Total</th>
                                            <th><?php echo $total_mon_fee->mon_fee; ?></th>
                                            <th><?php echo $total_mon_paid->mon_paid; ?></th>
                                            <th><?php echo $total_mon_due->mon_due; ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- admission row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <p class="lead">Admission Fee Report</p>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Payment Date</th>
                                            <th>Fee Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Due Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($adm_report as $list) : ?>
                                        <tr>
                                            <td><?php $date = nice_date($list->created, 'd-M-Y'); echo $date; ?></td>
                                            <td><?php echo $list->adm_fee; ?></td>
                                            <td><?php echo $list->adm_paid; ?></td>
                                            <td><?php echo $list->adm_due; ?></td>
                                            <td>
                                                <a data-toggle="modal" href="#update<?php echo $list->adm_id ?>" title="Update" data-original-title="Update">
                                                    <i class="fa fa-fw fa-edit text-green" data-toggle="tooltip" title="" data-original-title="Update"></i>
                                                </a> | 
                                                <a data-toggle="modal" href="#delete<?php echo $list->adm_id ?>" title="Delete" data-original-title="Delete">
                                                    <i class="fa fa-trash text-red" data-toggle="tooltip" title="" data-original-title="Delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- update modal -->
                                        <div class="modal fade" id="update<?php echo $list->adm_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Update Information</h4>
                                                    </div>
                                                    <?php echo form_open(site_url("view_payment/update_adm_fee")); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <!-- admission paid -->
                                                                    <div class="form-group">
                                                                        <label class="control-label">Admission Paid<sup>*</sup></label>
                                                                        <input class="form-control" type="text" value="<?php echo $list->adm_paid; ?>" placeholder="Admission Paid" name="adm_paid" />
                                                                    </div>
                                                                    <!-- admission due -->
                                                                    <div class="form-group">
                                                                        <label class="control-label">Admission Due<sup>*</sup></label>
                                                                        <input class="form-control" type="text" value="<?php echo $list->adm_due; ?>" placeholder="Admission Due" name="adm_due" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input name="adm_id" type="hidden" value="<?php echo $list->adm_id; ?>" required />
                                                            <input name="mem_id" type="hidden" value="<?php echo $mem_info->mem_id; ?>" required />
                                                            <button type="submit" class="btn btn-success btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Update</button>
                                                            <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                        </div>
                                                    <?php echo form_close(); ?> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- delete modal -->
                                        <div class="modal fade" id="delete<?php echo $list->adm_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Are you sure want to Delete this row?</h4>
                                                    </div>
                                                    <?php echo form_open(site_url("view_payment/delete_adm_fee")); ?>
                                                        <div class="modal-body">
                                                            <p>This record will be delete forever.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input name="adm_id" type="hidden" value="<?php echo $list->adm_id; ?>" required />
                                                            <input name="mem_id" type="hidden" value="<?php echo $mem_info->mem_id; ?>" required />
                                                            <button type="submit" class="btn btn-danger btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Delete</button>
                                                            <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                        </div>
                                                    <?php echo form_close(); ?> 
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <tr>
                                            <th>Total</th>
                                            <th><?php echo $total_adm_fee->adm_fee; ?></th>
                                            <th><?php echo $total_adm_paid->adm_paid; ?></th>
                                            <th><?php echo $total_adm_due->adm_due; ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- grand total row -->
                        <div class="row">
                            <div class="col-xs-6">
                                <p class="lead">Payment Summary</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Total Fee:</th>
                                            <td>BDT <?php $total_fee =  $total_adm_fee->adm_fee + $total_mon_fee->mon_fee; echo $total_fee; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Paid:</th>
                                            <td>BDT <?php $total_paid =  $total_adm_paid->adm_paid + $total_mon_paid->mon_paid; echo $total_paid; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Due:</th>
                                            <td>BDT <?php $total_due =  $total_adm_due->adm_due + $total_mon_due->mon_due; echo $total_due; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- some action -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-success pull-right" disabled>
                                    <i class="fa fa-print"></i> Print
                                </button>
                                <button type="button" class="btn btn-primary pull-right" disabled style="margin-right: 5px;">
                                    <i class="fa fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>