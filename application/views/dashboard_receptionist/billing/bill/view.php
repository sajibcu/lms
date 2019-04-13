<style type="text/css">
    .pagebreak { page-break-after: always; }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">

            <div class="panel-heading no-print row">
                <div class="btn-group col-xs-5"> 
                    <?php if($this->session->userdata('user_role') == 3){ // for account manager?> 
                        <a class="btn btn-primary" href="<?php echo base_url("dashboard_accountant/billing/bill") ?>"> <i class="fa fa-list"></i>  <?php echo display('bill_list') ?> </a>  
                    <?php }?>
                    <?php if($this->session->userdata('user_role') == 7){ // for account manager?> 
                        <a class="btn btn-primary" href="<?php echo base_url("dashboard_receptionist/billing/bill") ?>"> <i class="fa fa-list"></i>  <?php echo "Discharge Bill List" ?> </a>  
                        <a class="btn btn-success" href="<?php echo base_url("dashboard_receptionist/billing/bill/form") ?>"> <i class="fa fa-plus"></i>  <?php echo "Discharge Bill" ?> </a> 
                    <?php }?>
                      
                    <button onclick="PrintMe('print')" type="button" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo display("print") ?></button>
                </div>
                <!-- <h2 class="col-xs-7 text-left text-success"><?php echo "Discharge ".display('bill_details') ?></h2> -->
            </div>  

            <div class="panel-body" id="print" class="pagebreak">
                <div class="row">
                    <div align="center"><table>
                        <th>
                                        <strong style="border:1px solid #ccc;padding:5px 10px;">Discharge Bill</strong> 
                        </th>
                    </table></div>
                    <div class="col-xs-6 logo_bar">
                        <!-- <img src="<?php echo base_url("$website->logo") ?>" class="img-responsive" alt=""></br> -->
                        <?php if($website->phone !="") {
                            echo display('phone')." : ".$website->phone; 
                            }?></br>
                        <?php if($website->mobile !="") {
                            echo "Mobile"." : ".$website->mobile; 
                            }?></br>
                        <?php if($website->email !="") {
                            echo "Email"." : ".$website->email; 
                            }?></br>
                        <?php if($website->website !="") {
                            echo "Website"." : ".$website->website; 
                            }?></br>
                    </div>
                    <div class="col-xs-6 address_bar">
                        <div class="address_inner">
                            <address>
                                <strong><?php echo display('address') ?></strong><br>
                                <strong><?php echo $website->title; ?></strong><br>
                                <?php echo $website->description; ?>
                            </address>
                        </div>
                    </div>
                </div> <hr>
                <!-- Patient Info -->
                <div class="row patient_info">
                    <table class="info">
                        <tbody>
                            <tr>
                                <td><?php echo display('admission_id'); ?>:</td>
                                <td><?php echo $bill->admission_id; ?></td>
                                <td><?php echo display('bill_date'); ?>:</td>
                                <td><?php echo date('d-m-Y',strtotime($bill->bill_date)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('patient_id'); ?>:</td>
                                <td><?php echo $bill->patient_id; ?></td>
                                <td><?php echo display('date_of_birth'); ?>:</td>
                                <td><?php echo date('d-m-Y',strtotime($bill->date_of_birth)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('patient_name'); ?>:</td>
                                <td><?php echo $bill->patient_name; ?></td>
                                <td><?php echo display('sex'); ?>:</td>
                                <td><?php echo $bill->sex ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('address'); ?>:</td>
                                <td><?php echo $bill->address; ?></td>
                                <td><?php echo display('doctor_name'); ?>:</td>
                                <td><?php echo $bill->doctor_name; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Patient Package -->
                <div class="patient_package">
                    <table class="package">
                        <tbody>
                            <tr>
                                <td><?php echo display('admission_date'); ?>:</td>
                                <td><?php echo date('d-m-Y',strtotime($bill->admission_date)); ?></td>
                                <td><?php echo display('discharge_date'); ?>:</td>
                                <td><?php echo date('d-m-Y',strtotime($bill->discharge_date)); ?></td>
                                <td><?php echo display('total_days'); ?>:</td>
                                <td><?php echo $bill->total_days; ?></td>
                            </tr>
                            <tr style="display: none">
                                <td><?php echo display('package_name'); ?>:</td>
                                <td><?php echo $bill->package_name; ?></td>
                                <td><?php echo display('insurance_name'); ?>:</td>
                                <td><?php echo $bill->insurance_name; ?></td>
                                <td><?php echo display('policy_no'); ?>:</td>
                                <td><?php echo $bill->policy_no; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Patient Charge -->
                <div class="patient_charge">
                    <table class="charge">
                        <thead>
                            <tr>
                                <th><?php echo display('serial'); ?></th>
                                <th><?php echo display('service_name'); ?></th>
                                <th><?php echo display('quantity'); ?></th>
                                <th><?php echo display('rate'); ?></th>
                                <th><?php echo display('subtotal'); ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $subtotal = "0.00"; 
                        $sl = 1; 
                        foreach($services as $service)
                        {  
                            $subtotal+=($service->quantity*$service->amount);
                        ?>
                        <tr>
                            <td class="description">
                                <p><?php echo $sl++; ?></p> 
                            </td>
                            <td class="description">
                                <p><?php echo $service->name; ?></p> 
                            </td>
                            <td class="charge">
                                <p><?php echo $service->quantity; ?></p> 
                            </td>
                            <td class="discount">
                                <p><?php echo $service->amount; ?></p> 
                            </td>
                            <td class="ballance">
                                <p><?php echo ($service->quantity*$service->amount); ?></p> 
                            </td>
                        </tr>
                        <?php
                        } 
                        ?> 
                        </tbody> 
                    </table>
                </div>
                
                <div class="row">
                    <div class="col-xs-4">
                        <div class="advance_payment"> 
                            <table class="payment">
                                <thead>
                                    <tr>
                                        <th colspan="3"><h4><?php echo display('advance_payment'); ?></h4></th> 
                                    </tr>
                                    <tr>
                                        <th><?php echo display('date'); ?></th>
                                        <th><?php echo display('receipt_no'); ?></th>
                                        <th><?php echo display('amount'); ?></th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <?php  
                                    $pay_advance = "0.00";
                                    foreach($advance as $adv)
                                    {
                                    $pay_advance+=$adv->amount;
                                    ?>
                                    <tr>
                                        <td><?php echo $adv->date ?></td>
                                        <td><?php echo $adv->receipt_no ?></td>
                                        <td><?php echo $adv->amount ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <table class="payment">
                            <thead>
                                <tr>
                                    <th><?php echo display('payment_method'); ?></th>
                                    <th><?php echo $bill->payment_method ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo display('card_cheque_no'); ?></td>
                                    <td><?php echo $bill->card_cheque_no ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo display('receipt_no'); ?></td>
                                    <td><?php echo $bill->receipt_no ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-4">
                        <table class="payment">
                            <thead>
                                <tr>
                                    <td><?php echo display('total'); ?></td>
                                    <th><?php echo  @sprintf("%.2f", (isset($subtotal)?$subtotal:"0.00")) ?></th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr> 
                                    <td><?php echo display('discount'); ?> (<?php echo  @sprintf("%.2f", (($bill->discount/$subtotal)*100)) ?>%)</td>
                                    <td><?php echo  @sprintf("%.2f", $bill->discount) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo display('tax'); ?> (<?php echo  @sprintf("%.2f", (($bill->tax/$subtotal)*100)) ?>%)</td>
                                    <td><?php echo  @sprintf("%.2f", $bill->tax) ?></td>
                                </tr>
                                <tr>
                                    <td>Advance paid</td>
                                    <td><?php echo  @sprintf("%.2f", (isset($pay_advance)?$pay_advance:"0.00")) ?></td>
                                </tr> 
                            </tbody>
                            <thead>
                                <tr>
                                    <td><?php if($subtotal-$bill->discount+$bill->tax-$pay_advance<0) echo "Refund";
                                                else echo "Paid";

                                             ?></td>
                                    <th><?php echo  @sprintf("%.2f", ($subtotal-$bill->discount+$bill->tax-$pay_advance),2) ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="my_sign">
                    <br/><br/>
                        <table width="100%">
                            <tr>
                                    <th width="35%">
                                        ------------------------------</br>
                                        Accountant Signature

                                    </th>
                                    <th  align="right" width="35%">
                                    --------------------------------</br>
                                        Coordinator Signature
                                    </th>
                                    <th align="right" width="30%">
                                    ----------------------------</br>
                                        ED/FD Signature
                                    </th>
                            </tr>
                            <tr height="50px">
                                <td colspan="3"> </td>
                            </tr>
                            <tfoot>
                                <th colspan="2" >Developed by: <?=$this->config->item('devlop_website');?></th>
                                <th >Email: <?=$this->config->item('devloper_email');?></th>
                            </tfoot>
                        </table>
                </div>
            </div> 
        </div>
    </div>
</div>

<script type="text/javascript">
    function PrintMe(el) {
        var restorepage  = $('body').html();
        $('body').css('height','297mm');
        $('body').css('width','210mm');
        $('html').css('height','297mm');
        $('html').css('width','210mm');
        $('body').css('fontSize','10px');
        var printcontent = '<div align="center">&nbsp;&nbsp;&nbsp;<strong>Patient Copy</strong></div><br/>';
        printcontent += $('#' + el).html();
        //alert($('#' + el).html());
        /*printcontent += '<br/><br/><br/><br/><br/><br/><div align="center">&nbsp;&nbsp;&nbsp;<strong>Office Copy</strong></div><br/>';
        printcontent += $('#' + el).html();*/
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        location.reload();
    }
    
</script>
