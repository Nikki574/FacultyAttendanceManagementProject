<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'attendance');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch branch from URL
$branch = $_GET['branch'] ?? '';

// Fetch staff members based on branch
$staffQuery = "SELECT name FROM staff" . ($branch ? " WHERE branch='$branch'" : '');
$staffResult = $conn->query($staffQuery);

// Fetch selected staff member from form submission
$selectedStaff = $_POST['staff_member'] ?? '';

// Fetch attendance records based on selected staff member
$attendanceQuery = "SELECT * FROM staff_attendance" . ($selectedStaff ? " WHERE branch='$branch' AND name='$selectedStaff'" : '');
$attendanceResult = $conn->query($attendanceQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        select, button {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Attendance Records<?php if ($branch) echo " - $branch"; ?></h1>

        <form method="post">
            <div class="form-group">
                <label for="staff_member">Select Staff Member:</label>
                <select name="staff_member" id="staff_member" required>
                    <option value="">Select Staff Member</option>
                    <?php while ($staff = $staffResult->fetch_assoc()) { ?>
                        <option value="<?php echo htmlspecialchars($staff['name']); ?>" <?php echo ($selectedStaff == $staff['name']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($staff['name']); ?>
                        </option>
                    <?php } ?>
                </select>
                <button type="submit">View Attendance</button>
            </div>
        </form>

        <?php if ($selectedStaff): ?>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>AM Attendance</th>
                    <th>PM Attendance</th>
                    <th>Reason</th>
                </tr>
                <?php while ($attendance = $attendanceResult->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($attendance['date']); ?></td>
                    <td><?php echo htmlspecialchars($attendance['name']); ?></td>
                    <td><?php echo htmlspecialchars($attendance['branch']); ?></td>
                    <td><?php echo htmlspecialchars($attendance['am_attendance']); ?></td>
                    <td><?php echo htmlspecialchars($attendance['pm_attendance']); ?></td>
                    <td><?php echo htmlspecialchars($attendance['reason']); ?></td>
                </tr>
                <?php } ?>
            </table>
        <?php endif; ?>

        <br>
        <a href="index.html">Back to Home</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
