<?php

require_once __DIR__ . "/../../config/db.php";

class MemberService
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function getAllBooks()
    {
        $sql = $this->pdo->query("SELECT * FROM books");
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function borrowBook($memberId, $bookId)
    {
        if (empty($memberId) || empty($bookId)) {
            echo "Member ID and Book ID are required\n";
            return;
        }

        $check = $this->pdo->prepare("SELECT status FROM books WHERE id = ?");
        $check->execute([$bookId]);
        $book = $check->fetch(PDO::FETCH_OBJ);

        if (!$book || $book->status !== "available") {
            echo "Book not available\n";
            return;
        }

        $stmt = $this->pdo->prepare("
            INSERT INTO loans (member_id, book_id, borrow_date, status)
            VALUES (?, ?, CURDATE(), 'borrowed')
        ");
        $stmt->execute([$memberId, $bookId]);

        $update = $this->pdo->prepare("
            UPDATE books SET status = 'borrowed' WHERE id = ?
        ");
        $update->execute([$bookId]);

        echo "Book borrowed successfully!\n";
    }

    public function returnBook($loanId, $bookId)
    {
        if (empty($loanId) || empty($bookId)) {
            echo "Loan ID and Book ID are required\n";
            return;
        }

        $stmt = $this->pdo->prepare("
            UPDATE loans 
            SET status = 'returned', return_date = CURDATE()
            WHERE id = ?
        ");
        $stmt->execute([$loanId]);

        $update = $this->pdo->prepare("
            UPDATE books SET status = 'available' WHERE id = ?
        ");
        $update->execute([$bookId]);

        echo "Book returned successfully!\n";
    }

    public function searchBook($input)
    {
        $books = $this->getAllBooks();
        $found = false;

        foreach ($books as $book) {
            if (
                stripos($book->title, $input) !== false ||
                stripos($book->author, $input) !== false
            ) {
                echo "ID: {$book->id} | Title: {$book->title} | Author: {$book->author} | Status: {$book->status}\n";
                $found = true;
            }
        }

        if (!$found) {
            echo "Aucun livre trouvé.\n";
        }
    }
}
