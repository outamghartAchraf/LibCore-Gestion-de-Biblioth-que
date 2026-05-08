<?php
require_once __DIR__ . "/Library.php";

class Membre
{
    private $library;

    public function __construct()
    {
        $this->library = new Library();
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
        $books = $this->library->getAllBooks();

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