<div class="row">
    <div class="col-sm-12">
        <div class="columns">
            <a href="<?= base_url('pharmacy_manager/stock/index') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> Stock Report</a>
            <a href="<?= base_url('pharmacy_manager/stock/list_manufacturer') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Stock Report (Manufacturer Wise) </a>
        </div>
    </div>
</div>

<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3>Stock Report</h3>
                </div>
            </div>

            <div class="panel-body">
                <div id="printableArea" style="margin-left:2px;">
                    <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo display('serial') ?></th>
                                <th class="text-center">Medicine Name</th>
                                <th class="text-center">Medicine Type</th>
                                <th class="text-center">Unit</th>
                                <th class="text-center">Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($items)) { ?>
                                <?php 
                                    $sl = 1;
                                ?>
                                <?php foreach ($items as $item) { ?>
                                    <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                        <td align="center"><?php echo $sl; ?></td>
                                        <td align="center"><?= $item->product_name; ?></td>
                                        <td align="center"><?= $item->type_name; ?></td>
                                        <td align="center"><?= $item->unit; ?></td>
                                        <td align="center">
                                            <span class="label label-danger"><?= $item->stock; ?></span>
                                        </td>
                                    </tr>
                                    <?php 
                                        $sl++; 
                                    ?>
                                <?php } ?> 
                            <?php } ?> 
                        </tbody>
                    </table>  <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>
