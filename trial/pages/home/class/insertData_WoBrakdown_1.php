<?php
session_start();

// Database Connection
require '../../../dbconnection/dbConnection.php';

// Set TimeZone
date_default_timezone_set('Asia/Kolkata');
$strServerDateTime = date("Y-m-d H:i:s");

// Sample Data
$FactoryCode = 'WMS-1760A';
$Unit = 'Unit-1';
$RelatedDepartment = 'RelatedDep';
$WorkOrderNo = 'WO_TEMP';
$WorkOrderCategory = 'BreakDown';
$WorkOrderSubCategory = ''; // Placeholder value
$WorkOrderSubCategory2 = ''; // Placeholder value
$WoDepartment = 'YourDepartment';
$CreatedDateTime = date("Y-m-d H:i:s");
$CreatedUser = 'TestUser';
$AllocatedUser = ''; // Placeholder value
$McCategory = 'TestCategory';
$MachineNo = 'TestMachine';
$CreatedFaultType = 'FaultType';
$CreatedFaultLevel1 = 'FaultLevel1';
$CreatedFaultLevel2 = ''; // Placeholder value
$CreatedFaultLevel3 = ''; // Placeholder value
$CreatedFaultLevel4 = ''; // Placeholder value
$RespondDateTime = date("Y-m-d H:i:s");
$RespondUser = ''; // Placeholder value
$ClosedDateTime = date("Y-m-d H:i:s");
$ClosedUser = ''; // Placeholder value
$ClosedFaultType = ''; // Placeholder value
$ClosedFaultLevel1 = ''; // Placeholder value
$ClosedFaultLevel2 = ''; // Placeholder value
$ClosedFaultLevel3 = ''; // Placeholder value
$ClosedFaultLevel4 = ''; // Placeholder value
$VerifiedDateTime = date("Y-m-d H:i:s");
$VerifiedUser = ''; // Placeholder value
$ReOpenedDateTime = date("Y-m-d H:i:s");
$ReOpenedUser = ''; // Placeholder value
$WoDescription = ''; // Placeholder value
$WoEventLog = ''; // Placeholder value
$Shift = ''; // Placeholder value
$WoStatus = ''; // Placeholder value
$WoVerify = ''; // Placeholder value
$WoReOpen = ''; // Placeholder value
$AlertSentState = 1;
$EmailSentState = 1;
$State = 1;

try {
    $stmt = $conn->prepare("INSERT INTO tblwo_event(ServerDateTime, FactoryCode, Unit, RelatedDepartment, WorkOrderNo, WorkOrderCategory, WorkOrderSubCategory, WorkOrderSubCategory2, WoDepartment, CreatedDateTime, CreatedUser, AllocatedUser, McCategory, MachineNo, CreatedFaultType, CreatedFaultLevel1, CreatedFaultLevel2, CreatedFaultLevel3, CreatedFaultLevel4, RespondDateTime, RespondUser, ClosedDateTime, ClosedUser, ClosedFaultType, ClosedFaultLevel1, ClosedFaultLevel2, ClosedFaultLevel3, ClosedFaultLevel4, VerifiedDateTime, VerifiedUser, ReOpenedDateTime, ReOpenedUser, WoDescription, WoEventLog, Shift, WoStatus, WoVerify, WoReOpen, AlertSentState, EmailSentState, State) 
                            VALUES (:svrdt, :faccod, :unit, :reldep, :wono, :wocat, :wosubcat, :wosubcat2, :wodep, :credt, :creusr, :alocusr, :mccat, :mcno, :creflttyp, :crefltlvl1, :crefltlvl2, :crefltlvl3, :crefltlvl4, :respdt, :respusr, :closdt, :closusr, :clsflttyp, :clsfltlvl1, :clsfltlvl2, :clsfltlvl3, :clsfltlvl4, :veridt, :veryusr, :reopendt, :reopenusr, :wodescrip, :woevntlog, :shft, :wostats, :woveri, :woreopn, :altsntst, :emlsntst, :stat)");

    $stmt->bindParam(':svrdt', $strServerDateTime);
    $stmt->bindParam(':faccod', $FactoryCode);
    $stmt->bindParam(':unit', $Unit);
    $stmt->bindParam(':reldep', $RelatedDepartment);
    $stmt->bindParam(':wono', $WorkOrderNo);
    $stmt->bindParam(':wocat', $WorkOrderCategory);
    $stmt->bindParam(':wosubcat', $WorkOrderSubCategory);
    $stmt->bindParam(':wosubcat2', $WorkOrderSubCategory2);
    $stmt->bindParam(':wodep', $WoDepartment);
    $stmt->bindParam(':credt', $CreatedDateTime);
    $stmt->bindParam(':creusr', $CreatedUser);
    $stmt->bindParam(':alocusr', $AllocatedUser);
    $stmt->bindParam(':mccat', $McCategory);
    $stmt->bindParam(':mcno', $MachineNo);
    $stmt->bindParam(':creflttyp', $CreatedFaultType);
    $stmt->bindParam(':crefltlvl1', $CreatedFaultLevel1);
    $stmt->bindParam(':crefltlvl2', $CreatedFaultLevel2);
    $stmt->bindParam(':crefltlvl3', $CreatedFaultLevel3);
    $stmt->bindParam(':crefltlvl4', $CreatedFaultLevel4);
    $stmt->bindParam(':respdt', $RespondDateTime);
    $stmt->bindParam(':respusr', $RespondUser);
    $stmt->bindParam(':closdt', $ClosedDateTime);
    $stmt->bindParam(':closusr', $ClosedUser);
    $stmt->bindParam(':clsflttyp', $ClosedFaultType);
    $stmt->bindParam(':clsfltlvl1', $ClosedFaultLevel1);
    $stmt->bindParam(':clsfltlvl2', $ClosedFaultLevel2);
    $stmt->bindParam(':clsfltlvl3', $ClosedFaultLevel3);
    $stmt->bindParam(':clsfltlvl4', $ClosedFaultLevel4);
    $stmt->bindParam(':veridt', $VerifiedDateTime);
    $stmt->bindParam(':veryusr', $VerifiedUser);
    $stmt->bindParam(':reopendt', $ReOpenedDateTime);
    $stmt->bindParam(':reopenusr', $ReOpenedUser);
    $stmt->bindParam(':wodescrip', $WoDescription);
    $stmt->bindParam(':woevntlog', $WoEventLog);
    $stmt->bindParam(':shft', $Shift);
    $stmt->bindParam(':wostats', $WoStatus);
    $stmt->bindParam(':woveri', $WoVerify);
    $stmt->bindParam(':woreopn', $WoReOpen);
    $stmt->bindParam(':altsntst', $AlertSentState);
    $stmt->bindParam(':emlsntst', $EmailSentState);
    $stmt->bindParam(':stat', $State);

    $stmt->execute();

    // Close the connection
    $conn = null;

    // Success message
    $data = array("Success", "Data Saved Successfully");

    // Send JSON response
    echo json_encode($data);
} catch (PDOException $ex) {
    // Error message
    $error = "Error Msg: " . $ex->getMessage();

    // Send JSON response with error
    echo json_encode(["Error", $error]);
}
?>












<?php

    session_start();
    
    $num = $_POST["userpara"];
           
    //$AryLength = array_map('count', $num);
    //$AryLength = sizeof($num);
    //----------- Database Connection ---------------------
    require '../../../dbconnection/dbConnection.php';     
    //----------- Set TimeZone ----------------------------
    date_default_timezone_set('Asia/Kolkata');
    $strServerDateTime = date("Y-m-d H:i:s");   
    
    //$strWorkOrderNo         = $num[0];    
    //$strCheckInUser         = $num[1]; 
    
    // Sample Data
   $FactoryCode         = $num[0];    //'WMS-1760A';
   $Unit                = $num[1];    //'Unit-1';
   $RelatedDepartment   = $num[2];    //'RelatedDep';
   $WorkOrderNo         = 'WO_test';    //'WO_TEMP';
   $WorkOrderCategory       = $num[3];  
   $WorkOrderSubCategory    = $num[4];  // Placeholder value
   $WorkOrderSubCategory2   = $num[5]; // Placeholder value
   $WoDepartment            = $num[6];      //YourDepartment';
   $CreatedDateTime     = $num[7];
   $CreatedUser         = $num[8];
   $AllocatedUser       = ''; // Placeholder value
   $McCategory          = $num[9];
   $MachineNo           = $num[10];
   $CreatedFaultType    = $num[11];
   $CreatedFaultLevel1  = $num[12];
   $CreatedFaultLevel2  = ''; // Placeholder value
   $CreatedFaultLevel3  = ''; // Placeholder value
   $CreatedFaultLevel4  = ''; // Placeholder value
   $RespondDateTime     = $num[7];
   $RespondUser         = ''; // Placeholder value
   $ClosedDateTime      = $num[7];
   $ClosedUser          = ''; // Placeholder value
   $ClosedFaultType     = ''; // Placeholder value
   $ClosedFaultLevel1   = ''; // Placeholder value
   $ClosedFaultLevel2   = ''; // Placeholder value
   $ClosedFaultLevel3   = ''; // Placeholder value
   $ClosedFaultLevel4   = ''; // Placeholder value
   $VerifiedDateTime    = $num[7];
   $VerifiedUser        = ''; // Placeholder value
   $ReOpenedDateTime    = $num[7];
   $ReOpenedUser        = ''; // Placeholder value
   $WoDescription       = $num[13];
   $WoEventLog          = $num[14];
   $Shift               = $num[15];
   $WoStatus            = $num[16];
   $WoVerify            = $num[17];
   $WoReOpen            = $num[18];
   $AlertSentState      = $num[19];
   $EmailSentState      = $num[20];
   $State               = $num[21];

    try 
    {
        $stmt = $conn->prepare("INSERT INTO tblwo_event(ServerDateTime, FactoryCode, Unit, RelatedDepartment, WorkOrderNo, WorkOrderCategory, WorkOrderSubCategory, WorkOrderSubCategory2, WoDepartment, CreatedDateTime, CreatedUser, AllocatedUser, McCategory, MachineNo, CreatedFaultType, CreatedFaultLevel1, CreatedFaultLevel2, CreatedFaultLevel3, CreatedFaultLevel4, RespondDateTime, RespondUser, ClosedDateTime, ClosedUser, ClosedFaultType, ClosedFaultLevel1, ClosedFaultLevel2, ClosedFaultLevel3, ClosedFaultLevel4, VerifiedDateTime, VerifiedUser, ReOpenedDateTime, ReOpenedUser, WoDescription, WoEventLog, Shift, WoStatus, WoVerify, WoReOpen, AlertSentState, EmailSentState, State) 
                                VALUES (:svrdt, :faccod, :unit, :reldep, :wono, :wocat, :wosubcat, :wosubcat2, :wodep, :credt, :creusr, :alocusr, :mccat, :mcno, :creflttyp, :crefltlvl1, :crefltlvl2, :crefltlvl3, :crefltlvl4, :respdt, :respusr, :closdt, :closusr, :clsflttyp, :clsfltlvl1, :clsfltlvl2, :clsfltlvl3, :clsfltlvl4, :veridt, :veryusr, :reopendt, :reopenusr, :wodescrip, :woevntlog, :shft, :wostats, :woveri, :woreopn, :altsntst, :emlsntst, :stat)");

        $stmt->bindParam(':svrdt', $strServerDateTime);
        $stmt->bindParam(':faccod', $FactoryCode);
        $stmt->bindParam(':unit', $Unit);
        $stmt->bindParam(':reldep', $RelatedDepartment);
        $stmt->bindParam(':wono', $WorkOrderNo);
        $stmt->bindParam(':wocat', $WorkOrderCategory);
        $stmt->bindParam(':wosubcat', $WorkOrderSubCategory);
        $stmt->bindParam(':wosubcat2', $WorkOrderSubCategory2);
        $stmt->bindParam(':wodep', $WoDepartment);
        $stmt->bindParam(':credt', $CreatedDateTime);
        $stmt->bindParam(':creusr', $CreatedUser);
        $stmt->bindParam(':alocusr', $AllocatedUser);
        $stmt->bindParam(':mccat', $McCategory);
        $stmt->bindParam(':mcno', $MachineNo);
        $stmt->bindParam(':creflttyp', $CreatedFaultType);
        $stmt->bindParam(':crefltlvl1', $CreatedFaultLevel1);
        $stmt->bindParam(':crefltlvl2', $CreatedFaultLevel2);
        $stmt->bindParam(':crefltlvl3', $CreatedFaultLevel3);
        $stmt->bindParam(':crefltlvl4', $CreatedFaultLevel4);
        $stmt->bindParam(':respdt', $RespondDateTime);
        $stmt->bindParam(':respusr', $RespondUser);
        $stmt->bindParam(':closdt', $ClosedDateTime);
        $stmt->bindParam(':closusr', $ClosedUser);
        $stmt->bindParam(':clsflttyp', $ClosedFaultType);
        $stmt->bindParam(':clsfltlvl1', $ClosedFaultLevel1);
        $stmt->bindParam(':clsfltlvl2', $ClosedFaultLevel2);
        $stmt->bindParam(':clsfltlvl3', $ClosedFaultLevel3);
        $stmt->bindParam(':clsfltlvl4', $ClosedFaultLevel4);
        $stmt->bindParam(':veridt', $VerifiedDateTime);
        $stmt->bindParam(':veryusr', $VerifiedUser);
        $stmt->bindParam(':reopendt', $ReOpenedDateTime);
        $stmt->bindParam(':reopenusr', $ReOpenedUser);
        $stmt->bindParam(':wodescrip', $WoDescription);
        $stmt->bindParam(':woevntlog', $WoEventLog);
        $stmt->bindParam(':shft', $Shift);
        $stmt->bindParam(':wostats', $WoStatus);
        $stmt->bindParam(':woveri', $WoVerify);
        $stmt->bindParam(':woreopn', $WoReOpen);
        $stmt->bindParam(':altsntst', $AlertSentState);
        $stmt->bindParam(':emlsntst', $EmailSentState);
        $stmt->bindParam(':stat', $State);

        $stmt->execute();

        // Close the connection
        $conn = null;

        // Success message
        $data = array("Success", "Data Saved Successfully");

        // Send JSON response
        echo json_encode($data);
    } 
    catch (PDOException $ex) 
    {
        // Error message
        $error = "Error Msg: " . $ex->getMessage();

        // Send JSON response with error
        echo json_encode(["Error", $error]);
    }
?>
