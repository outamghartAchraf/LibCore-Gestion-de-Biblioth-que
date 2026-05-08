<?php
include_once __DIR__ . "/../../config/db.php";
include_once __DIR__ . "/../../src/models/Book.php";
include_once __DIR__ . "/../../src/models/Member.php";
include_once __DIR__ . "/../../src/models/Loan.php";
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
        if(empty($books)) {
            echo "not found book";
            exit;
        }
        foreach ($books as $book) {
            echo "ID: {$book->id} | Title: {$book->title} | Author: {$book->author} | Status: {$book->status}\n";
        }
    }

    public function addBook()
    {
        echo "Enter Title: ";
        $title = trim(readline());

        echo "Enter Author: ";
        $author = trim(readline());

        echo "Enter ISBN: ";
        $isbn = trim(readline());

        echo "Enter Library ID: ";
        $libraryId = trim(readline());

        if (empty($title)|| empty($author)  || empty($isbn) || empty($libraryId) ) {
            echo "All fields are required!\n";
            return;
        }

        $book = new Book(
            $title,
            $author,
            $isbn,
            (int)$libraryId
        );

        $stmt = $this->pdo->prepare("
        INSERT INTO books (title, author, isbn, status, library_id)
        VALUES (?, ?, ?, ?, ?)
    ");
        $stmt->execute([
            $book->getTitle(),
            $book->getAuthor(),
            $book->getIsbn(),
            $book->getStatus(),
            $book->getLibraryId()
        ]);

        echo "Book created successfully\n";
    }
    public function addMember()
    {
        echo "Enter Name: ";
        $name = trim(readline());

        echo "Enter Email: ";
        $email = trim(readline());

        echo "Enter Type (student/professor): ";
        $type = trim(readline());

        echo "Enter Membership No: ";
        $membership_no = trim(readline());


        if (empty($name) || empty($email) || empty($type) || empty($membership_no)) {
            echo "All fields are required\n";
            exit;
        }

        $member = new Member(
            $name,
            $email,
            $type,
            $membership_no
        );
        $stmt = $this->pdo->prepare("
            INSERT INTO users (name, email)
            VALUES (?, ?)
        ");

        $stmt->execute([
            $member->getName(),
            $member->getEmail()
        ]);

        $userId = $this->pdo->lastInsertId();

        $stmt = $this->pdo->prepare("INSERT INTO members (user_id, type, membership_no, is_active)
    VALUES (?, ?, ?, ?)");

        $stmt->execute([
            $userId,
            $member->getType(),
            $member->getMembershipNo(),
            $member->getIsActive()
        ]);
        echo "Member created successfully\n";

    }

    public function borrowBook()
    {
        echo "Enter Member ID: ";
        flush();
        $memberId = (int)readline();

        echo "Enter Book ID: ";
        flush();
        $bookId = (int)readline();


        if (empty($memberId) || empty($bookId)) {

            echo "Member ID and Book ID are required\n";
            exit;
        }

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

    public function returnBook()
    {
        echo "Enter Loan ID: ";
        flush();
        $loanId = (int)readline();

        echo "Enter Book ID: ";
        flush();
        $bookId = (int)readline();

        if (empty($loanId) || empty($bookId)) {
            echo "Loan ID and Book ID are required\n";
            exit;
        }

        $stmtLoad = $this->pdo->prepare("
            UPDATE loans 
            SET status = 'returned', return_date = CURDATE()
            WHERE id = ?
        ");

        $stmtLoad->execute([$loanId]);

        $stateBook = $this->pdo->prepare("
            UPDATE books SET status = 'available' WHERE id = ?
        ");
        $stateBook->execute([$bookId]);

        echo "Book returned successfully!\n";
    }

    public function deleteBook()
    {
        echo "Enter Book ID to delete: ";
        flush();
        $bookId = (int)readline();

        if (empty($bookId)) {
            echo "Required Book ID\n";
            exit;
        }
        $stmt = $this->pdo->prepare("
            DELETE FROM books WHERE id = ?
        ");
        $stmt->execute([$bookId]);

        echo "Book deleted successfully!\n";

    }

    public function markAsRepair()
    {
        echo "Enter Book ID to delete: ";
        flush();
        $bookId = (int)readline();

        if (empty($bookId)) {
            echo "Required Book ID\n";
            exit;
        }
        $stmt = $this->pdo->prepare("
        UPDATE books 
        SET status = 'repair' 
        WHERE id = ?
    ");

        $stmt->execute([$bookId]);

        echo "Book marked as under repair\n";
    }


}

$library = new Library();
 
