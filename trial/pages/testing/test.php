
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Total Allocate Duration</title>
</head>
<body>

<h1>Total Allocate Duration Calculation</h1>

<button onclick="calculateTotalAllocateDuration()">Calculate Total Allocate Duration</button>

<script>
function calculateTotalAllocateDuration() {
    // Sample dataset
    const dataAry = [
        ["Allocated Time", "WO_00000708", "2024-03-08 09:24:00", "2024-03-08 11:24:00"],
        ["Allocated Time", "WO_00000709", "2024-03-08 10:25:00", "2024-03-08 12:25:00"],
        ["Allocated Time", "WO_00000631", "2024-03-08 12:38:00", "2024-03-08 13:38:00"]
    ];

    let totalDuration = 0;
    let previousEndTime = null;

    for (const interval of dataAry) {
        const startTime = new Date(interval[2]);
        const endTime = new Date(interval[3]);

        if (previousEndTime && startTime < previousEndTime) {
            startTime.setTime(previousEndTime.getTime());
        }

        totalDuration += (endTime - startTime) / (1000 * 60); // Convert milliseconds to minutes
        previousEndTime = endTime;
    }

    alert("Total allocate duration: " + totalDuration + " minutes");
}
</script>

</body>
</html>







