<?php

require_once __DIR__ . "/src/Services/Library.php";

class MainAdmin
{
    private $library;

    public function __construct()
    {
        $this->library = new Library();
    }

    public function run()
    {
        while (true) {

            echo "\n===================================\n";
            echo "      LIBRARIAN DASHBOARD\n";
            echo "===================================\n";

            echo "1. Show Books (Stock)\n";
            echo "2. Add Book\n";
            echo "3. Create Member\n";
            echo "4. Borrow Book\n";
            echo "5. Return Book\n";
            echo "6. Delete Book\n";
            echo "7. Mark Book as Under Repair\n";
            echo "0. Exit\n";

            echo "\nChoose option: ";

            $choice = trim(readline());

            switch ($choice) {

                case 1:
                    $this->library->getAllBooks();
                    break;

                case 2:
                    $this->library->addBook();
                    break;

                case 3:
                    $this->library->addMember();
                    break;

                case 4:
                    $this->library->getAllBooks();
                    $this->library->borrowBook();
                    break;

                case 5:
                    $this->library->returnBook();
                    break;

                case 6:
                    $this->library->getAllBooks();
                    $this->library->deleteBook();
                    break;

                case 7:
                    $this->library->getAllBooks();
                    $this->library->markAsRepair();
                    break;

                case 0:
                    echo "Good Bye \n";
                    exit;

                default:
                    echo "Invalid operation \n";
            }
        }
    }
}


