<?php if($show_view_button): ?>
<div class="row">
    <div class="col-sm-12">
        <div class="columns">
            <a href="<?= site_url('dashboard_laboratorist/lab_manager/reports/view/'.$item->id) ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> View Report  </a>
        </div>
    </div>
</div>
<?php endif ?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <div id="printableArea">
                <?php echo form_open('dashboard_laboratorist/lab_manager/reports/entry_data/'.$item->id,'class="form-inner"') ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8" style="display: inline-block;width: 64%">
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

                        <div class="col-sm-4 text-left" style="display: inline-block;margin-left: 5px;">
                            <!-- <h2 class="m-t-0">Report</h2> -->
                            <?php if($item): ?>
                            <address style="margin-top:10px;">
                                <table>
                                    <tr>
                                        <td>Report ID</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td><strong><?= $item->report_id ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Report Date</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td><?= date('d - M - Y', strtotime($item->date)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Specimen</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td><?= $report_template->sample_type ?></td>
                                    </tr>
                                    <tr>
                                        <td>Reffered. By</td>
                                        <td align="center" style="width: 50px">:</td>
                                        <td><?= $doctor->firstname. ' '. $doctor->lastname ?></td>
                                    </tr>
                                </table>
                            </address>
                            <?php endif ?>
                        </div>
                    </div>
                    <hr>

                    <div class="table-responsive" style="margin-top: 10px">
                        <table class="table table-bordered table-hover" id="normalinvoice">
                            <thead>
                                <tr>
                                    <th class="text-center">Test Name</th>
                                    <th class="text-center" width="220">Data<i class="text-danger">*</i></th>
                                    <th class="text-center" width="120">Unit</th>
                                    <th class="text-center">Normal Range</th>
                                </tr>
                            </thead>
                            <tbody id="addinvoiceItem">
                                <?php foreach ($template_items as $index => $subitem): ?>
                                <?php if( $subitem->input_type == 'section' || $subitem->input_type == 'sub_section' ): ?>
                                    <tr>
                                        <td colspan="4">
                                            <?= $subitem->name ?>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <td>
                                            <?= $subitem->name ?>
                                        </td>
                                        <td>
                                            <?php if( $subitem->input_type == 'textarea' ): ?>
                                                <textarea class="form-control" id="entry_item_<?= $subitem->id ?>" cols="30" rows="2" name="data[<?= $subitem->id ?>]" required><?= $data_entries[$subitem->id] ?></textarea>
                                            <?php elseif( $subitem->input_type == 'yes_no' || $subitem->input_type == 'positive_negetive' ): ?>
                                                <select name="data[<?= $subitem->id ?>]" id="entry_item_<?= $subitem->id ?>" class="form-control" required>
                                                    <?php if( $subitem->input_type == 'yes_no') : ?>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    <?php else : ?>
                                                        <option value="Positive">Positive</option>
                                                        <option value="Negetive">Negetive</option>
                                                    <?php endif ?>
                                                </select>
                                            <?php else : ?>
                                                <input id="entry_item_<?= $subitem->id ?>" type="<?= $subitem->input_type ?>" value="<?= $data_entries[$subitem->id] ?>" class="form-control" name="data[<?= $subitem->id ?>]" required>
                                            <?php endif  ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $subitem->unit ?>
                                        </td>
                                        <td>
                                            <?= parse_string_template( str_replace( "\n", "<br>", $subitem->reference_value), $subitem ) ?>
                                        </td>
                                    </tr>
                                <?php endif  ?>
                                <?php endforeach ?>
                            </tbody>
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
                    
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
