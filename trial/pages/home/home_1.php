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
                        <div class="row pt-0" id="id_AndonDashboard">    
                        </div> 
                        <div class="border-top my-2" id="id_AndonDashboard_line"></div> 
                        <!-- /.Mechanic Dashboard -------------->
                        <div class="row pt-0" id="id_McDashboard">  
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner text-center">
                                        <h4 id="id_McDashboard_NoOfAsgnJob_value">12</h4>                                            
                                        <h5>No of Assign Jobs</h5>                                            
                                    </div>
                                    <a href="../../pages/mechanic_performance/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- small box -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h4 id="id_McDashboard_NoOfCmplt_value">05</h4>                                            
                                        <h5>No of Completed Jobs</h5> 
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="../../pages/mechanic_performance/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h4 id="id_McDashboard_TotChkTime_value">05</h4>                                            
                                        <h5>Total Checking Time for Day</h5> 
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="../../pages/mechanic_performance/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                              <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                         <h4 id="id_McDashboard_TotWaitTime_value">05</h4>                                            
                                        <h5>Total Waiting Time for Day</h5> 
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="../../pages/mechanic_performance/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>                     
                        </div>                         
                        <div class="border-top my-0" id="id_McDashboard_line"></div> 
                        <div class="row my-1" id="id_homeDetails">   
                            <div class="col-md-2">
                                <div>                                    
                                    <br/>
                                </div>
                                <div>
                                    <br/>
                                </div>
                                <div>
                                    <br/>
                                </div>
                                <div>
                                    <br/>
                                </div>                               
                            </div>
                            <div class="col-md-3">                            
                                <!-- <p class="text-center"><strong>Work Order Details</strong></p> -->
                                <p class="text-center"><strong>Downtime Summary</strong></p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width:70%;">No Of Total Downtime</td>
                                            <td style="width:5%;"></td>            
                                            <td style="width:25%;" id="id_Home_NoOfTotDt">: -</td>            
                                        </tr>
                                        <tr>
                                            <td style="width:70%;">No of Attended Downtime</td>
                                            <td style="width:5%;"></td>   
                                            <td style="width:25%;" id="id_Home_NoOfTotAttnDt">: -</td>   
                                        </tr> 
                                        <tr>
                                            <td style="width:70%;">No of Completed Downtime</td>
                                            <td style="width:5%;"></td>   
                                            <td style="width:25%;" id="id_Home_NoOfCompletedDt">: -</td>   
                                        </tr> 
                                        <tr>
                                            <td style="width:70%;">Total Downtime (Min)</td>
                                            <td style="width:5%;"></td>   
                                            <td style="width:25%;" id="id_Home_TotDt">: - Min</td>   
                                        </tr> 
                                        <tr>
                                            <td style="width:70%;">Total Waiting Time (Min)</td>
                                            <td style="width:5%;"></td>   
                                            <td style="width:25%;" id="id_Home_TotWaitTime">: - Min</td>   
                                        </tr> 
                                    </tbody>               
                                </table>                                                                                
                            </div>  
                            <div class="col-md-3">                            
                                <!-- <p class="text-center"><strong>Work Order Details</strong></p> -->
                                <p class="text-center"><strong>Work Order Details</strong></p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width:70%;">Open Work Orders </td>
                                            <td style="width:5%;"></td>            
                                            <td style="width:25%;">: -</td>            
                                        </tr>
                                        <tr>
                                            <td style="width:70%;">Reopened Work Orders</td>
                                            <td style="width:5%;"></td>   
                                            <td style="width:25%;">: -</td>   
                                        </tr>
                                        <tr>
                                            <td style="width:70%;">Production Verify Pending</td>
                                            <td style="width:5%;"></td>   
                                            <td style="width:25%;">: -</td>   
                                        </tr>
                                        <tr>
                                            <td style="width:70%;">Total Available Machines</td>
                                            <td style="width:5%;"></td>   
                                            <td style="width:25%;">: -</td>   
                                        </tr>
                                        <tr>
                                            <td style="width:70%;">Inprogress Work Orders </td>
                                            <td style="width:5%;"></td>   
                                            <td style="width:25%;">: -</td>   
                                        </tr>
                                         <tr>
                                            <td style="width:70%;">Total Work Orders  </td>
                                            <td style="width:5%;"></td>   
                                            <td style="width:25%;">: -</td>   
                                        </tr>
                                    </tbody>               
                                </table>                                                                                
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="card card-success">                                    
                                    <div class="card-body" id="Id_DivBarChart_1">                                    
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        <!-- </div>   This div is requred, but if insert more space top of table -->
                        <!-- /.row -->
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
                                    <option value="All">All</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Knitting">Knitting</option>
                                    <option value="Finishing">Finishing</option>
                                    <option value="Dyeing">Dyeing</option>
                                    <option value="DryFinishing">Dry Finishing</option>
                                    <option value="Utilities">Utilities</option>
                                    <option value="DesignDevelopment">Design Development</option>
                                    <option value="QA">QA</option>
                                    <option value="Technical">Technical</option>
                                    <option value="Planning">Planning</option>
                                    <option value="HR_Admin">HR & Admin</option>
                                    <option value="Innnovation">Innnovation</option>  
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
                                        <th>WO</th>
                                        <th>Department</th>    
                                        <th>Time</th>  
                                        <th>Category</th>
                                        <th>Description</th>                                    
                                        <th>By</th>                                                                      
                                        <th>Status</th>
                                        <th><center>ReOpen</center></th>
                                    </tr>
                                </thead>
                                <tbody>                                       
                                </tbody>               
                            </table>
                        </section>
                    </div>
                    <div class="border-top my-1"></div>
                    <div class="row"> 
                        <div class="col-lg-7 mt-1">
                            <button type="button" class="btn btn-primary" onclick="funModCreateBreakDownClicked()" style="width:32.5%;" <?php echo (in_array('10019', $roll_areas) ? '' : 'disabled'); ?>><i class="fas fa-exclamation-triangle"></i> Break Down</button>
                            <button type="button" class="btn btn-primary" onclick="funModelPlannedMaintenanceClicked()" style="width:32.5%;" <?php echo (in_array('10020', $roll_areas) ? '' : 'disabled'); ?>><i class="far fa-bell"></i> Planned Maintenance</button>
                            <button type="button" class="btn btn-primary" onclick="funModRedTagCreateClicked()" style="width:32.5%;" <?php echo (in_array('10021', $roll_areas) ? '' : 'disabled'); ?>><i class="fas fa-bullhorn"></i> Red Tag</button>
                    
                        </div>
                        <div class="col-lg-5 mt-1">
                            <button type="button" class="btn btn-primary" onclick="funModBuildMntCreateClicked()" style="width:48%;" <?php echo (in_array('10022', $roll_areas) ? '' : 'disabled'); ?>><i class="fas fa-tools"></i> Building Maintenance</button>
                            <button type="button" class="btn btn-primary" onclick="funModOtherProjectCreateClicked()" style="width:48%;" <?php echo (in_array('10023', $roll_areas) ? '' : 'disabled'); ?>><i class="fas fa-recycle"></i> Other</button>
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

<script>    
    var i;
    var j;
    
    var dtbl1;
    var dtbl2;
    var dtbl3;
    var strReceiptNo    = "0";
    var intDebugEnable  = "1";
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
                            CurrentUserName: SESSION_CurrentUserName,
                            CurrentUserEPF: SESSION_CurrentUserEPF,
                            CurrentUserContact: SESSION_CurrentUserContact,
                            CurrentUserDepartment: SESSION_CurrentUserDepartment,
                            CurrentUserType: SESSION_CurrentUserType,
                            WorkOrderDepartment: "NA",
                            NextModelID: 'NA',
                            NextFunctionName: 'NA',
                            WorkOrderStatus: 'NA',
                            WorkOrderVerify: 'NA'
                        };
    JS_SessionArry.push(tmpDataAry);
    
    //alert(JS_SessionArry[0].CurrentUserName);
    //-------- Other Variables ---------------------------
    let employeeData = [];          // use for Allocate/Deallocate tables
   
    $(function () 
    {        
        //------------ Hide home Details, When MC Login -----------------------
        if(roll_other_ary.includes("902"))
        {
            //alert("902 Available");
            //var hiddenDiv = document.getElementById('id_homeDetails');
            //hiddenDiv.style.display = 'none';
            document.getElementById('id_homeDetails').style.display         = 'none';
            document.getElementById('id_homeDetails_line').style.display    = 'none';
            document.getElementById('id_AndonDashboard_line').style.display = 'none';
        }
        else 
        {
            //alert("902 not Available");
        }
        //
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
        if(roll_other_ary.includes("902")){intTableHeight = 400;}

        $("#example1").DataTable({
            "columnDefs": [
                { "width": "2%", "targets": 0 }, // No
                { "width": "9%", "targets": 1 }, // WO
                { "width": "10%", "targets": 2 }, // Department
                { "width": "15%", "targets": 3 }, // Time
                { "width": "10%", "targets": 4 }, // Category
                { "width": "30%", "targets": 5 }, // Description (set width to 20%)
                { "width": "10%", "targets": 6 }, // By
                { "width": "7%", "targets": 7 }, // Status               
                { "width": "7%", "targets": 8 }   // ReOpen
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
        funRefreshClicked();
        funRefresh_DowntimeDashboard();
        funRefresh_MechanicDashboard();
        MQTTconnect();
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
    
    //$('#button').click(function () 
    //{
    //    var table = $('#example1').DataTable();
    //    alert(table.rows('.selected').data().length + ' row(s) selected');
    //});
    // Update the count down every 1 second
    var x = setInterval(function() 
    {
        //alert("Timer running..");
        //-------------- Show Time -------------------------------------------------
        //var today = new Date();
        //var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        //var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        //document.getElementById("id_datetime").innerHTML = date+' '+time;
        //--------------- Update Data ----------------------------------------------
        funRefresh_DowntimeDashboard(); 
     
        //alert(JS_SessionArry[0].CurrentUserType);  
        if(JS_SessionArry[0].CurrentUserType === "productionuser")   
        {
            funRefreshClicked();
        }
        
    }, 5000); 
    
    //function showAlert(button)
    //{
    //    alert("Test");
    //}
    //-------------------- Read Data to Load Table ----------------------
    function funRefreshClicked() 
    {
        //alert("Refresh page..");          
        //------------------- Load Home Table -----------------------------------------------
        //--------- Find User Is Engineering or Not ----------------------------------------
        //alert(JS_SessionArry[0].CurrentUserDepartment);       
        const DataAry = []; 
        DataAry[0] = "funGetFilteredData";        // Function Name    
        //DataAry[1] = "1";
        DataAry[2] = "WoDepartment";
        DataAry[3] = JS_SessionArry[0].CurrentUserDepartment;       //"pneumatic";  
        //alert("Current User Dep :" + DataAry[3]);
        document.getElementById("id_funHome_SelDepartmentFilter").value = DataAry[3];
        if(DataAry[3] === "Engineering")
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
                        strDescription = res.Data_Ary[i][6] + " (" +res.Data_Ary[i][9] + ")";
                        //strDescription = res.Data_Ary[i][9];
                    }  
                    else if(strWoCategory === "RedTag")
                    {
                        //alert("RedTag");
                        strDescription = res.Data_Ary[i][6] + " (" +res.Data_Ary[i][9] + ")";
                        //strDescription = res.Data_Ary[i][9];
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
                    dtbl1.row.add([intX, res.Data_Ary[i][1],res.Data_Ary[i][2] , res.Data_Ary[i][3], res.Data_Ary[i][4], strDescription, res.Data_Ary[i][8], res.Data_Ary[i][10],res.Data_Ary[i][12]]).draw(false);
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
        //-------------- Update Home page Chart ---------------------------------------------
        var vblSendPara =  "1234"; 
        $.post('class/getData_HomeChart.php', { userpara: vblSendPara }, function(json_data2) 
        {
            //alert(json_data2);           
            var res = $.parseJSON(json_data2);        
            //const varDate = ["08/12/2023", "09/12/2023", "10/12/2023","12/12/2023", "14/12/2023", "16/12/2023","17/12/2023", "19/12/2023", "20/12/2023"];
            //const varWoCount = [10,18,11,20,23,19,16,21,11];  
            
            var varDate           = new Array();
            var varWoCount  = new Array();
            
            varDate      = res.Date_Ary;          
            varWoCount   = res.TotalWorkOrders_Ary;              
            //-------------------------------------------------------------
            //- BAR CHART:1 - Line Wise Downtime Summary  
            //-------------------------------------------------------------            
            document.getElementById("Id_DivBarChart_1").innerHTML = '&nbsp;';
            document.getElementById("Id_DivBarChart_1").innerHTML = '<canvas id="id_barChart_1" style="max-height: 100%; max-width: 100%;"></canvas>';
            var barChartCanvas = $('#id_barChart_1').get(0).getContext('2d');
            var barChart1_Data2 = 
            {
                //labels  : res.WorkOrderNo_Ary,
                labels  : varDate,
                datasets: [
                {
                    label               : 'Break Down Progress',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : varWoCount
                }]
            };            
            var barChartData = $.extend(true, {}, barChart1_Data2);
            var temp0 = barChart1_Data2.datasets[0];
            //var temp1 = barChart1_Data2.datasets[1];
            barChartData.datasets[0] = temp0;
            //barChartData.datasets[1] = temp1;
            var barChartOptions = 
            {
              responsive              : true,
              maintainAspectRatio     : false,
              datasetFill             : false,
              chartArea : {backgroundColor: 'rgba(255, 0, 0, 0.1)'} // Change the background color of the chart area
            };            
            new Chart(barChartCanvas, 
            {
                //options: 
                //{
                 //   plugins: 
                   // {
                        // Change options for ALL labels of THIS CHART
                   //     datalabels: {color: '#000000', anchor: 'end', rotation:'0'}
                   // }
                //}, 
                type: 'line',
                data: barChartData,
                options: barChartOptions
            });            
        }); 
        //----------------- Home Downtime Summary-----------------------------------        
        DataAry[0] = "funGetWoSummaryData";        // Function Name    
        DataAry[1] = "NA";
        //alert(DataAry);
    
        $.post('class/getData_HomeSummary.php', { userpara: DataAry }, function(json_data2) 
        {
            //alert(json_data2); 
            var res = $.parseJSON(json_data2);   
            if(res.Status_Ary[0] === "true")
            {
                document.getElementById("id_Home_NoOfTotDt").innerHTML          = " : " + res.Data_Ary[0];
                document.getElementById("id_Home_NoOfTotAttnDt").innerHTML      = " : " + res.Data_Ary[2];
                document.getElementById("id_Home_NoOfCompletedDt").innerHTML    = " : " + res.Data_Ary[3];
                document.getElementById("id_Home_TotDt").innerHTML              = " : " + res.Data_Ary[4];
                document.getElementById("id_Home_TotWaitTime").innerHTML        = " : " + res.Data_Ary[5];

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
     
    //-------------------- Model : Edit Update Clicked -------------------------
    function funClickedModBreakdownStatusUpdate() 
    {
        //alert("Model Breakdown State Change Clicked");   
        const DataAry = []; 
        DataAry[0] = document.getElementById("id_mod_breakdown_WoNo").value;        
        DataAry[1] = document.getElementById("id_mod_breakdown_dt").value;        
        DataAry[2] = document.getElementById("id_mod_breakdown_note").value;
        DataAry[3] = document.getElementById("id_mod_breakdown_WoStatus").value;        
        //alert(DataAry);          
       
        //var vblSendPara =  "1234"; 
        $.post('class/updateData_WoBreakDownState.php', { userpara: DataAry }, function(json_data2) 
        {
            //alert(json_data2);           
            var res = $.parseJSON(json_data2);
            //alert(res);
            //alert(res[0]); 
            //alert(res[1]);   
            if(intMqttState === 1)
            {
                message = new Paho.MQTT.Message("{\"MacAdd\":\"E8:9F:6D:92:D3:0D\",\"MsgType\":\"BrkdwnEvent\",\"IPAdd\":\"192.168.1.105\",\"UserName\":\"Kelum\",\"ModelNo\":\"DCS-1507A_UI\",\"ManufacDate\":\"16/12/2023\",\"EventNo\":\"1\",\"PwrOnCount\":\"0\",\"RunTime\":\"0\",\"FrameworkVer\":\"DCS-1507A_Frm3\",\"SoftVer\":\"8.0\",\"SigStrength\":\"-36\"}");
                message.destinationName = strPublishTopic;
                mqtt.send(message);
            }
            else
            {
                //alert("Fail Connecting with server");
                Swal.fire({
                            title: 'Alert !!',
                            text: 'Fail Connecting with server.',
                            icon: 'Warning', // success, error, warning, info, question
                            confirmButtonText: 'OK'
                        });
            }    
            //var AryCustomOrder = new Array();
            //AryCustomOrder = res.CustomOrderAry;
            //document.getElementById("id_status").value = res[1];
        }); 
        //alert("Data Updated successfully.");
               
        var varmodbox = document.getElementById("id_mod_breakdown_statechange");
        varmodbox.style.display = "none";        
        funRefreshClicked();
        
    }
    function onMqttConnect() 
    {
        // Once a connection has been made, make a subscription and send a message.
        console.log("Connected ");
        //mqtt.subscribe("sensor1");
        //message = new Paho.MQTT.Message("{\"MacAdd\":\"E8:9F:6D:92:D3:0D\",\"MsgType\":\"PwrOn\",\"IPAdd\":\"192.168.1.105\",\"UserName\":\"Kelum\",\"ModelNo\":\"DCS-1507A_UI\",\"ManufacDate\":\"29/04/2022\",\"EventNo\":\"1\",\"PwrOnCount\":\"0\",\"RunTime\":\"0\",\"FrameworkVer\":\"DCS-1507A_Frm3\",\"SoftVer\":\"8.0\",\"SigStrength\":\"-36\"}");
        //message = new Paho.MQTT.Message("{\"MacAdd\":\"E8:9F:6D:92:D3:0D\",\"MsgType\":\"PwrOn\"}");
        message = new Paho.MQTT.Message("{\"MacAdd\":\"E8:9F:6D:92:D3:0D\",\"MsgType\":\"PwrOn\",\"IPAdd\":\"192.168.1.105\",\"UserName\":\"Kelum\",\"ModelNo\":\"DCS-1507A_UI\",\"ManufacDate\":\"29/04/2022\",\"EventNo\":\"1\",\"PwrOnCount\":\"0\",\"RunTime\":\"0\",\"FrameworkVer\":\"DCS-1507A_Frm3\",\"SoftVer\":\"8.0\",\"SigStrength\":\"-36\"}");
        message.destinationName = strPublishTopic;
        mqtt.send(message);
        intMqttState = 1;
    }
    function MQTTconnect()
    {
        console.log("connecting to "+ host +" "+ port);
        var x=Math.floor(Math.random() * 10000); 
        var cname="orderform-"+x;
        mqtt = new Paho.MQTT.Client(host,port,cname);
        //document.write("connecting to "+ host);
        var options = {useSSL: true, timeout: 3,onSuccess: onMqttConnect};  		 
        mqtt.connect(options); //connect
    }
    //--------------------- Downtime Dashboard (100-11) ----------------------   
    function funRefresh_DowntimeDashboard()
    {
        //alert("Update Home Downtime Dashboard");
        if(!roll_areas_ary.includes('10011'))
        {
            //alert("Remove Andon Dashboard");
        }
        else
        {
            //alert("true");              
            var RunDT_IDAry           = new Array();
            var RunDT_MachineNoAry    = new Array();
            var RunDT_DowntimeAry     = new Array();

            var AttnDT_IDAry          = new Array();
            var AttnDT_MachineNoAry   = new Array();
            var AttnDT_DowntimeAry    = new Array();
            var RepDT_DowntimeAry    = new Array();
            var TotDT_DowntimeAry    = new Array();

            let intRunDtRecCount = 0;
            var strText = "";
            //-------------- Update Home page Running Downtime Dashboard ---------------------------------------------

            var vblSendPara =  "1234"; 
            $.post('class/getData_HomeDtDashboard.php', { userpara: vblSendPara }, function(json_data2) 
            {
                //alert(json_data2);  
                var res = $.parseJSON(json_data2);
                //alert(json_data2); 

                RunDT_IDAry            = res.RunDT_ID_Ary;   
                RunDT_MachineNoAry     = res.RunDT_MachineNo_Ary;
                RunDT_DowntimeAry      = res.RunDT_RunDowntime_Ary;

                AttnDT_IDAry           = res.AttnDT_ID_Ary;   
                AttnDT_MachineNoAry    = res.AttnDT_MachineNo_Ary;
                AttnDT_DowntimeAry     = res.AttnDT_Downtime_Ary;
                RepDT_DowntimeAry      = res.RepDT_Downtime_Ary;
                TotDT_DowntimeAry      = res.TotDT_Downtime_Ary;

                let intRunDtRecCount = RunDT_IDAry.length; 
                let intAttnDtRecCount = AttnDT_IDAry.length; 

                const maxCards =4;
                const intAllDtRecCounr = intRunDtRecCount + intAttnDtRecCount;

                const cardRow = document.getElementById('id_AndonDashboard');

                //cardRow.innerHTML ="";
                cardRow.innerHTML ="<div><div>" +
                            "<div style=\"width: 120px; height: 110px \">" +
                                "<center><h6 id=\"id_mcnumber_"     + i + "\">" + "." + "</h6></center>" +
                                "<center><h6 id=\"id_mcreptime_"    + i + "\">" + "Repair Time"  + "</h6></center>" +
                                "<center><h6 id=\"id_mcattntime_"   + i + "\">" + "Attend Time"  + "</h6></center>" +
                                "<center><h6 id=\"id_mcdowntime_"   + i + "\">" + "Downtime"  + "</h6></center>" +
                            "</div></div></div>";

                for (let i = 1; i < maxCards; i++) 
                {                
                    if(i < intRunDtRecCount)
                    {                                 
                        cardRow.innerHTML +="<div class=\"col-lg2 col-xs-3\"><div class=\"small-box mx-2\">" +
                            "<div id=\"id_mcrundtcolor_" + i + "\" style=\"background-color: red; width: 120px; height: 110px \">" +
                                "<marquee behavior='scroll' direction='left' scrollamount='3'><center><h6 id=\"id_mcnumber_"     + i + "\">" + RunDT_MachineNoAry[i] + "</h6></center></marquee>" +
                                "<center><h6 id=\"id_mcreptime_"    + i + "\">" + "-"  + "</h6></center>" +
                                "<center><h6 id=\"id_mcattntime_"   + i + "\">" + "-"  + "</h6></center>" +
                                "<center><h6 id=\"id_mcdowntime_"   + i + "\">" + RunDT_DowntimeAry[i]  + "</h6></center>" +
                            "</div></div></div>";            
                    }
                    else if(i < intAttnDtRecCount + intRunDtRecCount-1)
                    {
                        //alert("i < intRunDtRecCount");
                        j = i - intRunDtRecCount;             
                        cardRow.innerHTML +="<div class=\"col-lg2 col-xs-3\"><div class=\"small-box mx-2\">" +
                            "<div id=\"id_mcrundtcolor_" + i + "\" style=\"background-color: lightgreen; width: 120px; height: 110px \">" +
                                "<marquee behavior='scroll' direction='left' scrollamount='3'><center><h6 id=\"id_mcnumber_"     + i + "\">" + AttnDT_MachineNoAry[j+1] + "</h6></center></marquee>" +
                                "<center><h6 id=\"id_mcreptime_"    + i + "\">" + RepDT_DowntimeAry[j+1]  + "</h6></center>" +
                                "<center><h6 id=\"id_mcattntime_"   + i + "\">" + AttnDT_DowntimeAry[j+1]  + "</h6></center>" +
                                "<center><h6 id=\"id_mcdowntime_"   + i + "\">" + TotDT_DowntimeAry[j+1]  + "</h6></center>" +
                            "</div></div></div>"; 
                    }

                }  
                //alert("Update DT Dashboard Finised");
            });
        }
    }
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
            alert(json_data2); 
            var res = $.parseJSON(json_data2);   
            if(res.Status_Ary[0] === "true")
            {
                let intRecCount = res.Data_Ary.length; 
                //alert(intRecCount);     
                dtbl1.clear().draw();            
                for(i=0; i<intRecCount; i++)
                {               
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
                    dtbl1.row.add([res.Data_Ary[i][0], res.Data_Ary[i][1],res.Data_Ary[i][2] , res.Data_Ary[i][3], res.Data_Ary[i][4], strDescription, res.Data_Ary[i][8], res.Data_Ary[i][10],res.Data_Ary[i][11], res.Data_Ary[i][12]]).draw(false);
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
    //--------------------- Mechanic Dashboard (100-12) ----------------------   
    function funRefresh_MechanicDashboard()
    {
        alert("Update Mechanic Dashboard");
        if(!roll_areas_ary.includes('10012'))
        {
            alert("Remove Mechanic Dashboard");
            document.getElementById('id_McDashboard').style.display         = 'none';
            document.getElementById('id_McDashboard_line').style.display    = 'none';
            //document.getElementById('id_AndonDashboard_line').style.display = 'none';
            
        }
        else
        {
            alert("Mechanic Dashboard Working");  
            /*
            var RunDT_IDAry           = new Array();
            var RunDT_MachineNoAry    = new Array();
            var RunDT_DowntimeAry     = new Array();

            var AttnDT_IDAry          = new Array();
            var AttnDT_MachineNoAry   = new Array();
            var AttnDT_DowntimeAry    = new Array();
            var RepDT_DowntimeAry    = new Array();
            var TotDT_DowntimeAry    = new Array();

            let intRunDtRecCount = 0;
            var strText = "";
            //-------------- Update Home page Running Downtime Dashboard ---------------------------------------------

            var vblSendPara =  "1234"; 
            $.post('class/getData_HomeDtDashboard.php', { userpara: vblSendPara }, function(json_data2) 
            {
                //alert(json_data2);  
                var res = $.parseJSON(json_data2);
                //alert(json_data2); 

                RunDT_IDAry            = res.RunDT_ID_Ary;   
                RunDT_MachineNoAry     = res.RunDT_MachineNo_Ary;
                RunDT_DowntimeAry      = res.RunDT_RunDowntime_Ary;

                AttnDT_IDAry           = res.AttnDT_ID_Ary;   
                AttnDT_MachineNoAry    = res.AttnDT_MachineNo_Ary;
                AttnDT_DowntimeAry     = res.AttnDT_Downtime_Ary;
                RepDT_DowntimeAry      = res.RepDT_Downtime_Ary;
                TotDT_DowntimeAry      = res.TotDT_Downtime_Ary;

                let intRunDtRecCount = RunDT_IDAry.length; 
                let intAttnDtRecCount = AttnDT_IDAry.length; 

                const maxCards =4;
                const intAllDtRecCounr = intRunDtRecCount + intAttnDtRecCount;

                const cardRow = document.getElementById('id_AndonDashboard');

                //cardRow.innerHTML ="";
                cardRow.innerHTML ="<div><div>" +
                            "<div style=\"width: 120px; height: 110px \">" +
                                "<center><h6 id=\"id_mcnumber_"     + i + "\">" + "." + "</h6></center>" +
                                "<center><h6 id=\"id_mcreptime_"    + i + "\">" + "Repair Time"  + "</h6></center>" +
                                "<center><h6 id=\"id_mcattntime_"   + i + "\">" + "Attend Time"  + "</h6></center>" +
                                "<center><h6 id=\"id_mcdowntime_"   + i + "\">" + "Downtime"  + "</h6></center>" +
                            "</div></div></div>";

                for (let i = 1; i < maxCards; i++) 
                {                
                    if(i < intRunDtRecCount)
                    {                                 
                        cardRow.innerHTML +="<div class=\"col-lg2 col-xs-3\"><div class=\"small-box mx-2\">" +
                            "<div id=\"id_mcrundtcolor_" + i + "\" style=\"background-color: red; width: 120px; height: 110px \">" +
                                "<marquee behavior='scroll' direction='left' scrollamount='3'><center><h6 id=\"id_mcnumber_"     + i + "\">" + RunDT_MachineNoAry[i] + "</h6></center></marquee>" +
                                "<center><h6 id=\"id_mcreptime_"    + i + "\">" + "-"  + "</h6></center>" +
                                "<center><h6 id=\"id_mcattntime_"   + i + "\">" + "-"  + "</h6></center>" +
                                "<center><h6 id=\"id_mcdowntime_"   + i + "\">" + RunDT_DowntimeAry[i]  + "</h6></center>" +
                            "</div></div></div>";            
                    }
                    else if(i < intAttnDtRecCount + intRunDtRecCount-1)
                    {
                        //alert("i < intRunDtRecCount");
                        j = i - intRunDtRecCount;             
                        cardRow.innerHTML +="<div class=\"col-lg2 col-xs-3\"><div class=\"small-box mx-2\">" +
                            "<div id=\"id_mcrundtcolor_" + i + "\" style=\"background-color: lightgreen; width: 120px; height: 110px \">" +
                                "<marquee behavior='scroll' direction='left' scrollamount='3'><center><h6 id=\"id_mcnumber_"     + i + "\">" + AttnDT_MachineNoAry[j+1] + "</h6></center></marquee>" +
                                "<center><h6 id=\"id_mcreptime_"    + i + "\">" + RepDT_DowntimeAry[j+1]  + "</h6></center>" +
                                "<center><h6 id=\"id_mcattntime_"   + i + "\">" + AttnDT_DowntimeAry[j+1]  + "</h6></center>" +
                                "<center><h6 id=\"id_mcdowntime_"   + i + "\">" + TotDT_DowntimeAry[j+1]  + "</h6></center>" +
                            "</div></div></div>"; 
                    }

                }  
                //alert("Update DT Dashboard Finised");
            });
            */
        }
    }
</script>
</body>
</html>
