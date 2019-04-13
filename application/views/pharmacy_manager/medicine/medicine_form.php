<div class="row">
    <!--  form area -->
    <div class="col-sm-12"> 
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("pharmacy_manager/medicine/medicine") ?>"> <i class="fa fa-list"></i>  <?php echo display('medicine_list') ?> </a>  
                </div>
            </div> 


            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if($item): ?>
                        <?php echo form_open_multipart('pharmacy_manager/medicine/medicine/form/'.$item->id,'class="form-inner"') ?>

                            <?php echo form_hidden('id', $item->id) ?>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-4 col-form-label"><?php echo display('medicine_name')?> <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input name="name"  type="text" class="form-control" id="name" placeholder="<?php echo display('medicine_name')?>" value="<?php echo $item->product_name ?>" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="generic_name" class="col-sm-4 col-form-label">Generic name <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input name="generic_name"  type="text" class="form-control" id="generic_name" placeholder="Generic name" value="<?php echo $item->generic_name ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="box_size" class="col-sm-4 col-form-label">Box size <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input name="box_size"  type="text" class="form-control" id="box_size" placeholder="Box size" value="<?php echo $item->box_size ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="unit" class="col-sm-4 col-form-label">Unit <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <?php echo form_dropdown('unit', $units, $item->unit, 'class="form-control" id="unit"') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="product_location" class="col-sm-4 col-form-label">Medicine Shelf</label>
                                        <div class="col-sm-8">
                                            <input name="product_location"  type="text" class="form-control" id="product_location" placeholder="Medicine Shelf" value="<?php echo $item->product_location ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-4 col-form-label"><?php echo display('description') ?> </label>
                                        <div class="col-sm-8">
                                            <textarea name="product_details" class="form-control"  placeholder="<?php echo display('description') ?>"  rows="3"><?php echo $item->product_details ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="type_id" class="col-sm-4 col-form-label">Medicine Type <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <?php echo form_dropdown('type_id', $type_list, $item->type_id, 'class="form-control" id="type_id"') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <?php if( isset($item->image) && $item->image ): ?>
                                    <div class="form-group row">
                                        <label for="picturePreview" class="col-sm-4 col-form-label"></label>
                                        <div class="col-sm-8">
                                            <img src="<?= site_url($item->image) ?>" alt="Picture" class="img-thumbnail img-responsive">
                                        </div>
                                    </div>
                                    <?php endif ?>

                                    <div class="form-group row">
                                        <label for="image" class="col-sm-4 col-form-label">Image</label>
                                        <div class="col-sm-8">
                                            <input type="file" tabindex="8" name="image" class="form-control" id="image" accept="image/*">
                                            <?php if( isset($item->image) ): ?>
                                                <input type="hidden" name="old_image" value="<?=  $item->image ?>">
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-4 col-form-label">Medicine Category</label>
                                        <div class="col-sm-8">
                                            <?php echo form_dropdown('category_id', $category_list, $item->category_id, 'class="form-control" id="category_id"') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-4 col-form-label">Sell Price <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input name="price" type="number" class="form-control" id="price" placeholder="Sell Price" value="<?php echo $item->price ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="tax" class="col-sm-4 col-form-label">Tax</label>
                                        <div class="col-sm-8">
                                            <?php echo form_dropdown('tax', $taxes, $item->tax, 'class="form-control" id="tax"') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="manufacturer_id" class="col-sm-4 col-form-label"><?php echo display('manufactured_by')?> <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <?php echo form_dropdown('manufacturer_id', $manufacturer_list, $item->manufacturer_id, 'class="form-control" id="manufacturer_id"') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="buy_price" class="col-sm-4 col-form-label">Manufacturer Price <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input name="buy_price" type="number" class="form-control" id="buy_price" placeholder="Manufacturer Price" value="<?php echo $item->buy_price ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-5 col-sm-7">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>

                        <?php echo form_close() ?>

                        <?php else: ?>
                            <div class="alert alert-danger">Item not found</div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>