<header class="main-header"> 

                <?php $logo = $this->session->userdata('logo'); ?>
                <?php $favicon = $this->session->userdata('favicon'); ?>
                <a href="<?php echo base_url('dashboard/home') ?>" class="logo"> <!-- Logo -->
                    <span class="logo-mini">
                        <img src="<?php echo (!empty($favicon)?base_url($favicon):base_url("assets/images/logo.png")) ?>" alt="">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo (!empty($logo)?base_url($logo):base_url("assets/images/logo.png")) ?>" alt="">
                    </span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="pe-7s-keypad"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Out of Stock Alert -->
                            <?php  
                                $nout_stocks = get_cout_out_of_stock();
                                $nexpired_stocks = get_cout_expired_medicine_stock();
                            ?>
                            <li class="dropdown dropdown-user">
                                <?php if($nexpired_stocks): ?>
                                    <a href="<?= base_url('pharmacy_manager/stock/expired_stock') ?>"> 
                                        <i class="fa fa-bell-o"></i>
                                        <span class="label label-danger"><?= $nexpired_stocks ?></span>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= $nexpired_stocks ? base_url('pharmacy_manager/stock/expired_stock') : '#' ?>" class="dropdown-toggle" data-toggle="dropdown"> 
                                        <i class="fa fa-bell-o"></i>
                                    </a>
                                <?php endif ?>
                            </li>
                            <li class="dropdown dropdown-user">
                                <?php if($nout_stocks): ?>
                                    <a href="<?= base_url('pharmacy_manager/stock/out_of_stock') ?>"> 
                                        <i class="pe-7s-attention"></i>
                                        <span class="label label-danger"><?= $nout_stocks ?></span>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= $nout_stocks ? base_url('pharmacy_manager/stock/out_of_stock') : '#' ?>" class="dropdown-toggle" data-toggle="dropdown"> 
                                        <i class="pe-7s-attention"></i>
                                    </a>
                                <?php endif ?>
                            </li>
                            <!-- settings -->
                            <li class="dropdown dropdown-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-settings"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('dashboard/profile'); ?>"><i class="pe-7s-users"></i> <?php echo display('profile') ?></a></li>
                                    <li><a href="<?php echo base_url('dashboard/form'); ?>"><i class="pe-7s-settings"></i> <?php echo display('edit_profile') ?></a></li>
                                    <li><a href="<?php echo base_url('logout') ?>"><i class="pe-7s-key"></i> <?php echo display('logout') ?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>