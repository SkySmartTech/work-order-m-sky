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
    //$all_section   = $_SESSION["user_roll_sections"];
    $roll_areas     = $_SESSION["user_roll_areas"];
    $roll_other     = $_SESSION["user_roll_other"];
?>

<?php
    require_once('../../headers/header.php');
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
        <!-- /.navbar -->
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
                    <div class="card-body">
                        <!-- /.Andon Dashboard ---------------->
                        <div class="row">
                            <div class="col-md-2">
                                <div id="id_AndonDashboard_head">
                                    <!-- Cards will be dynamically added here -->
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div id="id_AndonDashboard">
                                    <!-- Cards will be dynamically added here -->
                                </div>
                            </div>                        
                        </div>                        
                       
                        
                        
                    </div>                        
                    <div class="border-top my-1" id="id_homeDetails_line"></div>     
                                       
                    <div class="row">  
                        <div class="col-lg-6">
                            <p class="text-center"><strong>List of all work orders</strong></p>                        
                        </div>
                        
                        <div class="col-lg-3">
                            <input type="text" id="myCustomSearchBox" class="form-control" placeholder="Search Anything here">
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <select class="form-control" onchange="funHome_SelDepartmentFilter()" id="id_funHome_SelDepartmentFilter" style="width:100%">
                                    <option value="Department-1">Department-1</option>
                                    <option value="Department-2">Department-2</option>                                      
                                </select>                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                           <table id="example1" class="table table-bordered table-striped display compact">
                                <thead class="bg-info">
                                    <tr>
                                        <th>#</th>
                                        <th>Wo No</th>
                                        <th>Department</th>
                                        <th>Time</th>                                        
                                        <th>Category</th>    
                                        <th>Sub Category</th>
                                        <th>Details</th>                                                  
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>                                       
                                </tbody>               
                            </table>
                        </section>
                    </div>
                    <div class="border-top my-1"></div>
                    <!-- Action Buttons -->
                <div class="row">
                    <div class="col-12 text-center mt-4">
                        <button type="button" class="btn btn-outline-danger mx-2 rounded-pill shadow-sm px-4" onclick="funModelPlannedMaintenanceClicked()" style="min-width: 180px;">
                            <i class="far fa-bell"></i> Urgent
                        </button>
                        <button type="button" class="btn btn-outline-warning mx-2 rounded-pill shadow-sm px-4" onclick="funModRedTagCreateClicked()" style="min-width: 180px;">
                            <i class="fas fa-bullhorn"></i> Normal
                        </button>
                    </div>
                </div>

                    
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
                <!-- Include Footer -->
                <br/>
                <?php
                    include '../../headers/footer-bar.php'
                ?> 
            </section>
        </div>    
</div>    
 
<!-- Navbar -->
<?php
    include './model-pages/mod_BreakDownCreate.php'; 
    include './model-pages/mod_WoDetails.php'; 
    include './model-pages/mod_WoClose.php'; 
    include './model-pages/mod_WoAllocate.php'; 
    include './model-pages/mod_WoCheckIn.php'; 
 
    include './model-pages/mod_PlannedMaintenanceCreate.php';
    include './model-pages/mod_RedTagCreate.php';
    include './model-pages/mod_BuildingMaintenanceCreate.php';
    include './model-pages/mod_OtherProjectCreate.php';
  
    include './model-pages/mod_WoChat.php';         
    include './model-pages/mod_CheckUser.php';

?>    

<!-- Page specific script -->
<script src="js/mod_BreakDownCreate.js"></script>
<script src="js/mod_WoDetails.js"></script>
<script src="js/mod_WoClose.js"></script>
<script src="js/mod_WoAllocate.js"></script>
<script src="js/mod_WoCheckIn.js"></script>
<script src="js/mod_PlannedMaintenanceCreate.js"></script>
<script src="js/mod_RedTagCreate.js"></script>
<script src="js/mod_BuildingMaintenanceCreate.js"></script>
<script src="js/mod_OtherProjectCreate.js"></script>
<script src="js/mod_CheckUser.js"></script>
<script src="js/mod_WoVerify.js"></script>
<script src="js/mod_WoReOpen.js"></script>
<script src="js/mod_WoChat.js"></script>
<script src="js/mod_WoDelete.js"></script>

<script>    
    var i;
    var j;
    
    var dtbl1;
    var dtbl2;
    var dtbl3;
    var strReceiptNo    = "0";
    //var intDebugEnable  = "1";
    //------------- MQTT Settings ------------------
    var mqtt;
    var reconnectTimeout = 2000;
    //var host="178.128.30.122";       // Noyon PORT 9001
    var host="mmsnoyon.com";       // Noyon PORT 9001
    var strPublishTopic = "TST/SVR1760A";
    //var host="localhost";
    //var port=9001;
    var port=8883;
    var intMqttState = 0;
    
    //------------- PHP Session Variable to JS variables ---------------------     
    var SESSION_CurrentUserName     = "<?php echo htmlspecialchars($_SESSION["user_name"]); ?>";
    var SESSION_CurrentUserEPF      = "<?php echo htmlspecialchars($_SESSION["user_epf"]); ?>";
    var SESSION_CurrentUserContact      = "<?php echo htmlspecialchars($_SESSION["user_contactno"]); ?>";
    var SESSION_CurrentUserDepartment   = "<?php echo htmlspecialchars($_SESSION["user_department"]); ?>";      
    var SESSION_CurrentUserType   = "<?php echo htmlspecialchars($_SESSION["user_type"]); ?>";
          
          
    var roll_areas_ary      = <?php echo json_encode($roll_areas); ?>;
    var roll_other_ary      = <?php echo json_encode($roll_other); ?>;
           
    var strNextModelID = "NA";
    //alert(roll_areas_ary);
    //alert(roll_other_ary);
    var JS_SessionArry = [];
    var tmpDataAry  =   {
                            WorkOrderNo: 'NA',
                            LoggingUserName: SESSION_CurrentUserName,
                            LoggingUserEPF: SESSION_CurrentUserEPF,
                            LoggingUserContact: SESSION_CurrentUserContact,
                            LoggingUserDepartment: SESSION_CurrentUserDepartment,
                            LoggingUserType: SESSION_CurrentUserType,                            
                            CurrentUserName: SESSION_CurrentUserName,
                            CurrentUserEPF: SESSION_CurrentUserEPF,
                            CurrentUserContact: SESSION_CurrentUserContact,
                            CurrentUserDepartment: SESSION_CurrentUserDepartment,
                            CurrentUserType: SESSION_CurrentUserType,
                            WorkOrderDepartment: "NA",
                            WorkOrderCategory: "NA",
                            NextModelID: 'NA',
                            NextFunctionName: 'NA',
                            WorkOrderStatus: 'NA',
                            WorkOrderVerify: 'NA'
                        };
    JS_SessionArry.push(tmpDataAry);
    
    //alert(JS_SessionArry[0].CurrentUserName);
    //-------- Other Variables ---------------------------
    let employeeData = [];          // use for Allocate/Deallocate tables
    // JavaScript code for automatic scrolling of the dashboard
    const scrollSpeed = 30; // Adjust scrolling speed as needed
    const cardContainer = document.getElementById('id_AndonDashboard');
    document.getElementById("userDepartmentTitle").innerText = "User's Department : " + JS_SessionArry[0].CurrentUserDepartment;

    $(function () 
    {        
        // Start automatic scrolling Andon Dashboard 
        autoScroll();  
        //Date and time picker
        $('#ModOtherProjectCre_dtmDateTime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            icons: { time: 'far fa-clock' } 
        });
        //------------ Hide home Details, When MC Login -----------------------
        
        //----------------------------------------------------------------------
        //Initialize Select2 Elements
        $('.select2').select2({ closeOnSelect: true});
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4', closeOnSelect: true
        });  
         //alert("Hooi");
        //------------ Home DataTable Initialize -------------------
        let intTableHeight = 160;
        if(roll_other_ary.includes("90012")){intTableHeight = 400;}

        $("#example1").DataTable({
            "columnDefs": [
                { "width": "2%",  "targets": 0 }, // No
                { "width": "8%", "targets": 1 }, // Department
                { "width": "10%", "targets": 2 }, // Time
                { "width": "15%", "targets": 3 }, // Category
                { "width": "15%", "targets": 4 }, // Sub Category
                { "width": "25%", "targets": 5 }, // Details
                { "width": "20%",  "targets": 6 }  // Status

            ],
            "paging": false,
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false, 
            "scrollX": true,
            "scrollY": intTableHeight,
            "info": false, 
            "rowCallback" : funCellCreated,
            "dom": "lrti",
            "order": [[0, 'desc']]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        //--------- Make Descendin order -----------------------
         //$('#example1').DataTable({ "order": [[0, 'desc']] });
        //$("#example1").DataTable({
        //    "responsive": true, "lengthChange": false, "autoWidth": false,
        //    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        dtbl1 = $('#example1').DataTable();    
        
        //--- Load Tables --------------------------------------   
        funLoad_WoTableFilterDepData();
        //funRefresh_DowntimeDashboard();
        //funRefresh_MechanicDashboard();        
        //funRefresh_Last30DaySummary();
        //funRefresh_TodaySummary();
        //funRefresh_Chart();
        //funRefresh_WoTable();
        
        funAutoVerifyWo();
    }); 
    $('#myCustomSearchBox').keyup(function() 
    {
        dtbl1.search($(this).val()).draw(); // this  is for customized searchbox with datatable search feature.
    });
    $('[data-widget="pushmenu"]').PushMenu("collapse");    
    function funCellCreated(row, data, index) 
    {     
        //alert("Test cell created");
        var strCellStatus  = data[7];
        if (strCellStatus === "New")                {$(row).css('background-color', 'orange');}
        else if (strCellStatus === "Inprogress")    {$(row).css('background-color', 'lightblue');}
        else       {$(row).css('background-color', 'lightgreen');}                     

        //$(row).find('td:eq(4)').css('background-color', data[1]);
        //$(row).find('td:eq(5)').css('background-color', data[2]);
        //$(row).find('td:eq(6)').css('background-color', data[3]);        
        //if(data[3]> 420)    $(row).find('td:eq(3)').css('background-color', data[4]);       
    }
    $('#example1 tbody').on('click', 'tr', function () 
    {        
        const table2 = new DataTable('#example1');
        table2.on('click', 'tbody tr', (e) => 
        {
            
            let classList = e.currentTarget.classList;
            //if (classList.contains('selected')) 
            //{
            //    //classList.remove('selected');
           // }
           // else 
           // {
                table2.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
                classList.add('selected');          
                funWoTableRowClicked();
                
            //}            
        });        
    });
    // Function to automatically scroll the dashboard container
    function autoScroll() 
    {
        if (cardContainer.scrollWidth > cardContainer.clientWidth) 
        {
            const cardWidth = 150; // Adjust as needed
            const totalWidth = cardContainer.scrollWidth;
            const remainingWidth = totalWidth - cardContainer.scrollLeft - cardContainer.clientWidth;
            if (remainingWidth > 0) 
            {
                cardContainer.scrollLeft += 1; // Adjust scrolling direction and speed as needed
                setTimeout(autoScroll, scrollSpeed); // Repeat the scrolling process
            }
            else 
            {
                // Reset scroll position to the beginning to create continuous scrolling effect
                cardContainer.scrollLeft = 0;
                setTimeout(autoScroll, 1000); // Wait for 1 second before restarting scrolling
            }
        }
        else 
        {
            // No scrolling needed, wait for 1 second before checking again
            setTimeout(autoScroll, 1000);
        }
    }
    //$('#button').click(function () 
    //{
    //    var table = $('#example1').DataTable();
    //    alert(table.rows('.selected').data().length + ' row(s) selected');
    //});

    // Call every 5 seconds
    var x = setInterval(function() {
        var dep_value = document.getElementById("id_funHome_SelDepartmentFilter").value;

        // If same as user's department, call without parameter
        if (dep_value === JS_SessionArry[0].CurrentUserDepartment) {
            funRefresh_WoTable(); // default to current user's department
        } else {
            funRefresh_WoTable(dep_value); // use selected department
        }
    }, 5000);
        
        
  
    //-------------------- Refresh Home Table -------------------
    function funRefresh_WoTable(dep_value = JS_SessionArry[0].CurrentUserDepartment)
    {
        let intDebugEnable = 0;
        if (intDebugEnable === 1) alert("funRefresh_WoTable for department: " + dep_value);

        const DataAry = [];
        DataAry[0] = "funGetFilteredData";
        DataAry[2] = "WoDepartment";
        DataAry[3] = dep_value;

        document.getElementById("id_funHome_SelDepartmentFilter").value = dep_value;

        // Decide whether to fetch all or filtered data
        if (dep_value === "All") {
            DataAry[1] = "0"; // All data
        } else {
            DataAry[1] = "1"; // Filtered data
        }

        if(intDebugEnable === 1)    alert("DataAry : " + DataAry);
        //-------------- Update Home page WO Table ---------------------------------------------
        $.post('class/getData_HomeTable.php', { userpara: DataAry }, function(json_data2) 
        {
            if(intDebugEnable === 1)    alert("json_data2 : " + json_data2); 
            var res = $.parseJSON(json_data2);   
            if(res.Status_Ary[0] === "true")
            {
                let intRecCount     = res.Data_Ary.length; 
                
                //alert(intRecCount);     
                dtbl1.clear().draw();            
                for(i=0; i<intRecCount; i++)
                {       
                    //if(intDebugEnable === 1)    alert("intRecCount : " + intRecCount);
                    let intX = i+1;
                    let strWoCategory   = res.Data_Ary[i][4];
                    let strDescription  = "";
                    

                    //alert(strDescription); 
                    //dtbl1.row.add([IDAry[i], WorkOrderNoAry[i], WoDepartmentAry[i] , CreatedDateTimeAry[i], WorkOrderCategoryAry[i], WoDescriptionAry[i], CreatedUserAry[i], WoStatusAry[i],WoVerifyAry[i], WoReOpenAry[i]]).draw(false);
                   
                    dtbl1.row.add([
                        intX, 
                        res.Data_Ary[i][1],
                        res.Data_Ary[i][2], 
                        res.Data_Ary[i][3],
                        res.Data_Ary[i][4], 
                        res.Data_Ary[i][5],
                        res.Data_Ary[i][6],
                        res.Data_Ary[i][7]
                    ]).draw(false);
                } 
            }
            else
            {
                dtbl1.clear().draw(); 
                //alert("Data not found..");
                // success, error, warning, info, question
                Swal.fire({title: 'Wait.!',text: 'No data found.',icon: 'info', confirmButtonText: 'OK'});
            }
                     
        });
         
        //---------------- Home WorkOrder Summary ------------------------
        
    }       
    //----------- fun Back Button Cliked  ----------------------------------
    function funClickedEditBack()
    {
        setTimeout(window.close, 10);
        window.open("./index.php");
    }
    //----------- fun Refresh All Areas ---------------------------------
    function funRefresh_HomePage()
    {
        //funRefresh_DowntimeDashboard();
        //funRefresh_MechanicDashboard();        
        //funRefresh_Last30DaySummary();
        //funRefresh_TodaySummary();
        //funRefresh_Chart();
        funRefresh_WoTable();
    }
    //-------------------- Model : Edit Update Clicked -------------------------
    
    
    function funHome_SelDepartmentFilter()
    {
        //alert("Department Filter...");
        const DataAry = []; 
        DataAry[0] = "funGetFilteredData";        // Function Name    
        //DataAry[1] = "1";
        DataAry[2] = "WoDepartment";
        DataAry[3] = document.getElementById("id_funHome_SelDepartmentFilter").value;       //"pneumatic";  
        if(DataAry[3] === "All")
        {
            DataAry[1] = "0";       // All data
        }
        else
        {
            DataAry[1] = "1";       // Filtered Data
        }
        //alert(DataAry);
        //-------------- Update Home page WO Table ---------------------------------------------
        $.post('class/getData_HomeTable.php', { userpara: DataAry }, function(json_data2) 
        {
            //alert(json_data2); 
            var res = $.parseJSON(json_data2);   
            if(res.Status_Ary[0] === "true")
            {
                let intRecCount     = res.Data_Ary.length; 
                let strWoDepartment = "";
                //alert(intRecCount);     
                dtbl1.clear().draw();            
                for(i=0; i<intRecCount; i++)
                {       
                    //if(intDebugEnable === 1)    alert("intRecCount : " + intRecCount);
                    let intX = i+1;
                    let strWoCategory   = res.Data_Ary[i][4];
                    let strDescription  = "";
                    

                    //alert(strDescription); 
                    //dtbl1.row.add([IDAry[i], WorkOrderNoAry[i], WoDepartmentAry[i] , CreatedDateTimeAry[i], WorkOrderCategoryAry[i], WoDescriptionAry[i], CreatedUserAry[i], WoStatusAry[i],WoVerifyAry[i], WoReOpenAry[i]]).draw(false);
                   
                    dtbl1.row.add([
                        intX, 
                        res.Data_Ary[i][1],
                        res.Data_Ary[i][2], 
                        res.Data_Ary[i][3],
                        res.Data_Ary[i][4], 
                        res.Data_Ary[i][5],
                        res.Data_Ary[i][6],
                        res.Data_Ary[i][7]
                    ]).draw(false);
                }  
            }
            else
            {
                dtbl1.clear().draw(); 
                Swal.fire({title: 'Wait.!',text: 'No data found.',icon: 'info', confirmButtonText: 'OK'});
                //alert("Data not found..");
            }                     
        });
    }
    

    //--------------- Auto Veryfy after 24 Hours of closed WO ------------------------
    function funAutoVerifyWo()
    {
        let intDebugEnable = 0;
        
        if(intDebugEnable === 1)    alert("Ato Verify WOs");
        const DataAry = [];  
        DataAry[0] = "funAutoVerify";
        //DataAry[1] = JS_SessionArry[0].WorkOrderNo;        // Table Name
        //DataAry[2] = JS_SessionArry[0].CurrentUserEPF;                 
        //DataAry[3] = JS_SessionArry[0].CurrentUserName;
        //DataAry[4] = JS_SessionArry[0].CurrentUserContact;
        if(intDebugEnable === 1)    alert(DataAry);
        $.post('class/updateData_WoVerify.php', { userpara: DataAry }, function(json_data2) 
        {
            if(intDebugEnable === 1)    alert(json_data2);           
            var res = $.parseJSON(json_data2); 
            if(intDebugEnable === 1)    alert(res.Status_Ary[0]); 
        }); 
    }

    //--------------- When MC click funNoOfAsgnJob ------------------------
    function funNoOfAsgnJob()
    {
        let intDebugEnable = 0;        
        if(intDebugEnable === 1)    alert("funNoOfAsgnJob");
        
        const DataAry = []; 
        DataAry[0] = "funGet_NoOfAsgnJob";        // Function Name    
        DataAry[1] = JS_SessionArry[0].CurrentUserEPF;
        
        if(intDebugEnable === 1)    alert("DataAry" + DataAry);
        //-------------- Update Home page WO Table ---------------------------------------------
        $.post('class/getData_HomeTable.php', { userpara: DataAry }, function(json_data2) 
        {
            if(intDebugEnable === 1)    alert("json_data2" + json_data2);
            var res = $.parseJSON(json_data2);              
            if(res.Status_Ary[0] === "true")
            {
                let intRecCount = res.Data_Ary.length; 
                let strWoDepartment = "";
                //alert(intRecCount);     
                dtbl1.clear().draw();            
                for(i=0; i<intRecCount; i++)
                {       
                    let intX = i+1;
                    let strWoCategory   = res.Data_Ary[i][4];
                    let strDescription  = "";
                    if(strWoCategory === "BreakDown")
                    {
                        //alert("Breakdown");
                        strDescription = res.Data_Ary[i][6] + " (" +res.Data_Ary[i][7] + ")";
                    }
                    else if(strWoCategory === "PlanMaintenance")
                    {
                        //alert("PlanMaintenance");
                        strDescription = res.Data_Ary[i][9];
                    }  
                    else if(strWoCategory === "RedTag")
                    {
                        //alert("RedTag");
                        strDescription = res.Data_Ary[i][9];
                    }  
                    else if(strWoCategory === "BuildingMaintenance")
                    {
                        //alert("BuildingMaintenance");
                        strDescription = res.Data_Ary[i][9];
                    }  
                    else if(strWoCategory === "OtherProject")
                    {
                        //alert("OtherProject");
                        strDescription = res.Data_Ary[i][5] + " (" +res.Data_Ary[i][9] + ")";
                    }
                    else        // Error Wo CAtegory not found
                    {
                        alert("Wo Category not found");
                        writeToLogFile("Home Table: Wo Category not found");
                    }   
                    //------------------ Chat and Department ----------------------
                    if(Number(res.Data_Ary[i][13]) === 0) {
                        strWoDepartment = res.Data_Ary[i][2];
                    }
                    else {
                        strWoDepartment = '<i class="far fa-envelope"></i> ' + res.Data_Ary[i][2];
                    }
                    //alert(strDescription); 
                    //dtbl1.row.add([IDAry[i], WorkOrderNoAry[i], WoDepartmentAry[i] , CreatedDateTimeAry[i], WorkOrderCategoryAry[i], WoDescriptionAry[i], CreatedUserAry[i], WoStatusAry[i],WoVerifyAry[i], WoReOpenAry[i]]).draw(false);
                    dtbl1.row.add([intX, res.Data_Ary[i][1],res.Data_Ary[i][3].substring(2, 16), strWoDepartment, res.Data_Ary[i][8], res.Data_Ary[i][4], strDescription, res.Data_Ary[i][10],res.Data_Ary[i][11], res.Data_Ary[i][12]]).draw(false);
                } 
            }
            else
            {
                dtbl1.clear().draw(); 
                Swal.fire({title: 'Wait.!',text: 'No data found.',icon: 'info', confirmButtonText: 'OK'});
                //alert("Data not found..");
            }
            
        });
    }
    //--------------- When MC click funNoOfCmpltJob ------------------------
    function funNoOfCmpltJob()
    {
        let intDebugEnable = 0;        
        if(intDebugEnable === 1)    alert("funNoOfCmpltJob");
        
        const DataAry = []; 
        DataAry[0] = "funGet_NoOfCmpltJob";        // Function Name    
        DataAry[1] = JS_SessionArry[0].CurrentUserEPF;
        
        if(intDebugEnable === 1)    alert("DataAry" + DataAry);
        //-------------- Update Home page WO Table ---------------------------------------------
        $.post('class/getData_HomeTable.php', { userpara: DataAry }, function(json_data2) 
        {
            if(intDebugEnable === 1)    alert("json_data2" + json_data2);
            var res = $.parseJSON(json_data2); 

            if(res.Status_Ary[0] === "true")
            {
                let intRecCount = res.Data_Ary.length; 
                let strWoDepartment = "";
                //alert(intRecCount);     
                dtbl1.clear().draw();            
                for(i=0; i<intRecCount; i++)
                {       
                    let intX = i+1;
                    let strWoCategory   = res.Data_Ary[i][4];
                    let strDescription  = "";
                    if(strWoCategory === "BreakDown")
                    {
                        //alert("Breakdown");
                        strDescription = res.Data_Ary[i][6] + " (" +res.Data_Ary[i][7] + ")";
                    }
                    else if(strWoCategory === "PlanMaintenance")
                    {
                        //alert("PlanMaintenance");
                        strDescription = res.Data_Ary[i][9];
                    }  
                    else if(strWoCategory === "RedTag")
                    {
                        //alert("RedTag");
                        strDescription = res.Data_Ary[i][9];
                    }  
                    else if(strWoCategory === "BuildingMaintenance")
                    {
                        //alert("BuildingMaintenance");
                        strDescription = res.Data_Ary[i][9];
                    }  
                    else if(strWoCategory === "OtherProject")
                    {
                        //alert("OtherProject");
                        strDescription = res.Data_Ary[i][5] + " (" +res.Data_Ary[i][9] + ")";
                    }
                    else        // Error Wo CAtegory not found
                    {
                        alert("Wo Category not found");
                        writeToLogFile("Home Table: Wo Category not found");
                    }   
                    //------------------ Chat and Department ----------------------
                    if(Number(res.Data_Ary[i][13]) === 0) {
                        strWoDepartment = res.Data_Ary[i][2];
                    }
                    else {
                        strWoDepartment = '<i class="far fa-envelope"></i> ' + res.Data_Ary[i][2];
                    }
                    //alert(strDescription); 
                    //dtbl1.row.add([IDAry[i], WorkOrderNoAry[i], WoDepartmentAry[i] , CreatedDateTimeAry[i], WorkOrderCategoryAry[i], WoDescriptionAry[i], CreatedUserAry[i], WoStatusAry[i],WoVerifyAry[i], WoReOpenAry[i]]).draw(false);
                    dtbl1.row.add([intX, res.Data_Ary[i][1],res.Data_Ary[i][3].substring(2, 16), strWoDepartment, res.Data_Ary[i][8], res.Data_Ary[i][4], strDescription, res.Data_Ary[i][10],res.Data_Ary[i][11], res.Data_Ary[i][12]]).draw(false);
                } 
            }
            else
            {
                dtbl1.clear().draw(); 
                Swal.fire({title: 'Wait.!',text: 'No data found.',icon: 'info', confirmButtonText: 'OK'});
                //alert("Data not found..");
            }
        });
    }
    //--------------- When MC click funCurrCheckInWo ------------------------
    function funCurrCheckInWo()
    {
        let intDebugEnable = 0;        
        if(intDebugEnable === 1)    alert("funCurrCheckInWo");
        
        const DataAry = []; 
        DataAry[0] = "funGet_CurrCheckInWo";        // Function Name    
        DataAry[1] = document.getElementById("id_McDashboard_CheckInWoNo_value").innerHTML;
        
        if(intDebugEnable === 1)    alert("DataAry" + DataAry);
        //-------------- Update Home page WO Table ---------------------------------------------
        $.post('class/getData_HomeTable.php', { userpara: DataAry }, function(json_data2) 
        {
            if(intDebugEnable === 1)    alert("json_data2" + json_data2);
            var res = $.parseJSON(json_data2); 
            
            if(res.Status_Ary[0] === "true")
            {
                let intRecCount = res.Data_Ary.length; 
                //alert(intRecCount);     
                dtbl1.clear().draw();            
                for(i=0; i<intRecCount; i++)
                {       
                    let intX = i+1;
                    let strWoCategory   = res.Data_Ary[i][4];
                    let strDescription  = "";
                    if(strWoCategory === "BreakDown")
                    {
                        //alert("Breakdown");
                        strDescription = res.Data_Ary[i][6] + " (" +res.Data_Ary[i][7] + ")";
                    }
                    else if(strWoCategory === "PlanMaintenance")
                    {
                        //alert("PlanMaintenance");
                        strDescription = res.Data_Ary[i][9];
                    }  
                    else if(strWoCategory === "RedTag")
                    {
                        //alert("RedTag");
                        strDescription = res.Data_Ary[i][9];
                    }  
                    else if(strWoCategory === "BuildingMaintenance")
                    {
                        //alert("BuildingMaintenance");
                        strDescription = res.Data_Ary[i][9];
                    }  
                    else if(strWoCategory === "OtherProject")
                    {
                        //alert("OtherProject");
                        strDescription = res.Data_Ary[i][5] + " (" +res.Data_Ary[i][9] + ")";
                    }
                    else        // Error Wo CAtegory not found
                    {
                        alert("Wo Category not found");
                        writeToLogFile("Home Table: Wo Category not found");
                    }                    
                    //alert(strDescription); 
                    //dtbl1.row.add([IDAry[i], WorkOrderNoAry[i], WoDepartmentAry[i] , CreatedDateTimeAry[i], WorkOrderCategoryAry[i], WoDescriptionAry[i], CreatedUserAry[i], WoStatusAry[i],WoVerifyAry[i], WoReOpenAry[i]]).draw(false);
                    dtbl1.row.add([intX, res.Data_Ary[i][1],res.Data_Ary[i][3].substring(2, 16), res.Data_Ary[i][2], res.Data_Ary[i][8], res.Data_Ary[i][4], strDescription, res.Data_Ary[i][10],res.Data_Ary[i][11], res.Data_Ary[i][12]]).draw(false);
                } 
            }
            else
            {
                dtbl1.clear().draw(); 
                Swal.fire({title: 'Wait.!',text: 'No data found.',icon: 'info', confirmButtonText: 'OK'});
                //alert("Data not found..");
            }
            
        });
    }
    //------------- Convert Minute to HH:MM --------------------
    function convertMinutesToTime(minutes) 
    {
        // Convert minutes to hours and minutes
        var hours = Math.floor(minutes / 60);
        var remainingMinutes = minutes % 60;
        // Format hours and minutes
        var formattedHours = hours.toString().padStart(2, '0');
        var formattedMinutes = remainingMinutes.toString().padStart(2, '0');
        // Return the formatted time
        return formattedHours + ':' + formattedMinutes;
    }
    //------------- Load Work Order Table Department Filter Data -------------------
    function funLoad_WoTableFilterDepData() 
    {
        let intDebugEnable = 0;        
        if(intDebugEnable === 1)    alert("funLoad_WoTableFilterDepData");
                
        const DataAry = [];         
        //---------------- Load Departments --------------------------------------
        DataAry[0] = "funGetFilteredData";        // Function Name    
        DataAry[1] = "Department";
        DataAry[2] = "tblwo_errorlevel_breakdown";
        DataAry[3] = "0";
        if(intDebugEnable === 1)    alert("DataAry :" + DataAry);      
        $.post('class/comFunctions.php', { userpara: DataAry }, function(json_data2) 
        {
            if(intDebugEnable === 1) alert("json_data2 : " + json_data2);
            var res = $.parseJSON(json_data2);  
            if(res.Status_Ary[0] === "true")
            {
                AryDepartment = res.Data_Ary;
                if(intDebugEnable === 1) alert("AryDepartment : " + AryDepartment); 
                //------------ Remove All Items in "AryUserType" -----------------------------------
                var options5 = document.querySelectorAll('#id_funHome_SelDepartmentFilter option');
                options5.forEach(o => o.remove());
                                 
                //------------ Fill New Items -------------------------------------
                var sel_UserType = document.getElementById("id_funHome_SelDepartmentFilter");
                var opt4 = "All";
                var el4 = document.createElement("option");
                el4.textContent = opt4;
                el4.value = opt4;
                sel_UserType.appendChild(el4);
                for(var i = 0; i < AryDepartment.length; i++)
                {
                    var opt5 = AryDepartment[i];
                    var el5 = document.createElement("option");
                    el5.textContent = opt5;
                    el5.value = opt5;
                    sel_UserType.appendChild(el5);
                }
                //-------------- Set User Department in Filter ------------------
                //document.getElementById("id_funHome_SelDepartmentFilter").value = JS_SessionArry[0].CurrentUserDepartment; 
                funRefresh_WoTable();
            }
        });
    }
    
</script>
</body>
</html>
