<div class="row">
    <div class="col-sm-12" id="PrintMe">
        <style>
            .table-condensed td{
                border: none !important;
                padding: 0 !important;
            }
            .table-condensed tr td:nth-child(1){
                min-width: 100px;
            }
            .table-condensed tr td:nth-child(2){
                padding-left: 5px !important;
                padding-right: 5px !important;
            }
            @page{
                size: auto;
                margin: 2mm;
            }
            @media print{
                .copy-dev{
                    position: fixed;
                    width: 100%;
                    height: 19px;
                    bottom: 35px;
                }
            }
        </style>
        <div  class="panel"> 
            <div class="panel-body">  
                <div class="row">
                    <div class="col-xs-3">
                        <div class="text-center" style="margin-top: 50px;">
                            <span class="btn btn-default">Dept: <?= $appointment->department ?></span>
                        </div>
                    </div>
                    <div class="col-xs-6" align="center">  
                        <h2><?= $setting->title ?></h2>
                        <p><?= $setting->address ?>
                        <br>Mobile: <?= $setting->mobile ?></p>
                        <span class="btn btn-default">Outpatient Ticket</span>
                    </div>
                    <div class="col-xs-3">
                        <div class="text-center" style="margin-top: 50px;">
                            <span class="btn btn-default">Oparator: <?= $oparator ?></span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <hr style="margin: 5px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <table class="table table-condensed">
                            <tr>
                                <td>Ticket No</td>
                                <td>:</td>
                                <td><?= $appointment->appointment_id ?></td>
                            </tr>
                            <tr>
                                <td>Patient Name</td>
                                <td>:</td>
                                <td><?= "$appointment->pfirstname $appointment->plastname" ?></td>
                            </tr>
                            <!-- <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?=$appointment->address?></td>
                            </tr> -->
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?=$appointment->address?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td><?= $appointment->mobile ?></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td>:</td>
                                <td><?= date_diff(date_create($appointment->date_of_birth), date_create('now'))->y; ?> Years</td>
                            </tr>
                            <tr>
                                <td>Sex</td>
                                <td>:</td>
                                <td><?= $appointment->sex ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-2"></div>
                    <div class="col-xs-5">
                        <table class="table table-condensed">
                            <tr>
                                <td>Patient ID</td>
                                <td>:</td>
                                <td><?= $appointment->patient_id ?></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>:</td>
                                <td><?= date('d-m-Y',strtotime($appointment->date)) ?></td>
                            </tr>
                            <tr>
                                <td>Ticket Type</td>
                                <td>:</td>
                                <td><?= $appointment->appointment_type ?></td>
                            </tr>
                            <tr>
                                <td>Consultant</td>
                                <td>:</td>
                                <td>
                                    <?= "$appointment->firstname $appointment->lastname" ?>
                                    <?= "$appointment->degree" ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>:</td>
                                <td><?= "$appointment->start_time - $appointment->end_time" ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <hr style="margin: 0;border-width: 2px;border-color: #333">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3" align="center" style="min-height: 700px;border-right: 2px solid #333;"> 
                        
                    </div>

                    <div class="col-xs-9" style="min-height: 700px;"> 
                       
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
    </div>



    <div class="col-sm-12">
         <div class="btn-group">
            <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger" ><i class="fa fa-print"></i></button> 
        </div>
    </div>


</div>
