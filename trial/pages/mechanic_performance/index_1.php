<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION["user_name"]))
    {
        // If not logged in, redirect to the login page
        header("Location: index.php");
        exit();
    }
    // Display the authenticated user's information
    $username = $_SESSION["user_name"];
?>
<?php
    include_once'../../headers/header.php';
    //include_once'../../dbconnection/dbConnection.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">    
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../../myimg/favicon-16x16.png" alt="Sky Logo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <?php
             include '../../headers/top-menu.php'
        ?>
        <!-- Main Sidebar Container -->
        <?php
            include '../../headers/left-sidebar.php'
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.card-header -->                    
                    <div class="card card-default" >
                        <div class="card-header">
                            <h3 class="card-title">Mechanic Performance</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>                                
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">  
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Mechanic</label>
                                        <div>
                                            <select class="form-control" id="id_SelMechanics" onchange="funReportType()">
                                                <option value="mcname">MC Name</option>                                               
                                            </select> 
                                        </div>                               
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Report Type</label>
                                        <div>
                                            <select class="form-control" id="id_ReportType" onchange="funReportType()">
                                                <option value="currentshift">Current Shift</option>
                                                <option value="last_week">Day Shift</option>
                                                <option value="last_month">Night Shift</option>
                                            </select> 
                                        </div>                               
                                    </div>
                                </div>                                
                                <div class="col-md-2">    
                                    <div class="form-group">
                                        <label>Date Start:</label>
                                        <div>
                                            <input class="form-control" type="datetime-local" id="id_sdate" name="startDate" />
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-2">     
                                    <div class="form-group">
                                        <label>Date End:</label>
                                        <div>                                        
                                           <input class="form-control" type="datetime-local" id="id_edate" name="startDate"/>     
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"> 
                                    <div class="form-group">                                         
                                        <div class="form-group">
                                            <button type="button" class="form-control btn btn-primary mt-4" onclick="funViewReport()" id="id_ViewReport" name="viewbutton">View Report</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default" >
                        <div class="card-header">
                            <h3 class="card-title">Mechanic Performance Chart</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>                                
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">  
                            <div class="table-responsive">
                                <div class="overflow-auto">
                                    <div id="timeline"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- /.card -->
                    <section class="content">
                        <div class="container-fluid">                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-danger">  
                                        <div class="card-header">
                                            <h3 class="card-title"><b>Mechanic Performance Evaluation Sheet </b></h3>                                    
                                        </div>                                
                                        <!-- /.card-header -->
                                        <div class="card-body" id="id_class1">
                                            <table id="id_table1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Work Order No</th>
                                                        <th>Description</th>
                                                        <th>User CheckIn Time</th>
                                                        <th>User CheckOut Time</th>
                                                        <th>Worked Duration</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                          
                                                </tbody>
                                               
                                            </table>	
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    
                </div><!-- /.container-fluid -->
                <!-- Include Footer -->
                <?php
                    include '../../headers/footer-bar.php'
                ?> 
            </section>
        </div>    
    </div>    
 
<!-- Page specific script -->
<script>
    
    // Create the data table with multiple bars per row
    //--------------- Admin Panel Minimize ----------------------
    $('[data-widget="pushmenu"]').PushMenu("collapse");
    
    $(function () 
    {
        //----------- Load Google Chart -------------------------------------------
        // Load the Google Charts library and Draw the chart when Google Charts library is loaded
        google.charts.load('current', {'packages':['timeline']});
        google.charts.setOnLoadCallback(drawGooleChart);
        //-------------- Load Datetime box ----------------------------------------
        var currentDate = new Date();
        var formattedDate = currentDate.toISOString().slice(0, 16);
        document.getElementById('id_sdate').value = formattedDate;
        //document.getElementById('id_sdate').valueAsDate = new Date();
        
        currentDate = new Date(Date.now() + ( 3600 * 1000 * 24));
        formattedDate = currentDate.toISOString().slice(0, 16);
        document.getElementById('id_edate').value = formattedDate;
        //document.getElementById('id_edate').valueAsDate = new Date(Date.now() + ( 3600 * 1000 * 24));        
        
        //$("#example2").DataTable({
        //    "responsive": true, "lengthChange": false, "autoWidth": false,
        //    "buttons": ["copy", "csv", "excel", "pdf", "print"]
        //}).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        
        $('#id_table1').DataTable({
            dom: 'Bfrtip',
            buttons: [{ extend: 'copyHtml5', footer: true },{ extend: 'excelHtml5', footer: true },{ extend: 'csvHtml5', footer: true },{ extend: 'pdfHtml5', footer: true },{ extend: 'print', footer: true }]
        });       
        funLoadMehanics();
        funViewReport();
    });
      
    //-------------------- Load CheckIn/Allocation Chart --------------------------------------    
    function drawGooleChart() 
    {
        let intDebugEnable = 0;        
        if(intDebugEnable === 1) alert("dataTable.addRows"); 
        var SESSION_CurrentUserEPF      = "<?php echo htmlspecialchars($_SESSION["user_epf"]); ?>";        
        const DataAry = [];  
        //-------------------- Update CheckIn Chart -------------------------------------------------------        
        DataAry[0] = "funGetData_CheckInAllocateTimeChart";        // Table Name
        DataAry[1] = SESSION_CurrentUserEPF;
        DataAry[2] = document.getElementById("id_sdate").value;
        DataAry[3] = document.getElementById("id_edate").value;        
        if(intDebugEnable === 1) alert("DataAry :" + DataAry);
        $.post('getData_McPerformance.php', { userpara: DataAry }, function(json_data2) 
        {
            if(intDebugEnable === 1) alert("json_data2 :" + json_data2);           
            var res = $.parseJSON(json_data2);                 
            //alert(res.Status_Ary[0]);        
            if(res.Status_Ary[0] === "true")   // No data found, insert new record
            {             
                if(intDebugEnable === 1) alert("res.Status_Ary[0] :" + res.Status_Ary[0]);
                var dataAry_new = res.Data_Ary;
                
                var dataTable = new google.visualization.DataTable();
                dataTable.addColumn({ type: 'string', id: 'Room' });
                dataTable.addColumn({ type: 'string', id: 'Name' });
                dataTable.addColumn({ type: 'date', id: 'Start' });
                dataTable.addColumn({ type: 'date', id: 'End' });
               
                if(intDebugEnable === 1) alert("dataTable:" + dataTable);
                 
                dataAry_new.forEach(function(row) 
                {   
                    var startDate = new Date(row[2]);
                    var endDate = new Date(row[3]);
                    
                    //alert(startDate);
                     // Add the date part to the time
                    var startDateTimeString = startDate.toISOString().slice(0, 16);
                    var endDateTimeString = endDate.toISOString().slice(0, 16);
                    //alert(startDateTimeString);
                    
                    var endDateTimeString = endDate.toISOString().slice(0, 16);
                    dataTable.addRow([row[0], row[1], new Date(startDateTimeString), new Date(endDateTimeString)]);

                    //dataTable.addRow([row[0], row[1],startDate, endDate]);
                });
                
                // Set chart options
                if(intDebugEnable === 1) alert("options"); 
                var options = 
                        {
                            height: 240,
                            timeline: 
                            {
                                groupByRowLabel: false, // Display multiple bars per row
                                timePattern: 'yyyy-MM-dd HH:mm' // Specify time format as 24-hour (HH:mm)
                            }
                        };
                // Instantiate and draw the chart
                var chart = new google.visualization.Timeline(document.getElementById('timeline'));
                chart.draw(dataTable, options);
                if(intDebugEnable === 1) alert("Chart End..");
            }
        });
    }
    
    //--------------- Print Report function ------------------------------------------
    function funReportType() 
    {      
        let intDebugEnable = 0;
        if(intDebugEnable === 1) alert("Report Type Clicked"); 
        
        if(document.getElementById('id_ReportType').value === "today")
        {
            document.getElementById('id_sdate').valueAsDate = new Date();
            document.getElementById('id_edate').valueAsDate = new Date(Date.now() + ( 3600 * 1000 * 24)); 
            funViewReport();
        }
        else if(document.getElementById('id_ReportType').value === "last_week")
        {
            // Calculate start date of last week (7 days ago)
            var startDate = new Date();
            startDate.setDate(startDate.getDate() - 7);
            document.getElementById('id_sdate').valueAsDate = startDate;
            // Set end date to yesterday
            document.getElementById('id_edate').valueAsDate = new Date(Date.now() - (3600 * 1000 * 24)); 
            funViewReport();
        }    
        else if(document.getElementById('id_ReportType').value === "last_month")
        {
            var startDate = new Date();
            startDate.setMonth(startDate.getMonth() - 1);
            startDate.setDate(1); // Set to first day of the month
            document.getElementById('id_sdate').valueAsDate = startDate;
            // Calculate end date of last month
            var endDate = new Date();
            endDate.setDate(0); // Set to last day of previous month
            document.getElementById('id_edate').valueAsDate = endDate;
            funViewReport();
        }
        else
        {
            document.getElementById('id_sdate').valueAsDate = new Date();
            document.getElementById('id_edate').valueAsDate = new Date(Date.now() + ( 3600 * 1000 * 24));
            funViewReport();
        }
    }
    //-------------------- ViewReport Function --------------------------------------------
    function funViewReport() 
    {
        let intDebugEnable = 0;
        //if(intDebugEnable === 1) alert("View button Clicked"); 
        var SESSION_CurrentUserEPF      = "<?php echo htmlspecialchars($_SESSION["user_epf"]); ?>";
        
        const DataAry = [];           
        //-------------- Check User Already CheckIn ------------------------------
        DataAry[0] = "funGetData_CheckInTable";        // Table Name
        DataAry[1] = SESSION_CurrentUserEPF;
        DataAry[2] = document.getElementById("id_sdate").value;
        DataAry[3] = document.getElementById("id_edate").value;
        
        //if(intDebugEnable === 1) alert("DataAry :" + DataAry);
        $.post('getData_McPerformance.php', { userpara: DataAry }, function(json_data2) 
        {
            //if(intDebugEnable === 1) alert("json_data2 :" + json_data2);           
            var res = $.parseJSON(json_data2);                 
            //alert(res.Status_Ary[0]);        
            if(res.Status_Ary[0] === "true")   // No data found, insert new record
            {
                //------------------------------------------------------------
                //- Table 1 - Department Wise Total Downtime 
                //------------------------------------------------------------ 
                var dtbl1 = $('#id_table1').DataTable();
                dtbl1.clear().draw();
                //---------- Insert Table Header -------------------------            
                //$(dtbl1.column(2).header()).html("Downtime (Min)");
                //$(dtbl1.column(3).header()).html("Occurrence");
                //---------- Insert Table Body -------------------------
                intRowCount = res.Data_Ary.length;
                for(i=0;i<intRowCount;i++)
                {
                    intTmp = i + 1;      
                    dtbl1.row.add([intTmp.toString(), res.Data_Ary[i][0], res.Data_Ary[i][1],res.Data_Ary[i][2],res.Data_Ary[i][3], res.Data_Ary[i][4]]).draw(false);
                } 
                //---------- Insert Table Footer -------------------------        
                //$(dtbl1.column(3).footer()).html(dtbl1.column(3).data().reduce( function (a,b){return parseFloat(a)+parseFloat(b);}));
                //$(dtbl1.column(5).footer()).html(dtbl1.column(5).data().reduce( function (a,b){return parseFloat(a)+parseFloat(b);}));
            }
            else if(res.Status_Ary[0] === "false")   // No data found, insert new record
            {
                var dtbl1 = $('#id_table1').DataTable();
                dtbl1.clear().draw();
                //Swal.fire({title: 'Alert.!',text: "Data not available",icon: 'info',confirmButtonText: 'OK'});
            }
            else
            {
                var dtbl1 = $('#id_table1').DataTable();
                dtbl1.clear().draw();
                Swal.fire({title: 'Error.!',text: res.Status_Ary[0],icon: 'error',confirmButtonText: 'OK'});
            }
        }); 
        drawGooleChart();
    }
    //-------------------- ViewReport Function --------------------------------------------
    function funLoadMehanics() 
    {
        let intDebugEnable = 1;        
        if(intDebugEnable === 1) alert("funLoadMehanics"); 
        //--------- Load User Departments -------------------------------------
        const DataAry = [];
        DataAry[0] = "funGetFilteredData";        // Function Name    
        DataAry[1] = "EmpName";
        DataAry[2] = "tblusers_account";
        DataAry[3] = "0";
        if(intDebugEnable === 1)    alert("DataAry" + DataAry);      
        $.post('comFunctions.php', { userpara: DataAry }, function(json_data2) 
        {
            if(intDebugEnable === 1) alert("json_data2 : " + json_data2);
            var res = $.parseJSON(json_data2);  
            if(res.Status_Ary[0] === "true")
            {
                AryMechanics = res.Data_Ary;
                if(intDebugEnable === 1) alert("Location : 220 " + AryMechanics); 
                //------------ Remove All Items in "AryMechanics" -----------------------------------
                var options4 = document.querySelectorAll('#id_SelMechanics option');
                options4.forEach(o => o.remove());
                //------------ Fill New Items -------------------------------------
                var sel_UserType = document.getElementById("id_SelMechanics");
                
                
                var SESSION_CurrentUserEPF      = "<?php echo htmlspecialchars($_SESSION["user_name"]); ?>";                
                var opt4 = SESSION_CurrentUserEPF;
                var el4 = document.createElement("option");
                el4.textContent = opt4;
                el4.value = opt4;
                sel_UserType.appendChild(el4);
                
                for(var i = 0; i < AryMechanics.length; i++)
                {
                    var opt4 = AryMechanics[i];
                    var el4 = document.createElement("option");
                    el4.textContent = opt4;
                    el4.value = opt4;
                    sel_UserType.appendChild(el4);
                }
                //var SESSION_CurrentUserEPF      = "<?php echo htmlspecialchars($_SESSION["user_epf"]); ?>";
                //document.getElementById("id_SelMechanics").value        = "kel";
                //document.getElementById("id_SelMechanics").textContent  = "kel";
            }
        });
    }
</script>
</body>
</html>
