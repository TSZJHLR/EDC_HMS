<?php

class Validator {
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public static function validateRequired($value) {
        return !empty(trim($value));
    }
    
    public static function validateDate($date) {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }
    
    public static function validateParticipantId($id) {
        return preg_match('/^[A-Z0-9]{6,10}$/', $id);
    }
    
    public static function validateLength($value, $min = 1, $max = 255) {
        $length = strlen(trim($value));
        return $length >= $min && $length <= $max;
    }
    
    public static function validateGender($gender) {
        $validGenders = ['Male', 'Female', 'Other', ''];
        return in_array($gender, $validGenders);
    }
}

?>
