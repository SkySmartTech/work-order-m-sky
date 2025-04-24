
<?php

    $num = $_POST["userpara"];    
    require_once('../../initialize.php');
    require_once('../../config.php');     
    date_default_timezone_set('Asia/Colombo');
    $strDateTime = date("Y-m-d");   
    $i = 0; 
    $error = "NA";
    $data_ary = array();

    // Calculate the start date of the last week
    $start_date = date('Y-m-d', strtotime('-6 days'));

    try 
    {
        $conn_mc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL query to join the two tables and group by ServerDatetime and MachineNumber
        $stmt = $conn_mc->prepare("
            SELECT 
    DATE_FORMAT(se.ServerDatetime, '%Y-%m-%d %H:%i') AS DatePart, 
    se.MachineNumber,
    se.Sen1Speed
FROM 
    tblmc_speedevent se
JOIN 
    tblmc_configuration c ON se.MachineNumber = c.MachineNumber
WHERE 
    c.ModuleNo = 1 AND DATE(se.ServerDatetime) = '2024-10-11'
GROUP BY 
    DatePart, 
    se.MachineNumber
ORDER BY 
    DatePart, 
    se.MachineNumber

        ");

        // Execute the query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();  

        // Process the result for chart data
        foreach($result as $row)
        {
            $Date_ary[$i]           = $row['DatePart']; 
            $MachineNumber_ary[$i]  = $row['MachineNumber']; 
            $Sen1Speed_ary[$i]      = $row['Sen1Speed']; 
            $i++;
        }

        if ($i > 0) {
            $data_ary['Date_Ary']           = $Date_ary;
            $data_ary['MachineNumber_Ary']  = $MachineNumber_ary; 
            $data_ary['Sen1Speed_Ary']      = $Sen1Speed_ary;
        } else {
            $data_ary = array(0);
        }
        
    } 
    catch(PDOException $e) 
    {
        $error = "Error: " . $e->getMessage();
    }    
    
    $conn = null;

    // Return the data in JSON format
    print json_encode($data_ary);

?>
