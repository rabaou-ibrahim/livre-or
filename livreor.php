<?php
session_start();
    // Chaque commentaire est ajouté à la bdd. Donc pour les afficher en les triant
    // du plus récent au plus ancien il suffit de faire une requête SQL pour récuperer
    // les résultats. On fera ça dans un fichier insert_livreor.php
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo "LivreOr" ?></title>
<link href="style.css" rel="stylesheet">
</head>

<body>
    <header>
        <li><a href="index.php" target=_blank><b>Accueil</li></a>
        <li><a href="deconnexion.php"><b>Se déconnecter</b></li></a>
    </header>
    
    <main>

    <form action="Inserts/insert_livreor.php" method="post">

    <?php
     
        if (!isset($_SESSION) || !isset($_SESSION['login']) || !isset($_SESSION['password']) || !isset($_SESSION['id'])) {
            header('location:warning.php'); // Si on n'a pas de variables sessions la personne n'est pas connectée, on la redirige vers la page warning.php
        }
           
        elseif ($_SESSION['loggedin'] = true) {
            echo ('<main>');
            echo ('<br>');
            echo('<a href="commentaires.php" target="_blank">Ajouter un commentaire</a>');
            echo ('</main>');
            echo ('</br>');
        } 
        
    ?>

    </main>

</body>