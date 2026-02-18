<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/auth.php';
Auth::requireLogin();

require_once __DIR__ . '/../includes/functions.php';

$db = Database::getInstance()->getConnection();

// Mark as read
if (isset($_GET['read'])) {
    $id = (int)$_GET['read'];
    $stmt = $db->prepare("UPDATE contact_submissions SET is_read = TRUE WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: submissions.php');
    exit();
}

// Delete submission
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $db->prepare("DELETE FROM contact_submissions WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: submissions.php');
    exit();
}

// Get page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 20;

$submissions = getContactSubmissions($page, $perPage);

// Get total count for pagination
$total = $db->query("SELECT COUNT(*) FROM contact_submissions")->fetchColumn();
$totalPages = ceil($total / $perPage);

$pageTitle = 'Contact Submissions';
include __DIR__ . '/includes/header.php';
?>

<div class="admin-content">
    <h1>Contact Submissions</h1>
    
    <div class="submissions-filters">
        <a href="?filter=all" class="filter-btn <?php echo !isset($_GET['filter']) || $_GET['filter'] == 'all' ? 'active' : ''; ?>">All</a>
        <a href="?filter=unread" class="filter-btn <?php echo isset($_GET['filter']) && $_GET['filter'] == 'unread' ? 'active' : ''; ?>">Unread</a>
        <a href="?filter=read" class="filter-btn <?php echo isset($_GET['filter']) && $_GET['filter'] == 'read' ? 'active' : ''; ?>">Read</a>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($submissions as $submission): ?>
            <tr class="<?php echo !$submission['is_read'] ? 'unread' : ''; ?>">
                <td>
                    <?php if (!$submission['is_read']): ?>
                    <span class="badge">New</span>
                    <?php endif; ?>
                </td>
                <td><?php echo $submission['name']; ?></td>
                <td><a href="mailto:<?php echo $submission['email']; ?>"><?php echo $submission['email']; ?></a></td>
                <td>
                    <div class="message-preview">
                        <?php echo substr($submission['message'], 0, 100); ?>...
                        <button class="btn-link" onclick="showFullMessage(<?php echo $submission['id']; ?>, '<?php echo addslashes($submission['message']); ?>')">View</button>
                    </div>
                </td>
                <td><?php echo date('M d, Y H:i', strtotime($submission['created_at'])); ?></td>
                <td class="actions">
                    <?php if (!$submission['is_read']): ?>
                    <a href="?read=<?php echo $submission['id']; ?>" class="btn-small">Mark Read</a>
                    <?php endif; ?>
                    <a href="?delete=<?php echo $submission['id']; ?>" class="btn-small danger" 
                       onclick="return confirm('Delete this submission?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?php echo $i; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</div>

<!-- Message Modal -->
<div id="messageModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Full Message</h3>
        <p id="fullMessage"></p>
    </div>
</div>

<script>
function showFullMessage(id, message) {
    document.getElementById('fullMessage').textContent = message;
    document.getElementById('messageModal').style.display = 'block';
}

// Close modal
document.querySelector('.close').onclick = function() {
    document.getElementById('messageModal').style.display = 'none';
}

window.onclick = function(event) {
    const modal = document.getElementById('messageModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>