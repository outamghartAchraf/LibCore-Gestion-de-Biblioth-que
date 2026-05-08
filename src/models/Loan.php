<?php

class Loan

{
    private $memberId;
    private $bookId;
    private $borrowDate;
    private $returnDate;
    private $status;

    public function __construct($memberId, $bookId,  $borrowDate , $returnDate, $status) 
    
    {
        $this->memberId = $memberId;
        $this->bookId = $bookId;
        $this->borrowDate = $borrowDate;
        $this->returnDate = $returnDate;
        $this->status = $status;
    }

 
    public function getMemberId()
    {
        return $this->memberId;
    }

    public function getBookId()
    {
        return $this->bookId;
    }

    public function getBorrowDate()
    {
        return $this->borrowDate;
    }

    public function getReturnDate()
    {
        return $this->returnDate;
    }

    public function getStatus()
    {
        return $this->status;
    }

     
    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

   
    public function __toString()
    {
        return "Loan: Member {$this->memberId} → Book {$this->bookId} ({$this->status})";
    }
}
