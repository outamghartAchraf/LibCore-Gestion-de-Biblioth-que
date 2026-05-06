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
    echo "7. Exit\n";

    echo "Choose option: ";
    flush();
    $choice = readline();

    switch ($choice) {
        case 1 :
            $library->getAllBooks();
            break;

        case 2 :
            echo "Enter Title: ";
            flush();
            $title = readline();

            echo "Enter Author: ";
            flush();
            $author = readline();


    }
}