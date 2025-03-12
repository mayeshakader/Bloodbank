<?php
session_start();
$active = 'message';

$servername = "localhost";
$username = "root";
$password = "";
$database = "bbms";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Messages</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('https://wallpapers.com/images/high/aesthetic-one-color-qxfzk4u0d3ekk1ti.webp') no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.3);
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.2);
        }
        h2 {
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">User Messages</h2>
        <?php if ($result->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= htmlspecialchars($row['fullname']); ?></td>
                                <td><?= htmlspecialchars($row['contactno']); ?></td>
                                <td><?= htmlspecialchars($row['email']); ?></td>
                                <td><?= nl2br(htmlspecialchars($row['message'])); ?></td>
                                <td><?= date("d M Y, H:i", strtotime($row['created_at'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">No messages found.</div>
        <?php endif; ?>
        
        <!-- Back to Dashboard Button -->
        <div class="text-center mt-4">
            <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
