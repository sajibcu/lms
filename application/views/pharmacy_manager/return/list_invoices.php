<div class="row">
    <div class="col-sm-12">
        <div class="columns">
            <a href="<?= base_url('pharmacy_manager/preturn/index') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> Add Return </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body"> 
                <form action="<?= base_url('pharmacy_manager/preturn/datewise_invoic_return_list') ?>" class="form-inline" method="post" accept-charset="utf-8">
                    <div class="form-group">
                        <label class="" for="from_date">Start Date</label>
                        <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="<?= $from_date ?>" placeholder="Start Date">
                    </div> 
                    <div class="form-group">
                        <label class="" for="to_date">End Date</label>
                        <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="End Date" value="<?= $to_date ?>">
                    </div>  
                    <button type="submit" class="btn btn-success">Search</button>
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
                <h3><?= $title ?></h3>
            </div>

            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th>Invoice ID</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Total Amount</th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($items)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($items as $item) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><a href="<?= base_url("pharmacy_manager/preturn/invoice_detail/$item->return_id") ?>"><?php echo $item->invoice_id; ?></a></td>
                                    <td><?php echo $item->customer_name; ?></td>
                                    <td><?php echo date('d - M - Y', strtotime($item->date_return)) ?></td>
                                    <td><?php echo $item->net_total_amount; ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("pharmacy_manager/preturn/invoice_detail/$item->return_id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-edit"></i></a> 
                                        <a href="<?php echo base_url("pharmacy_manager/preturn/delete/$item->id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a> 
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
