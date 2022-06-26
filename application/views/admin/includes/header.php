<?php
?>
<!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?= ($admindata['image'])? base_url($admindata['image']):base_url('assets').'/images/users/avatar-11.png' ?>" alt="user-image" class="rounded-circle">
                        <span class="d-none d-sm-inline-block ml-1"><?= ($this->session->user_setdata['username'])? $this->session->user_setdata['username'] : "user"  ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="<?= base_url('profile') ?>" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <!--<a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-outline"></i>
                            <span>Settings</span>
                        </a>-->

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-lock-outline"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="<?= base_url('logout') ?>" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                        <i class="mdi mdi-settings noti-icon"></i>
                    </a>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="<?= base_url('admin') ?>" class="logo text-center">
                    <span class="logo-lg">
                        <img src="<?= base_url('assets') ?>/images/mainlogo.png" alt="" height="18">
                        <!-- <span class="logo-lg-text-light">Zircos</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">Z</span> -->
                        <img src="<?= base_url('assets') ?>/images/mainlogo_s.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
        
                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

                <!--<li class="d-none d-lg-block">
                    <a href="#" class="nav-link">New</a>
                </li>-->

                <!--<li class="dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?= base_url('assets') ?>/images/flags/us.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="<?= base_url('assets') ?>/images/flags/germany.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">German</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="<?= base_url('assets') ?>/images/flags/italy.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Italian</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="<?= base_url('assets') ?>/images/flags/spain.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Spanish</span>
   
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="<?= base_url('assets') ?>/images/flags/russia.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Russian</span>
                        </a>

                    </div>
                </li>-->


            </ul>
        </div>
        <!-- end Topbar --> 
        
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

                <div class="slimscroll-menu">
    
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
    
                        <ul class="metismenu" id="side-menu">
    
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Master  </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <!--<li><a href="">Group</a></li>-->
                                    <li><a href="<?= base_url('supplier') ?>">Supplier</a></li>
                                    <li><a href="<?= base_url('item-group') ?>">Item Group</a></li>
                                    <li><a href="<?= base_url('units') ?>">Units</a></li>
                                    <li><a href="<?= base_url('item-master') ?>">Items</a></li>
                                    <li><a href="<?= base_url('process-master') ?>">Process</a></li>
                                    <li><a href="<?= base_url('bom-master') ?>">BOM</a></li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-monitor"></i>
                                    <span> Transaction  </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?= base_url('purchase') ?>">Purchase</a></li>
                                    <li><a href="<?= base_url('jobwork-inward') ?>">Jobwork Inward</a></li>
                                    <li><a href="<?= base_url('workorder') ?>">Work Order</a></li>
                                    <li><a href="<?= base_url('process-opening') ?>">Process Opening</a></li>
                                    <li><a href="<?= base_url('material-issue') ?>">Material Issue</a></li>
                                    <li><a href="<?= base_url('grnlist') ?>">Goods Receipt Note</a></li>
                                    <li><a href="<?= base_url('dispatch-schedule') ?>">Dispatch Schedule</a></li>
                                    <li><a href="#">Jobwork Outward</a></li>
                                    <li><a href="#">Material Issue To Customer</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                <i class="mdi mdi-source-repository-multiple"></i>
                                    <span> Report  </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?= base_url('vendor-dispatch-schedule') ?>">Vendor Dispatch Schedule </a></li>
                                    <li><a href="<?= base_url('stock-summary') ?>">Stock Summary </a></li>
                                    <li><a href="<?= base_url('vendor-stock-summary') ?>">Vendor Stock Summary </a></li>
                                    <li><a href="<?= base_url('mis') ?>">MIS</a></li>                                    
                                </ul>
                            </li>
                           
                        </ul>
    
                    </div>
                    <!-- End Sidebar -->
    
                    <!--<div class="clearfix"></div>
    
                    <div class="help-box">
                        <h5 class="text-muted mt-0">For Help ?</h5>
                        <p class=""><span class="text-info">Email:</span>
                            <br/> support@support.com</p>
                        <p class="mb-0"><span class="text-info">Call:</span>
                            <br/> (+123) 123 456 789</p>
                    </div>-->
    
                </div>
                <!-- Sidebar -left -->
    
            </div>
            <!-- Left Sidebar End -->
