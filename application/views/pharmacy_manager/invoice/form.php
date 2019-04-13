<style>
    #bank_info_hide
    {
        display:none;
    }
    #payment_from_2
    {
        display:none;
    }
</style>
<!-- Customer type change by javascript start -->
<script type="text/javascript">
    function bank_info_show(payment_type)
    {
        if(payment_type.value=="1"){
            document.getElementById("bank_info_hide").style.display="none";
        }
        else{
            document.getElementById("bank_info_hide").style.display="block";
        }
    }

    function active_customer(status)
    {
        if(status=="payment_from_2"){
            document.getElementById("payment_from_2").style.display="none";
            document.getElementById("payment_from_1").style.display="block";
            document.getElementById("myRadioButton_2").checked = false;
            document.getElementById("myRadioButton_1").checked = true;
        }
        else{
            document.getElementById("payment_from_1").style.display="none";
            document.getElementById("payment_from_2").style.display="block";
            document.getElementById("myRadioButton_2").checked = false;
            document.getElementById("myRadioButton_1").checked = true;
        }
    }
</script>
<!-- Customer type change by javascript end -->

<div class="row">
    <div class="col-sm-12">
        <div class="columns">
            <a href="<?php echo base_url("pharmacy_manager/invoice") ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Manage Invoice  </a>
        </div>
    </div>
</div>

<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3>New Invoice</h3>
                </div>
            </div>

            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <?php echo form_open('pharmacy_manager/invoice/form/'.$item->id,'class="form-inner"') ?>

                            <?php echo form_hidden('id',$item->id) ?>

                            <div class="row">
                                <div class="col-sm-8" id="payment_from_1">
                                    <div class="form-group row">
                                        <label for="customer_name" class="col-sm-3 col-form-label">Customer Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <input type="text" size="100"  name="customer_name" value="<?= $item->customer_name ?>" class="customerSelection form-control" placeholder='Customer Name' id="customer_name" tabindex="1" />
                                            <input id="SchoolHiddenId" class="customer_hidden_value abc" type="hidden" name="customer_id" value="<?= $item->customer_id ?>">
                                        </div>
                                        <?php if(false): ?>
                                        <div  class=" col-sm-3">
                                            <input id="myRadioButton_1" type="button" onClick="active_customer('payment_from_1')" id="myRadioButton_1" class="btn btn-success checkbox_account ac" name="customer_confirm" checked="checked" value="New Customer" tabindex="2">
                                        </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="col-sm-8" id="payment_from_2">
                                    <div class="form-group row">
                                        <label for="customer_name_others" class="col-sm-3 col-form-label">Payee Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <input  autofill="off" type="text"  size="100" name="customer_name_others" placeholder='Payee Name' id="customer_name_others" class="form-control" />
                                        </div>

                                        <div  class="col-sm-3">
                                            <input  onClick="active_customer('payment_from_2')" type="button" id="myRadioButton_2" class="checkbox_account btn btn-success" name="customer_confirm_others" value="Old Customer">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="customer_name_others_address" class="col-sm-3 col-form-label">Address </label>
                                        <div class="col-sm-6">
                                        <input type="text"  size="100" name="customer_name_others_address" class=" form-control" placeholder='Address' id="customer_name_others_address" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Date <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input class="datepicker form-control" type="text" size="50" name="invoice_date" id="date" required value="<?= $item->invoice_date ?>" tabindex="6" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive" style="margin-top: 10px">
                                <table class="table table-bordered table-hover" id="normalinvoice">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 220px">Item Information <i class="text-danger">*</i></th>
                                            <th class="text-center" width="130">Batch<i class="text-danger">*</i></th>
                                            <th class="text-center">Ava.Qty</th>
                                            <th class="text-center" width="120">Expiry</th>
                                            <th class="text-center">Unit</th>
                                            <th class="text-center">Qty <i class="text-danger">*</i></th>
                                            <th class="text-center">Price <i class="text-danger">*</i></th>
                                            <th class="text-center">Discount / Pcs. </th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addinvoiceItem">
                                        <?php foreach($items as $index => $subitem): ?>
                                        <tr>
                                            <td style="width: 220px">
                                                <input type="text" name="product_name[]" onkeyup="invoice_productList(<?= $index + 1 ?>);" class="form-control productSelection" placeholder='Medicine Name' required="" id="product_name<?= $index + 1 ?>" tabindex="7" value="<?= $subitem->product_name ?>">
                                                <input type="hidden" class="autocomplete_hidden_value product_id_<?= $index + 1 ?>" name="product_id[]" id="SchoolHiddenId" value="<?= $subitem->product_id ?>" />
                                            </td>
                                            <td>
                                                <?php echo form_dropdown('batch_id[]', $subitem->batches, $subitem->batch_id, 'id="batch_id_'.($index + 1).'" class="form-control " required="required" tabindex="8" onchange="product_stock('.($index + 1).')"') ?>
                                            </td>
                                            <td>
                                                <input type="text" name="available_quantity[]" class="form-control text-right available_quantity_<?= $index + 1 ?>" value="<?= $subitem->available_quantity ?>" readonly="" id="available_quantity_<?= $index + 1 ?>"/>
                                            </td>
                                            <td id="expire_date_<?= $index + 1 ?>">
                                                <?php if( isset($subitem->batch_info['expire_date']) ): ?>
                                                <p style="color:green;align:center"><?= $subitem->batch_info['expire_date'] ?></p>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <input name="unit[]" id="" class="form-control text-right unit_<?= $index + 1 ?> valid" value="<?= isset($subitem->unit) ? $subitem->unit : 'None' ?>" readonly="" aria-invalid="false" type="text">
                                            </td>
                                            <td>
                                                <input type="text" name="product_quantity[]" value="<?= $subitem->product_quantity ?>" onkeyup="quantity_calculate(<?= $index + 1 ?>),checkqty(<?= $index + 1 ?>);" onchange="quantity_calculate(<?= $index + 1 ?>);" class="total_qntt_<?= $index + 1 ?> form-control text-right" id="total_qntt_<?= $index + 1 ?>" placeholder="0.00" min="0" tabindex="9" />
                                            </td>
                                            <td>
                                                <input type="text" name="product_rate[]" value="<?= $subitem->product_rate ?>" id="price_item_<?= $index + 1 ?>" class="price_item1 price_item form-control text-right" tabindex="10" required="" onkeyup="quantity_calculate(<?= $index + 1 ?>),checkqty(<?= $index + 1 ?>);" onchange="quantity_calculate(<?= $index + 1 ?>);" placeholder="0.00" min="0" readonly/>
                                            </td>
                                            <!-- Discount -->
                                            <td>
                                                <input type="text" name="discount[]" value="<?= $subitem->discount ?>" onkeyup="quantity_calculate(<?= $index + 1 ?>),checkqty(<?= $index + 1 ?>);"  onchange="quantity_calculate(<?= $index + 1 ?>);" id="discount_<?= $index + 1 ?>" class="form-control text-right" min="0" tabindex="11" placeholder="0.00"/>

                                                <input type="hidden" value="<?= $discount_type ?>" name="discount_type" id="discount_type_<?= $index + 1 ?>">
                                            </td>


                                            <td style="width: 100px">
                                                <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_<?= $index + 1 ?>" value="<?= $subitem->total_price ?>" readonly="readonly" />
                                            </td>

                                            <td>
                                                <!-- Tax calculate start-->
                                                <input id="total_tax_<?= $index + 1 ?>" class="total_tax_<?= $index + 1 ?>" type="hidden">
                                                <input id="all_tax_<?= $index + 1 ?>" class="total_tax" type="hidden" name="tax[]" value="<?= $subitem->tax ?>">
                                                <!-- Tax calculate end-->

                                                <!-- Discount calculate start-->
                                                <input type="hidden" id="total_discount_<?= $index + 1 ?>" class="" />
                                                <input type="hidden" id="all_discount_<?= $index + 1 ?>" class="total_discount"/>
                                                <!-- Discount calculate end -->

                                                <button style="text-align: right;" class="btn btn-danger" type="button" value="Delete" onclick="deleteRow(this)" tabindex="11">Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td align="center">
                                                <input type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addinvoiceItem');" value="Add New Item" tabindex="12"/>
                                                <input type="hidden" class="baseUrl" value="<?= base_url() ?>" />
                                            </td>
                                            <td style="text-align:right;" colspan="7"><b>Total Tax:</b></td>
                                            <td class="text-right">
                                                <input id="total_tax_ammount" tabindex="-1" class="form-control text-right valid" name="total_tax" value="<?= $item->total_tax ?>" readonly="readonly" aria-invalid="false" type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" rowspan="2">
                                            <center><label style="text-align:center;" for="details" class="  col-form-label">Invoice Details</label></center>
                                            <textarea name="inva_details" class="form-control" placeholder="Invoice Details"><?= $item->inva_details ?></textarea>
                                        </td>
                                            <td style="text-align:right;" colspan="1"><b>Total Discount:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" value="<?= $item->total_discount ?>" readonly="readonly" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="1"  style="text-align:right;"><b>Sub Total:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="<?= $item->grand_total_price ?>" readonly="readonly" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="8"  style="text-align:right;"><b>Invoice Discount:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="invdcount" class="form-control text-right" name="invdcount" value="<?= $item->invdcount ?>" onkeyup="invoice_discount(),checknum();" placeholder="0.00" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="8"  style="text-align:right;"><b>Grand Total:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="invtotal" class="form-control text-right" name="invtotal" value="<?= $item->invtotal ?>" readonly="readonly" />
                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="text-align:right;" colspan="8"><b>Paid Amount:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="paidAmount"
                                                onkeyup="invoice_paidamount(),checknum();" class="form-control text-right" name="paid_amount" value="<?= $item->paid_amount ?>"  placeholder="0.00" tabindex="13"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input type="button" id="full_paid_tab" class="btn btn-warning" value="Full Paid" tabindex="14" onClick="full_paid()"/>

                                                <input type="submit" id="add_invoice" class="btn btn-success" name="add-invoice" value="Submit" tabindex="15"/>
                                            </td>

                                            <td style="text-align:right;" colspan="7"><b>Due:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="<?= $item->due_amount ?>" readonly="readonly"/>
                                            </td>
                                        </tr>
                                        <tr id="change_m"><td style="text-align:right;" colspan="8" id="ch_l"><b>Change:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="change" class="form-control text-right" name="change" value="<?= $item->change ?>" readonly="readonly"/>
                                            </td></tr>
                                    </tfoot>
                                </table>
                            </div>
                        <?php echo form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Invoice Report End -->
<script type="text/javascript">
    $('.ac').click(function () {
        $('.customer_hidden_value').val('');
    });
    $('#myRadioButton_1').click(function () {
        $('#customer_name').val('');
    });

    $('#myRadioButton_2').click(function () {
        $('#customer_name_others').val('');
    });
    $('#myRadioButton_2').click(function () {
        $('#customer_name_others_address').val('');
    });

</script>

<script type="text/javascript">
    function product_stock(sl) {
        var  batch_id=$('#batch_id_'+sl).val();
        var dataString = 'batch_id='+ batch_id;
        var base_url    = $('.baseUrl').val();
        var available_quantity    = 'available_quantity_'+sl;
        var product_rate    = 'product_rate_'+sl;
        var expire_date    = 'expire_date_'+sl;
            $.ajax({
            type: "POST",
            url: base_url+"pharmacy_manager/medicine/medicine/retrieve_product_batchid",
            data: dataString,
            cache: false,
            success: function(data)
            {
                obj = JSON.parse(data);
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();

                if(dd<10){
                    dd='0'+dd;
                }
                if(mm<10){
                    mm='0'+mm;
                }
                var today = yyyy+'-'+mm+'-'+dd;

                aj = new Date(today);
                exp = new Date(obj.expire_date);

                // alert(today);

                if (aj >= exp) {

                    alert('');
                    $('#batch_id_'+sl)[0].selectedIndex = 0;


                    $('#'+expire_date).html('<p style="color:red;align:center">'+obj.expire_date+'</p>');
                    document.getElementById('expire_date_'+sl).innerHTML = '';


                }else{
                    $('#'+expire_date).html('<p style="color:green;align:center">'+obj.expire_date+'</p>');
                }
                $('#'+available_quantity).val(obj.total_product);

            }
            });

        $(this).unbind("change");
        return false;
    }

    function checkqty(sl){
        var quant=$("#total_qntt_"+sl).val();
        var price=$("#price_item_"+sl).val();
        var dis=$("#discount_"+sl).val();
        if (isNaN(quant))
        {
            alert("Must input numbers");
            document.getElementById("total_qntt_"+sl).value = '';
            //$("#quantity_"+sl).val() = '';
            return false;
        }
        if (isNaN(price))
        {
            alert("Must input numbers");
            document.getElementById("price_item_"+sl).value = '';
            return false;
        }
        if (isNaN(dis))
        {
            alert("Must input numbers");
            document.getElementById("discount_"+sl).value = '';
            return false;
        }
    }

    //discount and paid check
    function checknum(){
        var dis=$("#invdcount").val();
        var paid=$("#paidAmount").val();
        if (isNaN(dis)) {
            alert("Must input numbers");
            document.getElementById("invdcount").value = '';
            return false;
        }

        if (isNaN(paid)) {
            alert("Must input numbers");
            document.getElementById("paidAmount").value = '';
            return false;
        }
    }
</script>
