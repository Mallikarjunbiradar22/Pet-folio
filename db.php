<?php
$servername = "localhost";  // Hostname, usually 'localhost'
$username = "root";         // XAMPP default username
$password = "";             // XAMPP default password is empty
$dbname = "petadpt";        // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected successfully!";
    }
    
}
?>
 
 