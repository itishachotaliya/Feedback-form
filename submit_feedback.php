<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a MySQL database connection established
    $mysqli = new mysqli("localhost", "root", "", "feedback_db");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare insert statement
    $stmt = $mysqli->prepare("INSERT INTO feedback (title, contact_number, age, gender, message) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssiss", $title, $contact_number, $age, $gender, $message);

    // Set parameters
    $title = $_POST["title"];
    $contact_number = $_POST["contact_number"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $message = $_POST["message"];

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a thank you page
        header("Location: feedback_list.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Close connection
    $mysqli->close();
}
?>
