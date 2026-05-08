<?php
require_once __DIR__ . "/library.php";

$library = new Library();

echo " ==== DASHBOARD MEMBRE ====\n";

while (true) {
    echo "\n 1-Afficher tout les livres \n";
     echo "\n 2-emprunter un livre \n";
      echo "\n 3-Retourner un livre \n";
      echo "\n 4-Rechercher un livre \n";
       echo "\n 0-Quitter \n";
       $choix= readline("Choissisez une option");
       
    switch ($choix){
        case 1:
            $library->getAllBooks();
            break;

            case 2:
                $membreID=readline("Entrez Membre identifiant:");
                $bookID=readline("Entrez l'identifiant du livre:");

                $library->borrowBook($membreID,$bookID);
                break;
            case 3:
                $emprunter=readline("Entrez Id emprunté");
                $bookID=readline("Entrez Id book");
    $library->returnBook($emprunter, $bookID);
            break;


            case 4:

                $input=readline("Entrez le titre ou l'auteur:");
                $book=$library->getAllBooks();
                $trouveLivre= false;

                foreach ($books as $book){
                 
                if( stripos($book['title'],$input) !== false || stripos($book['author'],$input) !==false  ){
            echo "ID: {$book['id']} | ";
            echo "Titre: {$book['title']} | ";
            echo "Auteur: {$book['author']} | ";
            echo "Status: {$book['status']}\n";
             
 
                        $trouveLivre= true;
                }
                 

                }

                if (!$trouveLivre) {
        echo "Aucun livre trouvé.\n";
    }

    break;

            case 0:
                exit("Au revoir ! merci pour votre visite");

          default: echo "L'option n'est pas valide\n";      

    }


    
}