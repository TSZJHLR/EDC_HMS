<?php
session_start();
$pageTitle = "How It Works";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="hero-section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">PROCESS</span>
            <h2>How Our EDC System Works</h2>
            <p class="lead">Get started with our comprehensive clinical trial management solution in just a few simple steps</p>
        </div>

        <div class="steps">
            <!-- Step 1 -->
            <div class="step">
                <div class="step-number">1</div>
                <h3>Sign Up & Onboard</h3>
                <p>Create your account and complete the quick onboarding process. Our team will guide you through the initial setup to get you started in minutes.</p>
            </div>

            <!-- Step 2 -->
            <div class="step alternate">
                <div class="step-number">2</div>
                <h3>Configure Your Study</h3>
                <p>Set up your study parameters, design custom data collection forms, and configure workflows to match your specific research protocols.</p>
            </div>

            <!-- Step 3 -->
            <div class="step">
                <div class="step-number">3</div>
                <h3>Invite Your Team</h3>
                <p>Add research team members, assign roles and permissions, and collaborate seamlessly with built-in communication tools.</p>
            </div>

            <!-- Step 4 -->
            <div class="step alternate">
                <div class="step-number">4</div>
                <h3>Collect & Analyze Data</h3>
                <p>Start collecting high-quality data with our intuitive interface, and gain valuable insights with real-time analytics and reporting tools.</p>
            </div>
        </div>

        <div class="cta">
            <h3>Ready to Transform Your Clinical Research?</h3>
            <p>Join thousands of research professionals who trust our platform for their clinical trials.</p>
            <div class="cta-buttons">
                <a href="/register" class="btn-primary">Start Free Trial</a>
                <a href="/demo" class="btn-secondary">Schedule a Demo</a>
            </div>
            <p class="cta-note">No credit card required • 14-day free trial • Cancel anytime</p>
        </div>
    </div>
</section>

<?php
$footerClass = 'footer';
include 'includes/footer.php';
?> 