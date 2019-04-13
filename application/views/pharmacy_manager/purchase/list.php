<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("pharmacy_manager/purchase/form") ?>"> <i class="fa fa-plus"></i>  Add Purchase</a>  
                </div>
            </div>

            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th>Manufacturer ID</th>
                            <th>Invoice No</th>
                            <th>Purchase id</th>
                            <th>Purchase Date</th>
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
                                    <td><?php echo $item->manufacturer_id; ?></td>
                                    <td><?php echo $item->chalan_no; ?></td>
                                    <td><?php echo $item->purchase_id; ?></td>
                                    <td><?php echo $item->purchase_date; ?></td>
                                    <td><?php echo $item->grand_total_amount; ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("pharmacy_manager/purchase/form/$item->purchase_id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-edit"></i></a> 
                                        <a href="<?php echo base_url("pharmacy_manager/purchase/delete/$item->purchase_id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a> 
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
