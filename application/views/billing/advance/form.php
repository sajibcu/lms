<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("billing/advance/index") ?>"> <i class="fa fa-list"></i>  <?php echo display('advance_list') ?> </a>  
                </div>
            </div> 

            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('billing/advance/form/'.$advance->id,'class="form-inner"') ?>

                            <?php echo form_hidden('id',$advance->id) ?>

                            <div class="form-group row">
                                <label for="admission_id" class="col-xs-3 col-form-label"><?php echo display('admission_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="admission_id"  type="text" class="form-control" id="admission_id" placeholder="<?php echo display('admission_id') ?>" value="<?php echo $advance->admission_id ?>" onblur="getPatientId(this)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="patient_id"  type="text" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" value="<?php echo $advance->patient_id ?>">
                                    <span id="patient_name"></span>
                                </div>

                            </div> 
                            <div class="form-group row">
                                <label for="amount" class="col-xs-3 col-form-label"><?php echo display('amount') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="amount"  type="text" class="form-control" id="amount" placeholder="<?php echo display('amount') ?>" value="<?php echo $advance->amount ?>">
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="form-group row">
                                <label for="amount" class="col-xs-3 col-form-label"><?php echo "Description" ?><i class="text-danger">*</i> </label>
                                <div class="col-xs-9">
                                    <input name="description"  type="text" class="form-control" id="description" placeholder="<?php echo "Description" ?>" value="<?php echo $advance->description ?>">
                                </div>
                            </div>
                            <div class="form-group row" style="display: none">
                                <label for="payment_method" class="col-xs-3 col-form-label"><?php echo display('payment_method') ?></label>
                                <div class="col-xs-9">
                                    <input name="payment_method"  type="text" class="form-control" id="payment_method" placeholder="<?php echo display('payment_method') ?>" value="<?php echo $advance->payment_method ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                 <label for="cash_card_or_cheque" class="col-xs-3 col-form-label"><?php echo display('payment_method') ?><i class="text-danger">*</i></label>
                                <!-- <label for="cash_card_or_cheque" class="col-xs-3 col-form-label"><?php echo display('cash_card_or_cheque') ?></label> -->
                                <div class="col-xs-9">
                                    <?php 
                                        $paymentList = array(
                                            ''    => display('select_option'),
                                            'Cash'=>display('cash'),
                                            'Card'=>display('card'),
                                            'Cheque'=>display('cheque'),
                                        );
                                        echo form_dropdown('cash_card_or_cheque', $paymentList, $advance->cash_card_or_cheque, array('class'=>'form-control'));
                                    ?> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="receipt_no" class="col-xs-3 col-form-label"><?php echo display('receipt_no') ?></label>
                                <div class="col-xs-9">
                                    <input name="receipt_no"  type="text" class="form-control" id="receipt_no" placeholder="<?php echo display('receipt_no') ?>" value="<?php echo $advance->receipt_no ?>" readonly>
                                </div>
                            </div>

                            <!--Radio-->
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

<script type="text/javascript">
    function getPatientId(obj){
        if(obj.value !="")
        {
            $.ajax({
                url  : '<?= base_url('patient/getPaientInfo') ?>',
                type : 'POST',
                dataType : 'JSON',
                data : {
                    '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                    aid : obj.value,   
                },
                success : function(data) 
                {
                    //alert(data);
                    if(data==null){
                        $("#patient_id").val('');
                        $("#patient_name").hide();

                    }else{
                        $("#patient_id").val(data.patient_id);
                        $("#patient_name").html(data.name);
                        $("#patient_name").show();
                    }
                    
                    //discharge_date.next().html(data.message);
                }, 
                error : function()
                {
                    alert('failed');
                }
            });
        }
        $("#patient_name").hide();

    }
</script>