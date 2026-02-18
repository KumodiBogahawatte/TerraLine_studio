<?php
require_once __DIR__ . '/../config/config.php';
// Ensure session is started before any output
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../includes/auth.php';
Auth::requireLogin();
require_once __DIR__ . '/../includes/functions.php';
$db = Database::getInstance()->getConnection();
// Get counts for dashboard
$projectsCount = $db->query("SELECT COUNT(*) FROM projects")->fetchColumn();
$teamCount = $db->query("SELECT COUNT(*) FROM team")->fetchColumn();
$submissionsCount = $db->query("SELECT COUNT(*) FROM contact_submissions WHERE is_read = 0")->fetchColumn();
$pageTitle = 'Dashboard';
include __DIR__ . '/includes/header.php';
?>

<div class="admin-content">
    <h1>Dashboard</h1>
    
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">📊</div>
            <div class="stat-details">
                <h3><?php echo $projectsCount; ?></h3>
                <p>Total Projects</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-details">
                <h3><?php echo $teamCount; ?></h3>
                <p>Team Members</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">✉️</div>
            <div class="stat-details">
                <h3><?php echo $submissionsCount; ?></h3>
                <p>Unread Messages</p>
            </div>
        </div>
    </div>
    
    <!-- Recent Projects -->
    <div class="recent-section">
        <h2>Recent Projects</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $recent = $db->query("
                    SELECT p.*, c.name as category_name 
                    FROM projects p 
                    LEFT JOIN categories c ON p.category_id = c.id 
                    ORDER BY p.created_at DESC 
                    LIMIT 5
                ")->fetchAll();
                
                foreach ($recent as $project):
                ?>
                <tr>
                    <td><?php echo $project['title']; ?></td>
                    <td><?php echo $project['category_name']; ?></td>
                    <td><?php echo $project['location']; ?></td>
                    <td><?php echo $project['year']; ?></td>
                    <td>
                        <a href="projects.php?edit=<?php echo $project['id']; ?>" class="btn-small">Edit</a>
                        <a href="projects.php?delete=<?php echo $project['id']; ?>" class="btn-small danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>