<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <?php if($this->session->userdata('user_role') == 3){ // for account manager?> 
                        <a class="btn btn-primary" href="<?php echo base_url("dashboard_accountant/billing/advance/index") ?>"> <i class="fa fa-list"></i>  <?php echo display('advance_list') ?> </a> 
                    <?php }?>
                    <?php if($this->session->userdata('user_role') == 7){ // for account manager?> 
                        <a class="btn btn-primary" href="<?php echo base_url("dashboard_receptionist/billing/advance/index") ?>"> <i class="fa fa-list"></i>  <?php echo display('advance_list') ?> </a>  
                    <?php }?>
                    <?php if($this->session->userdata('user_role') == 1){ // for Admin?> 
                        <a class="btn btn-primary" href="<?php echo base_url("billing/advance/index") ?>"> <i class="fa fa-list"></i>  <?php echo display('advance_list') ?> </a>  
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
                                <tr>
                                    <th >
                                        
                                    </th>
                                    <th>
                                        <strong style="border:1px solid #ccc;padding:5px 10px;"><?php echo "Advance Payment Receipt" ?></strong> 
                                    </th>
                                    <th></th>
                                </tr>
                                <tr>  
                                    <th width="40%">
                                        <ul class="list-unstyled">
                                            <li>
                                                <strong>Date:</strong>
                                                <span class="invoice-input">
                                                    <?php echo date('d-m-Y');?>   
                                                </span>
                                            </li>

                                            <li>
                                                <strong><?php echo "AID: " ?></strong>
                                                <span class="invoice-input">
                                                <?php echo $advance_data->admission_id ?></span>
                                            </li>
                                            <li>
                                                <strong><?php echo display('patient_id').": " ?></strong>
                                                <span class="invoice-input">
                                                <?php echo $patient->patient_id ?></span>
                                            </li>   
                                            <li><strong><?php echo "Patient Name : "; ?></strong> 
                                                <span class="invoice-input">
                                                <?php echo $patient->firstname ?> <?php echo $patient->lastname ?></span>
                                            </li> 
                                            <li><strong><?php echo "Mobile : "; ?></strong> 
                                                <span class="invoice-input">
                                                <?php echo $patient->mobile ?></span>
                                            </li>  
                                            <li> 
                                            <strong><?php echo display('address')." :" ?>&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                                                <span class="invoice-input">
                                                <?php echo $patient->address ?></span>
                                            </li>  
                                        </ul>
                                    </th>  
                                    <th width="30%" class="text-left"> 
                                        
                                    </th>  
                                    <th width="30%">
                                        <h4>
                                            <?php echo $website->title; ?><br> 
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
                                    <th><?php echo "Service name" ?></th>
                                    <th><?php echo display('description') ?></th>
                                    <th><?php echo display('quantity') ?></th>
                                    <th><?php echo display('price') ?></th>
                                    <th width="160" class="text-center"><?php echo display('subtotal') ?></th>
                                </tr>
                            </thead>
                             
                            <!-- showing data -->
                            <tbody>
                                <?php 
                                /*echo "<pre>";
                                print_r($advance_data);
                                exit;*/
                                if (!empty($advance_data)) {
                                ?>
                                <tr>
                                    <td><?php echo 'Advance Payment' ?></td>
                                    <td><?php echo $advance_data->description?></td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '1' ?></td>
                                    <td><?php echo sprintf('%0.2f',$advance_data->amount); ?></td>
                                    <td class="text-center"><?php echo sprintf('%0.2f',$advance_data->amount); ?></td>
                                </tr>
                                <?php
                                }
                                ?> 
                            </tbody>
                            <!-- ends of showing data -->
                            <tfoot>
                                <tr class="bg-info">  
                                    <td colspan="3"></td> 
                                    <th><?php echo display('total') ?></th>  
                                    <th class="text-center"><?php echo sprintf('%0.2f', $advance_data->amount) ?></th>   
                                </tr>
                                <tr>  
                                    <td colspan="3"></td> 
                                    <th><?php echo display('paid') ?></th>
                                    <th class="text-center"><?php echo sprintf('%0.2f', $advance_data->amount) ?></th>    
                                </tr>
                         </tfoot>
                                
                        </table>
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



                         
                        <?php echo form_close() ?>
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
        var printcontent = '<div align="center">&nbsp;&nbsp;&nbsp;<strong>Patient Copy</strong></div><br/>';
        printcontent += $('#' + el).html();
        printcontent += '<br/><br/><br/><br/><br/><br/><div align="center">&nbsp;&nbsp;&nbsp;<strong>Office Copy</strong></div><br/>';
        printcontent += $('#' + el).html();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        location.reload();
    }
    
</script>
