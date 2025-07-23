<?php
session_start();
$pageTitle = "Terms of Service";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<main class="main-content">
    <section class="hero-section">
        <div class="container">
            <h2>Terms of Service</h2>\
        </div>
    </section>

    <section class="terms-content">
        <div class="container">
            <p class="intro">
                Welcome to EDC CRTMS. These Terms of Service ("Terms") govern your access to and use of our clinical trial management platform. 
                Please read these Terms carefully before using our services.
            </p>

            <div class="section">
                <h2><span class="section-number">1</span> Acceptance of Terms</h2>
                <p>
                    By accessing or using the EDC CRTMS platform ("Service"), you agree to be bound by these Terms of Service. 
                    If you are using the Service on behalf of an organization, you represent that you have the authority to bind that organization to these Terms.
                </p>
            </div>

            <div class="section">
                <h2><span class="section-number">2</span> Service License</h2>
                <p>
                    Subject to these Terms, we grant you a limited, non-exclusive, non-transferable license to access and use our Service 
                    for your internal business purposes in accordance with our documentation and policies.
                </p>
            </div>

            <div class="section">
                <h2><span class="section-number">3</span> User Obligations</h2>
                <p>When using our Service, you agree to:</p>
                <ul>
                    <li>Maintain complete and accurate account information and update it as necessary.</li>
                    <li>Protect your account credentials and notify us immediately of any unauthorized access.</li>
                    <li>Use the Service in compliance with all applicable laws, regulations, and ethical guidelines.</li>
                    <li>Promptly report any security concerns, data breaches, or unauthorized access.</li>
                </ul>
            </div>

            <div class="section">
                <h2><span class="section-number">4</span> Data Ownership</h2>
                <p>
                    We respect your intellectual property rights and the importance of your research data:
                </p>
                <p>
                    You retain all right, title, and interest in and to any data, information, or content that you submit, 
                    post, or display on or through the Service ("Your Data").
                </p>
                <ul>
                    <li>You own all rights to your research data and content</li>
                    <li>You are responsible for the accuracy, quality, and legality of your data</li>
                    <li>You represent that you have all necessary rights to the data you submit</li>
                </ul>
            </div>

            <div class="section">
                <h2><span class="section-number">5</span> Payment Terms</h2>
                <p>
                    Our Service is available under various subscription plans. By selecting a plan, you agree to pay the applicable fees.
                </p>
                <ul>
                    <li>Fees are billed in advance on a recurring basis</li>
                    <li>Automatic renewals unless canceled before the renewal date</li>
                    <li>All fees are non-refundable except as required by law</li>
                </ul>
            </div>

            <div class="section">
                <h2><span class="section-number">6</span> Termination</h2>
                <p>
                    You may terminate your account at any time by contacting our support team. Any fees paid are non-refundable.
                </p>
                <p>
                    We may suspend or terminate your access to the Service for any violation of these Terms, with or without notice.
                </p>
            </div>

            <div class="section">
                <h2><span class="section-number">7</span> Limitation of Liability</h2>
                <p>
                    To the maximum extent permitted by law, EDC CRTMS shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or other intangible losses, resulting from:
                </p>
                <ul>
                    <li>Your access to or use of or inability to access or use the Service</li>
                    <li>Any conduct or content of any third party on the Service</li>
                    <li>Any content obtained from the Service</li>
                    <li>Unauthorized access, use, or alteration of your transmissions or content</li>
                </ul>
            </div>

            <div class="section">
                <h2><span class="section-number">8</span> Changes to Terms</h2>
                <p>
                    We may modify these Terms at any time. We'll provide notice of any material changes by updating the "Last Updated" date at the top of these Terms.
                    Your continued use of the Service after such changes constitutes your acceptance of the new Terms.
                </p>
            </div>

            <div class="section">
                <h2><span class="section-number">9</span> Contact Us</h2>
                <p>
                    If you have any questions about these Terms, please contact us at:
                    <br><br>
                    EDC CRTMS<br>
                    123 Research Park Drive<br>
                    Boston, MA 02135<br>
                    Email: legal@edccrtms.com
                </p>
            </div>
        </div>
    </section>

</main>

<?php
$footerClass = 'footer';
include 'includes/footer.php';
?>