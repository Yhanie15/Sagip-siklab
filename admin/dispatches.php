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
    <script src='https://api.mapbox.com/mapbox-gl-js/v3.5.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v3.5.1/mapbox-gl.css' rel='stylesheet' />
</head>
<body>
        <div class="notifications">
            <a href="#" style="position: absolute; top: 10px; right: 10px;"><i class="material-icons">notifications</i></a>
        </div>
    <div class="sidebar">
        <div class="sidebar-top">
            <div class="user-profile">
                <i class="material-icons">account_circle</i>
                <span><?php echo $name; ?></span>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li><a href="dashboard.php"><i class="material-icons">dashboard</i> Dashboard</a></li>
            <li><a href="incidents.php"><i class="material-icons">error_outline</i> Incidents</a></li>
            <li><a href="calls.php"><i class="material-icons">local_fire_department</i> Calls</a></li>
            <li><a href="dispatches.php"><i class="material-icons">check_circle</i> Dispatches</a></li>
            <li><a href="reports.php"><i class="material-icons">assignment</i> Reports</a></li>
        </ul>
        <!-- Logout link at the bottom -->
        <div class="logout">
            <a href="login.php"><i class="material-icons">exit_to_app</i> Logout</a>
        </div>
    </div>
    <div class="content">
        
    </div>
</body>
</html>