<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">

            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-primary" href="<?php echo base_url("pharmacy_manager/manufacturer") ?>"> <i class="fa fa-list"></i>  Manufacturer List </a> 
                </div>
            </div>

            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('pharmacy_manager/manufacturer/form/'.$item->manufacturer_id,'class="form-inner"') ?>

                            <?php echo form_hidden('id',$item->manufacturer_id) ?>

                            <div class="form-group row">
                                <label for="name" class="col-xs-3 col-form-label">Name <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="name"  type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $item->manufacturer_name ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-xs-3 col-form-label">Manufacturer Mobile</label>
                                <div class="col-xs-9">
                                    <input name="mobile"  type="text" class="form-control" id="mobile" placeholder="Manufacturer Mobile" value="<?php echo $item->mobile ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-xs-3 col-form-label">Manufacturer Address</label>
                                <div class="col-xs-9">
                                    <textarea name="address" id="address" class="form-control" cols="30" rows="3" placeholder="Manufacturer Address"><?php echo $item->address ?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="details" class="col-xs-3 col-form-label">Manufacturer Details</label>
                                <div class="col-xs-9">
                                    <textarea name="details" id="details" class="form-control" cols="30" rows="3" placeholder="Manufacturer Details"><?php echo $item->details ?></textarea>
                                </div>
                            </div>

                            <?php if( isset($item->balance) ): ?> 
                            <div class="form-group row">
                                <label for="balance" class="col-xs-3 col-form-label">Previous Balance</label>
                                <div class="col-xs-9">
                                    <input name="balance"  type="number" class="form-control" id="balance" placeholder="Previous Balance" value="<?php echo $item->balance ?>">
                                </div>
                            </div>
                            <?php endif ?>

                            <!--Radios-->
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?></label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline"><input type="radio" name="status" value="1" checked><?php echo display('active') ?></label>
                                        <label class="radio-inline"><input type="radio" name="status" value="0"><?php echo display('inactive') ?></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>

                        <?php echo form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>