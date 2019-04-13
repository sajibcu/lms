<div class="row">
    <div class="col-sm-12">
        <div class="columns">
            <a href="<?php echo base_url("pharmacy_manager/preturn/list_invoces") ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  Customer Return List  </a>
            <a href="<?php echo base_url("pharmacy_manager/preturn/list_purchases") ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  Manufacturer  Return List </a>
            <a href="<?php echo base_url("pharmacy_manager/preturn/list_wastages") ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  Wastage List </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo base_url("pharmacy_manager/preturn/invoice_return_form") ?>" class="form-inline" method="post" accept-charset="utf-8">
                    <div class="col-sm-12">
                        <h3 class="text-center">Customer Return</h3>
                    </div>
                    <div class="form-group">
                        <label for="invoice_no" class="col-sm-4">Invoice No:</label>
                        <div class="col-sm-8">
                        <input type="text" name="invoice_no" class="form-control" id="to_date" placeholder="Invoice No" required="required">
                    </div>
                    </div>
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-default">
                <div class="panel-body">
                <form action="<?php echo base_url("pharmacy_manager/preturn/search_manufacturer") ?>" class="form-inline" method="post" accept-charset="utf-8">
                    <div class="col-sm-12">
                        <h3 class="text-center">Manufacturer  Return List</h3>
                    </div>
                    <label for="manufacturer_name" class="col-sm-4">Manufacturer  Name:</label>

                        <div class="form-group">
                            <input type="text" name="manufacturer_name" class="manufacturerSelection form-control ui-autocomplete-input" placeholder="Manufacturer  Name" id="manufacturer_name" autocomplete="off">
                            <input id="SchoolHiddenId" class="manufacturer_hidden_value abc" type="hidden" name="manufacturer_id">
                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?= base_url() ?>"/>
                    </div>

                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>
