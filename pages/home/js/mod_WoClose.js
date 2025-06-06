//------------- WO CLose : Change Fault Level4 Filter Value --------------------------------
function funModWoClose_FilterFaultLevel4()
{
    //alert("Filter: Change Fault Level4");
}

function funMoWoClose_Close()
{
    //alert("Wo Table Row Clicked.."); 
    var varmodbox = document.getElementById("id_MoWoClose");
    varmodbox.style.display = "none";

}
//--------------- Save and Close Function ----------------------
function funModWoClose_SaveClose()
{
    let intDebugEnable = 0;
    
    if(intDebugEnable === 1)    alert("funModWoClose_SaveClose");
    
    //alert("Location 600 : "+ "funModWoClose_SaveClose function");
    //alert("Model Building Maintenance State Change Clicked");   
    const DataAry = []; 
    //DataAry[0] = document.getElementById("id_ModWoClose_WoNo").innerHTML; 
    //alert(JS_SessionArry[0].WorkOrderNo);
    
    DataAry[0] = JS_SessionArry[0].WorkOrderNo;
    
    DataAry[1] = document.getElementById("id_ModWoClose_dtmDateTime").value;
    DataAry[2] = JS_SessionArry[0].CurrentUserEPF; 
    //DataAry[7] = document.getElementById("id_ModWoClose_inpNote").value;    
    if(intDebugEnable === 1)    alert("DataAry : " + DataAry);
    
       
   
        $.post('class/updateData_ModWoClose_SaveClose.php', { userpara: DataAry }, function(json_data2) 
        {
            //alert("Location :620 "+json_data2);   
            if(intDebugEnable === 1)    alert("json_data2 : " + json_data2);
            var res = $.parseJSON(json_data2);       
            if(res.Status_Ary[0] === "true")
            {
                //----------- Update Event Log, When Already Allocated list Deactive -----------------------------            
                //const DataAry = [];             
                DataAry[0] = "funUpdateEventLog";
                DataAry[1] = JS_SessionArry[0].WorkOrderNo;
                DataAry[2] = JS_SessionArry[0].CurrentUserName;
                DataAry[3] = JS_SessionArry[0].CurrentUserContact;
                DataAry[4] = ",WO Closed (" +  document.getElementById("id_ModWoClose_inpNote").value + ") - On";
                //Work Order Placed - On 2024-02-02T17:38 By Kelum Bandara(0772628859)
                //----------- Update Event Log --------------------------------------------------  
                $.post('class/comFunctions.php', { userpara: DataAry }, function(json_data2) 
                {            
                    //var res = $.parseJSON(json_data2);            
                    //-------------- CheckOut All CheckIn Users --------------------------------
                    DataAry[0] = "funCheckOutAllUsers";
                    DataAry[1] = JS_SessionArry[0].WorkOrderNo;
                    if(intDebugEnable === 1)    alert("DataAry : " + DataAry); 
                    $.post('class/updateData_WoCheckIn.php', { userpara: DataAry }, function(json_data2) 
                    {
                        if(intDebugEnable === 1)    alert("json_data2 : " + json_data2);          
                        //var res = $.parseJSON(json_data2);
                        //------------- Refresh Work Order Details ---------------------------------
                        //alert("Location : 651 "+ JS_SessionArry[0].WorkOrderNo);
                        let strReturn = funWoDetailsRefresh(JS_SessionArry[0].WorkOrderNo);
                        //funRefreshClicked(); 
                        //alert("Location : 660 "+strReturn); 
                        funRefresh_HomePage();  
                        //alert("Location : 670 "+strReturn); 
                        var varmodbox = document.getElementById("id_MoWoClose");
                        varmodbox.style.display = "none";  
                    });  
                });
            }
            else
            {
                // success, error, warning, info, question
                Swal.fire({title: 'Alert..!',text: res.Status_Ary[1],icon: 'info', confirmButtonText: 'OK'});
                var varmodbox = document.getElementById("id_MoWoClose");
                varmodbox.style.display = "none";  
            }
            //alert("Data Updated successfully.");
        });
    }





//--------------- Function Click Create Breakdown ----------------------------
function funModWoDetails_WoClose()
{        
    let intDebugEnable = 0;
    let strWorkOrderStatus = JS_SessionArry[0].WorkOrderStatus;
    
    if(intDebugEnable === 1)    alert("funModWoDetails_WoClose");
    if(intDebugEnable === 1)    alert(strWorkOrderStatus);
    
    if((strWorkOrderStatus === "New")||(strWorkOrderStatus === "Inprogress"))
    {
        
        funOpenMod_WoClose();
       
    }
    else
    {
        // success, error, warning, info, question
        Swal.fire({title: 'Alert..!',text: 'Workorder Already Closed.',icon: 'info', confirmButtonText: 'OK'});
    }     
    //alert("Test-Finished");
}

//-------------- Open Model WO Close -----------------------  
function funOpenMod_WoClose()
{
    let intDebugEnable = 0;
        
    if(intDebugEnable === 1)    alert("funOpenMod_WoClose");
    
    //alert("Location 400 : Work order Close..");    
    var strWorkOrderNumber  = document.getElementById("id_ModWoDetails_WoNo").innerHTML;
     
    //alert(strWorkOrderNumber);     
    //---------- Close Model_Wo Details --------------------------------------
    //var varmodbox = document.getElementById("id_MoWoDetails");
    //varmodbox.style.display = "none";
    //---------- Open Model_Wo Close --------------------------------------
    var varmodbox = document.getElementById("id_MoWoClose");
    varmodbox.style.display = "block";
    document.getElementById("id_ModWoClose_WoNo").innerHTML = strWorkOrderNumber;
    
   
    const DataAry = []; 
    DataAry[0] = "FaultType";        
    DataAry[1] = "0";
    DataAry[2] = "0";        
    DataAry[3] = "0";
    //alert("Location 410 :" + DataAry); 
    $.post('class/getData_ModWoClose.php', { userpara: DataAry}, function(json_data2) 
    {
        //alert("Location 420 :" + json_data2);  
        var res = $.parseJSON(json_data2);        
        //------------ Remove All Items in "Machine Category" -----------------------------------
        var options2 = document.querySelectorAll('#id_ModWoClose_SelFaultType option');
        options2.forEach(o => o.remove());
        //------------ Fill New Items -------------------------------------
        var sel_cusordno = document.getElementById("id_ModWoClose_SelFaultType");
        for(var i = 0; i < res.Data_Ary.length; i++)
        {
            var opt = res.Data_Ary[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            sel_cusordno.appendChild(el);
        }   
    }); 
    //---------------- Load Now Date and time to Model Box --------------------------
    // Get the current date and time
    const now = new Date();
    // Format the date and time as required by the datetime-local input
    const year = now.getFullYear().toString().padStart(4, '0');
    const month = (now.getMonth() + 1).toString().padStart(2, '0');
    const day = now.getDate().toString().padStart(2, '0');
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');

    // Set the value of the input
    const datetimeInput = document.getElementById('id_ModWoClose_dtmDateTime');
    datetimeInput.value = `${year}-${month}-${day}T${hours}:${minutes}`;
    datetimeInput.disabled = true;    
    
}