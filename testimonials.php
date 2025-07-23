<?php
session_start();
$pageTitle = "Testimonials";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section id="testimonials" class="section bg-light">
    <div class="container">
        <h2>What Our Clients Say</h2>
        <p class="lead">Hear from our valued clients about their experience with EDC System</p>
        
        <div class="testimonials-grid">
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"The EDC System has transformed how we manage our clinical trials. The intuitive interface and powerful features have saved us countless hours of work."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">SJ</div>
                    <div class="author-info">
                        <h4>Dr. Sarah Johnson</h4>
                        <p>Clinical Research Director</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"The support team is exceptional. They've been with us every step of the way, ensuring our studies run smoothly."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">MC</div>
                    <div class="author-info">
                        <h4>Michael Chen</h4>
                        <p>Principal Investigator</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"Implementing EDC System was seamless, and the training provided was excellent. Our team was up and running in no time."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">AR</div>
                    <div class="author-info">
                        <h4>Amanda Rodriguez</h4>
                        <p>Clinical Research Coordinator</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$footerClass = 'footer';
include 'includes/footer.php';
?>