<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Pet-Folio</title>
    <link rel="stylesheet" href="contact1.css">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">
            Pet-Folio
            <pre><span><img src="logo1.png" alt="Custom Image" style="width: 70px; height: 45px;"></span></pre>
        </div>
        <nav>
            <ul>
                <li><a href="index1.php">Home</a></li>
                <li><a href="about1.php">About</a></li>
                <li><a href="contact1.php" class="active">Contact</a></li>
                <li class="profile">
                    <button class="profile-btn">Profile</button>
                    <div class="profile-menu">
                        <p><strong>Email:</strong> <?php echo $_SESSION['user_email'] ?? 'Not available'; ?></p>
                        <a href="logout.php" class="logout-btn">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <section class="contact-container">
        <h1>Contact Us</h1>
        <div class="developer-section">
            <h2>Meet the Developers</h2>
            <div class="developer-list">
                <div class="developer-card">
                    <h3>Developer 1</h3>
                    <p>Email: channabasava.ballolli@gmail.com</p>
                    <p>Phone: +91 7483508119</p>
                </div>
                <div class="developer-card">
                    <h3>Developer 2</h3>
                    <p>Email: mallikarjunbiradar2003@gmail.com</p>
                    <p>Phone: +91 8867193155</p>
                </div>
                <div class="developer-card">
                    <h3>Developer 3</h3>
                    <p>Email: rahulbagli@gmail.com</p>
                    <p>Phone: +91 6360868514</p>
                </div>
                <div class="developer-card">
                    <h3>Developer 4</h3>
                    <p>Email: channuchannabasavamageri@gmil.com</p>
                    <p>Phone: +91 9740186026</p>
                </div>
            </div>
        </div>

        <div class="community-contact">
            <h2>Contact Our Community</h2>
            <p>Email: community@petfolio.com</p>
            <p>Phone: +1 800-123-4567</p>
            <p>Address: 123 Pet Street, Animal City, PA 12345</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Pet-Folio. All rights reserved.</p>
    </footer>
</body>

</html>
