<?php
//print_r($sysLinkData);
?>
<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group">
                    
                </div>
            </div> 


            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open_multipart('user/permision_insert/','class="form-inner"') ?>

                            <?php echo form_hidden('user_id',$user_id) ?>
                            <table width="100%">
                                <?php
                                $group_id = 0;
                                $cat_id = 0;
                                $group_sl = 0;
                                $cat_sl = 0;
                                $counter = 0;
                                foreach ($sysLinkData AS $row) {
                                    if($group_id != $row->group_id)
                                    {
                                        $group_sl++;
                                        echo '<tr><th colspan="3" width="100%">'.$group_sl.'. &nbsp;'.$row->group_name.'</th></tr>';
                                        $group_id = $row->group_id;
                                        $cat_sl = 0;
                                    }
                                    if($cat_id != $row->cat_id)
                                    {
                                        $cat_sl++;
                                        echo '<tr><th width="30%"></th><th colspan="2" width="45%">'.$cat_sl.'. &nbsp;'.$row->cat_name.'</th></tr>';
                                        $cat_id = $row->cat_id;
                                    }
                                    $select = "";
                                    foreach($selectedRights AS $right)
                                    {
                                        if($right->id = $row->sys_link_id)
                                        {
                                            $select = " selected ";
                                            break;
                                        }
                                    }
                                    echo '<tr><td colspan="2"></td><td width="55%"><input  type="checkbox" name="link_id_'.$counter.'" value="'.$row->sys_link_id.'" '.$select.'> &nbsp;&nbsp;'.$row->link_name.'</td></tr>';
                                    $counter++;
                                }
                                ?>
                            </table>
                            <input type="hidden" name="counter" id="counter"value="<?=$counter?>">
                           

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close() ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

</div>