<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("billing/admission/index") ?>"> <i class="fa fa-list"></i>  <?php echo display('admission_list') ?> </a>  
                </div>
            </div> 

            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-sm-12">

                        <?php echo form_open('billing/admission/edit/'.$admission->admission_id, 'class="form-inner"') ?>
                        <?php echo form_hidden('admission_id', $admission->admission_id) ?>

                            <div class="form-group row">
                                <label for="patient_id" class="col-sm-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-9">
                                    <input name="patient_id"  type="text" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" value="<?php echo $admission->patient_id ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="doctor_id" class="col-sm-3 col-form-label"><?php echo display('doctor_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-9">
                                    <?php echo form_dropdown('doctor_id', $doctor_list, $admission->doctor_id, array('class'=>'form-control', 'id'=>'doctor_id')) ?> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reffered_by" class="col-sm-3 col-form-label">Reffered By</label>
                                <div class="col-sm-9">
                                    <input name="reffered_by"  type="text" class="form-control" id="reffered_by" placeholder="Reffered by" value="<?php echo $admission->reffered_by ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nursing_by" class="col-sm-3 col-form-label">Nursing By </label>
                                <div class="col-sm-9">
                                    <?php echo form_dropdown('nurse_id', $nurse_list, $admission->nurse_id, array('class'=>'form-control', 'id'=>'nurse_id')) ?> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bed_id" class="col-xs-3 col-form-label"><?php echo display('bed_type') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('bed_id', $bed_list, '', 'class="form-control dateChange" id="bed_id"') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="admission_date" class="col-sm-3 col-form-label"><?php echo display('admission_date') ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-9">
                                    <input name="admission_date"  type="text" class="form-control datepicker" id="admission_date" placeholder="<?php echo display('admission_date') ?>" value="<?php echo $admission->admission_date ?>">
                                </div>
                            </div>

                            <div class="form-group row" style="display: none">
                                <label for="discharge_date" class="col-sm-3 col-form-label"><?php echo display('discharge_date') ?></label>
                                <div class="col-sm-9">
                                    <input name="discharge_date"  type="text" class="form-control datepicker" id="discharge_date" placeholder="<?php echo display('discharge_date') ?>" value="<?php echo $admission->discharge_date ?>">
                                </div>
                            </div>

                            <div class="form-group row" style="display: none">
                                <label for="package_id" class="col-sm-3 col-form-label"><?php echo display('package_name') ?> </label>
                                <div class="col-sm-9">
                                    <?php echo form_dropdown('package_id', $package_list, $admission->package_id, array('class'=>'form-control', 'id'=>'doctor_id')) ?> 
                                </div>
                            </div>

                            <div class="form-group row" style="display: none">
                                <label for="insurance_id" class="col-sm-3 col-form-label"><?php echo display('insurance_name') ?></label>
                                <div class="col-sm-9">
                                    <?php echo form_dropdown('insurance_id', $insurance_list, $admission->insurance_id, array('class'=>'form-control', 'id'=>'doctor_id')) ?> 
                                </div>
                            </div>

                            <div class="form-group row" style="display: none">
                                <label for="policy_no" class="col-sm-3 col-form-label"><?php echo display('policy_no') ?> </label>
                                <div class="col-sm-9">
                                    <input name="policy_no"  type="text" class="form-control" id="policy_no" placeholder="<?php echo display('policy_no') ?>" value="<?php echo $admission->policy_no ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="agent_name" class="col-sm-3 col-form-label"><?php echo display('agent_name') ?></label>
                                <div class="col-sm-9">
                                    <input name="agent_name"  type="text" class="form-control" id="agent_name" placeholder="<?php echo display('agent_name') ?>" value="<?php echo $admission->agent_name ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="guardian_name" class="col-sm-3 col-form-label"><?php echo display('guardian_name') ?><i class="text-danger">*</i> </label>
                                <div class="col-sm-9">
                                    <input name="guardian_name"  type="text" class="form-control" id="guardian_name" placeholder="<?php echo display('guardian_name') ?>" value="<?php echo $admission->guardian_name ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="guardian_relation" class="col-sm-3 col-form-label"><?php echo display('guardian_relation') ?><i class="text-danger">*</i> </label>
                                <div class="col-sm-9">
                                    <input name="guardian_relation"  type="text" class="form-control" id="guardian_relation" placeholder="<?php echo display('guardian_relation') ?>" value="<?php echo $admission->guardian_relation ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="guardian_contact" class="col-sm-3 col-form-label"><?php echo display('guardian_contact') ?><i class="text-danger">*</i> </label>
                                <div class="col-sm-9">
                                    <input name="guardian_contact"  type="text" class="form-control" id="guardian_contact" placeholder="<?php echo display('guardian_contact') ?>" value="<?php echo $admission->guardian_contact ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="guardian_address" class="col-sm-3 col-form-label"><?php echo display('guardian_address') ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-9">
                                    <textarea name="guardian_address" guardian_address="guardian_address"  type="text" class="form-control" id="guardian_address" placeholder="<?php echo display('guardian_address') ?>"><?php echo $admission->guardian_address ?></textarea>
                                </div>
                            </div>

                            <!--Radio-->
                            <div class="form-group row">
                                <label class="col-sm-4"><?php echo display('status') ?></label>
                                <div class="col-sm-4"> 
                                    <div class="form-check">
                                        <label class="radio-inline"><input type="radio" name="status" value="1" checked><?php echo display('active') ?></label>
                                        <label class="radio-inline"><input type="radio" name="status" value="0"><?php echo display('inactive') ?></label>
                                    </div>
                                </div> 
                                <div class="col-sm-4">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('update') ?></button>
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
 
</head>
<body>
  
