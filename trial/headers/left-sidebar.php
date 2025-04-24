<?php
    //session_start();
    $username = $_SESSION["user_name"];
    $roll_section   = $_SESSION["user_roll_sections"];
    //$roll_areas     = $_SESSION["user_roll_areas"];
    //print_r($section);   
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../myimg/Noyon_Logo.jpg" class="img-fluid active " alt="User Image">
            </div>
            <div class="info">
                <a href="https://www.noyonlanka.com" class="d-block">Noyon Lanka</a>
            </div>
        </div>       
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <?php if (in_array('10' , $roll_section)): ?>
                    <li class="nav-item menu-open">
                        <a href="../../pages/home/home.php" class="nav-link deactive">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>                   
                    </li> 
                <?php endif; ?>             
                
                <li class="nav-item">
                    <?php if (in_array('15' , $roll_section)): ?>
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Machine Monitoring <i class="right fas fa-angle-left"></i></p>
                        </a>
                    <?php endif; ?>                    
                    <ul class="nav nav-treeview">
                        <?php if (in_array('151' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../machine_monitoring_dashboard/mc_dashboard.php" class="nav-link">
                                    <i class="nav-icon fas fa-desktop"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('152' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../machine_monitoring_chart/mc_chart.php" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Charts</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('153' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../machine_monitoring_chart/mc_chart.php" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Reports</p>
                                </a>
                            </li> 
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <?php if (in_array('20' , $roll_section)): ?>
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p>Andon System<i class="right fas fa-angle-left"></i></p>
                        </a>
                    <?php endif; ?>
                    <ul class="nav nav-treeview">
                        <?php if (in_array('201' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../andon_chart/andon_chart.php" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Charts</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('202' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../andon_report/andon_report.php" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Reports</p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <?php if (in_array('25' , $roll_section)): ?>
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>Work Orders<i class="right fas fa-angle-left"></i></p>
                        </a>
                    <?php endif; ?>
                    <ul class="nav nav-treeview">
                        <?php if (in_array('251' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../workorder_chart/workorder_chart.php" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Charts</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('252' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../workorder_report/workorder_report.php" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Reports</p>
                                </a>
                            </li> 
                        <?php endif; ?>
                        <?php if (in_array('252' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../workorder_mttr_mtbr/workorder_report_advance.php" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Reports MTTR/MTBF</p>
                                </a>
                            </li> 
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <?php if (in_array('30' , $roll_section)): ?>
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                            <p>Settings<i class="right fas fa-angle-left"></i></p>
                        </a>
                    <?php endif; ?>
                    <ul class="nav nav-treeview">
                        <?php if (in_array('301' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../setting_errorlevel/setting_errorlevel.php" class="nav-link">
                                    <i class="nav-icon far fa-edit"></i>
                                    <p>Error Level</p>
                                </a>
                            </li>
                        <?php endif; ?>                        
                        <?php if (in_array('302' , $roll_section)): ?>
                            <li class="nav-item disabled">
                                <a href="../machine_management/index.php" class="nav-link">
                                    <i class="nav-icon far fa-edit "></i>
                                    <p>Machine Management</p>
                                </a>
                            </li>   
                        <?php endif; ?>
                        <?php if (in_array('303' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-edit "></i>
                                    <p>Mechanic Management</p>
                                </a>
                            </li> 
                        <?php endif; ?>
                    </ul>
                </li>   
                <li class="nav-item">
                    <?php if (in_array('35' , $roll_section)): ?>
                        <a href="../mechanic_performance/index.php" class="nav-link deactive">
                            <i class="nav-icon fas fa-male"></i>
                            <p>Mechanic Performance</p>
                        </a>  
                    <?php endif; ?>
                </li> 
                <li class="nav-item">                   
                        <a href="../user_profile/index.php" class="nav-link deactive">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>User Profile</p>
                        </a>                     
                </li> 
                
                <li class="nav-item">
                    <?php if (in_array('40' , $roll_section)): ?>
                         <a href="#" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>User Account<span class="badge badge-info right"></span></p>
                        </a>
                    <?php endif; ?>
                    <ul class="nav nav-treeview">
                        <?php if (in_array('401' , $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../user_account/users.php" class="nav-link">
                                    <i class="nav-icon far fa-edit"></i>
                                    <p>User Account Setup</p>
                                </a>
                            </li>
                        <?php endif; ?>                        
                        <?php if (in_array('402' , $roll_section)): ?>
                            <li class="nav-item disabled">
                                <a href="../user_role/users_role.php" class="nav-link">
                                    <i class="nav-icon far fa-edit "></i>
                                    <p>User Access Setup</p>
                                </a>
                            </li>   
                        <?php endif; ?>                        
                    </ul>
                </li>                
                <li class="nav-item">                    
                    <a href="../logout/logout.php" class="nav-link">
                        <i class="nav-icon fas fas fa-power-off"></i>
                        <p>
                            Logout
                            <span class="badge badge-info right"></span>
                        </p>
                    </a> 
                </li>     
                <li class="nav-header text-bold">SUPPORT</li>  
                <li class="nav-item">
                    <a href="https://skytechsl.com/pages/Support.html" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li> 
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
      <!-- /.sidebar -->
</aside>
