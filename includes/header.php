<?php
// Ensure constants are defined
if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'Studio architecture');
}
if (!defined('SITE_URL')) {
    define('SITE_URL', 'http://localhost/architecture-firm');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' | ' . SITE_NAME : SITE_NAME; ?></title>
    
    <!-- Meta tags -->
    <meta name="description" content="<?php echo isset($metaDescription) ? $metaDescription : 'Studio Architecture - Creating timeless spaces with cinematic luxury'; ?>">
    <meta name="keywords" content="architecture, design, luxury, residential, commercial, interior, landscape">
    
    <!-- Open Graph tags -->
    <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : SITE_NAME; ?>">
    <meta property="og:description" content="Studio Architecture - Creating timeless spaces">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.jpg">
    <meta property="og:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    
    <!-- Favicon (add favicon.png to enable) -->
    <!-- <link rel="icon" type="image/png" href="/architecture-firm/assets/images/favicon.png"> -->

    <!-- Preload Critical Fonts (using .ttf files available) -->
    <link rel="preload" href="/architecture-firm/assets/fonts/playfair-display/PlayfairDisplay-Regular.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/architecture-firm/assets/fonts/inter/Inter_18pt-Regular.ttf" as="font" type="font/ttf" crossorigin>
    
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="/architecture-firm/assets/css/fonts.css">
    
    <!-- Fallback to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" media="print" onload="this.media='all'">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/architecture-firm/assets/css/style.css">
    
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap">
    </noscript>
</head>
<body class="<?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark' ? 'dark-theme' : ''; ?>">
    <!-- Loading Animation -->
    <div class="loading-overlay" id="loading">
        <div class="loading-spinner"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="/architecture-firm/" class="logo">
                <span class="logo-text font-serif">STUDIO</span>
                <span class="logo-accent font-sans">ARCHITECTURE</span>
            </a>
            
            <div class="nav-menu" id="navMenu">
                <ul class="nav-links font-sans">
                    <li><a href="/architecture-firm/" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index' ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="/architecture-firm/pages/projects">Projects</a></li>
                    <li><a href="/architecture-firm/pages/about">About</a></li>
                    <li><a href="/architecture-firm/pages/services">Services</a></li>
                    <li><a href="/architecture-firm/pages/team">Team</a></li>
                    <li><a href="/architecture-firm/pages/contact">Contact</a></li>
                </ul>
            </div>
            
            <div class="nav-actions">
                <button class="theme-toggle" id="themeToggle">
                    <i class="fas fa-moon"></i>
                    <i class="fas fa-sun"></i>
                </button>
                <button class="menu-toggle" id="menuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <main>