<?php

class Library {
 
    private $name;
    private $address;

    public function __construct($name ,$address  )
    {
        
        $this->name = $name;
        $this->address = $address;
    }

 

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }
 

    public function setName($name) {
        $this->name = $name;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

   
    public function __toString() {
        return "Library: {$this->name} ({$this->address})";
    }
}