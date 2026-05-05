<?php

class Book {
 
    private $title;
    private $author;
    private $isbn;
    private $status;
    private $libraryId;

    public function __construct( $title , $author , $isbn  , $status, $libraryId) {
     
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->status = $status;
        $this->libraryId = $libraryId;
    }
 
    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getLibraryId() {
        return $this->libraryId;
    }

 
}