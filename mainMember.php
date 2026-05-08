<?php

require_once __DIR__ . "/src/Services/Membre.php";

$membre = new Membre();

echo " ==== DASHBOARD MEMBRE ====\n";

while (true) {

    echo "\n1. Afficher tous les livres\n";
    echo "2. Emprunter un livre\n";
    echo "3. Retourner un livre\n";
    echo "4. Rechercher un livre\n";
    echo "0. Quitter\n";

    $choix = readline("Choisissez une option : ");

    switch ($choix) {

        case 1:
            $membre->afficherLivres();
            break;

        case 2:
            $memberID = readline("ID membre : ");
            $bookID = readline("ID livre : ");

            $membre->emprunterLivre($memberID, $bookID);
            break;

        case 3:
            $loanID = readline("ID emprunt : ");
            $bookID = readline("ID livre : ");

            $membre->retournerLivre($loanID, $bookID);
            break;

        case 4:
            $input = readline("Titre ou auteur : ");

            $resultats = $membre->rechercherLivre($input);

            if (empty($resultats)) {
                echo "Aucun livre trouvé\n";
            } else {
                foreach ($resultats as $book) {
                    echo "ID: {$book->id} | ";
                    echo "Titre: {$book->title} | ";
                    echo "Auteur: {$book->author} | ";
                    echo "Status: {$book->status}\n";
                }
            }
            break;

        case 0:
            exit("Au revoir !\n");

        default:
            echo "Option invalide\n";
    }
}