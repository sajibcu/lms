<div class="row">
    <div class="col-sm-12">
        <div class="columns">
            <a href="<?= base_url('pharmacy_manager/stock/list_manufacturer') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Stock Report (Manufacturer Wise) </a>
            <a href="<?= base_url('pharmacy_manager/stock/list_medicines') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> Stock Report (Product Wise) </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= base_url('pharmacy_manager/stock/index') ?>" class="form-inline" method="post" accept-charset="utf-8">
                    <div class="form-group">
                        <label class="select">Search By Medicine:</label>
                        <input type="text" name="product_name" value="<?= $product_name ?>" onclick="invoice_productList(this.value);" class="form-control productSelection ui-autocomplete-input" placeholder="Medicine Name" id="product_name" required="" autocomplete="off" data-disable-callback-false="1">
                        <input type="hidden" class="autocomplete_hidden_value" name="product_id" id="SchoolHiddenId" value="<?= $product_id ?>">
                        <input type="hidden" class="baseUrl" value="<?= base_url() ?>" />
                    </div>

                    <div class="form-group">
                        <label class="select">Date</label>
                        <input type="text" name="date" value="<?= $date ?>" class="form-control productSelection datepicker ui-autocomplete-input" required="" id="date" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-success">Search</button>
                    <a class="btn btn-warning" href="#" onclick="printContent('printableArea')">Print</a>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3>Stock Report</h3>
                </div>
            </div>

            <div class="panel-body">
                <div id="printableArea" style="margin-left:2px;">
                    <div class="text-center" style="margin-bottom: 20px;">
                        <h2 style="margin: 0;"> <?= $setting->title ?> </h2>
                        <p style="font-size: 16px;"><?= $setting->address ?></p>
                        <p style="font-size: 16px;">Stock Date : <?= $stock_date ?> </p>
                        <p style="font-size: 16px;">Print Date: <?= $print_date ?></p>
                    </div>
                        
                    <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo display('serial') ?></th>
                                <th class="text-center">Medicine Name</th>
                                <th class="text-center">Medicine Type</th>
                                <th class="text-center">Sell Price</th>
                                <th class="text-center">Purchase Price</th>
                                <th class="text-center">In Quantity</th>
                                <th class="text-center">Sold QTY</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Stock Sell Price</th>
                                <th class="text-center">Stock Purchase Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($items)) { ?>
                                <?php 
                                    $sl = 1;
                                    $total_qty = 0;
                                    $total_stock = 0;
                                    $total_sold = 0;
                                    $total_sellprice = 0;
                                    $total_purchaseprice = 0;
                                ?>
                                <?php foreach ($items as $item) { ?>
                                    <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                        <td align="left"><?php echo $sl; ?></td>
                                        <td align="center"><?= $item->product_name; ?></td>
                                        <td align="center"><?= $item->type_name; ?></td>
                                        <td align="right"><?= format_price($item->sell_price, $currency, $currency_position) ?></td>
                                        <td align="right"><?= format_price($item->buy_price, $currency, $currency_position) ?></td>
                                        <td align="center"><?= $item->total_qty; ?></td>
                                        <td align="center"><?= $item->sold; ?></td>
                                        <td align="center"><?= $item->stock; ?></td>
                                        <td align="center"><?= format_price($item->sell_price * $item->stock, $currency, $currency_position) ?></td>
                                        <td align="center"><?= format_price($item->buy_price * $item->stock, $currency, $currency_position) ?></td>
                                    </tr>
                                    <?php 
                                        $sl++; 
                                        $total_qty += $item->total_qty;
                                        $total_stock += $item->stock;
                                        $total_sold += $item->sold;
                                        $total_sellprice += $item->stock * $item->sell_price;
                                        $total_purchaseprice += $item->stock * $item->buy_price;
                                    ?>
                                <?php } ?> 
                            <?php } ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" align="right"><b>Grand Total:</b></td>
                                <td align="center"><b><?= $total_qty ?></b></td>
                                <td align="center"><b><?= $total_sold ?></b></td>
                                <td align="center"><b><?= $total_stock ?></td>
                                <td align="center"><b><?= format_price($total_sellprice, $currency, $currency_position) ?></td>
                                <td align="center"><b><?= format_price($total_purchaseprice, $currency, $currency_position) ?></td>
                            </tr>
                        </tfoot>
                    </table>  <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>
