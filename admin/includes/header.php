<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Admin <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="/architecture-firm/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Studio Admin</h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="/architecture-firm/admin/index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                        <i class="fas fa-dashboard"></i> Dashboard
                    </a></li>
                    <li><a href="/architecture-firm/admin/projects.php" class="<?php echo strpos($_SERVER['PHP_SELF'], 'projects.php') !== false ? 'active' : ''; ?>">
                        <i class="fas fa-building"></i> Projects
                    </a></li>
                    <li><a href="/architecture-firm/admin/categories.php" class="<?php echo strpos($_SERVER['PHP_SELF'], 'categories.php') !== false ? 'active' : ''; ?>">
                        <i class="fas fa-tags"></i> Categories
                    </a></li>
                    <li><a href="/architecture-firm/admin/team.php" class="<?php echo strpos($_SERVER['PHP_SELF'], 'team.php') !== false ? 'active' : ''; ?>">
                        <i class="fas fa-users"></i> Team
                    </a></li>
                    <li><a href="/architecture-firm/admin/submissions.php" class="<?php echo strpos($_SERVER['PHP_SELF'], 'submissions.php') !== false ? 'active' : ''; ?>">
                        <i class="fas fa-envelope"></i> Contact
                    </a></li>
                    <li><a href="/architecture-firm/admin/logout.php">
                        <i class="fas fa-sign-out"></i> Logout
                    </a></li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="admin-main">
            <header class="admin-topbar">
                <div class="topbar-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="topbar-right">
                    <span>Welcome, <?php echo $_SESSION['user_name']; ?></span>
                </div>
            </header>
            
            <div class="admin-container">