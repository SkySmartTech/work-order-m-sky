<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="height:50px">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>        
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">               
        <li class="nav-item">
            <a href="../user_profile/index.php" class="nav-link text-primary text-primary"><b>&nbsp;&nbsp;User : <?php echo $_SESSION["user_name"]; ?></b></a>
        </li> 
        <li><div class="theme-switch-wrapper">
                        <div class="theme-switch">
                            <input type="checkbox" id="theme-toggle" />
                            <label for="theme-toggle">Toggle Theme</label>
                        </div></li>         
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>  
    </ul>
</nav>