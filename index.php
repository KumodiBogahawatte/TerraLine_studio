<?php
// Load configuration first
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Home';
$metaDescription = 'Studio Architecture - Creating timeless spaces with cinematic luxury';
include __DIR__ . '/includes/header.php';

// Get featured projects
$featuredProjects = getProjects(1, 6);
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Luxury Architecture">
    </div>
    <div class="hero-content">
        <h1 data-aos="fade-up">Creating Timeless<br>Architecture</h1>
        <p data-aos="fade-up" data-aos-delay="100">Where vision meets precision, and spaces become experiences</p>
        <a href="/architecture-firm/pages/projects.php" class="btn btn-light" data-aos="fade-up" data-aos-delay="200">View Portfolio</a>
    </div>
</section>

<!-- Featured Projects -->
<section class="section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">Our Work</span>
            <h2 class="section-title">Featured Projects</h2>
        </div>
        
        <div class="projects-grid">
            <?php foreach ($featuredProjects as $project): ?>
            <div class="project-card" data-aos="fade-up">
                <a href="/architecture-firm/pages/project-detail.php?slug=<?php echo $project['slug']; ?>" style="text-decoration: none;">
                    <div class="project-image">
                        <img src="/architecture-firm/uploads/projects/<?php echo $project['featured_img']; ?>" 
                             alt="<?php echo $project['title']; ?>"
                             loading="lazy">
                        <div class="project-overlay">
                            <span class="project-category"><?php echo $project['category_name'] ?? 'Architecture'; ?></span>
                            <h3 class="project-title"><?php echo $project['title']; ?></h3>
                            <span class="project-location"><?php echo $project['location']; ?></span>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-3" data-aos="fade-up">
            <a href="/architecture-firm/pages/projects.php" class="btn">View All Projects</a>
        </div>
    </div>
</section>

<!-- About Preview -->
<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <div class="about-preview" style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;">
            <div data-aos="fade-right">
                <span class="section-subtitle">Our Studio</span>
                <h2 class="section-title">Architecture That<br>Inspires</h2>
                <p style="margin-bottom: 30px; color: var(--secondary-color);">For over two decades, we've been creating spaces that transcend the ordinary. Our approach combines innovative design with timeless elegance, resulting in architecture that not only stands out but stands the test of time.</p>
                <a href="/architecture-firm/pages/about.php" class="btn">Discover More</a>
            </div>
            <div data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                     alt="Studio Architecture" 
                     style="width: 100%; height: 600px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="text-align: center; color: #000000;">
    <div class="container">
        <h2 style="font-size: 48px; margin-bottom: 20px;" data-aos="fade-up">Let's Create Something<br>Extraordinary Together</h2>
        <p style="margin-bottom: 40px; color: var(--dark-gray);" data-aos="fade-up" data-aos-delay="100">Ready to bring your vision to life? Let's discuss your project.</p>
        <a href="/architecture-firm/pages/contact.php" class="btn btn-dark" data-aos="fade-up" data-aos-delay="200">Start a Conversation</a>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>