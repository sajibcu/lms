
<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group">
                    
                </div>
            </div> 


            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open_multipart('user/create/'.$employee->user_id,'class="form-inner"') ?>

                            <?php echo form_hidden('user_id',$employee->user_id) ?>


                            <div class="form-group row">
                                <label for="user_role" class="col-xs-3 col-form-label"><?php echo display('user_role') ?>  <i class="text-danger">*</i></label>
                                <div class="col-xs-9"> 
                                    <select name="user_role" required >
                                        <option value="">-- SELECT USER ROLE--</option>
                                        <?php

                                        foreach ($userRoles as $role) {

                                            echo '<option value="'.$role->id.'" ';
                                            if($role->id == $employee->user_role) echo "selected ";
                                            echo ' >'.$role->name.'</option>';
                                        }
                                        
                                        ?>
                                    </select>
                                    
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="firstname" class="col-xs-3 col-form-label"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="<?php echo display('first_name') ?>" value="<?php echo $employee->firstname ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-xs-3 col-form-label"><?php echo display('last_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="<?php echo display('last_name') ?>" value="<?php echo $employee->lastname ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="father" class="col-xs-3 col-form-label">Father/Spouse Name</label>
                                <div class="col-xs-9">
                                    <input name="father_or_spouse" type="text" class="form-control" id="father_or_spouse" placeholder="Father/Spouse Name" value="<?php echo $employee->father_or_spouse ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Religion" class="col-xs-3 col-form-label">Religion</label>
                                <div class="col-xs-9">
                                    <input name="religion" type="text" class="form-control" id="religion" placeholder="Religion" value="<?php echo $employee->religion ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="designation" class="col-xs-3 col-form-label"><?php echo display('designation') ?></label>
                                <div class="col-xs-9">
                                    <input name="designation" type="text" class="form-control" id="designation" placeholder="<?php echo display('designation') ?>" value="<?php echo $employee->designation ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="specialist" class="col-xs-3 col-form-label"><?php echo display('specialist') ?></label>
                                <div class="col-xs-9">
                                    <input type="text" name="specialist" class="form-control" placeholder="<?php echo display('specialist') ?>" id="specialist" value="<?php echo $employee->specialist ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="department_id" class="col-xs-3 col-form-label"><?php echo display('department') ?> </label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('department_id',$department_list,$employee->department_id,'class="form-control" id="department_id"') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employement_type" class="col-xs-3 col-form-label"><?php echo display('employement_type') ?></label>
                                <div class="col-xs-9"> 
                                    <?php
                                        $employement_type_list = array( 
                                            ''   => display('select_option'),
                                            'Full Time' => 'Full Time',
                                            'Part Time' => 'Part Time',
                                            'Contractual' => 'Contractual',
                                            'Casual' => 'Casual',
                                            'Others' => 'Others'
                                        );
                                        echo form_dropdown('employement_type', $employement_type_list, $employee->employement_type, 'class="form-control" id="employement_type" ');

                                    ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-xs-3 col-form-label"><?php echo display('email')?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="email" class="form-control" type="text" placeholder="<?php echo display('email')?>" id="email"  value="<?php echo $employee->email ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-xs-3 col-form-label"><?php echo display('password') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" id="password" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="mobile" class="col-xs-3 col-form-label"><?php echo display('mobile') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="mobile" class="form-control" type="text" placeholder="<?php echo display('mobile') ?>" id="mobile"  value="<?php echo $employee->mobile ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_biography" class="col-xs-3 col-form-label"><?php echo display('short_biography') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="short_biography" class="tinymce form-control" placeholder="Address" id="short_biography" maxlength="140" rows="7"><?php echo $employee->short_biography ?></textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('sex') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Male" <?php echo  set_radio('sex', 'Male', TRUE); ?> ><?php echo display('male') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Female" <?php echo  set_radio('sex', 'Female'); ?> ><?php echo display('female') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Other" <?php echo  set_radio('sex', 'Other'); ?> ><?php echo display('other') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- if employee picture is already uploaded -->
                            <?php if(!empty($employee->picture)) {  ?>
                            <div class="form-group row">
                                <label for="picturePreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?php echo base_url($employee->picture) ?>" alt="Picture" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="picture" class="col-xs-3 col-form-label"><?php echo display('picture') ?></label>
                                <div class="col-xs-9">
                                    <input type="file" name="picture" id="picture" value="<?php echo $employee->picture ?>">
                                    <input type="hidden" name="old_picture" value="<?php echo $employee->picture ?>">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="date_of_birth" class="col-xs-3 col-form-label"><?php echo display('date_of_birth') ?></label>
                                <div class="col-xs-9">
                                    <input name="date_of_birth" class="datepicker form-control" type="text" placeholder="<?php echo display('date_of_birth') ?>" id="date_of_birth" value="<?php echo $employee->date_of_birth ?>" onchange = "calculateAge(this)" >
                                </div>
                            </div>

                            <!-- age of the employee -->
                            <div class="form-group row">
                                <label for="age" class="col-xs-3 col-form-label"><?php echo display('age') ?> <!-- <i class="text-danger">*</i> --></label>
                                <div class="col-xs-9">
                                    <input name="age" class="form-control"  type="text" placeholder="<?php echo display('age') ?>" id="age" onblur="calculatebirthdate()" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="blood_group" class="col-xs-3 col-form-label"><?php echo display('blood_group') ?></label>
                                <div class="col-xs-9"> 
                                    <?php
                                        $bloodList = array( 
                                            ''   => display('select_option'),
                                            'A+' => 'A+',
                                            'A-' => 'A-',
                                            'B+' => 'B+',
                                            'B-' => 'B-',
                                            'O+' => 'O+',
                                            'O-' => 'O-',
                                            'AB+' => 'AB+',
                                            'AB-' => 'AB-'
                                        );
                                        echo form_dropdown('blood_group', $bloodList, $employee->blood_group, 'class="form-control" id="blood_group" ');

                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="degree" class="col-xs-3 col-form-label"><?php echo display('education_degree') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="degree" class="tinymce form-control" placeholder="<?php echo display('education_degree') ?>" id="degree" maxlength="140" rows="7"><?php echo $employee->degree ?></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="address" class="col-xs-3 col-form-label"><?php echo display('address') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="address" class="form-control" id="address" placeholder="<?php echo display('address') ?>" maxlength="140" rows="7"><?php echo $employee->address ?></textarea>
                                </div>
                            </div> 
 
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo  set_radio('status', '1', TRUE); ?> ><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0" <?php echo  set_radio('status', '0'); ?> ><?php echo display('inactive') ?>
                                        </label>
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
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    function calculateAge(obj){
        var x = obj.value;
        alert(x);
        var today = new Date();
        var birthDate = new Date(x);
        var age = today.getFullYear() - birthDate.getFullYear();
        $("#age").val(age);
    }
    function calculatebirthdate(){
        var age = $("#age").val();
        age = age*31556926000;
        var dateOfBirth = formatDate(new Date().getTime() - age);
        $("#date_of_birth").val(dateOfBirth);
        //alert(dateOfBirth);

    }
    function formatDate(date) {
        var d = new Date(date);
        //alert(d);
        var month=d.getMonth();
        var day=d.getDate();
        var year=d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }
</script>