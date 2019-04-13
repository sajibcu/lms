<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <div >
                <style type="text/css">
                    @page{
                        size: auto;
                        margin: 3mm;
                    }
                    @media print{
                        .copy-dev{
                            position: fixed;
                            width: 100%;
                            height: 19px;
                            bottom: 15px;
                        }
                    }
                </style>
                <div class="panel-body" id="printableArea">
                    <!-- start -->
                    <table class="table table-striped">
                            <thead>
                                
                                </tr>

                                    <th width="40%" style="vertical-align: top;">
                                        <ul class="list-unstyled"> 
                                            <li>
                                                <strong><?php echo display('patient_id') ?></strong>
                                                <span class="invoice-input">
                                                <?php echo $patient->patient_id ?></span>
                                            </li>   
                                            <li><strong><?php echo "Patient Name: " ?></strong> 
                                                <span class="invoice-input">
                                                <?php echo $patient->firstname ?> <?php echo $patient->lastname ?></span>
                                            </li> 
                                            <li><strong><?php echo "Age: " ?></strong> 
                                                <span class="invoice-input">
                                                <?php echo $patient->age ?></span>
                                            </li> 
                                            <li><strong><?php echo "Mobile: " ?></strong> 
                                                <span class="invoice-input">
                                                <?php echo $patient->mobile ?></span>
                                            </li> 

                                            <li> 
                                            <strong><?php echo display('address') ?>:</strong>
                                                <span class="invoice-input">
                                                <?php echo $patient->address ?></span>
                                            </li>  
                                        </ul>
                                    </th>  
                                    <th width="30%" style="vertical-align: top;"> 
                                        <strong style="border:1px solid #ccc;padding:5px 50px;">Lab Invoice</strong> 
                                    </th>  
                                    <th width="30%" style="vertical-align: top;">
                                        <h4>
                                            <?php echo display('date') ?> :  
                                            <span class="invoice-input"><?php echo date('d-m-Y'); ?></span>  
                                            <br> 
                                            <?php echo $setting->title; ?>
                                            <br> 
                                            <?php echo $setting->description; ?>
                                            <?php
                                            if($setting->phone !='')
                                            {
                                                echo "<br/>Phone: ".$setting->phone;
                                            }
                                            if($setting->mobile !='')
                                            {
                                                echo "<br/>Mobile: ".$setting->mobile;
                                            }
                                            if($setting->fax !='')
                                            {
                                                echo "<br/>Fax: ".$setting->fax;
                                            }
                                            if($setting->website !='')
                                            {
                                                echo "<br/>Website: ".$setting->website;
                                            }
                                            if($setting->email !='')
                                            {
                                                echo "<br/>Email:".$setting->email;
                                            }
                                            ?>
                                            
                                        </h4>
                                    </th> 
                                </tr>
                            </thead>
                        </table>

                    <!-- end -->
                    <hr>

                    <div class="table-responsive m-b-20">
                        <?php $subtotal = 0; ?>
                        <?php $totalqty = 0; ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">SL.</th>
                                    <th class="text-center">Test Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Discount / Pcs. </th>
                                    <th class="text-center">Sale Price</th>
                                    <th class="text-center">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $index => $subitem): ?>
                                <?php $subtotal += $subitem->total_price ?>
                                <?php $totalqty += $subitem->quantity ?>
                                <tr>
                                    <td class="text-center"><?= $index + 1 ?></td>
                                    <td class="text-center">
                                        <div><strong><?= $subitem->product_name ?></strong></div>
                                    </td>
                                    <td align="center"><?= $subitem->quantity ?></td>
                                    <td align="center"><?= format_price($subitem->discount, $currency, $currency_position) ?></td>
                                    <td align="center"><?= format_price($subitem->rate, $currency, $currency_position) ?></td>
                                    <td align="center"><?= format_price($subitem->total_price, $currency, $currency_position) ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr><td align="center" colspan="1" style="border: 0px"><b>Sub Total:</b></td>
                                <td style="border: 0px"></td>
                                <td align="center" style="border: 0px"><b><?= $totalqty ?></b></td>
                                <td style="border: 0px"></td>
                                <td style="border: 0px"></td>
                                <td align="center" style="border: 0px"><b><?= format_price($subtotal, $currency, $currency_position) ?></b></td>
                            </tr></tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-xs-6" style="display: inline-block;">
                            <p></p>
                            <br/>
                            <p><strong>Note: Approx. Report Delivery <br/>Date & Time: <?php echo date('d/m/Y h:m:s A', strtotime("+1 day"))?></strong></p>
                        </div>
                        <div class="col-xs-6" style="display: inline-block;">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="border-top: 0; border-bottom: 0;">VAT : </th>
                                        <td style="border-top: 0; border-bottom: 0;"><?= format_price($item->total_tax, $currency, $currency_position) ?> </td>
                                    </tr>
                                    <tr>
                                        <th style="border-top: 0; border-bottom: 0;">Discount : </th>
                                        <td style="border-top: 0; border-bottom: 0;"><?= format_price($item->total_discount, $currency, $currency_position) ?> </td>
                                    </tr>

                                     <tr>
                                        <th class="grand_total">Grand Total :</th>
                                        <td class="grand_total"><?= format_price($item->total_amount, $currency, $currency_position) ?></td>
                                    </tr>
                                    <tr>
                                        <th style="border-top: 0; border-bottom: 0;">Paid Amount : </th>
                                        <td style="border-top: 0; border-bottom: 0;"><?= format_price($item->paid_amount, $currency, $currency_position) ?></td>
                                    </tr>
                                    <tr>
                                        <th style="border-top: 0; border-bottom: 0;">Due Amount : </th>
                                        <td style="border-top: 0; border-bottom: 0;"><?= format_price($item->due_amount, $currency, $currency_position) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
            <div class="panel-footer text-left">
                <a class="btn btn-danger" href="<?= base_url('lab_manager/invoice/') ?>">Cancel</a>
                <!-- <button class="btn btn-info" onclick="printContent('printableArea')"><span class="fa fa-print"></span></button> -->
                <button class="btn btn-info" onclick="PrintMe('printableArea')"><span class="fa fa-print"></span></button>
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
        printcontent += '<br/><br/><hr style="border-bottom: dotted 2px #000" /><br/><div align="center"><strong>Office Copy</strong></div>';
        printcontent += $('#' + el).html();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        location.reload();
    }
    
</script>
