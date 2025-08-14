<?php
// Include the database connection file
include('db.php');

// Start session
session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo "<script>alert('Email and Password are required!'); window.history.back();</script>";
        exit;
    }

    // Prepare query to fetch user
    $sql = "SELECT id, name, email, password FROM community_member WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $db_email, $db_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $db_password)) {
            // Set session variables
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;

            // Redirect to volunteer.html
            header("Location: volunteer.php");
            exit;
        } else {
            echo "<script>alert('Incorrect password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('User not found. Please sign up.'); window.location.href='community.html';</script>";
    }

    $stmt->close();
}
$conn->close();
?>
