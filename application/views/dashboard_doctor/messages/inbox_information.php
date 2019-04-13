<div class="row">
    <!--  table area -->
    <div class="col-sm-12" id="PrintMe">
        <style>
            @page{
                size: auto;
                margin: 2mm;
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
        <div class="panel thumbnail">
            <div class="panel-heading  no-print">
                <div class="btn-group"> 
                <a class="btn btn-success" href="<?php echo base_url("dashboard_doctor/messages/message/new_message") ?>"> <i class="fa fa-send-o"></i>  <?php echo display('new_message') ?> </a>
                    <a class="btn btn-primary" href="<?php echo base_url("dashboard_doctor/messages/message") ?>"> <i class="fa fa-inbox"></i>  <?php echo display('inbox') ?> </a>
                    <a class="btn btn-info" href="<?php echo base_url("dashboard_doctor/messages/message/sent") ?>"> <i class="fa fa-share"></i>  <?php echo display('sent') ?> </a>

                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger"><i class="fa fa-print"></i></button> 
                </div> 
            </div>
            <div class="panel-body">
                <div class="text-center" style="margin-bottom: 30px;margin-bottom: 20px;">
                    <h1><?= $setting->title ?></h1>
                    <p><?= $setting->address ?>
                    <br>Phone: <?= $setting->phone ?></p>
                    <hr>
                </div>
                <dl class="dl-horizontal">
                    <dt><?php echo display('sender') ?></dt>
                    <dd><?php echo $message->sender_name ?></dd>
                    <dt><?php echo display('receiver_name') ?></dt>
                    <dd><?php echo $this->session->userdata('fullname') ?></dd>
                    <dt><?php echo display('date') ?></dt>
                    <dd><?php echo date('d M Y h:i:s a', strtotime($message->datetime)) ?></dd>
                    <dt><?php echo display('subject') ?></dt>
                    <dd><?php echo $message->subject ?></dd>
                    <dt><?php echo display('message') ?></dt> 
                    <dd><?php echo $message->message ?></dd>
                </dl>
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
    </div>
</div>
 

  


