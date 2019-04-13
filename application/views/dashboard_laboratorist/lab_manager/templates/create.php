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
            <a href="<?php echo base_url("dashboard_laboratorist/lab_manager/template/index") ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Manage Templates  </a>
        </div>
    </div>
</div>

<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3>New Template</h3>
                </div>
            </div>

            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <?php echo form_open('dashboard_laboratorist/lab_manager/template/create/'.$item->id,'class="form-inner"') ?>
                            <?php echo form_hidden('id',$item->id) ?>
                            <div class="row">
                                <div class="col-sm-8" id="payment_from_1">
                                    <div class="form-group row">
                                        <label for="template_name" class="col-sm-3 col-form-label">Template Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <input type="text" size="100"  name="template_name" value="<?= $item->name ?>" class="customerSelection form-control" placeholder='Template Name' id="template_name" tabindex="1" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="template_title" class="col-sm-3 col-form-label">Report Title <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <input type="text" size="100"  name="template_title" value="<?= $item->title ?>" class="form-control" placeholder='Title' id="template_title" tabindex="1"  required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="template_subtitle" class="col-sm-3 col-form-label">Report Sub Title</label>
                                        <div class="col-sm-6">
                                            <input type="text"  name="template_subtitle" value="<?= $item->sub_title ?>" class="form-control" placeholder='Sub Title' id="template_subtitle" tabindex="1"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="data_method" class="col-sm-3 col-form-label">Report Data Method/Machine</label>
                                        <div class="col-sm-6">
                                            <input type="text"  name="data_method" value="<?= $item->data_method ?>" class="form-control" placeholder='Method/Machine' id="data_method" tabindex="1"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="sample_type" class="col-sm-3 col-form-label">Specimen</label>
                                        <div class="col-sm-6">
                                            <input type="text"  name="sample_type" value="<?= $item->sample_type ?>" class="form-control" placeholder='Specimen' id="data_method" tabindex="1"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="template_code" class="col-sm-3 col-form-label">Template Code <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <input type="text" size="100"  name="template_code" value="<?= $item->code ?>" class="customerSelection form-control" placeholder='Template Code' id="template_code" tabindex="2" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-3 col-form-label">Price <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <input type="number" size="100"  name="price" value="<?= $item->price ?>" class="customerSelection form-control" placeholder='Price' id="price" tabindex="3" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive" style="margin-top: 10px">
                                <table class="table table-bordered table-hover" id="normalinvoice">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Item Information <i class="text-danger">*</i></th>
                                            <th class="text-center" width="220">Item Code<i class="text-danger">*</i></th>
                                            <th class="text-center" width="220">Input Type<i class="text-danger">*</i></th>
                                            <th class="text-center" width="220">Unit</th>
                                            <th class="text-center">Normal Range</th>
                                            <th class="text-center" width="150">Sorting Order <i class="text-danger">*</i></th>
                                            <th class="text-center" width="150">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addinvoiceItem">
                                        <?php foreach($items as $index => $subitem): ?>
                                        <tr>
                                            <td>
                                                <input type="text" name="name[<?= isset($subitem->id)? $subitem->id : '' ?>]" class="form-control" placeholder='Name' required="" id="name<?= $index + 1 ?>" tabindex="7" value="<?= $subitem->name ?>">
                                                <input type="hidden" name="update_item[]" value="<?= isset($subitem->id)? $subitem->id : '' ?>">
                                            </td>
                                            <td>
                                                <input type="text" name="code[<?= isset($subitem->id)? $subitem->id : '' ?>]" value="<?= $subitem->code ?>" class="code-item code_<?= $index + 1 ?> form-control text-right" id="code_<?= $index + 1 ?>" placeholder="Unique code here" oninput="check_unique_code(this)" required/>
                                            </td>
                                            <td>
                                                <?php echo form_dropdown('input_type['.(isset($subitem->id) ? $subitem->id : '').']', $types, $subitem->input_type, 'id="input_type_'.($index + 1).'" class="form-control " required="required" tabindex="8"') ?>
                                            </td>
                                            <td>
                                                <?php echo form_dropdown('input_unit['.(isset($subitem->id) ? $subitem->id : '').']', $units, $subitem->unit_id, 'id="input_unit_'.($index + 1).'" class="form-control " required="required" tabindex="8"') ?>
                                            </td>
                                            <td>
                                                <textarea name="reference_value[<?= isset($subitem->id)? $subitem->id : '' ?>]" class="form-control" id="reference_value<?= $index + 1 ?>" placeholder="Normal Range"><?= $subitem->reference_value ?></textarea>
                                            </td>
                                            <td>
                                                <input type="text" name="sorting_order[<?= isset($subitem->id)? $subitem->id : '' ?>]" value="<?= $subitem->sorting_order ?>" class="sorting_order_<?= $index + 1 ?> form-control text-right" id="sorting_order_<?= $index + 1 ?>" placeholder="1" min="1"/>
                                            </td>

                                            <td class="text-center">
                                                <button style="text-align: right;" class="btn btn-danger" type="button" value="Delete" onclick="deleteRow(this, <?= isset($subitem->id)? $subitem->id : 'false' ?>)" tabindex="11">Delete</button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td align="center" id="addbtn-cell">
                                                <input type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addinvoiceItem');" value="Add New Item" tabindex="12"/>
                                                <input type="hidden" class="baseUrl" value="<?= base_url() ?>" />
                                            </td>
                                            <td style="text-align:center;" colspan="5"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" rowspan="2">
                                                <center><label style="text-align:center;" for="details" class="  col-form-label">Template</label></center>
                                                <textarea name="note" class="form-control tinymce" placeholder="Template"><?= $item->note ?></textarea>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-offset-5 col-sm-7">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button">Reset</button>
                                        <div class="or"></div>
                                        <button class="ui positive button">Save</button>
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

<script id="template-row" type="text/x-handlebars-template">
    <tr>
        <td>
            <input type="text" name="name[]" class="form-control" placeholder='Name' required="" id="name_{{ index }}" value="">
        </td>
        <td>
            <input type="text" name="code[]" value="" class="code-item code_{{ index }} form-control text-right" id="code_{{ index }}" placeholder="Unique code here" oninput="check_unique_code(this)" required/>
        </td>
        <td>
            <?php echo form_dropdown('input_type[]', $types, 'text', 'id="input_type_{{ index }}" class="form-control " required="required"') ?>
        </td>
        <td>
            <?php echo form_dropdown('input_unit[]', $units, '', 'id="input_unit_{{ index }}" class="form-control " required="required" tabindex="8"') ?>
        </td>
        <td>
            <textarea name="reference_value[]" class="form-control" id="reference_value_{{ index }}" placeholder="Normal Range"></textarea>
        </td>
        <td>
            <input type="text" name="sorting_order[]" value="{{ sorder }}" class="sorting_order_{{ index }} form-control text-right" id="sorting_order_{{ index }}" placeholder="1" min="1"/>
        </td>

        <td class="text-center">
            <button style="text-align: right;" class="btn btn-danger" type="button" value="Delete" onclick="deleteRow(this)">Delete</button>
        </td>
    </tr>
</script>

<script type="text/javascript">
    function generate_template (){
        var html = '<h1>Hi I am here</h1>';
        tinymce.activeEditor.setContent(html, {format: 'raw'});
    }

    function check_unique_code(el){
        var val = el.value.trim();
        el.value = val;
        var elid = el.id;
        var items = $(".code-item");
        for (let index = 0; index < items.length; index++) {
            const item = items[index];
            if(item.id == elid ) continue;
            if(item.value == val){
                el.value = val == "" ? val : val+"_1";
            }
        }
        
    }

    //Delete a row of table
    function addInputField(div_id){
        var data = {
            index : Date.now(),
            sorder : $("#normalinvoice > tbody > tr").length + 1
        };
        var source   = $("#template-row").html();
        var template = Handlebars.compile(source);
        var html    = template(data);
        $("#"+div_id).append(html)
        // console.log(html);
    }
    
    //Delete a row of table
    function deleteRow(t, row_id) {
        var a = $("#normalinvoice > tbody > tr").length;
        if (1 == a) alert("There only one row you can't delete.");
        else {
            var e = t.parentNode.parentNode;
            e.parentNode.removeChild(e);
            if(row_id){
                $("#addbtn-cell").append('<input type="hidden" name="delete_item[]" value="'+row_id+'" />');
            }
            // calculateSum();
            // invoice_paidamount();
        }
    }
</script>

