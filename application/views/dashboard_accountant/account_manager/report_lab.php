<div class="row">

    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body"> 

                <form class="form-inline" action="<?php echo base_url('dashboard_accountant/account_manager/report/lab') ?>">

                    <div class="form-group">
                        <?php
                            $ReportOption = array(
                                '1' => display('all'), 
                                '2' => display('patient_wise'),
                                '3' => 'Operator Wise',
                                '4' => 'Doctor Wise',
                            );
                            echo form_dropdown('report_option',$ReportOption, $date->report_option, 'class="form-control" id="ReportOption"' );
                        ?>
                    </div> 

                    <div class="form-group hide" id="AccountWise">
                        <label class="sr-only" for="operator_id"><?php echo display('operator_id') ?></label>
                        <?php echo form_dropdown('operator_id', $operator_list, $date->operator_id,'class="form-control"') ?> 
                    </div>   

                    <div class="form-group hide" id="PatientWise">
                        <label class="sr-only" for="patient_id"><?php echo display('patient_id') ?></label>
                        <input type="text" name="patient_id" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" value="<?php echo $date->patient_id ?>">
                    </div>

                    <div class="form-group hide" id="DoctorWise">
                        <label class="sr-only" for="doctor_id"><?php echo display('doctor_id') ?></label>
                        <?php echo form_dropdown('doctor_id', $doctor_list, $date->doctor_id,'class="form-control"') ?> 
                    </div>   

                    <div class="form-group">
                        <label class="sr-only" for="start_date"><?php echo display('start_date') ?></label>
                        <input type="text" name="start_date" class="form-control datepicker" id="start_date" placeholder="<?php echo display('start_date') ?>" value="<?php echo $date->start_date ?>">
                    </div> 

                    <div class="form-group">
                        <label class="sr-only" for="end_date"><?php echo display('end_date') ?></label>
                        <input type="text" name="end_date" class="form-control datepicker" id="end_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo $date->end_date ?>">
                    </div>  

                    <button type="submit" class="btn btn-success"><?php echo display('filter') ?></button>

                </form>

            </div>
        </div>
    </div>
  

    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body">
                <?php 
                    $userRoles = array( 
                        '1' => display('admin'),
                        '2' => display('doctor'),
                        '3' => display('accountant'),
                        '4' => display('laboratorist'),
                        '5' => display('nurse'),
                        '6' => display('pharmacist'),
                        '7' => display('receptionist'),
                        '8' => display('representative'), 
                        '9' => display('case_manager') 
                    ); 
                ?>
                <table width="100%" class="table table-striped table-bordered table-hover" id="acmCReport">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th>Invoice No</th>
                            <th>Operator</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Invoice Date</th>
                            <th><?php echo display('amount') ?>
                        </tr>
                    </thead>
                <tfoot>
                    <tr>
                        <th></th>   
                        <th></th>   
                        <th></th>   
                        <th></th>   
                        <th></th>   
                        <th></th>   
                        <th></th>   
                    </tr>
                </tfoot>

                <tbody>
                    <?php  
                    if (!empty($invoice)) {
                        $sl = 1;
                        foreach ($invoice as $value) {
                    ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?= base_url('lab_manager/invoice/details/'.$value->id) ?>" target="_blank" rel="noopener noreferrer"><?= $value->invoice_id ?></a></td>
                            <td><?= $value->operator_name; ?><?= isset($userRoles[$value->operator_role]) ? ' ('.$userRoles[$value->operator_role].')' : ''; ?></td>
                            <td><?php echo $value->patient_name; ?></td>
                            <td><?php echo $value->doctor_name; ?></td>
                            <td><?php echo $value->date; ?></td>
                            <td><?php echo  sprintf('%0.2f', $value->paid_amount); ?></td>
                        </tr>
                    <?php 
                        $sl++;

                        } 
                    } 
                    ?> 
                </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function() {

    $(window).load(function(){
        var option = '<?php echo $this->input->get("report_option") ?>';
        reportFilter(option);
    });

    function reportFilter(option) 
    {
        if (option == 2) {
            $("#PatientWise").removeClass('hide');
            $("#AccountWise").addClass('hide');
            $("#DebitAccount").addClass('hide'); 
            $("#CreditAccount").addClass('hide');
            $("#DoctorWise").addClass('hide');
        } else if (option == 3) {
            $("#AccountWise").removeClass('hide');
            $("#PatientWise").addClass('hide');
            $("#DoctorWise").addClass('hide');
        } else if (option == 4) {
            $("#DoctorWise").removeClass('hide');
            $("#AccountWise").addClass('hide');
            $("#PatientWise").addClass('hide');
        } else { 
            $("#DoctorWise").addClass('hide');
            $("#AccountWise").addClass('hide');
            $("#PatientWise").addClass('hide');
            $("#DebitAccount").addClass('hide');
            $("#CreditAccount").addClass('hide');
        } 
    }



    $('#ReportOption').change(function(){
        var option = $(this).val();
        reportFilter(option);
    });

    $("#AccType").change(function() {
        var type = $(this).val();

        if (type == 1) { //debit wise
            $("#DebitAccount").removeClass('hide');
            $("#CreditAccount").addClass('hide');
        } else if (type == 2) { //credit wise
            $("#CreditAccount").removeClass('hide');
            $("#DebitAccount").addClass('hide');
        } else { 
            $("#CreditAccount").addClass('hide');
            $("#DebitAccount").addClass('hide'); 
        } 
    });


    $('#acmCReport').DataTable( {
        responsive: true, 
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp", 
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], 
        buttons: [ {extend: 'copy', className: 'btn-sm'}, 
        {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'}, 
        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'}, 
        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}, 
        {extend: 'print', className: 'btn-sm'} ], 

        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1:typeof i === 'number' ? i : 0;
            };   

            //#----------- Total over this page------------------#
            amount = api.column(6, { page: 'current'} ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                },0); 
            //#------ends of Total over this page------------------#
            // Update footer
            $( api.column(6).footer()).html(amount.toFixed(2));
        } 
    });
});

</script>
