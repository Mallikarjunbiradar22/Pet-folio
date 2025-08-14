<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet-Folio - Dashboard</title>
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

    <!-- Hero Section -->
    <section id="home" class="hero">
        <h1>Welcome to PET-FOLIO</h1>
        <p>Your one-stop destination for adopting your perfect dog!</p>
        <div class="cta-buttons">
            <button onclick="explorePets()">Explore More</button>
            <button onclick="joinCommunity()">Join the Community</button>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="categories">
        <h2>Find Your Companion</h2>
        <div class="category-grid">
            <div class="category-item">
                <img src="dogs.jpeg" alt="Dogs">
                <h3>Dogs</h3>
            </div>
        </div>
    </section>

    <!-- Featured Pets Section -->
    <section class="featured">
        <h2>Featured Dogs</h2>
        <div class="pet-carousel">
            <div class="pet">
                <a href="https://en.wikipedia.org/wiki/Free-ranging_dog"><img src="dog1.jpeg" alt="Dog 1"></a> 
                <p>Stray Dogs</p>
            </div>
            <div class="pet">
                <a href="https://en.wikipedia.org/wiki/Pet"><img src="dog2.jpg" alt="Dog 2"></a>
                <p>Pet Dogs</p>
            </div>
        </div>
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

    <script src="index1.js"></script>
</body>
</html>
