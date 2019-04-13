<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <div id="printableArea">
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
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6" style="display: inline-block;">
                            <!-- <img src="<?php echo (!empty($setting->logo)?base_url($setting->logo):base_url("assets/images/logo.png")) ?>" class="" alt="" style="margin-bottom:20px">
                            <br> -->
                            <span class="label label-success-outline m-r-15 p-10">Billing From</span>
                            <address style="margin-top:10px">
                                <strong><?= $setting->title ?></strong><br>
                                <?= $setting->address ?><br>
                                <abbr><b>Phone:</b></abbr> <?= $setting->phone ?><br>
                                <?php if($setting->email): ?><abbr><b>Email:</b></abbr> <?= $setting->email ?><br> <?php endif ?>
                                <?php if($setting->website): ?>
                                <abbr><b>Website:</b></abbr> <?= $setting->website ?>
                                <?php endif ?>
                            </address>
                        </div>

                        <div class="col-xs-6 text-left" style="display: inline-block;">
                            <h2 class="m-t-0">Invoice</h2>
                            <div>Invoice No: <?= $item->invoice_id ?></div>
                            <div class="m-b-15">Billing Date: <?= date('d - M - Y', strtotime($item->date)) ?></div>
                            <span class="label label-success-outline m-r-15">Billing To</span>

                            <?php if($patient): ?>
                            <address style="margin-top:10px;width: 200px">
                                <strong><?= $patient->firstname ?> </strong>  <?= $patient->lastname ?>
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
                            <p><strong></strong></p>
                        </div>
                        <div class="col-xs-6" style="display: inline-block;">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="border-top: 0; border-bottom: 0;">VAT : </th>
                                        <td style="border-top: 0; border-bottom: 0;"><?= format_price($item->total_tax, $currency, $currency_position) ?> </td>
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
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-8">
                            <div style="float:left;width:40%;text-align:center;border-top:1px solid #e4e5e7;margin-top: 110px;font-weight: bold;">
                                Received By
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div style="float:left;width:90%;text-align:center;border-top:1px solid #e4e5e7;margin-top: 110px;font-weight: bold;">
                                Authorised By
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body copy-dev">
                    <div class="col-xs-6 text-left small">
                        Developed by: http://infosoft.website
                    </div>
                    <div class="col-xs-6 text-right small">
                        Email: infosoft.website@gmail.com
                    </div>
                </div>
            </div>
            <div class="panel-footer text-left">
                <a class="btn btn-danger" href="<?= base_url('dashboard_laboratorist/lab_manager/invoice/') ?>">Cancel</a>
                <button class="btn btn-info" onclick="printContent('printableArea')"><span class="fa fa-print"></span></button>
            </div>
        </div>
    </div>
</div>
