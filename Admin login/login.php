<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$db_username = "root"; // Your MySQL username
$db_password = ""; // Your MySQL password (leave empty if using XAMPP default)
$dbname = "artisticutz"; // The name of your database

// Create a connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and bind
$sql = "SELECT Password FROM registers WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $row['Password'])) {
        // Password is correct, redirect to dashboard
        header("Location: index.html");
        exit();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid username or password.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid username or password.']);
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>
