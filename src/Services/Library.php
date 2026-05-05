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

    public function addBook($title, $author, $isbn, $libraryId)
    {

        $stmt = $this->pdo->prepare("
            INSERT INTO books (title, author, isbn, status, library_id)
            VALUES (?, ?, ?, 'available', ?)
        ");

        $stmt->execute([$title, $author, $isbn, $libraryId]);

        echo "Book added successfully\n";
    }

    public function addMember($name, $email, $type, $membership_no, $is_active)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO users (name, email)
            VALUES (?, ?)
        ");

        $stmt->execute([$name, $email]);
        $userId = $this->pdo->lastInsertId();

        $stmt = $this->pdo->prepare("
            INSERT INTO members (user_id, type, membership_no, is_active)
            VALUES (?, ?, ?, 1)
        ");

        $stmt->execute([$userId, $type, $membership_no]);
        echo "Member created successfully\n";

    }

    public function borrowBook($memberId, $bookId)
    {
        $stateSql = $this->pdo->prepare("
            SELECT status FROM books WHERE id = ?
        ");
        $stateSql->execute([$bookId]);
        $book = $stateSql->fetch(PDO::FETCH_OBJ);

        if (!$book || $book->status !== "available") {
            echo "Book not available\n";
            return;
        }

        $stmtLoans = $this->pdo->prepare("
            INSERT INTO loans (member_id, book_id, borrow_date, status)
            VALUES (?, ?, CURDATE(), 'borrowed')
        ");
        $stmtLoans->execute([$memberId, $bookId]);

        $stmt = $this->pdo->prepare("
            UPDATE books SET status = 'borrowed' WHERE id = ?
        ");
        $stmt->execute([$bookId]);

        echo "Book borrowed successfully!\n";
        
    }


}

$library = new Library();
 
