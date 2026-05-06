<?php

require_once "User.php";

class Librarian extends User {

    private $employeeId;

    public function __construct($name, $email, $employeeId)
    {
        parent::__construct($name, $email);
        $this->employeeId = $employeeId;
    }
 
    public function getEmployeeId() {
        return $this->employeeId;
    }

 
    public function setEmployeeId($employeeId) {
        $this->employeeId = $employeeId;
    }

    
    public function __toString() {
        return "Librarian: {$this->name} ({$this->employeeId})";
    }
}