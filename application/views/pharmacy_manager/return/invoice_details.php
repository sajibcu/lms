<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <div id="printableArea">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8" style="display: inline-block;width: 64%">
                            <img src="<?php echo (!empty($setting->logo)?base_url($setting->logo):base_url("assets/images/logo.png")) ?>" class="" alt="" style="margin-bottom:20px">
                            <br>
                            <span class="label label-success-outline m-r-15 p-10">Billing From</span>
                            <address style="margin-top:10px">
                                <strong><?= $setting->title ?></strong><br>
                                <?= $setting->address ?><br>
                                <abbr><b>Mobile:</b></abbr> <?= $setting->phone ?><br>
                                <abbr><b>Email:</b></abbr> <?= $setting->email ?><br>
                                <abbr><b>Website:</b></abbr>
                                <?= base_url() ?>
                            </address>
                        </div>

                        <div class="col-sm-4 text-left" style="display: inline-block;margin-left: 5px;">
                            <h2 class="m-t-0">Invoice</h2>
                            <div>Return ID: <?= $ritem->return_id ?></div>
                            <div>Invoice ID: <?= $item->invoice_id ?></div>
                            <div class="m-b-15">Billing Date: <?= date('d - M - Y', strtotime($item->date)) ?></div>
                            <span class="label label-success-outline m-r-15">Billing To</span>

                            <?php if($patient): ?>
                            <address style="margin-top:10px;width: 200px">
                                <strong><?= $patient->firstname ?> </strong><br>
                                <?= $patient->lastname ?>
                                <br>
                                <abbr><b>Mobile:</b> <?= $patient->mobile ?></abbr>
                            </address>
                            <?php endif ?>
                        </div>
                    </div>
                    <hr>

                    <div class="table-responsive m-b-20">
                        <?php $subtotal = 0; ?>
                        <?php $totalqty = 0; ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">SL.</th>
                                    <th class="text-center">Medicine Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Discount / Pcs. </th>
                                    <th class="text-center">Sale Price</th>
                                    <th class="text-center">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $index => $subitem): ?>
                                <?php $subtotal += abs($subitem->total_price) ?>
                                <?php $totalqty += abs($subitem->quantity) ?>
                                <tr>
                                    <td class="text-center"><?= $index + 1 ?></td>
                                    <td class="text-center">
                                        <div><strong><?= $subitem->product_name ?> - (<?= $subitem->product_type ?>)</strong></div>
                                    </td>
                                    <td align="center"><?= abs($subitem->quantity) ?></td>
                                    <td align="center"><?= format_price( abs($subitem->discount/$subitem->quantity), $currency, $currency_position) ?></td>
                                    <td align="center"><?= format_price( $subitem->rate, $currency, $currency_position) ?></td>
                                    <td align="center"><?= format_price( abs($subitem->total_price), $currency, $currency_position) ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr><td align="center" colspan="1" style="border: 0px"><b>Sub Total:</b></td>
                                <td style="border: 0px"></td>
                                <td align="center" style="border: 0px"><b><?= $totalqty ?></b></td>
                                <td style="border: 0px"></td>
                                <td style="border: 0px"></td>
                                <td align="center" style="border: 0px"><b><?= format_price(-$subtotal, $currency, $currency_position) ?></b></td>
                            </tr></tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-xs-8" style="display: inline-block;width: 66%">
                            <p></p>
                            <p><strong></strong></p>
                            <div style="float:left;width:40%;text-align:center;border-top:1px solid #e4e5e7;margin-top: 110px;font-weight: bold;">
                                Received By
                            </div>
                        </div>
                        <div class="col-xs-4" style="display: inline-block;">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="border-top: 0; border-bottom: 0;">Tax : </th>
                                        <td style="border-top: 0; border-bottom: 0;"><?= format_price($ritem->total_tax, $currency, $currency_position) ?> </td>
                                    </tr>
                                                                                <tr>
                                        <th class="grand_total">Grand Total :</th>
                                        <td class="grand_total"><?= format_price( abs($ritem->net_total_amount), $currency, $currency_position) ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div style="float:left;width:90%;text-align:center;border-top:1px solid #e4e5e7;margin-top: 100px;font-weight: bold;">
                                Authorised By
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-left">
                <a class="btn btn-danger" href="<?= base_url('pharmacy_manager/preturn/list_invoces') ?>">Cancel</a>
                <button class="btn btn-info" onclick="printContent('printableArea')"><span class="fa fa-print"></span></button>
            </div>
        </div>
    </div>
</div>
