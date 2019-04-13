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
                            <th>Purchase ID</th>
                            <th>Manufacturer Name</th>
                            <th>Purchase Date</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($items)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($items as $item) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $item->chalan_no; ?></td>
                                    <td><a href="<?= base_url("pharmacy_manager/preturn/manufacturer_return_form/$item->purchase_id") ?>"><?php echo $item->purchase_id; ?></a></td>
                                    <td><?php echo $manufacturer_name; ?></td>
                                    <td><?php echo date('d - M - Y', strtotime($item->purchase_date)); ?></td>
                                    <td><?php echo $item->grand_total_amount; ?></td>
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
