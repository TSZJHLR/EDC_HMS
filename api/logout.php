<?php

session_start();
require_once '../config/Database.php';
require_once '../config/Security.php';

$database = new Database();
$db = $database->connect();

// get session ID
$session_id = session_id();

try {
    // delete session record from database
    $stmt = $db->prepare("DELETE FROM sessions WHERE id = ?");
    $stmt->execute([$session_id]);
    
    // destroy PHP session
    session_destroy();
    
    // clear cookies
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-3600, '/');
    }
    
    // redirect to entry page
    header('Location: ../entry.php');
    exit();
} catch (Exception $e) {
    // if there's an error, still destroy the session and redirect
    session_destroy();
    header('Location: ../entry.php');
    exit();
}
