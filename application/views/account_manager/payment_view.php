
<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <?php if($this->session->userdata('user_role') == 3){ // for account manager?> 
                        <a class="btn btn-primary" href="<?php echo base_url("dashboard_accountant/account_manager/payment") ?>"> <i class="fa fa-list"></i><?php echo display('payment_list') ?></a>  
                    <?php }?>

                    <?php if($this->session->userdata('user_role') == 7 || $this->session->userdata('user_role') == 1){?>
                         <a class="btn btn-primary" href="<?php echo base_url("account_manager/payment") ?>"> <i class="fa fa-list"></i>  <?php echo display('payment_list') ?> </a>  
                        <a class="btn btn-success" href="<?php echo base_url("account_manager/payment/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_payment') ?> </a> 
                    <?php }?> 
                    
                    

                   

                    <button type="button" onclick="PrintMe('PrintMe')" class="btn btn-danger"><i class="fa fa-print"></i></button> 
                </div>
            </div> 
 
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 table-responsive" id="PrintMe">
                        <?php echo form_open('account_manager/invoice/create') ?> 
                        <table class="table table-striped">
                            <thead>
                                
                                </tr>
                                            <br> 
                                    <th width="40%" style="vertical-align: top;">
                                        <ul class="list-unstyled">
                                            <li>
                                                <strong><?php echo display('date') ?>:</strong>
                                                <span class="invoice-input">
                                                <?=date('d/m/Y',strtotime($payment->date))?> 
                                                </span>
                                            </li>  
                                            <li>
                                                <strong>Client Name:</strong>
                                                <span class="invoice-input">
                                                <?php echo $payment->pay_to ?></span>
                                            </li> 
                                            <li><strong><?php echo "Mobile: " ?></strong> 
                                                <span class="invoice-input">
                                                <?php echo $payment->mobile ?></span>
                                            </li> 

                                            <li> 
                                            <strong><?php echo display('address') ?>;:</strong>
                                                <span class="invoice-input">
                                                <?php echo $payment->address ?></span>
                                            </li>  
                                        </ul>
                                    </th>  
                                    <th width="30%" style="vertical-align: top;"> 
                                        <strong style="border:1px solid #ccc;padding:5px 50px;">Payment</strong> 
                                    </th>  
                                    <th width="30%" style="vertical-align: top;">
                                        <h4>
                                            <?php echo $website->title; ?>
                                            <br> 
                                            <?php echo $website->description; ?>
                                            <?php
                                            if($website->phone !='')
                                            {
                                                echo "<br/>Phone: ".$website->phone;
                                            }
                                            if($website->mobile !='')
                                            {
                                                echo "<br/>Mobile: ".$website->mobile;
                                            }
                                            if($website->fax !='')
                                            {
                                                echo "<br/>Fax: ".$website->fax;
                                            }
                                            if($website->website !='')
                                            {
                                                echo "<br/>website: ".$website->website;
                                            }
                                            if($website->email !='')
                                            {
                                                echo "<br/>Email:".$website->email;
                                            }
                                            ?>

                                        </h4>
                                    </th> 
                                </tr>
                            </thead>
                        </table>



                        <table id="invoice" class="table table-striped"> 
                            <thead>
                                <tr class="bg-primary">
                                    <th>Pay To</th>
                                    <th><?php echo display('description') ?></th>
                                    <th><?php echo display('quantity') ?></th>
                                    <th >Amount</th>
                                    <th width="160" class="text-center">Sub Total</th>
                                </tr>
                            </thead>
                            
                            <!-- showing data -->
                            <tbody>
                                <?php 
                                $totalamount = 0;
                                
                                ?>
                                <tr>
                                    <td><?php echo $payment->pay_to ?></td>
                                    <td><?php echo $payment->description ?></td>
                                    <td><?php echo sprintf('%0.2f', $payment->quantity) ?></td>
                                    <td ><?php echo sprintf('%0.2f', $payment->amount) ?></td>
                                    <td class="text-center"><?php echo sprintf('%0.2f', $payment->amount*$payment->quantity) ?></td>
                                </tr>
                                <?php
                                $totalamount+=$payment->amount*$payment->quantity;
                                ?> 
                            </tbody>
                            <!-- ends of showing data -->

                            <tfoot> 
                                <tr class="bg-info">  
                                    <td colspan="3"></td> 
                                    <th><?php echo display('total') ?></th>  
                                    <th class="text-center"><?php echo sprintf('%0.2f', $totalamount) ?></th>   
                                </tr>
                                 
                            </tfoot>
                        </table>  
                        <?php echo form_close() ?>
                        <br/>
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
                            <tr height="35px">
                                <td colspan="3"> </td>
                            </tr>

                            <tr id="Received_by" style="display: none">  
                                    <th colspan="3">
                                        ------------------------------</br>
                                        Received By
                                    </th>  
                            </tr>

                            <tr height="10px">
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
</div>

<script type="text/javascript">
    function PrintMe(el) {
        var restorepage  = $('body').html();
        $('body').css('height','297mm');
        $('body').css('width','210mm');
        $('html').css('height','297mm');
        $('html').css('width','210mm');
        $('body').css('fontSize','12px');
        //document.getElementById("#PrintMe").style.fontSize = "";
        var printcontent = '<div align="center"><strong>Client Copy</strong></div>';
        printcontent += $('#' + el).html();
        printcontent += '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><div align="center"><strong>Office Copy</strong></div>';
        $("#Received_by").show();
        printcontent += $('#' + el).html();
        //printcontent += "<div><br/> <table><tr><td>-------------------<br/>Received By</td></tr></table></div>";

        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        location.reload();
    }
    
</script>
