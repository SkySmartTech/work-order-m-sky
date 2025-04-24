<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_name"])) {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}

// Display the authenticated user's information
$username = $_SESSION["user_name"];
?>

<?php include_once '../../headers/header.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">    
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../../myimg/favicon-16x16.png" alt="Sky Logo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <?php include '../../headers/top-menu.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../../headers/left-sidebar.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Breakdown Report</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>                                
                            </div>
                        </div>
                        <div class="card-body">  
                            <div class="row">                                 
                                <div class="col-md-2">    
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div>
                                            <input class="form-control" type="date" id="id_startdate" onchange="funLoadAllChart()" name="startDate" style="font-size: 15px;"/>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-2">    
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <div>
                                            <input class="form-control" type="date" id="id_enddate" onchange="funLoadAllChart()" name="endDate" style="font-size: 15px;"/>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-2">                   
                                    <label style="font-weight: bolder;">Department</label>    
                                    <select class="form-control select2" onchange="funLoadAllChart()" id="id_Select_Department" style="width: 100%;">
                                        <option selected="none"></option>                            
                                    </select>
                                </div>
                                <div class="col-md-2">                   
                                    <label style="font-weight: bolder;">Machine Category</label>    
                                    <select class="form-control select2" onchange="funLoadAllChart()" id="id_Select_Category" style="width: 100%;">
                                    </select>
                                </div>
                                <div class="col-md-2">                   
                                    <label style="font-weight: bolder;">Fault Type</label>    
                                    <select class="form-control select2" onchange="funLoadAllChart()" id="id_Select_Status" style="width: 100%;">
                                        <option value="All">ALL</option> 
                                        <option value="Electrical">Electrical</option> 
                                        <option value="Mechanical">Mechanical</option> 
                                        <option value="Select data">Select data</option> 
                                        <option value="Pneumatic">Pneumatic</option> 
                                    </select>
                                </div>
                                <div class="col-md-2"> 
                                    <div class="form-group">                                         
                                        <button type="button" class="form-control btn btn-primary" onclick="funLoadAllChart()" id="id_ViewReport" name="viewbutton">View Report</button>
                                        <button type="button" class="form-control btn btn-primary" onclick="funViewReport()" id="id_PrintReport" name="printbutton">Print Report</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">                        
                                <div class="card-header">
                                    <h3 class="card-title">Module 01</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>    
                                    </div>
                                </div>
                                <div class="card-body" id="Id_DivSpeedChart"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include Footer -->
                <?php include '../../headers/footer-bar.php'; ?> 
            </section>
        </div>    
    </div>    

    <!-- Page specific script -->
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <script src="../../plugins/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script> 
    <script>
        //--------------- Admin Panel Minimize ----------------------
        $('[data-widget="pushmenu"]').PushMenu("collapse");
        
        $(function () {      
            //-------------- Load Datetime box ----------------------------------------
            var currentDate = new Date(); // Get the current date and time
            var currentDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate()); // Get midnight of the current day
            var oneWeekAgo = new Date(currentDay.getTime() - (5 * 24 * 60 * 60 * 1000)); // Calculate 7 days (1 week) ago from midnight of the current day
            var oneDayAfter = new Date(currentDay.getTime() + (1 * 24 * 60 * 60 * 1000)); // Calculate 1 day after midnight of the current day

            document.getElementById('id_startdate').valueAsDate = oneWeekAgo; // Set the value of the input element to 7 days ago
            document.getElementById('id_enddate').valueAsDate = oneDayAfter; // Set the value of the input element to 1 day after
            
            $('#id_table1').DataTable({ 
               scrollX: true, // Enable horizontal scroll
               scrollY: "400px", // Set vertical scroll height
               scrollCollapse: true, // Collapse table height when less than scrollY
               paging: true, // Enable paging
               pageLength: 10, // Set the number of rows per page
               dom: 'Bfrtip',
               buttons: [
                   { extend: 'copyHtml5', footer: true },
                   { extend: 'excelHtml5', footer: true },
                   { extend: 'csvHtml5', footer: true },
                   { extend: 'pdfHtml5', footer: true },
                   { extend: 'print', footer: true }
               ]
            });   

            funLoadAllChart();        
        });

        function funRefresh_SpeedChart() {
            let intDebugEnable = 1;        
            if (intDebugEnable === 1) alert("funRefresh_SpeedChart");

            // Variable to send to backend
            var vblSendPara = "1234"; 

            $.post('getData_HomeChart.php', { userpara: vblSendPara }, function(json_data) {
                if (intDebugEnable === 1) alert("json_data: " + json_data);           
                var res = $.parseJSON(json_data);        
                
                // Initialize arrays for the chart data
                var varDate = res.Date_Ary;          
                var varSen1Speed = res.Sen1Speed_Ary;              
                
                //-------------------------------------------------------------
                //- LINE CHART: Machine Speed Over Time
                //-------------------------------------------------------------     
                document.getElementById("Id_DivSpeedChart").innerHTML = '<canvas id="id_speedChart" style="height: 200px; max-width: 120%;"></canvas>';
                var speedChartCanvas = document.getElementById('id_speedChart').getContext('2d');

                // Clear existing chart instance
                if (typeof window.speedChart !== 'undefined') {
                    window.speedChart.destroy(); // Destroy the previous chart instance
                }

                var speedChartData = {
                    labels: varDate,
                    datasets: [
                        {
                            label: 'Sensor Speed',
                            backgroundColor: 'rgba(60,141,188,0.2)', // Set transparency for line chart
                            borderColor: 'rgba(60,141,188,1)', // Line color
                            borderWidth: 2, // Set border width for visibility
                            pointRadius: 3, // Adjust point size for visibility
                            pointBackgroundColor: 'rgba(60,141,188,1)', // Point color
                            pointBorderColor: '#fff', // Point border color
                            data: varSen1Speed // Use the speed data from the response
                        }
                    ]    
                };

                var speedChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontSize: 8 // Adjust the font size for y-axis ticks
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 8 // Adjust the font size for x-axis ticks
                            }
                        }]
                    }
                };

                window.speedChart = new Chart(speedChartCanvas, {
                    type: 'line',
                    data: speedChartData,
                    options: speedChartOptions
                });
            });
        }

        function funLoadAllChart() {
            funRefresh_SpeedChart();
        }

        function funViewReport() {
            // Implement your print logic here
            alert('Print Report functionality not implemented yet!');
        }
    </script>
</body>
</html>
