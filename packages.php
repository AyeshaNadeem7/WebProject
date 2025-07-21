<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Packages | TravelMate</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">TravelMate</div>
        <nav class="nav-links" id="navLinks">
            <a href="index.php">Home</a>
            <a href="planner.php">Plan Trip</a>
            <a href="packages.php">Packages</a>
            <a href="contact.php">Contact</a>
        </nav>
        <div class="hamburger" id="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>

    <main class="packages-section">
        <h1>Travel Packages</h1>
        <div class="packages-grid">
            <?php
            // Simulated static data; you can later replace this with a database query.
            $packages = [
                [
                    'badge' => 'Popular',
                    'title' => 'Hunza Adventure',
                    'duration' => '5 Days / 4 Nights',
                    'features' => [
                        'Altit Fort Tour',
                        'Attabad Lake Visit',
                        '4x4 Jeep Safari',
                        'Luxury Hotel Stay',
                    ],
                    'price' => 'From Rs. 45,000/person',
                ],
                [
                    'badge' => 'Best Value',
                    'title' => 'Swat Explorer',
                    'duration' => '4 Days / 3 Nights',
                    'features' => [
                        'Malam Jabba Ski Resort',
                        'White Palace Visit',
                        'River Rafting',
                        'Deluxe Hotel Stay',
                    ],
                    'price' => 'From Rs. 35,000/person',
                ],
                [
                    'badge' => '',
                    'title' => 'Skardu Expedition',
                    'duration' => '6 Days / 5 Nights',
                    'features' => [
                        'Deosai Plains Trek',
                        'Upper Kachura Lake',
                        'Shigar Fort Visit',
                        'Premium Hotel Stay',
                    ],
                    'price' => 'From Rs. 55,000/person',
                ],
            ];

            foreach ($packages as $package) :
            ?>
                <div class="package-card">
                    <?php if ($package['badge']) : ?>
                        <div class="package-badge"><?= htmlspecialchars($package['badge']) ?></div>
                    <?php endif; ?>
                    <h3><?= htmlspecialchars($package['title']) ?></h3>
                    <p class="duration"><?= htmlspecialchars($package['duration']) ?></p>
                    <ul class="package-features">
                        <?php foreach ($package['features'] as $feature) : ?>
                            <li><?= htmlspecialchars($feature) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="price"><?= htmlspecialchars($package['price']) ?></p>
                    <button class="book-btn">Book Now</button>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 TravelMate - All rights reserved.</p>
    </footer>

    <script src="js/navbar.js"></script>
    <script src="js/packages.js"></script>
</body>
</html>
