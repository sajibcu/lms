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
                        <div class="col-xs-8" style="display: inline-block;width: 64%">
                            <address style="margin-top:10px;">
                                <table>
                                    <tr>
                                        <td>Patient Name</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Sex</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td></td>
                                    </tr>
                                </table>
                            </address>
                        </div>

                        <div class="col-xs-4 text-left" style="display: inline-block;margin-left: 5px;">
                            <!-- <h2 class="m-t-0">Report</h2> -->
                            <address style="margin-top:10px;">
                                <table>
                                    <tr>
                                        <td>Report ID</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Report Date</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td><?= date('d - M - Y') ?></td>
                                    </tr>
                                </table>
                            </address>
                        </div>
                    </div>
                    <hr>

                    <?php if( $report_template->note ): ?>
                        <?= parse_string_template( $report_template->note, $data_entries ) ?>
                        <!--  
                        <pre>
                        <?php print_r($data_entries) ?>
                        </pre>
                        -->
                    <?php else: ?>
                        <?php if( $report_template->title ): ?>
                            <h2 class="title text-center" style="text-decoration: underline;margin-top: 50px;margin-bottom: <?= $report_template->data_method ? '20px' : '50px' ?>;"><?= $report_template->title ?></h2>
                            <?php if( $report_template->data_method ): ?>
                                <p class="subtitle text-center" style="text-decoration: none;margin-bottom: 50px;"><?= $report_template->data_method ?></h2>
                            <?php endif ?>
                        <?php endif ?>
                        
                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-left">Test Name</th>
                                        <th class="text-center" width="220">Results</th>
                                        <th class="text-center">Normal Range</th>
                                    </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                    <?php if( $report_template->sub_title ): ?>
                                        <tr>
                                            <td colspan="3">
                                                <h3 class="title" style="text-decoration: underline;"><?= $report_template->sub_title ?></h3>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                    
                                    <?php foreach ($template_items as $index => $subitem): ?>
                                    <?php if( $subitem->input_type == 'section' || $subitem->input_type == 'sub_section' ): ?>
                                        <tr>
                                            <td colspan="3">
                                                <?= $subitem->name ?>
                                            </td>
                                        </tr>
                                    <?php else : ?>
                                        <tr>
                                            <td>
                                                <?= $subitem->name ?>
                                            </td>
                                            <td align="center">
                                                <?= $data_entries[$subitem->id] ?> <?= $subitem->unit ?>
                                            </td>
                                            <td align="center">
                                                <?= parse_string_template( str_replace( "\n", "<br>", $subitem->reference_value), $subitem ) ?>
                                            </td>
                                        </tr>
                                    <?php endif  ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif ?>

                    <div class="row">
                        <div class="col-xs-4">
                            <?php if($checker): ?>
                            <div style="float:left;width:90%;text-align:left;margin-top: 100px;">
                                Checked By-
                                <h3 style="margin-bottom: 0;"><?= $checker->fullname ?></h3>
                                <p>Laboratorist</p>
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="col-xs-4"></div>
                        <div class="col-xs-4">
                            <?php if($doctor): ?>
                            <div style="float:left;width:90%;text-align:left;margin-top: 100px;">
                                <h3 style="margin-bottom: 0;"><?= $doctor->firstname.' '.$doctor->lastname ?></h3>
                                <p><?= $doctor->degree ?></p>
                            </div>
                            <?php endif ?>
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
                <a class="btn btn-danger" href="<?= site_url('lab_manager/reports') ?>">Cancel</a>
                <button class="btn btn-info" onclick="printContent('printableArea')"><span class="fa fa-print"></span></button>
            </div>
        </div>
    </div>
</div>
