<?php

require_once "User.php";

class Librarian extends User {

    private $employeeId;

    public function __construct($name, $email, $employeeId)
    {
        parent::__construct($name, $email);
        $this->employeeId = $employeeId;
    }


}