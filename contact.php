<?php
// Handle contact form submission
$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email   = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if ($name && $email && $subject && $message) {
        // TODO: Send email or store in database here

        // Example placeholder success response
        $successMessage = "✅ Your message has been sent successfully!";
    } else {
        $errorMessage = "❌ Please fill in all fields correctly.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | TravelMate</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">TravelMate</div>
        <nav class="nav-links" id="navLinks">
            <a href="index.php">Home</a>
            <a href="planner.php">Plan Trip</a>
            <a href="contact.php">Contact</a>
        </nav>
        <div class="hamburger" id="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>

    <main class="contact-section">
        <h1>Contact Us</h1>
        <div class="contact-container">
            <div class="contact-info">
                <h2>Get in Touch</h2>
                <p>Have questions about our services? We're here to help!</p>
                <div class="info-item">
                    <strong>Email:</strong>
                    <p>info@travelmate.com</p>
                </div>
                <div class="info-item">
                    <strong>Phone:</strong>
                    <p>+1 (555) 123-4567</p>
                </div>
                <div class="info-item">
                    <strong>Address:</strong>
                    <p>123 Travel Street, Tourism District<br>Adventure City, AC 12345</p>
                </div>
            </div>

            <form class="contact-form" method="POST" action="submit_contact.php">
                <?php if ($successMessage): ?>
                    <div class="success-message"><?= $successMessage ?></div>
                <?php elseif ($errorMessage): ?>
                    <div class="error-message"><?= $errorMessage ?></div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 TravelMate - All rights reserved.</p>
    </footer>

    <script src="js/navbar.js"></script>
    <script src="js/contact.js"></script>
</body>
</html>
