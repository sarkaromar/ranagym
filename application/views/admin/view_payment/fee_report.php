<div class="content-wrapper">
    <section class="content-header">
        <h1>Fee Report</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Fee Report</li>
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
                            <li class="active"><a aria-expanded="true" href="#mem_id" data-toggle="tab">Member ID Base Report</a></li>
                            <li class=""><a aria-expanded="false" href="#month" data-toggle="tab">Monthly Collection Report</a></li>
                            <li class=""><a aria-expanded="false" href="#year" data-toggle="tab">Yearly Collection Report</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="mem_id">
                                <?php echo form_open(site_url("view_payment/mem_id_base_report"), array("class" => "form-horizontal")) ?>
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
                                                <button type="submit" class="btn btn-primary">See Report</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="tab-pane" id="month">
                                <?php echo form_open(site_url("view_payment/mon_coll_report"), array("class" => "form-horizontal")) ?>
                                    <div class="box-body"
                                        <!-- year -->
                                        <?php 
                                            if(form_error('year')){ 
                                                echo "<div class='form-group has-error' >";
                                            }else{    
                                                echo "<div class='form-group' >";
                                            } 
                                        ?>
                                            <label for="input_year" class="col-sm-2 control-label">Year<sup>*</sup></label>
                                            <div class="col-sm-3">
                                                <input class="form-control" id="input_year" type="text" value="2016" placeholder="2016" name="year" maxlength="4" required>
                                            </div>
                                            <span class="help-block">
                                                <?php echo form_error('year'); ?>
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
                                            <div class="col-sm-3">
                                                <select name="month" class="form-control selectpicker" required>
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
                                    </div>
                                    <div class="box-footer">
                                        <div class="form-group">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary">See Report</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="tab-pane" id="year">
                                <?php echo form_open(site_url("view_payment/year_coll_report"), array("class" => "form-horizontal")) ?>
                                    <div class="box-body"
                                        <!--  year -->
                                        <?php 
                                            if(form_error('year')){ 
                                                echo "<div class='form-group has-error' >";
                                            }else{    
                                                echo "<div class='form-group' >";
                                            }
                                        ?>
                                            <label for="input_year" class="col-sm-2 control-label">Year<sup>*</sup></label>
                                            <div class="col-sm-3">
                                                <select name="year" class="form-control selectpicker" required>
                                                    <option value="2016" selected>2016</option>
                                                    <option value="2017" >2017</option>
                                                    <option value="2018" >2018</option>
                                                    <option value="2019" >2019</option>
                                                    <option value="2020" >2020</option>
                                                </select>
                                            </div>
                                            <span class="help-block">
                                                <?php echo form_error('year'); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <div class="form-group">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary">See Report</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

                <?php if(!empty($mem_info)) : ?>
<!-- ------------------------------- id base report ------------------------------------ -->
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> <?php echo $this->settings->info->site_name; ?>
                                    <small class="pull-right">Report date: <?php echo date('d-M-Y'); ?></small>
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
                                        </tr>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($adm_report as $list) : ?>
                                        <tr>
                                            <td><?php $date = nice_date($list->created, 'd-M-Y'); echo $date; ?></td>
                                            <td><?php echo $list->adm_fee; ?></td>
                                            <td><?php echo $list->adm_paid; ?></td>
                                            <td><?php echo $list->adm_due; ?></td>
                                        </tr>
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
                                            <th>BDT <?php $total_fee =  $total_adm_fee->adm_fee + $total_mon_fee->mon_fee; echo $total_fee; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Total Paid:</th>
                                            <th>BDT <?php $total_paid =  $total_adm_paid->adm_paid + $total_mon_paid->mon_paid; echo $total_paid; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Total Due:</th>
                                            <th>BDT <?php $total_due =  $total_adm_due->adm_due + $total_mon_due->mon_due; echo $total_due; ?></th>
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
                    
                <?php if(!empty($yearly_monthly_bill)) : ?>
<!-- ---------------------------------- monthly collection report --------------------------------------- -->
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> <?php echo $this->settings->info->site_name; ?>
                                    <small class="pull-right">Report date: <?php echo date('d-M-Y'); ?></small>
                                </h2>
                            </div>
                        </div>
                        <!-- monthly collection  row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive" style="margin-top: 15px;">
                                <p class="lead">Monthly Fee Report of &nbsp;<?php echo $month.', '.$year; ?></p>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Mem ID</th>
                                            <th>Name</th>
                                            <th>bill</th>
                                            <th>Paid Amount</th>
                                            <th>Due Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($yearly_monthly_bill as $list) : ?>
                                        <tr>
                                            <td><?php echo $list->mem_id; ?></td>
                                            <td><?php echo $list->first_name.' '.$list->last_name; ?></td>
                                            <td><?php echo $list->mon_fee; ?></td>
                                            <td><?php echo $list->mon_paid; ?></td>
                                            <td><?php echo $list->mon_due; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <th> </th>
                                            <th>Total</th>
                                            <th><?php echo $total_monthly_bill->mon_fee; ?></th>
                                            <th><?php echo $total_monthly_paid->mon_paid; ?></th>
                                            <th><?php echo $total_monthly_due->mon_due; ?></th>
                                        </tr>
                                    </tbody>
                                </table>
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

                <?php if(!empty($total_yearly_bill)) : ?>
<!-- ---------------------------------- yearly collection report --------------------------------------- -->
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> <?php echo $this->settings->info->site_name; ?>
                                    <small class="pull-right">Report date: <?php echo date('d-M-Y'); ?></small>
                                </h2>
                            </div>
                        </div>
                        <!-- monthly collection  row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive" style="margin-top: 15px;">
                                <p class="lead">Report of &nbsp;<?php echo $year; ?></p>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name of Month</th>
                                            <th>Total Bill</th>
                                            <th>Total Paid</th>
                                            <th>Total Due</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td>January</td>
                                            <td><?php echo $yearly_bill_january->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_january->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_january->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>February</td>
                                            <td><?php echo $yearly_bill_february->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_february->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_february->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>March</td>
                                            <td><?php echo $yearly_bill_march->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_march->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_march->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>April</td>
                                            <td><?php echo $yearly_bill_april->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_april->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_april->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>May</td>
                                            <td><?php echo $yearly_bill_may->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_may->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_may->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>June</td>
                                            <td><?php echo $yearly_bill_june->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_june->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_june->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>July</td>
                                            <td><?php echo $yearly_bill_july->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_july->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_july->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>August</td>
                                            <td><?php echo $yearly_bill_august->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_august->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_august->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>September</td>
                                            <td><?php echo $yearly_bill_september->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_september->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_september->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>October</td>
                                            <td><?php echo $yearly_bill_october->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_october->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_october->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>November</td>
                                            <td><?php echo $yearly_bill_november->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_november->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_november->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>December</td>
                                            <td><?php echo $yearly_bill_december->mon_fee; ?></td>
                                            <td><?php echo $yearly_bill_december->mon_paid; ?></td>
                                            <td><?php echo $yearly_bill_december->mon_due; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Grand Total</th>
                                            <th><?php echo $total_yearly_bill->mon_fee; ?></th>
                                            <th><?php echo $total_yearly_paid->mon_paid; ?></th>
                                            <th><?php echo $total_yearly_due->mon_due; ?></th>
                                        </tr>
                                    </tbody>
                                </table>
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