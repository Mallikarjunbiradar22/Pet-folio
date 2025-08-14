<?php
include("db.php");

// SQL query to fetch dog details
$sql = "SELECT id, name, age, gender, location, description, photo_path, uploaded_by_role FROM stray_dogs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='dog'>";
        echo "<img src='" . htmlspecialchars($row['photo_path']) . "' alt='Photo of " . htmlspecialchars($row['name']) . "'>";
        echo "<div class='dog-info'>";
        echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
        echo "<span class='tag'>" . htmlspecialchars($row['gender']) . "</span>";
        echo "<span class='tag'>" . htmlspecialchars($row['age']) . " years</span>";
        
        // Display a short description (truncate the description)
        $short_description = substr($row['description'], 0, 100) . '...'; // Truncate description
        echo "<p><strong>Location:</strong> " . htmlspecialchars($row['location']) . "</p>";
        echo "<p>" . htmlspecialchars($short_description) . "</p>";
        
        // Dynamic "Adopt Me!" button to show full details
        echo "<a href='pet-details.php?id=" . $row['id'] . "' class='adopt-btn'>Adopt Me! 🐾</a>";
        
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<div style='text-align: center; padding: 50px;'>";
    echo "<h2>No stray dogs available at the moment</h2>";
    echo "<p>Please check back later for new additions!</p>";
    echo "</div>";
}

$conn->close();
?>
