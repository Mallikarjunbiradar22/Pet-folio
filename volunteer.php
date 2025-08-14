<?php
// Start the session to access user ID
session_start();

// Check if the user is logged in (i.e., user ID is set in the session)
if (!isset($_SESSION['user_id'])) {
    // Redirect to the registration or login page if not logged in
    header('Location: community.php');
    exit;
}

$user_id = $_SESSION['user_id'];  // Get the user ID from the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Information Form</title>
    <link rel="stylesheet" href="volunteer1.css">
</head>
<body>
    <form action="upload_dog.php" method="post" enctype="multipart/form-data">
        <label for="name">Dog Breed:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="age">Age:</label>
        <input type="number" name="age" id="age">
        
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        
        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo" accept="image/*" required>
        
        <!-- Prefill the 'Uploaded By' field with the user ID from session -->
        <label for="uploaded_by">Uploaded By (ID):</label>
        <input type="number" name="uploaded_by" id="uploaded_by" value="<?php echo $user_id; ?>" readonly required>
        
        <label for="uploaded_by_role">Uploaded By Role:</label>
        <select name="uploaded_by_role" id="uploaded_by_role" required>
            <option value="volunteer">Volunteer</option>
            <option value="breeder">Owner</option>
        </select>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
