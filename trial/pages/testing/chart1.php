<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Timeline Chart with Multiple Bars</title>
    <!-- Load Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
        // Load the Google Charts library
        google.charts.load('current', {'packages':['timeline']});

        // Draw the chart when Google Charts library is loaded
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() 
        {
            // Create the data table with multiple bars per row
            /*
            var dataTable = new google.visualization.DataTable();            
            dataTable.addColumn({ type: 'string', id: 'Room' });
            dataTable.addColumn({ type: 'string', id: 'Name' });
            dataTable.addColumn({ type: 'date', id: 'Start' });
            dataTable.addColumn({ type: 'date', id: 'End' });

            dataTable.addRows([
                ['Allocate Time', 'Task 1', new Date(2024, 3, 6, 8, 0, 0), new Date(2024, 3, 6, 9, 5, 0)],
                ['Allocate Time', 'Task 2', new Date(2024, 3, 6, 10, 0, 0), new Date(2024, 3, 6, 11, 0, 0)],
                ['Allocate Time', 'Task 2.5', new Date(2024, 3, 7, 11, 07, 0), new Date(2024, 3, 7, 12, 30, 0)],
                ['Check In Time', 'Task 3', new Date(2024, 3, 6, 9, 0, 0), new Date(2024, 3, 6, 11, 0, 0)],
                ['Check In Time', 'Task 4', new Date(2024, 3, 6, 11, 0, 0), new Date(2024, 3, 6, 13, 0, 0)],
              ]);
              */

            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn({ type: 'string', id: 'Role' });
            dataTable.addColumn({ type: 'string', id: 'Name' });
            dataTable.addColumn({ type: 'date', id: 'Start' });
            dataTable.addColumn({ type: 'date', id: 'End' });
            dataTable.addRows([
              [ 'President', 'George Washington', new Date(2024, 1, 3), new Date(2024, 2, 3) ],
              [ 'President', 'John Adams', new Date(2024, 2, 4 ,7,0,0), new Date(2024, 2, 4,15,0,0) ],
              [ 'President', 'Thomas Jefferson', new Date(2024, 2, 10), new Date(2024, 2, 12) ]]);


            // Set chart options
            var options = 
                    {
                        height: 400,
                        timeline: {
                            groupByRowLabel: true // Display multiple bars per row
                        }
                    };
            // Instantiate and draw the chart
            var chart = new google.visualization.Timeline(document.getElementById('timeline'));
            chart.draw(dataTable, options);
        }
  </script>
</head>
<body>
  <div id="timeline"></div>
</body>
</html>
