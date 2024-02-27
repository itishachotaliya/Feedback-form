<?php
// Connect to your database (modify as needed)
$conn = new mysqli("localhost", "root", "", "feedback_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch feedback entries sorted by time
$sql = "SELECT * FROM feedback ORDER BY created_at DESC";
$result = $conn->query($sql); // Removed $conn from here

// Fetch feedback entries sorted by name
$sql_name = "SELECT * FROM feedback ORDER BY title ASC";
$result_name = $conn->query($sql_name); // Removed $conn from here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
        <h2>Feedback List</h2>
        <div class="feedback-list">
            <div class="sorted-by-time">
                <h3>Sorted by Time:</h3>
                <ul>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo '<li>' . $row['title'] . ' - ' . $row['created_at'] . '</li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="sorted-by-name">
                <h3>Sorted by Name:</h3>
                <ul>
                    <?php
                    while ($row_name = $result_name->fetch_assoc()) {
                        echo '<li>' . $row_name['title'] . ' - ' . $row_name['title'] . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
