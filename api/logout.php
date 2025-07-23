<?php
// api/logout.php
session_start();
require_once '../config/Database.php';
require_once '../config/Security.php';

$database = new Database();
$db = $database->connect();

// Get session ID
$session_id = session_id();

try {
    // Delete session record from database
    $stmt = $db->prepare("DELETE FROM sessions WHERE id = ?");
    $stmt->execute([$session_id]);
    
    // Destroy PHP session
    session_destroy();
    
    // Clear cookies
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-3600, '/');
    }
    
    // Redirect to entry page
    header('Location: ../entry.php');
    exit();
} catch (Exception $e) {
    // If there's an error, still destroy the session and redirect
    session_destroy();
    header('Location: ../entry.php');
    exit();
}
