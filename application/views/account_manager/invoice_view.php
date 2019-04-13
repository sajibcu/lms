<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <?php if($this->session->userdata('user_role') == 7 || $this->session->userdata('user_role') == 1){?>
                        <a class="btn btn-success" href="<?php echo base_url("account_manager/invoice/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_invoice') ?> </a> 
                    <?php }?> 

                    <?php if($this->session->userdata('user_role') == 7 || $this->session->userdata('user_role') == 1){?>
                        <a class="btn btn-primary" href="<?php echo base_url("account_manager/invoice") ?>"> <i class="fa fa-list"></i>  <?php echo display('invoice_list') ?> </a>  
                    <?php }?> 
                    <?php if($this->session->userdata('user_role') == 3){ // for account manager?> 
                        <a class="btn btn-primary" href="<?php echo base_url("dashboard_accountant/account_manager/invoice") ?>"> <i class="fa fa-list"></i>  <?php echo display('invoice_list') ?> </a>  
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

                                    <th width="40%" style="vertical-align: top;">
                                        <ul class="list-unstyled"> 
                                            <li>
                                                <strong><?php echo display('patient_id') ?></strong>
                                                <span class="invoice-input">
                                                <?php echo $invoice->patient_id ?></span>
                                            </li>   
                                            <li><strong><?php echo "Patient Name: " ?></strong> 
                                                <span class="invoice-input">
                                                <?php echo $invoice->firstname ?> <?php echo $invoice->lastname ?></span>
                                            </li> 
                                            <li><strong><?php echo "Age: " ?></strong> 
                                                <span class="invoice-input">
                                                <?php echo $invoice->age ?></span>
                                            </li> 
                                            <li><strong><?php echo "Mobile: " ?></strong> 
                                                <span class="invoice-input">
                                                <?php echo $invoice->mobile ?></span>
                                            </li> 

                                            <li> 
                                            <strong><?php echo display('address') ?>:</strong>
                                                <span class="invoice-input">
                                                <?php echo $invoice->address ?></span>
                                            </li>  
                                        </ul>
                                    </th>  
                                    <th width="30%" style="vertical-align: top;"> 
                                        <strong style="border:1px solid #ccc;padding:5px 50px;"><?php echo display('invoice') ?></strong> 
                                    </th>  
                                    <th width="30%" style="vertical-align: top;">
                                        <h4>
                                            <?php echo display('date') ?> :  
                                            <span class="invoice-input"><?php echo date('d-m-Y', strtotime($invoice->date)); ?></span>  
                                            <br> 
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
                                                echo "<br/>Website: ".$website->website;
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
                                    <th><?php echo display('account_name') ?></th>
                                    <th><?php echo display('description') ?></th>
                                    <th><?php echo display('quantity') ?></th>
                                    <th><?php echo display('price') ?></th>
                                    <th width="160" class="text-center"><?php echo display('subtotal') ?></th>
                                </tr>
                            </thead>
                            
                            <!-- showing data -->
                            <tbody>
                                <?php 
                                if (!empty($invoice_data)) {
                                    foreach ($invoice_data as $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value->name ?></td>
                                    <td><?php echo $value->description ?></td>
                                    <td><?php echo sprintf('%0.2f', $value->quantity) ?></td>
                                    <td><?php echo sprintf('%0.2f', $value->price) ?></td>
                                    <td class="text-center"><?php echo sprintf('%0.2f', $value->subtotal) ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?> 
                            </tbody>
                            <!-- ends of showing data -->

                            <tfoot> 
                                <tr class="bg-info">  
                                    <td colspan="3"></td> 
                                    <th><?php echo display('total') ?></th>  
                                    <th class="text-center"><?php echo sprintf('%0.2f', $invoice->total) ?></th>   
                                </tr>
                                <tr>  
                                    <td colspan="3"></td> 
                                    <th><?php echo display('vat') ?></th>
                                    <th class="text-center"><?php echo sprintf('%0.2f', $invoice->vat) ?></th>    
                                </tr>
                                <tr>  
                                    <td colspan="3"></td> 
                                    <th><?php echo display('discount') ?></th>
                                    <th class="text-center"><?php echo sprintf('%0.2f', $invoice->discount) ?></th>    
                                </tr>
                                <tr class="bg-success">  
                                    <td colspan="3"></td> 
                                    <th><?php echo display('grand_total') ?></th>
                                    <th class="text-center"><?php echo sprintf('%0.2f', $invoice->grand_total) ?></th>    
                                </tr>
                                <tr>  
                                    <td colspan="3"></td> 
                                    <th><?php echo display('paid') ?></th>
                                    <th class="text-center"><?php echo sprintf('%0.2f', $invoice->paid) ?></th>    
                                </tr>
                                <tr class="bg-danger">
                                    <td colspan="3"></td> 
                                    <th><?php echo display('due') ?></th>
                                    <th class="text-center"><?php echo sprintf('%0.2f', $invoice->due) ?></th>    
                                </tr> 
                            </tfoot>
                        </table>  
                        <?php echo form_close() ?>
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
        $('body').css('fontSize','10px');
        //document.getElementById("#PrintMe").style.fontSize = "";
        var printcontent = '<div align="center"><strong>Patient Copy</strong></div>';
        printcontent += $('#' + el).html();
        printcontent += '<br/><br/><br/><div align="center"><strong>Office Copy</strong></div>';
        printcontent += $('#' + el).html();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        location.reload();
    }
    
</script>
