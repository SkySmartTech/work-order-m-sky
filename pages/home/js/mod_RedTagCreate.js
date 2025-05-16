//--------------------------------------------------------------------------
//--------------- MODEL BOX : CREATE RED TAG ------------------------
//--------------------------------------------------------------------------
function funModRedTagCre_Close()
{
    //alert("Cose Model Box.."); 
    var varmodbox = document.getElementById("id_ModRedTagCre");
    varmodbox.style.display = "none";
}
function funModRedTagCre_Cancelnormal()
{
    //alert("Cose Model Box.."); 
    var varmodbox = document.getElementById("id_ModRedTagCre");
    varmodbox.style.display = "none";
}
function funModRedTagCreateClicked()
{        
    //alert("Model Red Tag Clicked..");    
    ///alert("Model Plan Maintenance Clicked..");
    //---------- Open Model_Plan Maintenance -------------------------------
    var varmodbox = document.getElementById("id_ModRedTagCre");
    varmodbox.style.display = "block";
    const DataAry = []; 
    DataAry[0] = "Department";
    DataAry[1] = JS_SessionArry[0].CurrentUserDepartment;
    //alert(DataAry);
    $.post('class/getData_HomeModelCreateWo.php', { userpara: DataAry}, function(json_data2) 
    {    
        //alert(json_data2);  
        var res = $.parseJSON(json_data2);
        var AryDepartment = new Array();   
        AryDepartment = res.Data_Ary;         
        //------------ Remove All Items in "Machine Category" -----------------------------------
        var options2 = document.querySelectorAll('#id_ModDepartmentnormal option');
        options2.forEach(o => o.remove());
        //------------ Fill New Items -------------------------------------
        var sel_cusordno = document.getElementById("id_ModDepartmentnormal");
        for(var i = 0; i < AryDepartment.length; i++)
        {
            var opt = AryDepartment[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            sel_cusordno.appendChild(el);
        }  
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
        const datetimeInput = document.getElementById('id_ModPlanMntCre_dtmDateTimenormal');
        datetimeInput.value = `${year}-${month}-${day}T${hours}:${minutes}`;
        //datetimeInput.disabled = true;            
    });
    funModCategorynormal();
}

function funModCategorynormal()
{   
    //alert("function CategoryFil ");     
    const DataAry = []; 
    DataAry[0] = "funGetFilteredData";        // Function Name    
    DataAry[1] = "Category";
    DataAry[2] = "tblwo_errorlevel_breakdown";
    DataAry[3] = "1";
    DataAry[4] = "Department";
    DataAry[5] = document.getElementById("id_ModDepartmentnormal").value;

    $.post('class/comFunctions.php', { userpara: DataAry }, function(json_data2) 
    {
        var res = $.parseJSON(json_data2);                           
        var AryMachineNo_new = res.Data_Ary; 

        //------------ Remove All Items in "Machine No" -----------------------------------
        var options3 = document.querySelectorAll('#id_Modcategorynormal option');
        options3.forEach(o => o.remove());

        var sel_shoporderno = document.getElementById("id_Modcategorynormal");

        // Always add "Select data" first
        var defaultOption = document.createElement("option");
        defaultOption.textContent = "Select data";
        defaultOption.value = "Select data";
        sel_shoporderno.appendChild(defaultOption);

        if(res.Status_Ary[0] === "true")
        {
            //------------ Fill New Items -------------------------------------
            for(var i = 0; i < AryMachineNo_new.length; i++)
            {
                var opt3 = AryMachineNo_new[i];
                var el3 = document.createElement("option");
                el3.textContent = opt3;
                el3.value = opt3;
                sel_shoporderno.appendChild(el3);
            }
        }
        else
        {
            // If no valid data, only "Select data" will be shown (already added)
        }
    });
    funModSubCategorynormal();
}

function funModSubCategorynormal()
{   
    //alert("function Sub CategoryFil ");     
    const DataAry = []; 
    DataAry[0] = "funGetFilteredData";        // Function Name    
    DataAry[1] = "SubCategory";
    DataAry[2] = "tblwo_errorlevel_breakdown";
    DataAry[3] = "3";
    DataAry[4] = "Department";
    DataAry[5] = document.getElementById("id_ModDepartmentnormal").value;
    DataAry[6] = "Category";
    DataAry[7] = document.getElementById("id_Modcategorynormal").value;

    $.post('class/comFunctions.php', { userpara: DataAry }, function(json_data2) 
    {
        var res = $.parseJSON(json_data2);                           
        var AryMachineNo_new = res.Data_Ary; 

        //------------ Remove All Items in "Machine No" -----------------------------------
        var options3 = document.querySelectorAll('#id_ModSubCategorynormal option');
        options3.forEach(o => o.remove());

        var sel_shoporderno = document.getElementById("id_ModSubCategorynormal");

        // Always add "Select data" first
        var defaultOption = document.createElement("option");
        defaultOption.textContent = "Select data";
        defaultOption.value = "Select data";
        sel_shoporderno.appendChild(defaultOption);

        if(res.Status_Ary[0] === "true")
        {
            //------------ Fill New Items -------------------------------------
            for(var i = 0; i < AryMachineNo_new.length; i++)
            {
                var opt3 = AryMachineNo_new[i];
                var el3 = document.createElement("option");
                el3.textContent = opt3;
                el3.value = opt3;
                sel_shoporderno.appendChild(el3);
            }
        }
        else
        {
            // If no valid data, only "Select data" will be shown (already added)
        }
    });
}
//----------------------------------------------------------------------------
function funModRedTagCre_Filter()
{        
    //alert("function SelectPlannedMaintenanceFilter ");
}
//----------------------------------------------------------------------------
function funModRedTagCre_Updatenormal()
{        
    //alert("function mod Create Plan Maintenance update");
    
    var strTemp = "";
    //alert("Breakdown Update Clicked");      
    const DataAry = []; 
    DataAry[0] = document.getElementById("id_Modcategorynormal").value;
    DataAry[1] = document.getElementById("id_ModSubCategorynormal").value;
    DataAry[2] = document.getElementById("id_ModDepartmentnormal").value;
    DataAry[3] = JS_SessionArry[0].CurrentUserName;
    DataAry[4] = document.getElementById("id_ModPlanMntCre_inpNotenormal").value;
    DataAry[5] = "Work Order Placed - On " + document.getElementById("id_ModPlanMntCre_dtmDateTimenormal").value + " By " + JS_SessionArry[0].CurrentUserName + "(" + JS_SessionArry[0].CurrentUserContact + ")";
    DataAry[6] = "New";
    DataAry[7] = 1;
    DataAry[8] = "normal";
    //-------- Check All fields are selected ...................................
    if((DataAry[0]==="Select data")||(DataAry[1]==="Select data")||(DataAry[2]==="Select data")) 
    {
        //alert("Please select data");
        Swal.fire({title: 'Error.!',text: 'Please select the data',icon: 'error',confirmButtonText: 'OK'});
    }
    else
    {
        
         
        //alert(DataAry);  
        $.post('class/insertData_WoBrakdown.php', { userpara: DataAry }, function(json_data2) 
        {
            //alert(json_data2);           
            var res = $.parseJSON(json_data2);   
            //alert(res.Status_Ary[0]);
            if(res.Status_Ary[0] === "true")
            {
                    Swal.fire({title: 'Success.!',text: 'Data updated successfully',icon: 'success',confirmButtonText: 'OK'});  // success, error, warning, info, question   
            }
            else
            {
                Swal.fire({title: 'Error.!',text: res.Status_Ary[1],icon: 'error',confirmButtonText: 'OK'});  // success, error, warning, info, question   
            }      
            var varmodbox = document.getElementById("id_ModPlanMntCre");
            varmodbox.style.display = "none";  
            //funRefreshClicked();
            funRefresh_HomePage();  
        }); 
        
    }
}

