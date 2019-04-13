<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-primary" href="<?php echo base_url("pharmacy_manager/purchase") ?>"> <i class="fa fa-list"></i>  Purchase List </a> 
                </div>
            </div>

            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <?php echo form_open('pharmacy_manager/purchase/form/'.$item->id,'class="form-inner"') ?>

                            <?php echo form_hidden('id',$item->id) ?>

                            <div class="row" id="manufacturer_info">
                                <div class="col-sm-6">
                                <div class="form-group row">
                                        <label for="manufacturer_sss" class="col-sm-3 col-form-label">Manufacturer <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <?php echo form_dropdown('manufacturer_id', $manufacturer_list, $item->manufacturer_id, 'id="manufacturer_id" class="form-control " required="required" tabindex="1" onchange="product_pur_or_list()"') ?>
                                        </div>
                                    </div> 
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Purchase Date <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" tabindex="2" class="form-control datepicker" name="purchase_date" value="<?= $item->purchase_date ?>" id="purdate" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="invoice_no" class="col-sm-3 col-form-label">Invoice No                                        <i class="text-danger">*</i>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" tabindex="3" class="form-control" name="chalan_no" placeholder="Invoice No" id="invoice_no" required="" value="<?= $item->chalan_no ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                <div class="form-group row">
                                        <label for="adress" class="col-sm-4 col-form-label">Details                                    </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" tabindex="4" id="adress" name="purchase_details" placeholder=" Details" rows="1"><?= $item->purchase_details ?></textarea>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="table-responsive" style="margin-top: 10px">
                                <table class="table table-bordered table-hover" id="purchaseTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="20%">Item Information<i class="text-danger">*</i></th>
                                            <th class="text-center">Batch ID <i class="text-danger">*</i></th>
                                            <th class="text-center">Expiry  date <i class="text-danger">*</i></th>
                                            <th class="text-center">Stock/Qnt</th>
                                            <th class="text-center">Quantity <i class="text-danger">*</i></th>
                                            <th class="text-center">Manufacturer  Price<i class="text-danger">*</i></th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addPurchaseItem">
                                        <?php foreach($items as $index => $subitem): ?>
                                        <tr>
                                            <td class="span3 manufacturer">
                                                <input type="text" name="product_name[]" required class="form-control product_name productSelection" onkeypress="product_pur_or_list(<?= $index + 1 ?>);" placeholder="Medicine Name" id="product_name_<?= $index + 1 ?>" tabindex="5" value="<?= $subitem->product_name ?>">
                                                <input type="hidden" class="autocomplete_hidden_value product_id_<?= $index + 1 ?>" name="product_id[]" id="SchoolHiddenId" value="<?= $subitem->product_id ?>"/>
                                                <input type="hidden" class="sl" value="<?= $index + 1 ?>">
                                            </td>
                                            <td>
                                                <input type="text" name="batch_id[]" id="batch_id_<?= $index + 1 ?>" class="form-control text-right"  tabindex="6" placeholder="Batch ID" value="<?= $subitem->batch_id ?>" required=""/>
                                            </td>
                                            <td>
                                                <input type="text" name="expeire_date[]" id="expeire_date_<?= $index + 1 ?>" class="form-control datepicker " tabindex="7"    placeholder="Expiry  date" onchange="checkExpiredate(1)" value="<?= $subitem->expeire_date ?>" required=""/>
                                            </td>
                                            <td class="wt">
                                                <input type="text" id="available_quantity_<?= $index + 1 ?>" class="form-control text-right stock_ctn_<?= $index + 1 ?>" placeholder="0.00" readonly/>
                                            </td>
                                            <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="quantity_<?= $index + 1 ?>" class="form-control text-right store_cal_<?= $index + 1 ?>" onkeyup="calculate_store(1),checkqty(1);" onchange="calculate_store(1);" placeholder="0.00" value="<?= $subitem->product_quantity ?>" min="0" tabindex="8" required="required"/>
                                            </td>
                                            <td class="test">
                                                <input type="text" name="product_rate[]" onkeyup="calculate_store(1),checkqty(1);" onchange="calculate_store(1);" id="product_rate_<?= $index + 1 ?>" class="form-control product_rate_<?= $index + 1 ?> text-right" placeholder="0.00" value="<?= $subitem->product_rate ?>" min="0" tabindex="9" required="required" readonly/>
                                            </td>
                                            <td class="text-right">
                                                <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_<?= $index + 1 ?>" value="<?= $subitem->total_price ?>" readonly="readonly" />
                                            </td>
                                            <td>
                                                <button style="text-align: right;" class="btn btn-danger red" type="button" value="Delete" onclick="deleteRow(this)" tabindex="10">Delete</button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <input type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addPurchaseOrderField1('addPurchaseItem');" value="Add New Item"  tabindex="11"/>
                                                <input type="hidden" name="baseUrl" class="baseUrl" value="<?= base_url() ?>"/>
                                            </td>
                                            <td style="text-align:right;" colspan="4"><b>Grand Total:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="<?= $item->grand_total_amount ?>" readonly="readonly" />
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-6">
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
    function product_pur_or_list(sl) {

        var manufacturer_id = $('#manufacturer_id').val();
        if ( manufacturer_id == 0) {
            alert('Please Select Manufacturer !');
            return false;
        }

        // Auto complete
        var options = {
            minLength: 0,
            source: function( request, response ) {
                var product_name = $('#product_name_'+sl).val();
                $.ajax( {
                    url: "<?= base_url('pharmacy_manager/medicine/medicine/list_by_manufacturer') ?>",
                    method: 'post',
                    dataType: "json",
                    data: {
                        term: request.term,
                        manufacturer_id: $('#manufacturer_id').val(),
                        product_name:product_name,
                    },
                    success: function( data ) {
                        response( data );

                    }
                });
        },
        focus: function( event, ui ) {
            $(this).val(ui.item.label);
            return false;
        },
        select: function( event, ui ) {
            $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value); 
            var sl = $(this).parent().parent().find(".sl").val(); 
            var product_id = ui.item.value;
            var  manufacturer_id=$('#manufacturer_id').val();            
            var base_url    = $('.baseUrl').val();
            var available_quantity    = 'available_quantity_'+sl;
            var product_rate    = 'product_rate_'+sl;
            $.ajax({
                type: "POST",
                url: base_url+"pharmacy_manager/medicine/medicine/retrieve_medicine_data",
                data: {product_id:product_id,manufacturer_id:manufacturer_id},
                cache: false,
                success: function(data){
                    console.log(data);
                    obj = JSON.parse(data);
                    $('#'+available_quantity).val(obj.total_product);
                    $('#'+product_rate).val(obj.manufacturer_price);
                } 
            });
            $(this).unbind("change");
            return false;
        }
    }

    $('body').on('keydown.autocomplete', '.product_name', function() {
        $(this).autocomplete(options);
    });

    }
</script>

<script type="text/javascript">

    // Counts and limit for purchase order
    var count = 2;
    var limits = 500;

    function addPurchaseOrderField1(divName){

  
        if (count == limits)  {
            alert("You have reached the limit of adding " + count + "inputs ");
        }
        else{
            var newdiv = document.createElement('tr');
            var tabin="product_name_"+count;
            tabindex = count * 7 ,
            newdiv = document.createElement("tr");
            tab1 = tabindex + 1;
            
            tab2 = tabindex + 2;
            tab3 = tabindex + 3;
            tab4 = tabindex + 4;
            tab5 = tabindex + 5;
            tab6 = tabindex + 6;
            tab7 = tabindex + 7;
            tab8 = tab7 + 1;
            tab9 = tab8 +1;
           


            newdiv.innerHTML ='<td class="span3 manufacturer"><input type="text" name="product_name[]" required class="form-control product_name productSelection" onkeypress="product_pur_or_list('+ count +');" placeholder="Medicine Name" id="product_name_'+ count +'" tabindex="'+tab1+'" > <input type="hidden" class="autocomplete_hidden_value product_id_'+ count +'" name="product_id[]" id="SchoolHiddenId"/>  <input type="hidden" class="sl" value="'+ count +'">  </td> <td> <input type="text" name="batch_id[]" id="batch_id_'+ count +'" tabindex="'+tab2+'" class="form-control text-right" required  tabindex="11" placeholder="Batch ID"/></td><td><input type="text" name="expeire_date[]" onchange="checkExpiredate('+ count +')" id="expeire_date_'+ count +'" required class="form-control datepicker" tabindex="'+tab3+'"  placeholder="Expiry  date"/> </td>  <td class="wt"> <input type="text" id="available_quantity_'+ count +'" class="form-control text-right stock_ctn_'+ count +'" placeholder="0.00" readonly/> </td><td class="text-right"><input type="text" name="product_quantity[]" tabindex="'+tab4+'" required  id="quantity_'+ count +'" class="form-control text-right store_cal_' + count + '" onkeyup="calculate_store(' + count + '),checkqty(' + count + ');" onchange="calculate_store(' + count + ');" placeholder="0.00" value="" min="0"/>  </td><td class="test"><input type="text" name="product_rate[]" readonly required onkeyup="calculate_store('+ count +'),checkqty(' + count + ');" onchange="calculate_store('+ count +');" id="product_rate_'+ count +'" class="form-control product_rate_'+ count +' text-right" placeholder="0.00" value="" min="0" tabindex="'+tab5+'"/></td><td class="text-right"><input class="form-control total_price text-right total_price_'+ count +'" type="text" name="total_price[]" id="total_price_'+ count +'" value="0.00" readonly="readonly" /> </td><td> <input type="hidden" id="total_discount_1" class="" /><input type="hidden" id="all_discount_1" class="total_discount" /><button style="text-align: right;" class="btn btn-danger red" type="button" value="Delete" onclick="deleteRow(this)"tabindex="'+tab6+'">Delete</button></td>';
            document.getElementById(divName).appendChild(newdiv);
            document.getElementById(tabin).focus();
            document.getElementById("add_invoice_item").setAttribute("tabindex", tab7);
            // document.getElementById("add_purchase").setAttribute("tabindex", tab8);
            // document.getElementById("add_purchase_another").setAttribute("tabindex", tab9);
           
            count++;
            $(".datepicker").datepicker({ dateFormat:'yy-mm-dd' });
            $("select.form-control:not(.dont-select-me)").select2({
                placeholder: "Select option",
                allowClear: true
            });
        }
    }

    //Calculate store product
    function calculate_store(sl) {
       
        var gr_tot = 0;
        var item_ctn_qty    = $("#quantity_"+sl).val();
        var vendor_rate = $("#product_rate_"+sl).val();

        var total_price     = item_ctn_qty * vendor_rate;
        $("#total_price_"+sl).val(total_price.toFixed(2));

       
        //Total Price
        $(".total_price").each(function() {
            isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
        });

        $("#grandTotal").val(gr_tot.toFixed(2,2));
    }
</script>
<!-- JS -->

<script type="text/javascript">
    function checkExpiredate(sl) {
        var purdates =  $("#purdate").val();
        var expiredate = $("#expeire_date_"+sl).val();
        var purchasedate = new Date(purdates);
        var expirydate = new Date(expiredate);
        if (expirydate <= purchasedate ) { 
            alert('Expiry Date should be greater than Puchase Date');
          document.getElementById("expeire_date_"+sl).value = '';
            return false;
        }
        return true;
    }

    function checkqty(sl) {
        var y=$("#quantity_"+sl).val();
        var x=$("#product_rate_"+sl).val();
        if (isNaN(y)){
          alert("Must input numbers");
          document.getElementById("quantity_"+sl).value = '';
           //$("#quantity_"+sl).val() = '';
          return false;
        }
        if (isNaN(x)) {
          alert("Must input numbers");
           document.getElementById("product_rate_"+sl).value = '';
          return false;
        }
    }
</script>