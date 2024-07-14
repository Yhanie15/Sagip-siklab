<?php
// Assuming you have session handling for user authentication and fetching user details
session_start();
require_once '../config/db.php'; // Include your database connection

// Example of fetching user details based on session
$user_id = $_SESSION['user_id']; // Assuming you store user_id in session
$sql = "SELECT name FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();
$stmt->close();

// Sample data for incidents (replace with actual data retrieval from database)
$incidents = [
    ["id" => 1, "location" => "Street A", "time_reported" => "2024-07-15 08:30:00", "level" => "High", "status" => "Active"],
    ["id" => 2, "location" => "Street B", "time_reported" => "2024-07-15 09:15:00", "level" => "Medium", "status" => "Resolved"],
    ["id" => 3, "location" => "Street C", "time_reported" => "2024-07-15 10:00:00", "level" => "Low", "status" => "Active"],
    // Add more incident data as needed
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidents</title>
    <link rel="stylesheet" href="../styles/styles.css"> <!-- Link to your combined styles.css file -->
    <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-top">
            <div class="user-profile">
                <i class="material-icons">account_circle</i>
                <span><?php echo $name; ?></span>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li><a href="dashboard.php"><i class="material-icons">dashboard</i> Dashboard</a></li>
            <li><a href="#"><i class="material-icons">error_outline</i> Incidents</a></li>
            <li><a href="#"><i class="material-icons">local_fire_department</i> Calls</a></li>
            <li><a href="#"><i class="material-icons">check_circle</i> Dispatches</a></li>
            <li><a href="#"><i class="material-icons">assignment</i> Reports</a></li>
        </ul>
        <!-- Logout link at the bottom -->
        <div class="logout">
            <a href="logout.php"><i class="material-icons">exit_to_app</i> Logout</a>
        </div>
    </div>
    <div class="content">
        <table class="incident-table">
            <thead>
                <tr>
                    <th>Incident ID</th>
                    <th>Location</th>
                    <th>Time Reported</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($incidents as $incident): ?>
                <tr>
                    <td><?php echo $incident['id']; ?></td>
                    <td><?php echo $incident['location']; ?></td>
                    <td><?php echo $incident['time_reported']; ?></td>
                    <td><?php echo $incident['level']; ?></td>
                    <td><?php echo $incident['status']; ?></td>
                    <td><a href="#" class="view-btn"><i class="material-icons">visibility</i> View</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Interactive map below the table -->
        <div class="map-container">
            <!-- Replace with your interactive map code -->
            <div id="map"></div>
        </div>
    </div>
</body>
</html>
