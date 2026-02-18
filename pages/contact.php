<?php
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'Contact';
$metaDescription = 'Get in touch with our team to discuss your project';
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Verify CSRF token
        if (!isset($_POST['csrf_token']) || !verifyCSRFToken($_POST['csrf_token'])) {
            throw new Exception('Invalid security token');
        }
        
        // Validate inputs
        $name = sanitize($_POST['name']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $message_text = sanitize($_POST['message']);
        
        if (!$name || !$email || !$message_text) {
            throw new Exception('Please fill in all fields correctly');
        }
        
        // Save to database
        if (saveContactSubmission($name, $email, $message_text)) {
            $message = 'Thank you for your message. We\'ll be in touch soon.';
        } else {
            throw new Exception('Error saving your message. Please try again.');
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

$csrf_token = generateCSRFToken();
include __DIR__ . '/../includes/header.php';
?>

<!-- Page Header -->
<section class="page-header" style="height: 50vh; position: relative; background: url('/assets/images/contact.jpg') center/cover;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: var(--overlay);"></div>
    <div style="position: absolute; bottom: 15%; left: 80px; color: #ffffff;">
        <h1 style="font-size: 72px; margin-bottom: 20px;">Contact Us</h1>
        <p style="font-size: 18px;">Let's start a conversation</p>
    </div>
</section>

<!-- Contact Section -->
<section class="section">
    <div class="container">
        <?php if ($message): ?>
        <div class="notification success show" style="margin-bottom: 40px;"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
        <div class="notification error show" style="margin-bottom: 40px;"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="contact-container">
            <!-- Contact Information -->
            <div class="contact-info" data-aos="fade-right">
                <span class="section-subtitle">Get in Touch</span>
                <h2 class="section-title">Let's Create Together</h2>
                
                <div class="info-item">
                    <h4>Visit Us</h4>
                    <p>200 Park Avenue<br>New York, NY 10022<br>United States</p>
                </div>
                
                <div class="info-item">
                    <h4>Contact</h4>
                    <p><a href="tel:+12125550123">+1 (212) 555-0123</a></p>
                    <p><a href="mailto:studio@architecture.com">studio@architecture.com</a></p>
                </div>
                
                <div class="info-item">
                    <h4>Hours</h4>
                    <p>Monday - Friday: 9:00 - 18:00<br>Saturday: By appointment<br>Sunday: Closed</p>
                </div>
            </div>
            
            <!-- Contact Form -->
            <form method="POST" action="" class="contact-form" id="contactForm" data-aos="fade-left">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                
                <div class="form-group">
                    <input type="text" id="name" name="name" required>
                    <label for="name">Your Name</label>
                </div>
                
                <div class="form-group">
                    <input type="email" id="email" name="email" required>
                    <label for="email">Email Address</label>
                </div>
                
                <div class="form-group">
                    <textarea id="message" name="message" required></textarea>
                    <label for="message">Your Message</label>
                </div>
                
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </div>
</section>

<!-- Map Placeholder -->
<section class="section" style="padding: 0;">
    <div style="height: 500px; background: var(--light-gray); display: flex; align-items: center; justify-content: center;">
        <div style="text-align: center;">
            <i class="fas fa-map-marker-alt" style="font-size: 48px; color: var(--accent-color); margin-bottom: 20px;"></i>
            <h3>Google Maps Integration</h3>
            <p style="color: var(--secondary-color);">200 Park Avenue, New York, NY 10022</p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>