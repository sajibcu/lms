<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default panel-form">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open_multipart('dashboard_laboratorist/lab_manager/setting/create','class="form-inner"') ?>
                            <?php echo form_hidden('setting_id',$setting->setting_id) ?>

                            <div class="form-group row">
                                <label for="doctor_id" class="col-xs-3 col-form-label">Doctor <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('doctor_id', $doctors, $setting->doctor_id, 'id="doctor_id" class="form-control" required="required"') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="checker_id" class="col-xs-3 col-form-label">Checked By</label>
                                <div class="col-xs-9">
                                    <select name="checker_id" id="checker_id" class="form-control select2">
                                        <?php foreach($checkers as $checker): ?>
                                            <option value="<?= $checker->user_id ?>"<?= $checker->user_id == $setting->checker_id ? ' selected' : '' ?>><?= $checker->firstname.' '.$checker->lastname ?></option>
                                        <?php endforeach ?>
                                    </select>
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
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
