<?php

class Security {
    private static $encryptionKey = 'your-128-bit-key-here-1234567890';
    
    public static function encrypt($data) {
        return openssl_encrypt($data, 'AES-128-CBC', self::$encryptionKey, 0, substr(self::$encryptionKey, 0, 16));
    }
    
    public static function decrypt($data) {
        return openssl_decrypt($data, 'AES-128-CBC', self::$encryptionKey, 0, substr(self::$encryptionKey, 0, 16));
    }
    
    public static function sanitizeInput($input) {
        return htmlspecialchars(strip_tags(trim($input)));
    }
    
    public static function sanitizeEmail($email) {
        return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    }
    
    public static function generateCSRFToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    
    public static function validateCSRFToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}
?>
