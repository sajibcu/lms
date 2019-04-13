<div class="row">
    <div class="col-sm-12">
        <div class="columns">
            <a href="<?= base_url('lab_manager/invoice/form') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> New Invoice </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-7">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= base_url('lab_manager/invoice/manage_invoice_date_to_date') ?>" class="form-inline" method="post" accept-charset="utf-8">
                    <div class="form-group">
                        <label class="" for="from_date">Start Date</label>
                        <input type="text" name="from_date" class="form-control datepicker" style="width:120px;height:32px" id="from_date" value="<?= $from_date ?>" placeholder="Start Date" >
                    </div>

                    <div class="form-group">
                        <label class="" for="to_date">End Date</label>
                        <input type="text" name="to_date" class="form-control datepicker" style="width:120px;height:32px" id="to_date" placeholder="End Date" value="<?= $to_date ?>">
                    </div>
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= base_url('lab_manager/invoice/manage_invoice_invoice_id') ?>" class="form-inline" method="post" accept-charset="utf-8">
                    <label for="invoice_no">Invoice No</label>
                    <input type="text" class="form-control" name="invoice_no" placeholder="Invoice No">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3>Manage Invoice </h3>
                </div>
            </div>

            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th>Invoice No</th>
                            <th>Customer Name</th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Due Amount</th>
                            <th>Date</th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($items)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($items as $item) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $item->invoice_id; ?></td>
                                    <td><?php echo $item->customer_name; ?></td>
                                    <td><?php echo $item->total_amount; ?></td>
                                    <td><?php echo $item->paid_amount; ?></td>
                                    <td><?php echo $item->due_amount; ?></td>
                                    <td><?php echo $item->date; ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("lab_manager/invoice/details/$item->id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-eye"></i></a> 
                                        <!-- <a href="<?php //echo base_url("lab_manager/invoice/form/$item->id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-edit"></i></a>  -->

                                        <?php if($this->session->userdata('user_role') == 1){?>

                                            <a href="<?php echo base_url("lab_manager/invoice/delete/$item->id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a>
                                        <?php } ?>
                                        
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>
