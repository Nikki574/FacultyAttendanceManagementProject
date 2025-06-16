<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'attendance');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch branch from URL
$branch = $_GET['branch'] ?? '';

// Fetch staff members based on branch
$staffQuery = "SELECT * FROM staff" . ($branch ? " WHERE branch='$branch'" : '');
$staffResult = $conn->query($staffQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Details</title>
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
    </style>
</head>
<body>
    <h1>Staff Details<?php if ($branch) echo " - $branch"; ?></h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Branch</th>
            <th>CL Balance</th>
            <th>OOD Count</th>
        </tr>
        <?php while ($staff = $staffResult->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $staff['name']; ?></td>
            <td><?php echo $staff['branch']; ?></td>
            <td><?php echo $staff['cl_balance']; ?></td>
            <td><?php echo $staff['ood_count']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="index.html">Back to Home</a>
</body>
</html>

<?php
$conn->close();
?>
