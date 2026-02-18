<?php
// Load environment variables
function loadEnv($path) {
    if (!file_exists($path)) {
        return false;
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        
        putenv(sprintf('%s=%s', $name, $value));
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
    return true;
}

// Load .env file
loadEnv(__DIR__ . '/../.env');

// Define constants
define('SITE_NAME', getenv('SITE_NAME') ?: 'Studio Architecture');
define('SITE_URL', getenv('SITE_URL') ?: 'http://localhost/architecture-firm');
define('BASE_PATH', '/architecture-firm');
define('UPLOAD_MAX_SIZE', getenv('MAX_FILE_SIZE') ?: 5242880);
define('ALLOWED_EXTENSIONS', explode(',', getenv('ALLOWED_EXTENSIONS') ?: 'jpg,jpeg,png,gif,webp'));

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Timezone
date_default_timezone_set('Asia/Kolkata');

// CRITICAL: Session Configuration - MUST be set BEFORE session_start()
ini_set('session.cookie_path', BASE_PATH);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_lifetime', 0); // Until browser closes
ini_set('session.gc_maxlifetime', 7200); // 2 hours
ini_set('session.name', 'ARCHITECTURE_SESSID');

// Set session cookie parameters
session_set_cookie_params([
    'lifetime' => 0,
    'path' => BASE_PATH,
    'domain' => '',
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Lax'
]);

// Session start - only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Debug: Log session info (remove in production)
if (isset($_GET['debug_session'])) {
    echo "<pre>Session Save Path: " . session_save_path() . "</pre>";
    echo "<pre>Session ID: " . session_id() . "</pre>";
    echo "<pre>Session Name: " . session_name() . "</pre>";
    echo "<pre>Cookie Params: "; print_r(session_get_cookie_params()); echo "</pre>";
    echo "<pre>Session Data: "; print_r($_SESSION); echo "</pre>";
    exit;
}
?>