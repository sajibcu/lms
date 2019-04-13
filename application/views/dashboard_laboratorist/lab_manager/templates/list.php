<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3>Template List</h3>
                </div>
            </div>

            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center"><?php echo display('serial') ?></th>
                            <th class="text-center">Template Name</th>
                            <th class="text-center">Template Code</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($items)) { ?>
                            <?php 
                                $sl = 1;
                            ?>
                            <?php foreach ($items as $item) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td align="left"><?php echo $sl; ?></td>
                                    <td align="center"><?= $item->name; ?></td>
                                    <td align="center"><?= $item->code; ?></td>
                                    <td align="center"><?= format_price($item->price, $currency, $currency_position) ?></td>
                                    <td align="center"><?= $item->date; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url("dashboard_laboratorist/lab_manager/template/view/$item->id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-eye"></i></a> 
                                        <a href="<?php echo base_url("dashboard_laboratorist/lab_manager/template/create/$item->id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-edit"></i></a> 
                                        <a href="<?php echo base_url("dashboard_laboratorist/lab_manager/template/delete/$item->id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a> 
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
