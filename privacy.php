<?php
session_start();
$pageTitle = "Privacy Policy";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<main class="main-content">
    <section class="hero-section">
        <div class="container">
            <h1>Privacy Policy</h1>
            <p class="lead">How we protect and manage your data in compliance with global regulations</p>
        </div>
    </section>

    <div class="last-updated">
        <div class="container">
            Last Updated: July 18, 2025
        </div>
    </div>

    <section class="privacy-content">
        <div class="container">
            <p class="intro">
                At EDC CRTMS, we are committed to protecting your privacy and ensuring the security of your personal and research data. 
                This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our services.
            </p>

            <div class="section">
                <h2><span class="section-number">1</span> Data Collection</h2>
                <p>We collect the following types of information to provide and improve our services:</p>
                <div class="info-box">
                    <h3>Information You Provide:</h3>
                    <ul>
                        <li>Personal identification information (Name, email address, phone number)</li>
                        <li>Professional credentials and qualifications</li>
                        <li>Institution and role information</li>
                        <li>Billing and payment information</li>
                    </ul>
                </div>
                <div class="info-box">
                    <h3>Automatically Collected Information:</h3>
                    <ul>
                        <li>Clinical research data and metadata</li>
                        <li>System usage and analytics data</li>
                        <li>Device and browser information</li>
                        <li>IP addresses and location data</li>
                    </ul>
                </div>
            </div>

                <!-- Data Usage -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                        <span class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center mr-3 text-sm">2</span>
                        How We Use Your Data
                    </h2>
                    <div class="ml-11">
                        <p class="text-gray-600 mb-4">Your data is used for the following purposes:</p>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="w-10 h-10 rounded-lg bg-primary-100 text-primary-600 flex items-center justify-center mb-3">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <h3 class="font-semibold text-gray-900 mb-2">Service Provision</h3>
                                <p class="text-gray-600 text-sm">Providing and maintaining our clinical research services, including study management and data collection.</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="w-10 h-10 rounded-lg bg-primary-100 text-primary-600 flex items-center justify-center mb-3">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <h3 class="font-semibold text-gray-900 mb-2">Account Management</h3>
                                <p class="text-gray-600 text-sm">Processing and managing your account, including authentication and authorization.</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="w-10 h-10 rounded-lg bg-primary-100 text-primary-600 flex items-center justify-center mb-3">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <h3 class="font-semibold text-gray-900 mb-2">Communication</h3>
                                <p class="text-gray-600 text-sm">Sending essential service notifications, updates, and support communications.</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="w-10 h-10 rounded-lg bg-primary-100 text-primary-600 flex items-center justify-center mb-3">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h3 class="font-semibold text-gray-900 mb-2">Improvement</h3>
                                <p class="text-gray-600 text-sm">Analyzing usage patterns to enhance our platform and user experience.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Protection -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                        <span class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center mr-3 text-sm">3</span>
                        Data Protection & Security
                    </h2>
                    <div class="ml-11">
                        <p class="text-gray-600 mb-6">
                            We implement comprehensive security measures to protect your data, including:
                        </p>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-600">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="font-semibold text-gray-900">Encryption</h3>
                                        <p class="mt-1 text-sm text-gray-600">End-to-end encryption for all sensitive data in transit and at rest.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600">
                                            <i class="fas fa-shield-alt"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="font-semibold text-gray-900">Security Audits</h3>
                                        <p class="mt-1 text-sm text-gray-600">Regular security audits and penetration testing by third-party experts.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-purple-100 text-purple-600">
                                            <i class="fas fa-user-lock"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="font-semibold text-gray-900">Access Controls</h3>
                                        <p class="mt-1 text-sm text-gray-600">Strict role-based access controls and multi-factor authentication.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-yellow-100 text-yellow-600">
                                            <i class="fas fa-database"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="font-semibold text-gray-900">Backup & Recovery</h3>
                                        <p class="mt-1 text-sm text-gray-600">Automated backup systems and disaster recovery procedures.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="policy-block">
                    <h2>Your Rights</h2>
                    <div class="policy-content">
                        <p>You have the following rights regarding your data:</p>
                <ul>
                            <li>Right to access your personal data</li>
                            <li>Right to request data corrections</li>
                            <li>Right to request data deletion</li>
                            <li>Right to opt-out of communications</li>
                </ul>
                    </div>
                </div>
            </div>

            <div class="policy-footer">
                <p>Last updated: March 2024</p>
                <p>For any privacy-related questions, please <a href="/frontend/router.php?page=contact">contact us</a>.</p>
            </div>
        </div>
    </section>
</main>

<?php
$footerClass = 'footer';
include 'includes/footer.php';
?>

<style>
.policy-container {
    max-width: 800px;
    margin: 0 auto;
}

.policy-block {
    background: var(--white);
    padding: 2rem;
    border-radius: 0.5rem;
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
}

.policy-block h2 {
    color: var(--primary);
    margin-bottom: 1.5rem;
    text-align: center;
}

.policy-content {
    color: var(--text-dark);
}

.policy-content p {
    margin-bottom: 1rem;
    line-height: 1.6;
    text-align: center;
}

.policy-content ul {
    list-style-type: none;
    padding: 0;
}

.policy-content ul li {
    padding: 0.5rem 0;
    padding-left: 1.5rem;
    position: relative;
    text-align: left;
}

.policy-content ul li:before {
    content: "•";
    position: absolute;
    left: 0;
    color: var(--primary);
}

.policy-footer {
    text-align: center;
    margin-top: 3rem;
    color: var(--text-light);
}

.policy-footer a {
    color: var(--primary);
    text-decoration: none;
}

.policy-footer a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .policy-block {
        margin: 0 1rem 2rem 1rem;
    }
}
</style>

<?php
// Get the buffered content and assign it to $content
$content = ob_get_clean();
?>