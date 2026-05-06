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
    echo "7. mark Repair Book\n";
    echo "8. Exit\n";

    echo "Choose option: ";
    flush();
    $choice = readline();

    switch ($choice) {
        case 1 :
            $library->getAllBooks();
            break;

        case 2:

            echo "Enter Title: ";
            flush();
            $title = trim(readline());

            echo "Enter Author: ";
            flush();
            $author = trim(readline());

            echo "Enter ISBN: ";
            flush();
            $isbn = trim(readline());

            echo "Enter Library ID: ";
            flush();
            $libraryId = (int)readline();

            $library->addBook($title, $author, $isbn, $libraryId);

            break;

        case 3:

            echo "Enter Name: ";
            flush();
            $name = trim(readline());

            echo "Enter Email: ";
            flush();
            $email = trim(readline());

            echo "Enter Type (student/professor): ";
            flush();
            $type = trim(readline());

            echo "Enter Membership No: ";
            flush();
            $membershipNo = trim(readline());


            if (empty($name) || empty($email) || empty($type) || empty($membershipNo)) {
                echo "All fields are required\n";
                break;
            }

            $library->createMember($name, $email, $type, $membershipNo);

            break;

        case 4:

            $library->getAllBooks();

            echo "Enter Member ID: ";
            flush();
            $memberId = (int)readline();

            echo "Enter Book ID: ";
            flush();
            $bookId = (int)readline();


            if (empty($memberId) || empty($bookId)) {

                echo "Member ID and Book ID are required\n";
                break;
            }

            $library->borrowBook($memberId, $bookId);

            break;

        case 5:

            echo "Enter Loan ID: ";
            flush();
            $loanId = (int)readline();

            echo "Enter Book ID: ";
            flush();
            $bookId = (int)readline();

            if (empty($loanId)  || empty($bookId) ) {
                echo "Loan ID and Book ID are required\n";
                break;
            }

            $library->returnBook($loanId, $bookId);

            break;

        
    }
}