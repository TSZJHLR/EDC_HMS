<?php

session_start();
$pageTitle = "Electronic Data Capture System";
include 'includes/header.php';
include 'includes/navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Data Capture System</title>
    
</head>

<main class="landing-main">
    <section id="home" class="hero-section">
        <div class="hero-content">
            <h1>Electronic Data Capture System</h1>
            <p>Secure, efficient, and user-friendly data management solution</p>
            <a href="/dashboard.php" class="cta-button">Get Started</a>
        </div>
    </section>
    
    <section id="about" class="about-section">
        <div class="container">
            <h2>About Our System</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>🔒 Secure</h3>
                    <p>128-bit encryption and SQL injection protection</p>
                </div>
                <div class="feature-card">
                    <h3>📊 Efficient</h3>
                    <p>Modern CRUD operations with AJAX</p>
                </div>
                <div class="feature-card">
                    <h3>👥 User-Friendly</h3>
                    <p>Intuitive interface with smooth navigation</p>
                </div>
                <div class="feature-card">
                    <h3>🔄 Modular</h3>
                    <p>Clean, maintainable code architecture</p>
                </div>
                <div class="feature-card">
                    <h3>🌐 API Ready</h3>
                    <p>RESTful JSON API for integration</p>
                </div>
                <div class="feature-card">
                    <h3>📱 Responsive</h3>
                    <p>Works perfectly on all devices</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
$footerClass = 'footer';
include 'includes/footer.php';
?>