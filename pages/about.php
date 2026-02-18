<?php
$pageTitle = 'About';
$metaDescription = 'Learn about our studio, philosophy, and achievements';
include __DIR__ . '/../includes/header.php';
?>

<!-- Page Header -->
<section class="page-header" style="height: 60vh; position: relative; background: url('https://images.unsplash.com/photo-1600585154526-990dced4db0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: var(--overlay);"></div>
    <div style="position: absolute; bottom: 15%; left: 80px; color: #ffffff;">
        <h1 style="font-size: 72px; margin-bottom: 20px;">Our Story</h1>
        <p style="font-size: 18px;">Two decades of architectural excellence</p>
    </div>
</section>

<!-- About Content -->
<section class="section">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto; text-align: center;" data-aos="fade-up">
            <span class="section-subtitle">Since 2005</span>
            <h2 class="section-title">Creating Timeless Architecture</h2>
            <p style="color: var(--secondary-color); line-height: 1.8; margin-bottom: 40px;">Founded with a vision to push the boundaries of architectural design, Studio Architecture has grown into a globally recognized practice. Our work is characterized by a deep respect for context, innovative use of materials, and a commitment to creating spaces that inspire.</p>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; margin-top: 80px;">
            <div data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1600577912591-3e4c7a4c7a4c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                     alt="Studio" 
                     style="width: 100%; height: 600px; object-fit: cover;">
            </div>
            <div data-aos="fade-left" style="display: flex; flex-direction: column; justify-content: center;">
                <h3 style="font-size: 32px; margin-bottom: 20px;">Our Philosophy</h3>
                <p style="color: var(--secondary-color); line-height: 1.8; margin-bottom: 20px;">We believe that great architecture emerges from a deep understanding of place, people, and purpose. Each project is an opportunity to create something unique – a response to its specific context that transcends mere building to become an experience.</p>
                <p style="color: var(--secondary-color); line-height: 1.8;">Our design process is collaborative and iterative, involving close dialogue with clients, consultants, and craftspeople. We don't just design buildings; we create environments that enhance the human experience.</p>
            </div>
        </div>
    </div>
</section>

<!-- Awards Section -->
<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">Recognition</span>
            <h2 class="section-title">Awards & Honors</h2>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
            <div class="award-card" style="text-align: center; padding: 40px; background: var(--bg-color);" data-aos="fade-up">
                <div style="font-size: 48px; color: var(--accent-color); margin-bottom: 20px;">🏆</div>
                <h3 style="margin-bottom: 10px;">AIA National Award</h3>
                <p style="color: var(--secondary-color);">2023 - Crystal Waters Villa</p>
            </div>
            <div class="award-card" style="text-align: center; padding: 40px; background: var(--bg-color);" data-aos="fade-up" data-aos-delay="100">
                <div style="font-size: 48px; color: var(--accent-color); margin-bottom: 20px;">🏆</div>
                <h3 style="margin-bottom: 10px;">ArchDaily Building of the Year</h3>
                <p style="color: var(--secondary-color);">2022 - Horizon Tower</p>
            </div>
            <div class="award-card" style="text-align: center; padding: 40px; background: var(--bg-color);" data-aos="fade-up" data-aos-delay="200">
                <div style="font-size: 48px; color: var(--accent-color); margin-bottom: 20px;">🏆</div>
                <h3 style="margin-bottom: 10px;">International Design Award</h3>
                <p style="color: var(--secondary-color);">2021 - Minimalist Loft</p>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>