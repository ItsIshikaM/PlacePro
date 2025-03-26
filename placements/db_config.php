<?php
// Enable error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Database credentials
define('DB_SERVER', 'localhost');  // Change if using a remote server
define('DB_USERNAME', 'root');     // Default for XAMPP
define('DB_PASSWORD', 'Root@123'); // Set to your MySQL password
define('DB_NAME', 'placements_db');
try {
    // Create connection
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Set charset to UTF-8 for better compatibility
    $conn->set_charset("utf8mb4");

} catch (Exception $e) {
    // Handle connection error
    die("Database connection failed: " . $e->getMessage());
}
?>
