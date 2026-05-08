<?php
require_once __DIR__ . "/Library.php";
require_once dirname(__DIR__) . '/../config/db.php';

class Membre
{
    private $library;
    private $pdo;

    public function __construct()
    {
        $this->library = new Library();
        $this->pdo = DB::connect();
    }

    public function afficherLivres()
    {
        return $this->library->getAllBooks();
    }

    public function emprunterLivre($memberId, $bookId)
    {
        $this->library->borrowBook($memberId, $bookId);
    }

    public function retournerLivre($loanId, $bookId)
    {
        $this->library->returnBook($loanId, $bookId);
    }

    public function rechercherLivre($input)
    {
          $sqlState = $this->pdo->query("SELECT * FROM books");
        $books = $sqlState->fetchAll(PDO::FETCH_OBJ);

        $resultats = [];

        foreach ($books as $book) {

            if (
                stripos($book->title, $input) !== false ||
                stripos($book->author, $input) !== false
            ) {
                $resultats[] = $book;
            }
        }

        return $resultats;
    }
}