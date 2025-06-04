<?php

    session_start();   
    require_once('../../../initialize.php');
    require_once('../../../config.php');
    
    $num = $_POST["userpara"];
           
    //$AryLength = array_map('count', $num);
    //$AryLength = sizeof($num);
  
    //----------- Set TimeZone ----------------------------
    date_default_timezone_set('Asia/Kolkata');
    $strServerDateTime = date("Y-m-d H:i:s");   
    
  
   $ServerDateTime         = $strServerDateTime;    //'WMS-1760A';
   $WorkOrderNo         = 'NA';    //'WO_TEMP';
   $WorkOrderCategory       = $num[0];  
   $WorkOrderSubCategory    = $num[1];  // Placeholder value
   $WoDepartment            = $num[2];      //YourDepartment';
   $CreatedDateTime     = $strServerDateTime;//CreatedDateTime

   $CreatedUser         = $num[3];
   $RespondDateTime     = $strServerDateTime;
   $RespondUser         = ''; // Placeholder value
   $ClosedDateTime      = $strServerDateTime;
   $ClosedUser          = ''; // Placeholder value
   
   
   $ReOpenedDateTime    = $strServerDateTime;
   $ReOpenedUser        = ''; // Placeholder value
   $WoDescription       = $num[4];
   $WoEventLog          = $num[5];
   $WoStatus            = $num[6];

   $WoVerify            = "";
   $WoReOpen            = "";
   
   $State               = $num[7];
   $Wo_type               = $num[8];
   
   //----------- Declare Variables -----------------------    
    $Status_ary     = array();
    $ReturnData_ary = array();
    $ReturnData_ary[0]  = "NA";      
    //UPDATE tblprod_setting SET ID=?,WorkCenterNo=?,WorkCenterName=?,StyleNo=?,LowerValue=?,UpperValue=?,SMV=?,LowerColor=?,MiddleColor=?,UpperColor=?,State=? WHERE ID=?
    try
    {
        $stmt2 = $conn->prepare("SELECT ID FROM tblwo_event ORDER BY ID DESC LIMIT 1");
        $stmt2->execute();
        $lastID = $stmt2->fetchColumn();
        if ($lastID !== false) 
        {
            // Increment the last ID and format it as "WO_00000001"
            $WorkOrderNo = sprintf("WO_%08d", $lastID + 1);
        }
    } 
    catch (Exception $ex) 
    {
        $Status_ary[0] = "false";
        $Status_ary[1] = 'Error Msg: ' .$ex->getMessage(); 
    } 
    //------------------- Insert Data to WO ---------------------------------
    try 
    {
        $stmt = $conn->prepare("INSERT INTO tblwo_event (
        ServerDateTime, WorkOrderNo, WorkOrderCategory, WorkOrderSubCategory,
        WoDepartment, CreatedDateTime, CreatedUser,
        RespondDateTime, RespondUser, ClosedDateTime, ClosedUser,
        ReOpenedDateTime, ReOpenedUser, WoDescription, WoEventLog,
        WoStatus, WoVerify, WoReOpen, State, Wo_Type
    ) VALUES (
        :svrdt, :wono, :wocat, :wosubcat,
        :wodep, :credt, :creusr,
        :respdt, :respusr, :closdt, :closusr,
        :reopendt, :reopenusr, :wodescrip, :woevntlog,
        :wostats, :woveri, :woreopn, :stat, :wotyp
    )");

    $stmt->bindParam(':svrdt', $ServerDateTime);
    $stmt->bindParam(':wono', $WorkOrderNo);
    $stmt->bindParam(':wocat', $WorkOrderCategory);
    $stmt->bindParam(':wosubcat', $WorkOrderSubCategory);
    $stmt->bindParam(':wodep', $WoDepartment);
    $stmt->bindParam(':credt', $CreatedDateTime);
    $stmt->bindParam(':creusr', $CreatedUser);
    $stmt->bindParam(':respdt', $RespondDateTime);
    $stmt->bindParam(':respusr', $RespondUser);
    $stmt->bindParam(':closdt', $ClosedDateTime);
    $stmt->bindParam(':closusr', $ClosedUser);
    $stmt->bindParam(':reopendt', $ReOpenedDateTime);
    $stmt->bindParam(':reopenusr', $ReOpenedUser);
    $stmt->bindParam(':wodescrip', $WoDescription);
    $stmt->bindParam(':woevntlog', $WoEventLog);
    $stmt->bindParam(':wostats', $WoStatus);
    $stmt->bindParam(':woveri', $WoVerify);
    $stmt->bindParam(':woreopn', $WoReOpen);
    $stmt->bindParam(':stat', $State);
    $stmt->bindParam(':wotyp', $Wo_type);


        $stmt->execute();
        if ($stmt->rowCount() > 0) 
        {
            $Status_ary[0] = "true";
            $Status_ary[1] = "Inserted new record"; 
        } 
        else
        {
            $Status_ary[0] = "false";
            $Status_ary[1] = "Data not inserted"; 
        }    
        //$data[1] = "Dats Saved Successfully";   
    } 
    catch (PDOException $ex) 
    {
        $Status_ary[0] = "false";
        $Status_ary[1] = 'Error Msg: ' .$ex->getMessage();         
    }
    $conn = null;
    
    $data_ary['Status_Ary'] = $Status_ary;
    $data_ary['Data_Ary']   = $ReturnData_ary;        
    //print json_encode($error);
    print json_encode($data_ary); 
   // print json_encode($ProductQuantity_ary);
?>
