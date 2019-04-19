<aside class="main-sidebar">
                <!-- sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel text-center">
                        <?php $picture = $this->session->userdata('picture'); ?>
                        <div class="image">
                            <img src="<?php echo (!empty($picture)?base_url($picture):base_url("assets/images/no-img.png")) ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="info">
                            <p><?php echo $this->session->userdata('fullname') ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i>
                            <?php   
                                $userRoles = array( 
                                    '1' => display('admin'),
                                    '2' => display('doctor'),
                                    '3' => display('accountant'),
                                    '4' => display('laboratorist'),
                                    '5' => display('nurse'),
                                    '6' => display('pharmacist'),
                                    '7' => display('receptionist'),
                                    '8' => display('representative'), 
                                    '9' => display('case_manager') 
                                ); 
                                echo $userRoles[$this->session->userdata('user_role')];
                            ?></a>
                        </div>
                    </div> 
                    <!-- Dynamic Navigation Ber -->
                    <ul class="sidebar-menu" id="menuBar"> 
                    </ul>

                    <!-- end -->

                    
                </div> <!-- /.sidebar -->
            </aside>
<script type="text/javascript">
    $(document).ready(function() {

        $.ajax({
                url  : '<?= base_url('user/getMenu/') ?>',
                type : 'GET',
                data : {
                    '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>'
                },
                success : function(data) 
                {
                    $("#menuBar").html(data);
                }, 
                error : function()
                {
                    alert('failed');
                }
            });
    });
</script>