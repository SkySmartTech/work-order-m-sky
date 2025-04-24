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
                    <div class="row pt-0">
                        <div class="col-lg2 col-xs-3">
                            <div id="l1">
                                <div class="small-box mx-2">
                                    <div id="id_color_0" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_0'>SB-01</h3></center>
                                        <center><h3 id='id_mcspeed_0'>0</h3></center>                              
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_1" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_1'>SC-01</h3></center>
                                        <center><h3 id='id_mcspeed_1'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_1" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_2'>SD-01</h3></center>
                                        <center><h3 id='id_mcspeed_2'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_1" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_3'>SD-02</h3></center>
                                        <center><h3 id='id_mcspeed_3'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_4" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_4'>SD-03</h3></center>
                                        <center><h3 id='id_mcspeed_4'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_5" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_5'>SD-04</h3></center>
                                        <center><h3 id='id_mcspeed_5'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="row pt-0">
                        <div class="col-lg2 col-xs-3">
                            <div id="l1">
                                <div class="small-box mx-2">
                                    <div id="id_color_0" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_0'>SB-02</h3></center>
                                        <center><h3 id='id_mcspeed_0'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_6" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_6'>SC-02</h3></center>
                                        <center><h3 id='id_mcspeed_6'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_7" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_7'>SD-05</h3></center>
                                        <center><h3 id='id_mcspeed_7'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_8" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_8'>SD-06</h3></center>
                                        <center><h3 id='id_mcspeed_8'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_9" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_9'>SD-07</h3></center>
                                        <center><h3 id='id_mcspeed_9'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_10" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_10'>SD-08</h3></center>
                                        <center><h3 id='id_mcspeed_10'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="row pt-0">
                        <div class="col-lg2 col-xs-3">
                            <div id="l1">
                                <div class="small-box mx-2">
                                    <div id="id_color_11" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_11'>SB-03</h3></center>
                                        <center><h3 id='id_mcspeed_11'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_12" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_12'>SC-03</h3></center>
                                        <center><h3 id='id_mcspeed_12'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_13" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_13'>SD-09</h3></center>
                                        <center><h3 id='id_mcspeed_13'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_14" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_14'>SD-10</h3></center>
                                        <center><h3 id='id_mcspeed_14'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_15" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_15'>SD-11</h3></center>
                                        <center><h3 id='id_mcspeed_15'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_16" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_16'>SD-12</h3></center>
                                        <center><h3 id='id_mcspeed_16'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="row pt-0">
                        <div class="col-lg2 col-xs-3">
                            <div id="l1">
                                <div class="small-box mx-2">
                                    <div id="id_color_17" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_17'>SB-04</h3></center>
                                        <center><h3 id='id_mcspeed_17'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_18" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_18'>SC-04</h3></center>
                                        <center><h3 id='id_mcspeed_18'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_20" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_20'>SD-13</h3></center>
                                        <center><h3 id='id_mcspeed_20'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_21" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_21'>SD-14</h3></center>
                                        <center><h3 id='id_mcspeed_21'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_22" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_22'>SD-15</h3></center>
                                        <center><h3 id='id_mcspeed_22'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_23" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_23'>SD-16</h3></center>
                                        <center><h3 id='id_mcspeed_23'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="row pt-0">
                        <div class="col-lg2 col-xs-3">
                            <div id="l1">
                                <div class="small-box mx-2">
                                    <div id="id_color_17" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_17'>SB-05</h3></center>
                                        <center><h3 id='id_mcspeed_17'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_18" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_18'>SC-05</h3></center>
                                        <center><h3 id='id_mcspeed_18'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_20" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_20'>SD-17</h3></center>
                                        <center><h3 id='id_mcspeed_20'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_21" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_21'>SD-18</h3></center>
                                        <center><h3 id='id_mcspeed_21'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_22" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_22'>SD-19</h3></center>
                                        <center><h3 id='id_mcspeed_22'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg2 col-xs-3">
                            <div id="l2">
                                <div class="small-box mx-2">
                                    <div id="id_color_23" style="background-color: darkgray; width: 190px; height: 115px ">
                                        <center><h3 id='id_mcno_23'>SD-20</h3></center>
                                        <center><h3 id='id_mcspeed_23'>0 rpm</h3></center>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    
                </div><!-- /.container-fluid -->
                <!-- Include Footer -->
                <?php
                    include '../../headers/footer-bar.php'
                ?> 
            </section>
        </div>    
    </div>    
 
<!-- Navbar -->
<?php
  // include './model-pages/mod_BreakDown.php';        
?>    
<!-- Page specific script -->
<script>
    
    var i;
    var dtbl1;
    var strReceiptNo = "0";
    $(function () 
    {
        
        //Initialize Select2 Elements
        $('.select2').select2();
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        });  
         //alert("Hooi");
        //------------ DataTable Initialize -------------------
        $("#example1").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false, 
           
            "scrollX": true,
            "scrollY": 160,
            "info": false, 
            "rowCallback" : funCellCreated,
            "dom": "lrti"
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        //$("#example1").DataTable({
        //    "responsive": true, "lengthChange": false, "autoWidth": false,
        //    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        dtbl1 = $('#example1').DataTable();        
        //--- Load Tables --------------------------------------
        funRefreshClicked();
    }); 
    $('#myCustomSearchBox').keyup(function() 
    {
        dtbl1.search($(this).val()).draw(); // this  is for customized searchbox with datatable search feature.
    });
    $('[data-widget="pushmenu"]').PushMenu("collapse");
    
    function funCellCreated(row, data, index) 
    {        
        //alert(index);
        $(row).find('td:eq(4)').css('background-color', data[4]);
        $(row).find('td:eq(5)').css('background-color', data[5]);
        $(row).find('td:eq(6)').css('background-color', data[6]);        
        //if(data[3]> 420)    $(row).find('td:eq(3)').css('background-color', data[4]);       
    }

    $('#example1 tbody').on('click', 'tr', function () 
    {
        const table2 = new DataTable('#example1');
        table2.on('click', 'tbody tr', (e) => 
        {
            let classList = e.currentTarget.classList;
            if (classList.contains('selected')) 
            {
                //classList.remove('selected');
            }
            else 
            {
                table2.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
                classList.add('selected');
                funModelBreakDownClicked();
            }
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
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        //document.getElementById("id_datetime").innerHTML = date+' '+time;
        //--------------- Update Data ----------------------------------------------
        funRefreshClicked();        
    }, 2000); 
    //-------------------- Read Data to Load Table ----------------------
    function funRefreshClicked() 
    {
        //alert("Refresh page");
        //var myJavaScriptVariable = "<?php echo isset($_SESSION['user_name2']) ? $_SESSION['user_name2'] : 'Modaya'; ?>";
        //alert(myJavaScriptVariable);

        var vblSendPara =  "1234"; 
        $.post('getData_McDashboard.php', { userpara: vblSendPara }, function(json_data2) 
        {
            //alert(json_data2);           
            var res = $.parseJSON(json_data2);
            //alert(res); 
    
            var MachineIDAry        = new Array();
            var MachineNumberAry    = new Array();
            var Sen1SpeedAry        = new Array();
            var Sen2SpeedAry   = new Array();
            var Sen3SpeedAry  = new Array();
            var Sen4SpeedAry     = new Array();
           
            MachineIDAry        = res.MachineID_Ary;          
            MachineNumberAry    = res.MachineNumber_Ary;  
            Sen1SpeedAry        = res.Sen1Speed_Ary;
            Sen2SpeedAry        = res.Sen2Speed_Ary;
            Sen3SpeedAry        = res.Sen3Speed_Ary;
            Sen4SpeedAry        = res.Sen4Speed_Ary;
            
            var intSpeed1 = parseInt(Sen1SpeedAry[0]) * 30;
            var strSpeed1 = intSpeed1 + " rpm";
            document.getElementById("id_mcspeed_0").innerHTML = strSpeed1;
            //document.getElementById("id_mcspeed_0").innerHTML = Sen1SpeedAry[0];
            //var intSpeed1 = parseInt(Sen1SpeedAry[0]) * 30;
            if(intSpeed1 > 1500)
            {
                document.getElementById("id_color_0").style.backgroundColor =  "lightgreen";
            }
            else if(intSpeed1 > 0)
            {
                document.getElementById("id_color_0").style.backgroundColor =  "yellow";
            }
            else
            {
                document.getElementById("id_color_0").style.backgroundColor =  "red";
            }            
            //document.getElementById("id_color_0").style.backgroundColor =  "#00FF00";            
        });
        
        /*
        var vblSendPara =  "1234"; 
        $.post('class/getData_HomeTable.php', { userpara: vblSendPara }, function(json_data2) 
        {
            //alert(json_data2);           
            var res = $.parseJSON(json_data2);
        
            const varDate = ["01/12/2023", "03/12/2023", "04/12/2023","06/12/2023", "08/12/2023", "10/12/2023","11/12/2023", "15/12/2023", "16/12/2023"];
            const varWoCount = [10,18,11,20,23,19,16,21,11];
            
            var IDAry           = new Array();
            var WorkOrderNoAry  = new Array();
            var DepartmentAry   = new Array();
            var WoDateTimeAry   = new Array();
            var DescriptionAry  = new Array();
            var UserNameAry     = new Array();
            var StatusAry       = new Array();
            var VerifyAry       = new Array();
            var ReOpenAry       = new Array();

            IDAry            = res.ID_Ary;          
            WorkOrderNoAry   = res.WorkOrderNo_Ary;  
            DepartmentAry    = res.Department_Ary;
            WoDateTimeAry    = res.WoDateTime_Ary;
            DescriptionAry   = res.Description_Ary;
            UserNameAry      = res.UserName_Ary;
            StatusAry        = res.Status_Ary;
            VerifyAry        = res.Verify_Ary;  
            ReOpenAry        = res.ReOpen_Ary; 
            //-------------------------------------------------------------
            //- BAR CHART:1 - Line Wise Downtime Summary  
            //-------------------------------------------------------------
            
            document.getElementById("Id_DivBarChart_1").innerHTML = '&nbsp;';
            document.getElementById("Id_DivBarChart_1").innerHTML = '<canvas id="id_barChart_1" style="min-height: 125px; height: 150px; max-height: 175px; max-width: 100%;"></canvas>';

            var barChartCanvas = $('#id_barChart_1').get(0).getContext('2d');
            var barChart1_Data2 = 
            {
                //labels  : res.WorkOrderNo_Ary,
                labels  : varDate,
                datasets: [
                {
                    label               : 'WO Count',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
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
              datasetFill             : false
            };
            
            new Chart(barChartCanvas, 
            {
                options: 
                {
                    plugins: 
                    {
                        // Change options for ALL labels of THIS CHART
                        datalabels: {color: '#000000', anchor: 'end', rotation:'0'}
                    }
                }, 
                type: 'line',
                data: barChartData,
                //options: barChartOptions
            });
            
        });   
        */
    }   
    /*
    function funModelBreakDownClicked()
    {        
        //alert("Model Clicked..");
        //---------- Open Model_Break Down --------------------------------------
        var varmodbox = document.getElementById("id_mod_breakdown");
        varmodbox.style.display = "block";
        
        //alert("Refresh Button clicked.."); 
        var vblSendPara =  "1234"; 
        $.post('class/getData_Refresh.php', { userpara: vblSendPara }, function(json_data2) 
        {
            //alert("Retrive Data");  
            //alert(json_data2);  
            
            var res = $.parseJSON(json_data2);
            
            var AryMcCategory = new Array();
            AryMcCategory = res.McCategoryAry;   
            
            var AryLevel1 = new Array();
            AryLevel1 = res.Level1Ary;            
            //alert(AryLevel1[0]);
            //alert(AryLevel1[1]);
            
            var AryLevel2 = new Array();
            AryLevel2 = res.Level2_Ary;
            
            var AryLevel3 = new Array();
            AryLevel3 = res.Level3_Ary;
            
                                
            //------------ Remove All Items in "Machine Category" -----------------------------------
            var options2 = document.querySelectorAll('#id_McCategory option');
            options2.forEach(o => o.remove());
            //------------ Fill New Items -------------------------------------
            var sel_cusordno = document.getElementById("id_McCategory");
            for(var i = 0; i < AryMcCategory.length; i++)
            {
                var opt = AryMcCategory[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                sel_cusordno.appendChild(el);
            } 
            
            //------------ Remove All Items in "Machine No" -----------------------------------
            var options3 = document.querySelectorAll('#id_MachineNo option');
            options3.forEach(o => o.remove());
            //------------ Fill New Items -------------------------------------
            var sel_shoporderno = document.getElementById("id_MachineNo");
            for(var i = 0; i < AryLevel1.length; i++)
            {
                var opt3 = AryLevel1[i];
                var el3 = document.createElement("option");
                el3.textContent = opt3;
                el3.value = opt3;
                sel_shoporderno.appendChild(el3);
            }
           
        }); 
       
    }
    
    //----------- fun Back Button Cliked  ----------------------------------
    function funClickedEditBack()
    {
        setTimeout(window.close, 10);
         window.open("./index.php");
    }
    //-------------------- Model : Edit Update Clicked -------------------------
    function funClickedModCutUpdate() 
    {
        //alert("Cutting Update Clicked");   
        const DataAry = []; 
                        
        DataAry[0] = document.getElementById("id_mod_wcno").value;  
        DataAry[1] = document.getElementById("id_mod_wcname").value;
        DataAry[2] = document.getElementById("id_mod_lowervalue").value;
        DataAry[3] = document.getElementById("id_mod_uppervalue").value;
        DataAry[4] = document.getElementById("id_mod_lowercolor").value;
        DataAry[5] = document.getElementById("id_mod_middlecolor").value;
        DataAry[6] = document.getElementById("id_mod_uppercolor").value;
        
        //alert(DataAry); 
        //var vblSendPara =  "1234"; 
        $.post('class/updateData_CutSetting.php', { userpara: DataAry }, function(json_data2) 
        {
            //alert(json_data2);           
            var res = $.parseJSON(json_data2);
            //alert(res);
            //alert(res[0]); 
            //alert(res[1]);            
            //var AryCustomOrder = new Array();
            //AryCustomOrder = res.CustomOrderAry;
            //document.getElementById("id_status").value = res[1];
        }); 
        //alert("Data Updated successfully.");
               
        var varmodbox = document.getElementById("id_mod_prodedit");
        varmodbox.style.display = "none";        
        funRefreshClicked();
    }
    */
</script>
</body>
</html>
