<?php

require_once __DIR__ . "/src/Services/Library.php";

$library = new Library();
while (true) {

    echo "\n===================================\n";
    echo "   LIBRARIAN DASHBOARD\n";
    echo "=====================================\n";

    echo "1. Show Books (Stock)\n";
    echo "2. Add Book\n";
    echo "3. Create Member\n";
    echo "4. Borrow Book\n";
    echo "5. Return Book\n";
    echo "6. Delete Book\n";
    echo "7. Mark Book as Under Repair\n";
    echo "0. Exit\n";

    echo "Choose option: ";
    flush();
    $choice = readline();


    switch ($choice) {
        case 1:
            $library->getAllBooks();
            break;

        case 2:

            $library->addBook();
            break;

        case 3:

            $library->addMember();
            break;

        case 4:

            $library->getAllBooks();
            $library->borrowBook();

            break;

        case 5:

            $library->returnBook();
            break;

        case 6:

            $library->getAllBooks();
            $library->deleteBook();

            break;

        case 7:

            $library->getAllBooks();
            $library->markAsRepair();

        case 0:
            echo "GOOD BY";
            exit;

        default :
            echo "invalide operation !";

    }


}
