<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("pharmacy_manager/medicine/medicine/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_medicine') ?> </a> 
                </div>
            </div> 

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('medicine_name') ?></th>
                            <th>Medicine Type</th>
                            <th>Medicine Category</th>
                            <th>Shelf</th>
                            <th><?php echo display('description') ?></th>
                            <th><?php echo display('price') ?></th>
                            <th><?php echo display('manufactured_by') ?></th>
                            <th>Image</th> 
                            <th><?php echo display('status') ?></th> 
                            <th><?php echo display('action') ?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($items)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($items as $item) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $item->product_name; ?></td>
                                    <td><?php echo $item->type_name; ?></td>
                                    <td><?php echo $item->category_name; ?></td>
                                    <td><?php echo $item->product_location; ?></td>
                                    <td><?php echo character_limiter(strip_tags($item->product_details),50); ?></td>
                                    <td><?php echo $item->price; ?></td>
                                    <td><?php echo $item->manufacturer_fullname; ?></td>
                                    <td><?php echo $item->image ? '<img src="'.site_url($item->image).'" class="img img-responsive" style="max-width: 50px;max-height: 50px;">' : '' ?></td>
                                    <td><?php echo (($item->status==1)?display('active'):display('inactive')); ?></td>
                                    <td class="center" width="80">
                                        <!-- <a href="<?php echo base_url("pharmacy_manager/medicine/medicine/details/$item->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>  -->
                                        <a href="<?php echo base_url("pharmacy_manager/medicine/medicine/form/$item->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                        <a href="<?php echo base_url("pharmacy_manager/medicine/medicine/delete/$item->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> 
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
 
 