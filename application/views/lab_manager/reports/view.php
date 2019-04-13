<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <div id="printableArea">
                <style type="text/css">
                    @page{
                        size: auto;
                        margin: 3mm;
                    }
                    tr td,
                    tr th{
                        padding: 3px 5px !important;
                        border-color: #333 !important;
                    }
                    .table-bordered{
                        border-color: #333 !important;
                    }
                    @media print{
                        .copy-dev{
                            position: fixed;
                            width: 100%;
                            height: 19px;
                            bottom: 0.5in;
                        }
                        #printableArea .panel-body{
                            padding-top: 1.6in;
                            padding-left: 0.5in;
                            padding-right: 0.5in;
                        }
                    }
                </style>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-7" style="display: inline-block;">
                            <?php if($patient): ?>
                            <address style="margin-top:10px;">
                                <table>
                                    <tr>
                                        <td>Patient Name</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td><?= $patient->firstname ?> <?= $patient->lastname ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td><?= calculate_date_from_date_of_birth($patient->date_of_birth) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sex</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td><?= $patient->sex ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td><?= $patient->mobile ?></td>
                                    </tr>
                                </table>
                            </address>
                            <?php endif ?>
                        </div>

                        <div class="col-xs-5 text-left" style="display: inline-block;">
                            <!-- <h2 class="m-t-0">Report</h2> -->
                            <?php if($item): ?>
                                <address style="margin-top:10px;">
                                    <table>
                                        <tr>
                                            <td width="55%">Report ID</td>
                                            <td align="center" style="width: 50px">:</td>
                                            <td width="45%"><strong><?= $item->report_id ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Report Date</td>
                                            <td align="center" style="width: 50px">:</td>
                                            <td><?= date('d - M - Y', strtotime($item->date)) ?></td>
                                        </tr>
                                        <?php if($report_template->sample_type): ?>
                                        <tr>
                                            <td>Specimen</td>
                                            <td align="center" style="width: 50px">:</td>
                                            <td><?= $report_template->sample_type ?></td>
                                        </tr>
                                        <?php endif ?>

                                        <tr>
                                            <td>Reffered. By</td>
                                            <td align="center" style="width: 50px">:</td>
                                            <td><?= $ref_doctor ? ($ref_doctor->firstname. ' '. $ref_doctor->lastname): 'Deep Clinic' ?></td>
                                        </tr>
                                    </table>
                                </address>
                            <?php endif ?>
                        </div>
                    </div>
                    <hr style="margin-top: 0;">

                    <?php if( $report_template->note ): ?>
                        <?= parse_string_template( $report_template->note, $data_entries ) ?>
                        <!--  
                        <pre>
                        <?php //print_r($data_entries) ?>
                        </pre>
                        -->
                    <?php else: ?>
                        <?php if( $report_template->title ): ?>
                            <h2 class="title text-center" style="text-decoration: underline;margin-top: 20px;margin-bottom: <?= $report_template->data_method ? '20px' : '20px' ?>;"><?= $report_template->title ?></h2>
                            <?php if( $report_template->data_method ): ?>
                                <p class="subtitle text-center" style="text-decoration: none;margin-bottom: 50px;"><?= $report_template->data_method ?></h2>
                            <?php endif ?>
                        <?php endif ?>

                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="normalinvoice" style="border: 1 !important">
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
                        <div class="col-xs-5">
                            <?php if($checker): ?>
                            <div style="float:left;width:90%;text-align:left;margin-top: 100px;">
                                Checked By-
                                <h3 style="margin-bottom: 0;"><?= $checker->fullname ?></h3>
                                <p><?= $checker->designation ?></p>
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="col-xs-2"></div>
                        <div class="col-xs-5">
                            <?php if($doctor): ?>
                            <div style="float:right;width:90%;text-align:left;margin-top: 100px;">
                                <h3 style="margin-bottom: 0;"><?= $doctor->firstname.' '.$doctor->lastname ?></h3>
                                <p><?= $doctor->degree ?></p>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>

                </div>
                <div class="panel-body copy-dev">
                    <div class="col-xs-6 text-left small">
                        Developed by: <?=$this->config->item('devlop_website');?>
                    </div>
                    <div class="col-xs-6 text-right small">
                        Email: <?=$this->config->item('devloper_email');?>
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
