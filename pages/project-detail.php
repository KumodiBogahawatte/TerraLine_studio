<?php
require_once __DIR__ . '/../includes/functions.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : '';
$project = getProjectBySlug($slug);

if (!$project) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

$images = getProjectImages($project['id']);
$pageTitle = $project['title'];
$metaDescription = substr($project['description'], 0, 160);
include __DIR__ . '/../includes/header.php';
?>

<!-- Project Hero -->
<section class="project-hero" style="height: 80vh; position: relative;">
    <div class="project-hero-image" style="width: 100%; height: 100%;">
        <img src="/architecture-firm/uploads/projects/<?php echo $project['featured_img']; ?>" 
             alt="<?php echo $project['title']; ?>"
             style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="position: absolute; bottom: 15%; left: 80px; color: #ffffff; z-index: 2;">
        <span class="section-subtitle"><?php echo $project['category_name']; ?></span>
        <h1 style="font-size: 72px; margin-bottom: 20px;"><?php echo $project['title']; ?></h1>
        <p style="font-size: 18px;"><?php echo $project['location']; ?> | <?php echo $project['year']; ?></p>
    </div>
</section>

<!-- Project Info -->
<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 80px;">
            <!-- Project Details -->
            <div data-aos="fade-right">
                <h2 style="margin-bottom: 30px;">Project Details</h2>
                <div style="display: grid; gap: 20px;">
                    <?php if ($project['location']): ?>
                    <div>
                        <strong style="color: var(--accent-color); display: block; margin-bottom: 5px;">Location</strong>
                        <p><?php echo $project['location']; ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($project['year']): ?>
                    <div>
                        <strong style="color: var(--accent-color); display: block; margin-bottom: 5px;">Year</strong>
                        <p><?php echo $project['year']; ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($project['area']): ?>
                    <div>
                        <strong style="color: var(--accent-color); display: block; margin-bottom: 5px;">Area</strong>
                        <p><?php echo $project['area']; ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($project['client']): ?>
                    <div>
                        <strong style="color: var(--accent-color); display: block; margin-bottom: 5px;">Client</strong>
                        <p><?php echo $project['client']; ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <div>
                        <strong style="color: var(--accent-color); display: block; margin-bottom: 5px;">Category</strong>
                        <p><?php echo $project['category_name']; ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Description -->
            <div data-aos="fade-left">
                <h2 style="margin-bottom: 30px;">About the Project</h2>
                <p style="color: var(--secondary-color); line-height: 1.8;"><?php echo nl2br($project['description']); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery -->
<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">Gallery</span>
            <h2 class="section-title">Project Imagery</h2>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px;">
            <?php foreach ($images as $image): ?>
            <div data-aos="fade-up">
                <img src="/architecture-firm/uploads/projects/<?php echo $image['img_url']; ?>" 
                     alt="<?php echo $image['caption'] ?: $project['title']; ?>"
                     data-lightbox
                     data-caption="<?php echo $image['caption']; ?>"
                     style="width: 100%; height: 500px; object-fit: cover; cursor: pointer;">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Next/Prev Navigation -->
<section class="section" style="padding: 60px 0;">
    <div class="container">
        <div style="display: flex; justify-content: space-between;">
            <a href="#" class="btn">&larr; Previous Project</a>
            <a href="/pages/projects.php" class="btn">All Projects</a>
            <a href="#" class="btn">Next Project &rarr;</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>