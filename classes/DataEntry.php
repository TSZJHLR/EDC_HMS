<?php

class DataEntry {
    private $connection;
    private $table = 'data_entries';
    
    public $id;
    public $participantId;
    public $firstName;
    public $lastName;
    public $email;
    public $dateOfBirth;
    public $gender;
    public $notes;
    public $createdAt;
    
    public function __construct($db) {
        $this->connection = $db;
    }
    
    public function create() {
        // First check if participant_id already exists
        $checkQuery = "SELECT id FROM " . $this->table . " WHERE participant_id = ?";
        $checkStmt = $this->connection->prepare($checkQuery);
        $checkStmt->bindParam(1, $this->participantId);
        $checkStmt->execute();
        
        if($checkStmt->rowCount() > 0) {
            throw new Exception("Participant ID already exists. Please use a different ID.");
        }
        
        $query = "INSERT INTO " . $this->table . " 
                  (participant_id, first_name, last_name, email, date_of_birth, gender, notes) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->connection->prepare($query);
        
        // Sanitize and encrypt data
        $this->participantId = Security::sanitizeInput($this->participantId);
        $encryptedFirstName = Security::encrypt(Security::sanitizeInput($this->firstName));
        $encryptedLastName = Security::encrypt(Security::sanitizeInput($this->lastName));
        $encryptedEmail = Security::encrypt(Security::sanitizeEmail($this->email));
        $this->dateOfBirth = Security::sanitizeInput($this->dateOfBirth);
        $this->gender = Security::sanitizeInput($this->gender);
        $this->notes = Security::sanitizeInput($this->notes);
        
        $stmt->bindParam(1, $this->participantId);
        $stmt->bindParam(2, $encryptedFirstName);
        $stmt->bindParam(3, $encryptedLastName);
        $stmt->bindParam(4, $encryptedEmail);
        $stmt->bindParam(5, $this->dateOfBirth);
        $stmt->bindParam(6, $this->gender);
        $stmt->bindParam(7, $this->notes);
        
        return $stmt->execute();
    }
    
    public function read() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // decrypt sensitive data
        foreach($results as &$row) {
            $row['first_name'] = Security::decrypt($row['first_name']);
            $row['last_name'] = Security::decrypt($row['last_name']);
            $row['email'] = Security::decrypt($row['email']);
        }
        
        return $results;
    }
    
    public function readSingle() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($row) {
            $row['first_name'] = Security::decrypt($row['first_name']);
            $row['last_name'] = Security::decrypt($row['last_name']);
            $row['email'] = Security::decrypt($row['email']);
        }
        
        return $row;
    }
    
    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET participant_id = ?, first_name = ?, last_name = ?, 
                      email = ?, date_of_birth = ?, gender = ?, notes = ? 
                  WHERE id = ?";
        
        $stmt = $this->connection->prepare($query);
        
        // sanitize and encrypt
        $this->participantId = Security::sanitizeInput($this->participantId);
        $encryptedFirstName = Security::encrypt(Security::sanitizeInput($this->firstName));
        $encryptedLastName = Security::encrypt(Security::sanitizeInput($this->lastName));
        $encryptedEmail = Security::encrypt(Security::sanitizeEmail($this->email));
        $this->dateOfBirth = Security::sanitizeInput($this->dateOfBirth);
        $this->gender = Security::sanitizeInput($this->gender);
        $this->notes = Security::sanitizeInput($this->notes);
        $this->id = Security::sanitizeInput($this->id);
        
        $stmt->bindParam(1, $this->participantId);
        $stmt->bindParam(2, $encryptedFirstName);
        $stmt->bindParam(3, $encryptedLastName);
        $stmt->bindParam(4, $encryptedEmail);
        $stmt->bindParam(5, $this->dateOfBirth);
        $stmt->bindParam(6, $this->gender);
        $stmt->bindParam(7, $this->notes);
        $stmt->bindParam(8, $this->id);
        
        return $stmt->execute();
    }
    
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $this->id = Security::sanitizeInput($this->id);
        $stmt->bindParam(1, $this->id);
        
        return $stmt->execute();
    }
    
    public function getStats() {
        $stats = [];
        
        // total entries
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $stats['total'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        
        // gender statistics
        $query = "SELECT gender, COUNT(*) as count FROM " . $this->table . " WHERE gender != '' GROUP BY gender";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $genderStats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($genderStats as $stat) {
            $stats[strtolower($stat['gender'])] = $stat['count'];
        }
        
        return $stats;
    }
}

?>