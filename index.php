<?php
session_start(); // Start session at the top

// Handle newsletter subscription
$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newsletterEmail'])) {
    $email = filter_var($_POST['newsletterEmail'], FILTER_SANITIZE_EMAIL);

    // Optional: Save to database or send to email API here

    // For now, just simulate success
    $successMessage = "✅ Subscription successful! Thank you for subscribing.";
}

$isLoggedIn = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TravelMate - Your Trip Planner</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="preload" href="assets/images/hero.png" as="image">
    <link rel="preload" href="assets/images/hunza.png" as="image">
    <link rel="preload" href="assets/images/swat.png" as="image">
</head>
<body>

<header class="navbar">
    <div class="logo">TravelMate</div>
    <nav class="nav-links" id="navLinks">
        <a href="index.php">Home</a>
        <a href="planner.php">Plan Trip</a>
        <a href="packages.php">Packages</a>
        <a href="contact.php">Contact</a>
        <?php if ($isLoggedIn): ?>
            <a href="logout.php" class="auth-btn logout">Logout</a>
        <?php else: ?>
            <a href="login.php" class="auth-btn login">Login</a>
        <?php endif; ?>
    </nav>
    <div class="hamburger" id="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
</header>

<section class="hero">
    <div class="hero-content">
        <h2>Plan your perfect trip, hassle-free.</h2>
        <p>Explore destinations, hotels, meals and more - all in one place.</p>
        <a href="planner.php" class="btn">Start Planning</a>
    </div>
</section>

<section class="features-cards reveal">
    <div class="feature-card delay-1" style="--accent-color:#e74c3c;">
        <img src="assets/icons/destination.png" alt="Destination Icon">
        <h3>Choose Destinations</h3>
        <p>Explore top travel spots across Pakistan with scenic beauty and culture.</p>
        <a href="#" class="btn-card">Read More</a>
    </div>
    <div class="feature-card delay-2" style="--accent-color: #2980b9;">
        <img src="assets/icons/hotel.png" alt="Hotel Icon">
        <h3>Book Hotels</h3>
        <p>Select comfortable, verified hotels for a peaceful stay during your journey.</p>
        <a href="#" class="btn-card">Read More</a>
    </div>
    <div class="feature-card delay-3" style="--accent-color:#27ae60;">
        <img src="assets/icons/meal.png" alt="Meal Icon">
        <h3>Plan Meals</h3>
        <p>Add meal packages to your trip with vegetarian and non-veg options.</p>
        <a href="#" class="btn-card">Read More</a>
    </div>
    <div class="feature-card delay-4" style="--accent-color:#8e44ad;">
        <img src="assets/icons/calendar.png" alt="Calendar Icon">
        <h3>Set Dates</h3>
        <p>Choose your travel start and end dates to generate a trip schedule.</p>
        <a href="#" class="btn-card">Read More</a>
    </div>
</section>

<section class="popular-destinations reveal">
    <h2>Popular Destinations</h2>
    <div class="carousel-wrapper reveal">
        <button class="arrow left reveal" onclick="scrollSlider(-1)">←</button>
        <div class="destination-slider reveal" id="slider">
            <div class="destination-card delay-1">
                <img src="assets/images/hunza.png" alt="Hunza Valley" loading="lazy">
                <h3>Hunza</h3>
                <p>Majestic mountains, lush valleys & serene lakes.</p>
            </div>
            <div class="destination-card delay-2">
                <img src="assets/images/swat.png" alt="Swat Valley">
                <h3>Swat</h3>
                <p>The Switzerland of Pakistan — peace & beauty.</p>
            </div>
            <div class="destination-card delay-3">
                <img src="assets/images/murree.png" alt="Murree">
                <h3>Murree</h3>
                <p>Clouds, pine forests, and cool breezes await.</p>
            </div>
            <div class="destination-card delay-4">
                <img src="assets/images/skardu.png" alt="Skardu">
                <h3>Skardu</h3>
                <p>A heaven for trekkers and mountain lovers.</p>
            </div>
            <div class="destination-card delay-1">
                <img src="assets/images/fairy-meadows.png" alt="Fairy Meadows">
                <h3>Fairy Meadows</h3>
                <p>Camping beneath Nanga Parbat — a breathtaking experience.</p>
            </div>
            <div class="destination-card delay-2">
                <img src="assets/images/khunjerab.png" alt="Khunjerab Pass">
                <h3>Khunjerab Pass</h3>
                <p>Border of Pakistan & China — snow-capped and scenic all year.</p>
            </div>
        </div>
        <button class="arrow right" onclick="scrollSlider(1)">→</button>
    </div>
</section>

<section class="call-to-action reveal">
    <h2>Ready to plan your dream trip?</h2>
    <p>Let TravelMate guide the way — explore, stay, and dine with ease.</p>
    <a href="planner.php" class="cta-btn">Start Planning</a>
</section>

<section class="testimonials reveal">
    <h2>What travelers say</h2>
    <div class="testimonial-cards reveal">
        <div class="testimonial reveal">
            <p>“Planning my Skardu trip was so easy with this site. Loved the hotel options!”</p>
            <h4>- Person 1.</h4>
        </div>
        <div class="testimonial reveal">
            <p>“This planner helped me book everything in one place. Super clean design!”</p>
            <h4>- Person 2.</h4>
        </div>
        <div class="testimonial reveal">
            <p>“I recommended this to my friends visiting Hunza. The meal options are awesome!”</p>
            <h4>- Person 2.</h4>
        </div>
    </div>
</section>

<?php if (!empty($successMessage)) : ?>
    <div id="successToast" class="toast">
        <?= $successMessage ?>
    </div>
<?php endif; ?>

<footer>
    <p>&copy; 2025 TravelMate - All rights reserved.</p>
</footer>

<button id="backToTop" title="Back to Top">↑</button>

<script src="js/navbar.js"></script>
<script src="js/app.js"></script>
</body>
</html>
