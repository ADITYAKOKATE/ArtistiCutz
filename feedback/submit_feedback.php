<?php
// Database configuration
$host = 'localhost'; // Your database host
$db = 'artistictuz'; // Your database name
$user = 'root'; // Your database username
$pass = ''; // Your database password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedback (name, email, rating, feedback) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $name, $email, $rating, $feedback);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$rating = $_POST['rating'];
$feedback = $_POST['feedback'];
$stmt->execute();

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect to index.html
header("Location: index.html");
exit();
?>