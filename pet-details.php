<?php
include("db.php"); // Include database connection

// Get the dog ID from the query string
$dog_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch dog and owner details
$sql = "SELECT 
            sd.id AS dog_id, 
            sd.name AS dog_name, 
            sd.age, 
            sd.gender, 
            sd.location, 
            sd.description, 
            sd.photo_path, 
            cm.name AS owner_name, 
            cm.email AS owner_email, 
            cm.mobile AS owner_mobile 
        FROM stray_dogs sd
        JOIN community_member cm ON sd.uploaded_by = cm.id
        WHERE sd.id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $dog_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Check if details are available
if (!$data) {
    echo "<h1>Details not found</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt <?php echo htmlspecialchars($data['dog_name']); ?></title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        /* Container Styles */
        .container {
            max-width: 900px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Heading Styles */
        h1, h2 {
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        /* Dog Details Section */
        .dog-details {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 30px;
            align-items: center;
        }

        .dog-details img {
            border-radius: 8px;
            margin-right: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .dog-details h2 {
            font-size: 2em;
            margin-bottom: 5px;
            color: #4CAF50;
        }

        .dog-details .dog-location {
            font-size: 1.2em;
            margin-bottom: 15px;
            color: #555;
        }

        .dog-details p {
            font-size: 1.1em;
            margin-bottom: 15px;
        }

        .dog-details strong {
            font-weight: bold;
        }

        /* Owner Details Section */
        .owner-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .owner-details h2 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.8em;
        }

        .owner-details p {
            font-size: 1.1em;
            margin-bottom: 10px;
        }

        .owner-details strong {
            font-weight: bold;
        }

        /* Media Queries for Responsive Design */
        @media (max-width: 768px) {
            .dog-details {
                flex-direction: column;
                align-items: center;
            }

            .dog-details img {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }

        /* Button Style */
        a.contact-btn {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            font-size: 1.1em;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        a.contact-btn:hover {
            background-color: #45a049;
        }

        /* Footer */
        footer {
            text-align: center;
            font-size: 0.9em;
            margin-top: 50px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Adopt <?php echo htmlspecialchars($data['dog_name']); ?></h1>
        <div class="dog-details">
            <img src="<?php echo htmlspecialchars($data['photo_path']); ?>" alt="Photo of <?php echo htmlspecialchars($data['dog_name']); ?>" style="width:300px; height:auto;">
            <div>
                <h2><?php echo htmlspecialchars($data['dog_name']); ?></h2>
                <p class="dog-location" ><b>Location:</b><?php echo htmlspecialchars($data['location']); ?></p>
                <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($data['description'])); ?></p>
            </div>
        </div>
        <div class="owner-details">
            <h2> Contact Information</h2>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($data['owner_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($data['owner_email']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($data['owner_mobile']); ?></p>
            <a href="mailto:<?php echo htmlspecialchars($data['owner_email']); ?>" class="contact-btn">Contact Owner</a>
        </div>
    </div>
</body>
</html>
