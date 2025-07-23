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
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<main class="landing-main">
    <section id="home" class="hero-section">
        <div class="hero-content">
            <h1>Electronic Data Capture System</h1>
            <p>Secure, efficient, and user-friendly data management solution</p>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="/dashboard.php" class="cta-button">Go to Dashboard</a>
            <?php else: ?>
                <a href="/entry.php" class="cta-button">Login to Get Started</a>
            <?php endif; ?>
        </div>
    </section>
    
    <?php include 'includes/about.php'; ?>
    <?php include 'includes/features.php'; ?>
    <?php include 'includes/services.php'; ?>
    <?php include 'includes/pricing.php'; ?>
</main>

<?php
$footerClass = 'footer';
include 'includes/footer.php';
?>