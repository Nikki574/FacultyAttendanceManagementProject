<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'attendance');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch branch options
$branches = ["CSE", "CSM", "HNBS", "ECE", "EEE", "MECH", "TECHNICAL"];

$action = $_GET['action'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Branch</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        select, button {
            padding: 10px;
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Select Branch</h1>
        <form method="get" action="">

            <?php if ($action == 'view_staff') { ?>
                <p>View Staff Details for:</p>
                <select name="branch" required>
                    <option value="">Select Branch</option>
                    <?php foreach ($branches as $branch) { ?>
                        <option value="<?php echo $branch; ?>"><?php echo $branch; ?></option>
                    <?php } ?>
                </select>
                <button type="submit" formaction="view_staff.php">View Staff</button>
            <?php } elseif ($action == 'view_attendance') { ?>
                <p>View Attendance Records for:</p>
                <select name="branch" required>
                    <option value="">Select Branch</option>
                    <?php foreach ($branches as $branch) { ?>
                        <option value="<?php echo $branch; ?>"><?php echo $branch; ?></option>
                    <?php } ?>
                </select>
                <button type="submit" formaction="view_attendance.php">View Attendance</button>
            <?php } ?>

        </form>
        <br>
        <a href="index.html">Back to Home</a>
    </div>
</body>
</html>
