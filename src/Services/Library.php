<?php
include_once __DIR__ . "/../../config/db.php";

class Library
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function getAllBooks()
    {
        $sqlState = $this->pdo->query("SELECT * FROM books");
        $books = $sqlState->fetchAll(PDO::FETCH_OBJ);

        echo "\n===== BOOKS LIST =====\n";

        foreach ($books as $book) {
            echo "ID: {$book->id} | Title: {$book->title} | Author: {$book->author} | Status: {$book->status}\n";
        }
    }

    public function addBook($title, $author, $isbn, $libraryId) {

        $stmt = $this->pdo->prepare("
            INSERT INTO books (title, author, isbn, status, library_id)
            VALUES (?, ?, ?, 'available', ?)
        ");

        $stmt->execute([$title, $author, $isbn, $libraryId]);

        echo "Book added successfully\n";
    }


}

$library = new Library();
 
