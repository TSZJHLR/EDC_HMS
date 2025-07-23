<?php

class FormHandler {
    private $dataEntry;
    
    public function __construct($dataEntry) {
        $this->dataEntry = $dataEntry;
    }
    
    public function handleRequest() {
        $response = ['success' => false, 'message' => '', 'type' => 'error'];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
            
            // CSRF validation
            if(!Security::validateCSRFToken($_POST['csrf_token'] ?? '')) {
                $response['message'] = 'Invalid security token';
                return $response;
            }
            
            switch($_POST['action']) {
                case 'create':
                    $response = $this->handleCreate();
                    break;
                case 'update':
                    $response = $this->handleUpdate();
                    break;
                case 'delete':
                    $response = $this->handleDelete();
                    break;
            }
        }
        
        return $response;
    }
    
    private function handleCreate() {
        $validationResult = $this->validateFormData($_POST);
        
        if(!$validationResult['valid']) {
            return ['success' => false, 'message' => $validationResult['message'], 'type' => 'error'];
        }
        
        $this->setDataEntryProperties($_POST);
        
        try {
            if($this->dataEntry->create()) {
                return ['success' => true, 'message' => 'Data entry created successfully!', 'type' => 'success'];
            } else {
                return ['success' => false, 'message' => 'Error creating data entry.', 'type' => 'error'];
            }
        } catch(Exception $e) {
            return ['success' => false, 'message' => $e->getMessage(), 'type' => 'error'];
        }
    }
    
    private function handleUpdate() {
        $validationResult = $this->validateFormData($_POST);
        
        if(!$validationResult['valid']) {
            return ['success' => false, 'message' => $validationResult['message'], 'type' => 'error'];
        }
        
        $this->setDataEntryProperties($_POST);
        $this->dataEntry->id = $_POST['id'];
        
        if($this->dataEntry->update()) {
            return ['success' => true, 'message' => 'Data entry updated successfully!', 'type' => 'success'];
        } else {
            return ['success' => false, 'message' => 'Error updating data entry.', 'type' => 'error'];
        }
    }
    
    private function handleDelete() {
        $this->dataEntry->id = $_POST['id'];
        
        if($this->dataEntry->delete()) {
            return ['success' => true, 'message' => 'Data entry deleted successfully!', 'type' => 'success'];
        } else {
            return ['success' => false, 'message' => 'Error deleting data entry.', 'type' => 'error'];
        }
    }
    
    private function validateFormData($data) {
        // Required fields validation
        if(!Validator::validateRequired($data['participant_id'])) {
            return ['valid' => false, 'message' => 'Participant ID is required'];
        }
        
        if(!Validator::validateRequired($data['first_name'])) {
            return ['valid' => false, 'message' => 'First name is required'];
        }
        
        if(!Validator::validateRequired($data['last_name'])) {
            return ['valid' => false, 'message' => 'Last name is required'];
        }
        
        if(!Validator::validateRequired($data['email'])) {
            return ['valid' => false, 'message' => 'Email is required'];
        }
        
        // Specific validation
        if(!Validator::validateParticipantId($data['participant_id'])) {
            return ['valid' => false, 'message' => 'Invalid participant ID format'];
        }
        
        if(!Validator::validateEmail($data['email'])) {
            return ['valid' => false, 'message' => 'Invalid email format'];
        }
        
        if(!empty($data['date_of_birth']) && !Validator::validateDate($data['date_of_birth'])) {
            return ['valid' => false, 'message' => 'Invalid date format'];
        }
        
        if(!Validator::validateGender($data['gender'])) {
            return ['valid' => false, 'message' => 'Invalid gender selection'];
        }
        
        return ['valid' => true, 'message' => ''];
    }
    
    private function setDataEntryProperties($data) {
        $this->dataEntry->participantId = $data['participant_id'];
        $this->dataEntry->firstName = $data['first_name'];
        $this->dataEntry->lastName = $data['last_name'];
        $this->dataEntry->email = $data['email'];
        $this->dataEntry->dateOfBirth = $data['date_of_birth'] ?? '';
        $this->dataEntry->gender = $data['gender'] ?? '';
        $this->dataEntry->notes = $data['notes'] ?? '';
    }
}

?>