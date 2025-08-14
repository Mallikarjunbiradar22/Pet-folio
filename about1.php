<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Pet-Folio</title>
    <link rel="stylesheet" href="index1.css">
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.html"); // Redirect to login page if not logged in
        exit();
    }
    ?>
    <header>
        <div class="logo">
            Pet-Folio 
            <pre><span><img src="logo1.png" alt="Custom Image" style="width: 70px; height: 45px;"></span></pre>
        </div>
        <nav>
            <ul>
                <li><a href="index1.php">Home</a></li>
                <li><a href="about1.php">About</a></li>
                <li><a href="contact1.php">Contact</a></li>
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

    <!-- About Us Section -->
    <section id="about" class="about" style="background-color: rgb(255, 255, 255);">
        
        <p><b>Welcome to PET-FOLIO</b> – your one-stop destination for finding your next best friend! At PET-FOLIO, we believe that every pet deserves a loving home, and we're here to help pet lovers like you connect with the perfect furry, feathered, or scaly companion.</p>
        <p>Whether you're looking to adopt a loyal dog, a playful kitten, or a unique exotic pet, PET-FOLIO has it all. But PET-FOLIO is more than just a pet adoption website; it's a thriving community dedicated to the care and conservation of orphaned animals. By joining our community, you can participate in conversations, share resources, and support efforts to rescue and rehabilitate orphaned pets.</p>
        <p>Every pet that comes through our community is given a second chance and is prepared for adoption, ensuring they go to safe and loving homes. All of our conserved and adoptable pets are listed on the site, making it easy for you to find and welcome your new friend.</p>
        <p>Join PET-FOLIO today and be a part of a community that makes a difference!</p>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Pet-Folio. All rights reserved.</p>
        <div class="social-icons">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>