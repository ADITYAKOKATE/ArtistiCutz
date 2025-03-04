<?php
// Database connection details
$servername = "localhost"; // Your DB host
$username = "root"; // Your DB username
$password = ""; // Your DB password
$dbname = "ArtistiCutz"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone'];
    $date_of_schedule = $_POST['date'];
    $time_slot = $_POST['time'];
    $service_needed = $_POST['service'];
    $additional_notes = $_POST['notes'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, date, slot, service, note) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Check if the prepare statement is valid
    if ($stmt === false) {
        die("Error preparing the query: " . $conn->error); // Add this line for debugging
    }

    $stmt->bind_param("sssssss", $full_name, $email, $phone_number, $date_of_schedule, $time_slot, $service_needed, $additional_notes);

    // Execute the query
    if ($stmt->execute()) {
        echo "Congratulations, your appointment is booked!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
