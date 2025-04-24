<?php
    require_once('../../initialize.php');
    require_once('../../config.php');
    
    session_start();
    $num = $_POST["userpara"];
    
    $strFuncType = $num[0];    
    //$strFuncType = "funGetAllData";
     
    //----------- Set TimeZone ----------------------------
    date_default_timezone_set('Asia/Kolkata');
    $strServerDateTime = date("Y-m-d H:i:s");    
    //----------- Declare Variables -----------------------  
    $i = 0; 
    $j = 0;     
    $Status_ary     = array();
    $ReturnData_ary = array();
    $ReturnData_ary2 = array();
    
    //$ReturnData_ary[0][0]  = "NA";
    $strText    = "";
    $ReturnData_ary[0] = "NA";     
    $ReturnData_ary2[0][0] = "NA";     
    
    //error_log("Your log message", 3, "/logs/file.log");
        
    if($strFuncType === "funGetMttrData") //------------- funUpdateEventLog --------------------
    {
        $strStartDate       = $num[1];  
        $strEndDate         = $num[2];
        
        $strMcCategory      = $num[3];
        $strFaultType       = $num[4];
        $strLevel1          = $num[5];
        $strLevel2          = $num[6];
        $strLevel3          = $num[7];
      
        $whereClause = "WorkOrderCategory = 'Breakdown' AND ClosedDateTime IS NOT NULL AND CreatedDateTime >= :start_date AND CreatedDateTime <= :end_date";
        
        if ($strMcCategory !== "All") {
            $whereClause .= " AND McCategory = '" . $strMcCategory . "'";
        }
        if ($strFaultType !== "All") {
            $whereClause .= " AND ClosedFaultType = '" . $strFaultType . "'";
        }  
        if ($strLevel1 !== "All") {
            $whereClause .= " AND ClosedFaultLevel1 = '" . $strLevel1 . "'";
        }   
        if ($strLevel2 !== "All") {
            $whereClause .= " AND ClosedFaultLevel2 = '" . $strLevel2 . "'";
        } 
        if ($strLevel3 !== "All") {
            $whereClause .= " AND ClosedFaultLevel3 = '" . $strLevel3 . "'";
        } 
        			
        try 
        {
            $sqlString = "SELECT
                            COUNT(*) AS NumFailures,
                            SUM(TIMESTAMPDIFF(MINUTE, CreatedDateTime, ClosedDateTime)) AS TotalDowntime,
                            AVG(TIMESTAMPDIFF(MINUTE, CreatedDateTime, ClosedDateTime)) AS MTTR
                        FROM
                            tblwo_event
                        WHERE " . $whereClause;
                        
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $stmt = $conn->prepare($sqlString);
            //$stmt->bindParam(':wono', $strWoNumber);  
            $stmt->bindParam(':start_date', $strStartDate);
            $stmt->bindParam(':end_date', $strEndDate);
    
            $stmt->execute();
            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);        
            $result = $stmt->fetchAll();
            //$i = 1;
           
            foreach($result as $row)
            {          
                if( (isset($row['NumFailures'])) && (isset($row['TotalDowntime']))&& (isset($row['MTTR'])))
                {
                    $ReturnData_ary[1]   = strval($row['NumFailures']);
                    $ReturnData_ary[2]   = $row['TotalDowntime'];
                    $ReturnData_ary[3]   = number_format($row['MTTR'], 2); 
                    $i++;
                }
                //else 
               // {
               //     $ReturnData_ary[1] = "N/A"; // Or any other default value you prefer
               //}   
                
            }  
            if($i === 0)    // No Data
            {
                $Status_ary[0] = "false";
                $Status_ary[1] = "Data not found"; 
            }
            else
            {
                $ReturnData_ary[0] = $strText;
                $Status_ary[0] = "true";
                $Status_ary[1] = "Data Available"; 
            } 
        } 
        catch(PDOException $ex) 
        {
            //$error =  "Error: " . $e->getMessage();
            $Status_ary[0] = "error";
            $Status_ary[1] = 'Error Msg: ' .$ex->getMessage();        
        }    
        $conn = null;
    }
    else if($strFuncType === "funGetAllData") //------------- funUpdateEventLog --------------------
    {
        $strStartDate       = $num[1];  
        $strEndDate         = $num[2]; 
        
        try 
        {
            $sqlString = "SELECT *
                  FROM tblwo_event
                  WHERE WorkOrderCategory = 'Breakdown'
                  AND CreatedDateTime BETWEEN :start_date AND :end_date";

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $stmt = $conn->prepare($sqlString);
            $stmt->bindParam(':start_date', $strStartDate); // Bind the start date parameter
            $stmt->bindParam(':end_date', $strEndDate);     // Bind the end date parameter
            $stmt->execute();
    
            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);        
            $result = $stmt->fetchAll();
            $i = 0;
           
            foreach($result as $row)
            {            
                $ReturnData_ary2[$i][0]   = $row['ID'];
                $ReturnData_ary2[$i][1]   = $row['ServerDateTime'];
                $ReturnData_ary2[$i][2]   = $row['WorkOrderNo'];
                $ReturnData_ary2[$i][3]   = $row['WorkOrderCategory'];                
                $ReturnData_ary2[$i][4]   = $row['WoDepartment'];
                $ReturnData_ary2[$i][5]   = $row['CreatedUser'];
                $ReturnData_ary2[$i][6]   = $row['McCategory'];
                $ReturnData_ary2[$i][7]   = $row['MachineNo'];
                $ReturnData_ary2[$i][8]   = $row['ClosedFaultType'];
                $ReturnData_ary2[$i][9]   = $row['ClosedFaultLevel1'];
                $ReturnData_ary2[$i][10]   = $row['RespondDateTime'];
                $ReturnData_ary2[$i][11]   = $row['ClosedDateTime'];
                $ReturnData_ary2[$i][12]   = $row['VerifiedDateTime'];                
                $ReturnData_ary2[$i][13]   = $row['WoDescription'];
                $ReturnData_ary2[$i][14]   = $row['WoStatus'];
                $ReturnData_ary2[$i][15]   = $row['WoVerify'];
                $ReturnData_ary2[$i][16]   = $row['WoReOpen'];
   
                $i++;
            }  
            if($i === 0)    // No Data
            {
                $Status_ary[0] = "false";
                $Status_ary[1] = "Data not found"; 
            }
            else
            {
                $ReturnData_ary[0] = $strText;
                $Status_ary[0] = "true";
                $Status_ary[1] = "Data Available"; 
            } 
        } 
        catch(PDOException $ex) 
        {
            //$error =  "Error: " . $e->getMessage();
            $Status_ary[0] = "false";
            $Status_ary[1] = 'Error Msg: ' .$ex->getMessage();        
        }    
        $conn = null;
    }
    //error_log("Test error log: ", 3, "/logs/server/error.log");     
    $data_ary['Status_Ary'] = $Status_ary;
    $data_ary['Data_Ary']   = $ReturnData_ary;
    $data_ary['Data_Ary2']  = $ReturnData_ary2;    
    //print json_encode($error);
    print json_encode($data_ary); 

?>
