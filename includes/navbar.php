<?php
session_start();
?>
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">EDC System</div>
        <ul class="nav-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="how-it-works.php">How It Works</a></li>
            <li><a href="privacy.php">Privacy</a></li>
            <li><a href="terms.php">Terms</a></li>
            <li><a href="testimonials.php">Testimonials</a></li>
        </ul>
        <div class="auth-menu">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span class="user-name">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="api/logout.php" class="btn-logout">Logout</a>
            <?php else: ?>
                <a href="entry.php" class="btn-auth">Login/Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>