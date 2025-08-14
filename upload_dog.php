<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    include 'db.php';

    // File upload directory
    $uploadDir = 'uploads/stray_dogs/';
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

    // Validate file type
    $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    if (!in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
    }

    // Move file to upload directory
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO stray_dogs (name, age, gender, location, description, photo_path, uploaded_by, uploaded_by_role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissssis", $name, $age, $gender, $location, $description, $photoPath, $uploadedBy, $uploadedByRole);

        // Set parameters
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $photoPath = $uploadFile;
        $uploadedBy = $_POST['uploaded_by'];
        $uploadedByRole = $_POST['uploaded_by_role'];

        // Execute statement
        if ($stmt->execute()) {
            require"index1.php";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "File upload failed.";
    }

    $conn->close();
}
?>
