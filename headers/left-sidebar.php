<?php
    //session_start();
    $username = $_SESSION["user_name"];
    $roll_section   = $_SESSION["user_roll_sections"];
    //$roll_areas     = $_SESSION["user_roll_areas"];
    //print_r($section);   
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../myimg/sky.jpg" class="img-fluid" alt="User Image">
            </div>
            <div class="info">
                <a href="https://skytechsl.com/" class="d-block text-light font-weight-bold">Sky Smart Technology</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-widget="treeview" data-accordion="false">
            
                <?php if (in_array('10', $roll_section)): ?>
                    <li class="nav-item">
                        <a href="../../pages/home/home.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    
                <?php endif; ?>

                <?php if (in_array('20', $roll_section)): ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-list"></i>
                        <p>Reports <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (in_array('201', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../workorder_mttr_mtbr/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>MTBF/MTTR</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('202', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../workorder_report_breakdown/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Breakdown</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('203', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../workorder_report_plannedmnt/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Planned Maintenance</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('204', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../workorder_report_redtag/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Red Tag</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('205', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../workorder_report_buildingmnt/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Building Maintenance</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('206', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../workorder_report_other/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Other</p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (in_array('30', $roll_section)): ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Machine Monitoring <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (in_array('301', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../machine_monitoring_dashboard/mc_dashboard.php" class="nav-link">
                                    <i class="nav-icon fas fa-desktop"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('302', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Charts & Reports</p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (in_array('40', $roll_section)): ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-male"></i>
                        <p>Mechanic Performance <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (in_array('401', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../mechanic_performance/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-desktop"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('402', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../mechanic_jobhistory/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Job History</p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (in_array('50', $roll_section)): ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>User Management <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (in_array('501', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../user_account/users.php" class="nav-link">
                                    <i class="nav-icon far fa-edit"></i>
                                    <p>User Account</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('502', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../user_role/users_role.php" class="nav-link">
                                    <i class="nav-icon far fa-edit"></i>
                                    <p>User Access</p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (in_array('60', $roll_section)): ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p>System Management <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (in_array('601', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../machine_management/index.php" class="nav-link">
                                    <i class="nav-icon far fa-edit"></i>
                                    <p>Machine Management</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('602', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../data_management/index.php" class="nav-link">
                                    <i class="nav-icon far fa-edit"></i>
                                    <p>Data Management</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('603', $roll_section)): ?>
                            <li class="nav-item">
                                <a href="../setting_errorlevel/setting_errorlevel.php" class="nav-link">
                                    <i class="nav-icon far fa-edit"></i>
                                    <p>Master Data Upload</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../setting_errorlevel/task.php" class="nav-link">
                                    <i class="nav-icon far fa-edit"></i>
                                    <p>Task  Upload</p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="../user_profile/index.php" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-question-circle"></i>
                        <p>Help</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../logout/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
                

            </ul>
            
        </nav>
    </div>
</aside>
<!-- Include this in your <head> or before closing </body> -->
<style>


    body.light-mode {
        --bg-color: #f8f9fa;
        --text-color: #212529;
        --sidebar-bg: #ffffff;
        --sidebar-link: #212529;
        --sidebar-hover: #dee2e6;
        --sidebar-active: #17a2b8;
    }

    body.dark-mode {
        --bg-color: #343a40;
        --text-color: #ffffff;
        --sidebar-bg: #212529;
        --sidebar-link: #c2c7d0;
        --sidebar-hover: #495057;
        --sidebar-active: #17a2b8;
    }

    body {
        background-color: var(--bg-color);
        color: var(--text-color);
        transition: all 0.3s ease-in-out;
    }

    .main-sidebar {
        background-color: var(--sidebar-bg);
        color: var(--text-color);
    }

    .nav-sidebar .nav-link {
        color: var(--sidebar-link);
    }

    .nav-sidebar .nav-link:hover {
        background-color: var(--sidebar-hover);
        color: var(--text-color);
    }

    .nav-sidebar .nav-link.active {
        background-color: var(--sidebar-active);
        color: white;
        border-left: 4px solid #ffc107;
    }

    .theme-switch-wrapper {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 10px;
    }

    .theme-switch {
        display: inline-flex;
        align-items: center;
    }

    .theme-switch input {
        height: 0;
        width: 0;
        visibility: hidden;
    }

    .theme-switch label {
        cursor: pointer;
        text-indent: -9999px;
        width: 40px;
        height: 20px;
        background: #ccc;
        display: block;
        border-radius: 100px;
        position: relative;
    }

    .theme-switch label:after {
        content: '';
        position: absolute;
        left: 2px;
        top: 2px;
        width: 16px;
        height: 16px;
        background: #fff;
        border-radius: 90px;
        transition: 0.3s;
    }

    .theme-switch input:checked + label {
        background: #17a2b8;
    }

    .theme-switch input:checked + label:after {
        left: calc(100% - 2px);
        transform: translateX(-100%);
    }

 
    .main-sidebar {
        background: linear-gradient(180deg, #343a40, #212529);
        color: white;
        font-family: 'Segoe UI', sans-serif;
    }

    .nav-sidebar .nav-link {
        color: #c2c7d0;
        transition: all 0.2s ease-in-out;
    }

    .nav-sidebar .nav-link:hover {
        background-color: #495057;
        color: #fff;
        border-left: 3px solid #17a2b8;
    }

    .nav-sidebar .nav-link.active {
        background-color: #17a2b8;
        color: white;
        border-left: 4px solid #ffc107;
    }

    .nav-sidebar .nav-icon {
        color: #adb5bd;
    }

    .nav-sidebar .nav-treeview .nav-link {
        padding-left: 30px;
    }

    .sidebar .user-panel img {
        border-radius: 50%;
        border: 2px solid #17a2b8;
        box-shadow: 0 0 5px #17a2b8;
    }

    .sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background-color: #6c757d;
        border-radius: 3px;
    }

    .sidebar {
        overflow-y: auto;
        max-height: 100vh;
    }
</style>

<script>
    // Toggle switch
    const toggleSwitch = document.getElementById('theme-toggle');

    // Load saved mode
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
        toggleSwitch.checked = true;
    } else {
        document.body.classList.add('light-mode');
    }

    toggleSwitch.addEventListener('change', () => {
        if (toggleSwitch.checked) {
            document.body.classList.remove('light-mode');
            document.body.classList.add('dark-mode');
            localStorage.setItem('theme', 'dark');
        } else {
            document.body.classList.remove('dark-mode');
            document.body.classList.add('light-mode');
            localStorage.setItem('theme', 'light');
        }
    });
</script>
