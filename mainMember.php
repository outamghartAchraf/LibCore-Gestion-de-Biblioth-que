<?php

require_once __DIR__ . "/src/Services/Member.php";

class MainMember
{
    private $member;

    public function __construct()
    {
        $this->member = new MemberService();
    }

    public function run()
    {
        echo " ==== DASHBOARD MEMBRE ====\n";

        while (true) {

            echo "\n1 - Afficher tous les livres\n";
            echo "2 - Emprunter un livre\n";
            echo "3 - Retourner un livre\n";
            echo "4 - Rechercher un livre\n";
            echo "0 - Quitter\n";
             
            echo "Choisissez une option:";
            $choice = readline("Choisissez une option: ");

            switch ($choice) {

                case 1:
                    $books = $this->member->getAllBooks();

                    foreach ($books as $book) {
                        echo "ID: {$book->id} | Title: {$book->title} | Author: {$book->author} | Status: {$book->status}\n";
                    }
                    break;

                case 2:
                    echo "Enter Member ID: ";
                    $memberId = readline("Enter Member ID: ");
                    echo "Enter Book ID: ";
                    $bookId = readline("Enter Book ID: ");
                    $this->member->borrowBook($memberId, $bookId);
                    break;

                case 3:
                    echo "Enter Loan ID: ";
                    $loanId = readline("Enter Loan ID: ");
                    echo "Enter Book ID: ";
                    $bookId = readline("Enter Book ID: ");
                    $this->member->returnBook($loanId, $bookId);
                    break;

                case 4:
                    echo "Enter title or author:";
                    $input = readline("Enter title or author: ");
                    $this->member->searchBook($input);
                    break;

                case 0:
                    echo "Good Bye \n";
                    exit;

                default:
                    echo "Invalid option\n";
            }
        }
    }
}
