<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement to select the user by email
    $sql = "SELECT * FROM signup WHERE mail = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);

        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a user is found
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Store user details in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['first_name'] . " " . $user['last_name'];
                $_SESSION['user_email'] = $user['mail'];
                
                echo "Login successful!";
                header("Location: index1.php"); // Redirect to the dashboard
                exit();
            } else {
                echo "Invalid password!";
                header("Location: login.html");
            }
        } else {
            echo "No user found with that email!";
            header("Location: login.html");
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
