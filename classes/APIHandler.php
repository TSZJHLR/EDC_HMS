<?php

class APIHandler {
    private $dataEntry;
    
    public function __construct($dataEntry) {
        $this->dataEntry = $dataEntry;
    }
    
    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        
        switch($method) {
            case 'GET':
                $this->handleGet();
                break;
            case 'POST':
                $this->handlePost();
                break;
            case 'PUT':
                $this->handlePut();
                break;
            case 'DELETE':
                $this->handleDelete();
                break;
            default:
                $this->sendResponse(['message' => 'Method not allowed'], 405);
        }
    }
    
    private function handleGet() {
        if(isset($_GET['id'])) {
            $this->dataEntry->id = $_GET['id'];
            $result = $this->dataEntry->readSingle();
            $this->sendResponse($result ? $result : ['message' => 'Entry not found']);
        } else {
            $result = $this->dataEntry->read();
            $this->sendResponse($result);
        }
    }
    
    private function handlePost() {
        $data = json_decode(file_get_contents("php://input"));
        
        if($this->validateAPIData($data)) {
            $this->setDataEntryFromAPI($data);
            try {
                if($this->dataEntry->create()) {
                    $this->sendResponse(['message' => 'Entry created successfully'], 201);
                } else {
                    $this->sendResponse(['message' => 'Entry not created'], 400);
                }
            } catch (Exception $e) {
                $this->sendResponse(['message' => $e->getMessage()], 400);
            }
        } else {
            $this->sendResponse(['message' => 'Missing or invalid required fields'], 400);
        }
    }
    
    private function handlePut() {
        $data = json_decode(file_get_contents("php://input"));
        
        if($this->validateAPIData($data) && isset($data->id)) {
            $this->setDataEntryFromAPI($data);
            $this->dataEntry->id = $data->id;
            
            if($this->dataEntry->update()) {
                $this->sendResponse(['message' => 'Entry updated successfully']);
            } else {
                $this->sendResponse(['message' => 'Entry not updated'], 400);
            }
        } else {
            $this->sendResponse(['message' => 'Missing or invalid data'], 400);
        }
    }
    
    private function handleDelete() {
        $data = json_decode(file_get_contents("php://input"));
        
        if(isset($data->id)) {
            $this->dataEntry->id = $data->id;
            
            if($this->dataEntry->delete()) {
                $this->sendResponse(['message' => 'Entry deleted successfully']);
            } else {
                $this->sendResponse(['message' => 'Entry not deleted'], 400);
            }
        } else {
            $this->sendResponse(['message' => 'Missing entry ID'], 400);
        }
    }
    
    private function validateAPIData($data) {
        return !empty($data->participant_id) && 
               !empty($data->first_name) && 
               !empty($data->last_name) && 
               !empty($data->email) &&
               Validator::validateEmail($data->email) &&
               Validator::validateParticipantId($data->participant_id);
    }
    
    private function setDataEntryFromAPI($data) {
        $this->dataEntry->participantId = $data->participant_id;
        $this->dataEntry->firstName = $data->first_name;
        $this->dataEntry->lastName = $data->last_name;
        $this->dataEntry->email = $data->email;
        $this->dataEntry->dateOfBirth = $data->date_of_birth ?? '';
        $this->dataEntry->gender = $data->gender ?? '';
        $this->dataEntry->notes = $data->notes ?? '';
    }
    
    private function sendResponse($data, $statusCode = 200) {
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }
}

?>