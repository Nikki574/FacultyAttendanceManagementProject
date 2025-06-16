<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'attendance');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch branch from URL
$branch = $_GET['branch'] ?? '';

// Fetch staff members from the branch
$staffQuery = "SELECT * FROM staff WHERE branch='$branch'";
$staffResult = $conn->query($staffQuery);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = date('Y-m-d'); // Use system date
    $amAttendance = $_POST['am_attendance'];
    $pmAttendance = $_POST['pm_attendance'];
    $reason = $_POST['reason'];

    foreach ($staffResult as $staff) {
        $name = $staff['name'];
        $am = $amAttendance[$name];
        $pm = $pmAttendance[$name];

        // Check if attendance already exists for the given date and branch
        $checkQuery = "SELECT * FROM staff_attendance WHERE date='$date' AND branch='$branch' AND name='$name'";
        $checkResult = $conn->query($checkQuery);

        // Calculate CL deductions
        $cl_deduction = 0;
        if ($am == 'CL' && $pm == 'CL') {
            $cl_deduction = 1;
        } elseif ($am == 'CL' || $pm == 'CL') {
            $cl_deduction = 0.5;
        }

        // Update CL balance
        if ($cl_deduction > 0) {
            $newClBalance = $staff['cl_balance'] - $cl_deduction;
            $updateClQuery = "UPDATE staff SET cl_balance=$newClBalance WHERE name='$name'";
            $conn->query($updateClQuery);
        }

        // Update OOD leave count and CL balance
        if ($am == 'OOD' && $pm == 'OOD') {
            $newOodCount = $staff['ood_count'] + 1;
            $updateOodQuery = "UPDATE staff SET ood_count=$newOodCount, cl_balance=cl_balance+1 WHERE name='$name'";
            $conn->query($updateOodQuery);
        }

        if ($checkResult->num_rows > 0) {
            // Record exists, update it
            $updateQuery = "UPDATE staff_attendance SET am_attendance='$am', pm_attendance='$pm', reason='$reason[$name]' 
                            WHERE date='$date' AND branch='$branch' AND name='$name'";
            $conn->query($updateQuery);
        } else {
            // Record does not exist, insert new
            $insertQuery = "INSERT INTO staff_attendance (date, name, branch, am_attendance, pm_attendance, reason) 
                            VALUES ('$date', '$name', '$branch', '$am', '$pm', '$reason[$name]')";
            $conn->query($insertQuery);
        }
    }

    echo "Attendance recorded successfully!";
    header("Location: index.html");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance for <?php echo htmlspecialchars($branch); ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Attendance for <?php echo htmlspecialchars($branch); ?></h2>

    <form method="post">
        <table border="1">
            <tr>
                <th>Name</th>
                <th>AM Attendance</th>
                <th>PM Attendance</th>
                <th>Reason (if any)</th>
            </tr>

            <?php foreach ($staffResult as $staff) { ?>
            <tr>
                <td><?php echo htmlspecialchars($staff['name']); ?></td>
                <td>
                    <select name="am_attendance[<?php echo htmlspecialchars($staff['name']); ?>]">
                        <option value="P">P</option>
                        <option value="CL">CL</option>
                        <option value="OD">OD</option>
                        <option value="OOD">OOD</option>
                        <option value="AB">AB</option>
                    </select>
                </td>
                <td>
                    <select name="pm_attendance[<?php echo htmlspecialchars($staff['name']); ?>]">
                        <option value="P">P</option>
                        <option value="CL">CL</option>
                        <option value="OD">OD</option>
                        <option value="OOD">OOD</option>
                        <option value="AB">AB</option>
                    </select>
                </td>
                <td><input type="text" name="reason[<?php echo htmlspecialchars($staff['name']); ?>]" placeholder="Reason"></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <input type="submit" value="Submit Attendance">
    </form>
</body>
</html>
