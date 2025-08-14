<?php
// Include the database connection file
include('db.php');

// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $address = trim($_POST['address']);
    $mobile = trim($_POST['mobile']);
    $experience = trim($_POST['experience']);
    $role = $_POST['role'];

    // Basic validation
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password) || empty($address) || empty($mobile) || empty($experience) || empty($role)) {
        echo "All fields are required. Please fill them in.";
        exit;
    }

    // Validate password length (at least 8 characters)
    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
        exit;
    }

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        echo "Passwords do not match. Please re-enter your passwords.";
        exit;
    }

    // Validate mobile number format (example: 10-digit number)
    if (!preg_match("/^\d{10}$/", $mobile)) {
        echo "Please enter a valid 10-digit mobile number.";
        exit;
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query to insert the data into the community_member table
    $sql = "INSERT INTO community_member (name, email, password, address, mobile, experience, role) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("sssssss", $name, $email, $hashed_password, $address, $mobile, $experience, $role);

        // Execute the query
        if ($stmt->execute()) {
            // Registration successful, store user ID in session
            $_SESSION['user_id'] = $stmt->insert_id; // Get the ID of the last inserted record

            // Redirect to the upload dog page
            header("Location: volunteer.php");
            exit;
        } else {
            // Error while executing the query
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Error while preparing the statement
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
