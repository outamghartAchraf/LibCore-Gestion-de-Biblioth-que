<?php

require_once "User.php";

class Member extends User {

    private $type;
    private $membershipNo;
    private $isActive;

    public function __construct($name, $email, $type, $membershipNo, $isActive)
    {
        parent::__construct($name, $email);

        $this->type = $type;
        $this->membershipNo = $membershipNo;
        $this->isActive = $isActive;
    }

   
    public function getType() {
        return $this->type;
    }

    public function getMembershipNo() {
        return $this->membershipNo;
    }

    public function getIsActive() {
        return $this->isActive;
    }

     
    public function setType($type) {
        $this->type = $type;
    }

    public function setMembershipNo($membershipNo) {
        $this->membershipNo = $membershipNo;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    
    public function __toString() {
        return "Member: {$this->name} ({$this->membershipNo})";
    }
}