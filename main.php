<?php

require_once "mainAdmin.php";

while (true) {

    echo "\n===================================\n";
    echo "        LIBCORE DASHBOARD\n";
    echo "===================================\n";

    echo "1. Admin Dashboard\n";
    echo "2. Member Dashboard\n";
    echo "0. Exit\n";

    echo "\nChoose option: ";
    $choice = trim(readline());

    switch ($choice) {

        case "1":
            $admin = new MainAdmin();
            $admin->run();
            break;

        case "2":
            echo "membret not found";
            break;

        case "0":
            echo "Good Bye \n";
            exit;

        default:
            echo "Invalid option\n";
    }
}
