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
$name = $_POST['Name'];
$username = $_POST['username'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$password = $_POST['Password'];
$confirm_password = $_POST['ConfirmPassword']; // Correctly retrieve confirm password

// Check if the passwords match
if ($password !== $confirm_password) {
    echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
    exit(); // Stop execution if passwords do not match
}

// Check if email already exists
$email_check_sql = "SELECT * FROM registers WHERE Email = ?";
$stmt = $conn->prepare($email_check_sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['status' => 'error', 'message' => 'Email already exists.']);
    exit();
}

// Hash the password before storing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the data into the `registers` table
$sql = "INSERT INTO registers (Name, username, Email, Phone, Password) 
        VALUES (?, ?, ?, ?, ?)";

// Prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $username, $email, $phone, $hashed_password);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Registration successful.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $stmt->error]);
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>
