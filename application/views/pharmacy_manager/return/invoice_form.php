<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <h3><?= $title ?></h3>
            </div>

            <div class="panel-body panel-form">
            <?php echo form_open('pharmacy_manager/preturn/return_invoice', 'class="form-inner"') ?>
                <?php echo form_hidden('id',$item->id) ?>

                <div class="row">
                    <div class="col-sm-6" id="payment_from_1">
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-4 col-form-label">Customer Name <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input type="text" name="customer_name" value="<?= $item->customer_name ?>" class="form-control customerSelection ui-autocomplete-input" placeholder="Customer Name" required="" id="customer_name" tabindex="1" readonly="" autocomplete="off">
                                <input type="hidden" class="customer_hidden_value" name="customer_id" value="<?= $item->customer_name ?>" id="SchoolHiddenId">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-4 col-form-label">Date <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input type="text" tabindex="2" class="form-control" name="invoice_date" value="<?= $item->date ?>" required="" readonly="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive" style="margin-top: 10px">
                    <table class="table table-bordered table-hover" id="normalinvoice">
                        <thead>
                            <tr>
                                <th class="text-center">Item Information <i class="text-danger"></i></th>
                                <th class="text-center">Sold Qty</th>
                                <th class="text-center">Return QTY  <i class="text-danger">*</i></th>
                                <th class="text-center">Sale Price <i class="text-danger"></i></th>
                                <th class="text-center">Deduction </th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Check Return <i class="text-danger">*</i></th>
                            </tr>
                        </thead>
                        <tbody id="addinvoiceItem">
                            <?php foreach($items as $index => $subitem): ?>
                            <tr>
                                <td class="" style="width: 200px;">
                                    <input type="text" name="product_name[]" onclick="invoice_productList(<?= $index + 1 ?>);" value="<?= $subitem->product_name ?>" class="form-control productSelection ui-autocomplete-input" required="" placeholder="Medicine Name" id="product_names" tabindex="3" readonly="" autocomplete="off">
                                    <input type="hidden" class="product_id_<?= $index + 1 ?> autocomplete_hidden_value" value="<?= $subitem->product_id ?>" id="product_id_<?= $index + 1 ?>">
                                    <input type="hidden" class="batch_id_<?= $index + 1 ?>" value="<?= $subitem->batch_id ?>" name="batch_id[]" id="batch_id_<?= $index + 1 ?>">
                                </td>
                                <td>
                                    <input type="text" name="sold_qty[]" class="form-control text-right available_quantity<?= $index + 1 ?>1" id="sold_qty_<?= $index + 1 ?>" value="<?= $subitem->quantity ?>" readonly="">
                                </td>

                                <td>
                                    <input type="text" onkeyup="quantity_calculate(<?= $index + 1 ?>),checkrequird(<?= $index + 1 ?>),checkqty(<?= $index + 1 ?>);" onchange="quantity_calculate(<?= $index + 1 ?>);" class="total_qntt_<?= $index + 1 ?> form-control text-right" id="total_qntt_<?= $index + 1 ?>" placeholder="0.00" tabindex="4">
                                </td>

                                <td>
                                    <input type="text" onkeyup="quantity_calculate(<?= $index + 1 ?>);" onchange="quantity_calculate(<?= $index + 1 ?>);" value="<?= $subitem->rate ?>" id="price_item_<?= $index + 1 ?>" class="price_item1 form-control text-right" min="0" tabindex="5" required="" placeholder="0.00" readonly="">
                                </td>
                                <!-- Discount -->
                                <td>
                                    <input type="text" onkeyup="quantity_calculate(<?= $index + 1 ?>);" onchange="quantity_calculate(<?= $index + 1 ?>);" id="discount_<?= $index + 1 ?>" class="form-control text-right" placeholder="0.00" value="" min="0" tabindex="6">
                                    <input type="hidden" value="<?= $discount_type ?>" name="discount_type" id="discount_type_<?= $index + 1 ?>">
                                </td>

                                <td>
                                    <input class="total_price form-control text-right" type="text" id="total_price_<?= $index + 1 ?>" value="" readonly="readonly">
                                    <input type="hidden" name="invoice_details_id[]" id="invoice_details_id" value="<?= $subitem->invoice_details_id ?>">
                                </td>
                                <td>
                                    <!-- Tax calculate start-->
                                    <input id="total_tax_<?= $index + 1 ?>" class="total_tax_<?= $index + 1 ?>" type="hidden" value="<?= $subitem->tax/$subitem->total_price ?>">
                                    <input id="all_tax_<?= $index + 1 ?>" class="total_tax" type="hidden" value="0" name="tax[]">
                                    <!-- Tax calculate end-->
                                    <!-- Discount calculate start-->
                                    <input type="hidden" id="total_discount_<?= $index + 1 ?>" class="" value="">
                                    <input type="hidden" id="all_discount_<?= $index + 1 ?>" class="total_discount" value="">
                                    <!-- Discount calculate end -->
                                    <input type="checkbox" name="rtn[]" onclick="checkboxcheck(<?= $index + 1 ?>)" id="check_id_<?= $index + 1 ?>" value="1" class="form-control cheklabel"><label for="check_id_<?= $index + 1 ?>"></label>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" rowspan="3">
                                    <center><label style="text-align:center;" for="details" class="  col-form-label"></label></center>
                                    <textarea class="form-control" name="details" id="details" placeholder=""></textarea> <br>
                                    <input type="hidden" checked="checked" name="radio" value="1">
                                </td>
                                <td style="text-align:right;" colspan="1"><b>Total Deduction:</b></td>
                                <td class="text-right">
                                    <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" value="" readonly="readonly">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:right;" colspan="1"><b>Total Tax:</b></td>
                                <td class="text-right">
                                    <input id="total_tax_ammount" tabindex="-1" class="form-control text-right valid" name="total_tax" value="20" readonly="readonly" aria-invalid="false" type="text">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" style="text-align:right;"><b>Net Return:</b></td>
                                <td class="text-right">
                                    <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="" readonly="readonly">
                                </td>
                                <input type="hidden" name="baseUrl" class="baseUrl" value="<?= base_url() ?>">
                                <input type="hidden" name="invoice_id" id="invoice_id" value="<?= $item->invoice_id ?>">
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class=" col-form-label"></label>
                    <div class="col-sm-12 text-right">
                        <input type="submit" id="add_invoice" class="btn btn-success btn-large" name="add-invoice" value="Return" tabindex="9" disabled="">
                    </div>
                </div>

            <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function checkboxcheck(sl){
        var check_id    ='check_id_'+sl;
        var total_qntt  ='total_qntt_'+sl;
        var product_id  ='product_id_'+sl;
        var total_price  ='total_price_'+sl;
        var discount  ='discount_'+sl;
        var price_item = 'price_item_'+sl;
            if($('#'+check_id).prop("checked") == true){
                document.getElementById(total_qntt).setAttribute("required","required");
                document.getElementById(product_id).setAttribute("name","product_id[]");
                 document.getElementById(total_qntt).setAttribute("name","product_quantity[]");
                document.getElementById(total_price).setAttribute("name","total_price[]");
                document.getElementById(discount).setAttribute("name","discount[]");
                document.getElementById(price_item).setAttribute("name","product_rate[]");
            }
            else if($('#'+check_id).prop("checked") == false){
                document.getElementById(total_qntt).removeAttribute("required");
                document.getElementById(product_id).removeAttribute("name");
                document.getElementById(total_qntt).removeAttribute("name");
                document.getElementById(total_price).removeAttribute("name");
                document.getElementById(discount).removeAttribute("name");
                document.getElementById(price_item).removeAttribute("name");

            }
    };

    function checkrequird(sl) {
        var  quantity=$('#total_qntt_'+sl).val();
        var check_id    ='check_id_'+sl;
        if (quantity > 0){

        document.getElementById(check_id).setAttribute("required","required");
        }else{
            document.getElementById(check_id).removeAttribute("required");

        }
    }
</script>

<!-- script for checkbox css -->
<script type="text/javascript">
    $(document).ready(function() {
      $('input[type=checkbox]').each(function() {
        if(this.nextSibling.nodeName != 'label') {
          $(this).after('<label for="'+this.id+'"></label>')
        }
      })
    })
</script>

<script type="text/javascript">
    $('#add_invoice').prop("disabled", true);


    $('input:checkbox').click(function() {
        var check=$('[name="rtn[]"]:checked').length;
            if (check > 0) {
                $('#add_invoice').prop("disabled", false);
            } else {
            if (check < 1){
                $('#add_invoice').attr('disabled',true);}
            }
    });

    function checkqty(sl)
    {
        var sold_qty = $('#sold_qty_'+sl).val();
        var quant=$('#total_qntt_'+sl).val();
        if (isNaN(quant))
        {
            alert("Must input numbers");
            document.getElementById("total_qntt_"+sl).value = '';
            return false;
        }
        if (parseInt(quant) < 1)
        {
            alert("You Can Not Return Less than 1");
            document.getElementById("total_qntt_"+sl).value = '';
            return false;
        }
        if (parseInt(quant) > parseInt(sold_qty))
        {
            setTimeout(function(){
            alert("You Can Not Return More than Sold quantity");
            document.getElementById("total_price_"+sl).value = '';
            document.getElementById("discount_"+sl).value = '';
            document.getElementById("total_qntt_"+sl).value = '';
            }, 500);
            return false;
        }

    }
</script>
