<?php
// api/auth.php
session_start();
require_once '../config/Database.php';
require_once '../config/Security.php';

$database = new Database();
$db = $database->connect();

$action = $_GET['action'] ?? '';

header('Content-Type: application/json');

try {
    switch ($action) {
        case 'login':
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                throw new Exception('Email and password are required');
            }

            $stmt = $db->prepare("SELECT id, username, password_hash, role FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                // Update or create session record
                $session_id = session_id();
                $stmt = $db->prepare("INSERT INTO sessions (id, user_id, ip_address, user_agent, last_activity) 
                                    VALUES (?, ?, ?, ?, NOW()) 
                                    ON DUPLICATE KEY UPDATE last_activity = NOW()");
                $stmt->execute([
                    $session_id,
                    $user['id'],
                    $_SERVER['REMOTE_ADDR'],
                    $_SERVER['HTTP_USER_AGENT']
                ]);

                echo json_encode(['success' => true]);
            } else {
                throw new Exception('Invalid email or password');
            }
            break;

        case 'register':
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $full_name = $_POST['full_name'] ?? '';

            if (empty($username) || empty($email) || empty($password) || empty($full_name)) {
                throw new Exception('All fields are required');
            }

            // Check if email exists
            $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                throw new Exception('Email already registered');
            }

            // Hash password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $stmt = $db->prepare("INSERT INTO users (username, email, password_hash, full_name) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $email, $password_hash, $full_name]);

            echo json_encode(['success' => true]);
            break;

        case 'logout':
            // Clear session data
            session_destroy();
            
            // Remove session record
            $stmt = $db->prepare("DELETE FROM sessions WHERE id = ?");
            $stmt->execute([session_id()]);
            
            // Redirect to entry page
            header('Location: entry.php');
            exit;
            break;

        default:
            throw new Exception('Invalid action');
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
