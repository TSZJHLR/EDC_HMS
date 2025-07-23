<?php
session_start();
$pageTitle = "Frequently Asked Questions";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<main class="main-content">
    <section id="faq" class="section">
        <div class="container">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <h3>What is an EDC System?</h3>
                    <p>An Electronic Data Capture (EDC) System is a computerized system designed for the collection of clinical trial data in electronic format, replacing traditional paper-based data collection methods.</p>
                </div>
                <div class="faq-item">
                    <h3>Is the system compliant with regulations?</h3>
                    <p>Yes, our EDC System is fully compliant with 21 CFR Part 11, HIPAA, GDPR, and other relevant regulations for clinical data collection and management.</p>
                </div>
                <div class="faq-item">
                    <h3>How secure is my data?</h3>
                    <p>We use enterprise-grade security measures including data encryption, regular backups, and strict access controls to ensure your data remains secure and protected at all times.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
$footerClass = 'footer';
include 'includes/footer.php';
?>