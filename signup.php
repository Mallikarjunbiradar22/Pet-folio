<?php
include 'db.php';

// Get the form data
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$password = $_POST['password'] ?? '';

// Debugging: Check if form data is received
error_log("Received data: First Name: $first_name, Last Name: $last_name, Email: $email, Mobile: $mobile");

// Hash the password (recommended for security)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare an SQL statement to insert the data into the 'signup' table
$sql = "INSERT INTO signup (name, lname, mail, phone, password) 
        VALUES ('$first_name', '$last_name', '$email', '$mobile', '$hashed_password')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Signup successful!";
    require 'index1.php';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
